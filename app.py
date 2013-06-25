# -*- coding: utf-8 -*-
import os
import sys

sys.path.insert(0, os.path.realpath(os.path.join(os.path.dirname(__file__), '../../')))

from flask import Flask, request, render_template, redirect, url_for, flash, send_from_directory
from werkzeug import secure_filename
from flask.views import MethodView
from flask.ext.mongoengine import MongoEngine
from flask_debugtoolbar import DebugToolbarExtension
from flask.ext.login import (LoginManager, current_user, login_required,
                            login_user, logout_user, UserMixin, 
                            # AnonymousUser,
                            confirm_login, fresh_login_required)
import argparse

UPLOAD_FOLDER = 'static/uploads'
ALLOWED_EXTENSIONS = set(['txt', 'pdf', 'png', 'jpg', 'jpeg', 'gif'])

app = Flask(__name__, static_url_path='')
app.config.from_object(__name__)
app.config.from_pyfile('config.cfg')

db = MongoEngine()
db.init_app(app)

DebugToolbarExtension(app)


class User(db.Document):
    username = db.StringField(required=True, max_length=50, min_length=2)
    password = db.StringField(required=True, max_length=50, min_length=4)
    email = db.EmailField(required=True, max_length=100)
    first_name = db.StringField(max_length=50, min_length=2)
    last_name = db.StringField(max_length=50, min_length=2)
    files = db.ListField(db.GridFSProxy)

    def __str__(self):
        return str(self.username)

    def __repr__(self):
        return "User(username=%r)" % self.username


@app.route('/')
def index():
    return app.send_static_file('index.html')


class UserAPI(MethodView):
    def get(self, username):
        if username is None:
            # return a list of users
            return User.objects().to_json()
        else:
            return User.objects(username=username).to_json()

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


if __name__ == "__main__":
    app.debug = True
    parser = argparse.ArgumentParser(description='Main flask app for YouFolio')
    parser.add_argument('--heroku', help='run with heroku configuration', action='store_true')
    args = parser.parse_args()
    if args.heroku:
        app.config['MONGODB_SETTINGS']
    # app.run(host="0.0.0.0", port=4000)
