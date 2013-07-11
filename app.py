# -*- coding: utf-8 -*-
import os
import sys

sys.path.insert(0, os.path.realpath(os.path.join(os.path.dirname(__file__), '../../')))
port = int(os.environ.get('PORT', 5000))

from flask import Flask, request, render_template, redirect, url_for, flash, send_from_directory
from werkzeug import secure_filename
from flask.views import MethodView
from flask.ext.mongoengine import MongoEngine
from flask_debugtoolbar import DebugToolbarExtension
from flask.ext.security import Security, MongoEngineUserDatastore, \
    UserMixin, RoleMixin, login_required
from flask.ext.security.utils import encrypt_password

import argparse


app = Flask(__name__, static_url_path='')
app.config.from_object(__name__)
app.config.from_pyfile('config.cfg')

DebugToolbarExtension(app)

db = MongoEngine()


class Role(db.Document, RoleMixin):
    name = db.StringField(max_length=80, unique=True)
    description = db.StringField(max_length=255)


class User(db.Document, UserMixin):
    username = db.StringField(max_length=50, min_length=2, required=True, unique=True)
    email = db.EmailField(max_length=100, required=True)
    password = db.StringField(max_length=500, required=True, min_length=5)
    active = db.BooleanField(default=True)
    confirmed_at = db.DateTimeField()
    roles = db.ListField(db.ReferenceField(Role), default=[])
    first_name = db.StringField(max_length=50, min_length=2)
    last_name = db.StringField(max_length=50, min_length=2)
    files = db.ListField(db.GridFSProxy)
    meta = {'indexes': [{'fields': ['username'], 'unique': True}]}

    def __str__(self):
        return str(self.username)

    def __repr__(self):
        return "User(username=%r)" % self.username

    @classmethod
    def from_dict(cls, d):
        user = cls()
        for field_name in user._fields:
            if field_name in d:
                user.__setattr__(field_name, d[field_name])
        return user


@app.route('/')
def index():
    return app.send_static_file('index.html')

class UserAPI(MethodView):
    def get(self, username):
        if username is None:
            # return a list of users
            return User.objects.exclude('password').to_json()
        else:
            return User.objects(username=username).exclude('password').to_json()

    def post(self):
        username = request.form.get('username', None)
        password = request.form.get('password', None)
        email = request.form.get('email', None)
        password = request.form.get('password', None)
        first_name = request.form.get('firstName', None)
        last_name = request.form.get('lastName', None)

        new_user = User(username=username, password=password, email=email, first_name=first_name, last_name=last_name)

        try:
            new_user.save()
        except Exception, e:
            return ('Invalid Input: %s' % e.message, 400, None)
        else:
            return 'Success'

    def delete(self, username):
        user = User.objects(username=username)
        if not user:
            return ("User does not exist", 400, None)
        user.delete()
        return "Success"

    def put(self, username):
        user = User.objects(username=username)
        if not user:
            return ("User does not exist", 400, None)

        for field_name in user._fields:
            if field_name in request.form:
                user.__setattr__(field_name, request.form[field_name])

        try:
            user.save()
        except Exception, e:
            return ('Invalid Input: %s' % e.message, 400, None)
        else:
            return 'Success'

user_view = UserAPI.as_view('user_api')
app.add_url_rule('/user/', defaults={'username': None},
                 view_func=user_view, methods=['GET', ])
app.add_url_rule('/user/', view_func=user_view, methods=['POST', ])
app.add_url_rule('/user/<username>', view_func=user_view,
                 methods=['GET', 'PUT', 'DELETE'])


@app.route('/user/create', methods=['GET', 'POST'])
def create_user():
    if request.method == 'GET':
        user = User.from_dict(request.args)
    else:
        user = User.from_dict(request.form)
    try:
        user.save()
    except Exception, e:
        return ('Invalid Input: %s' % e.message, 400, None)
    else:
        return 'Success'


def allowed_file(filename):
    return '.' in filename and \
           filename.rsplit('.', 1)[1] in ALLOWED_EXTENSIONS


@app.route('/upload', methods=['GET', 'POST'])
def upload_file():
    if request.method == 'POST':
        app.logger.debug('first')
        app.logger.info('%s %s %s' % (request.files, request.args, request.form))
        file = request.files['file']
        app.logger.info('here')
        app.logger.info(file)
        if file and allowed_file(file.filename):
            filename = secure_filename(file.filename)
            file.save(os.path.join(app.config['UPLOAD_FOLDER'], filename))
            return redirect(url_for('uploaded_file',
                                    filename=filename))
    return '''
    <!doctype html>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <title>Upload new File</title>
    <h1>Upload new File</h1>
    <form action="" method=post enctype=multipart/form-data>
      <p><input type=file name=file>
         <input type=submit value=Upload>
    </form>
    '''


@app.route('/uploads/<filename>')
def uploaded_file(filename):
    return send_from_directory(app.config['UPLOAD_FOLDER'],
                               filename)


# Setup Flask-Security
user_datastore = MongoEngineUserDatastore(db, User, Role)
security = Security(app, user_datastore)


# Create a user to test with
@app.before_first_request
def setup():
    user_datastore.create_user(email='foo@bar.com', password=encrypt_password('password'), username='ronald')


if __name__ == "__main__":
    app.debug = True
    parser = argparse.ArgumentParser(description='Main flask app for YouFolio')
    parser.add_argument('--heroku', help='run with heroku configuration', action='store_true')
    args = parser.parse_args()
    if args.heroku:
        app.config.from_pyfile('heroku.cfg')

    db.init_app(app)
    User.drop_collection()
    app.run(host="0.0.0.0", port=port)
