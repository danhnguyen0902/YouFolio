# -*- coding: utf-8 -*-
import os
import sys
import datetime

sys.path.insert(0, os.path.realpath(os.path.join(os.path.dirname(__file__), '../../')))

from flask import Flask, request, render_template, redirect, url_for, flash
from flask.ext.login import (LoginManager, current_user, login_required,
                            login_user, logout_user, UserMixin, AnonymousUser,
                            confirm_login, fresh_login_required)


from flask.ext.mongoengine import MongoEngine
from flask_debugtoolbar import DebugToolbarExtension

app = Flask(__name__, static_url_path='')
app.config.from_object(__name__)
app.config['MONGODB_SETTINGS'] = {'DB': 'testing'}
app.config['TESTING'] = True
app.config['SECRET_KEY'] = 'flask+mongoengine=<3'
app.debug = True
app.config['DEBUG_TB_PANELS'] = (
    'flask.ext.debugtoolbar.panels.versions.VersionDebugPanel',
    'flask.ext.debugtoolbar.panels.timer.TimerDebugPanel',
    'flask.ext.debugtoolbar.panels.headers.HeaderDebugPanel',
    'flask.ext.debugtoolbar.panels.request_vars.RequestVarsDebugPanel',
    'flask.ext.debugtoolbar.panels.template.TemplateDebugPanel',
    'flask.ext.debugtoolbar.panels.logger.LoggingPanel',
    'flask.ext.mongoengine.panels.MongoDebugPanel'
)

app.config['DEBUG_TB_INTERCEPT_REDIRECTS'] = False

db = MongoEngine()
db.init_app(app)

DebugToolbarExtension(app)


class User(db.Document):
    username = db.StringField(required=True, max_length=50, min_length=2)
    password = db.StringField(required=True, max_length=50, min_length=4)
    email = db.EmailField(required=True, max_length=100)
    first_name = db.StringField(max_length=50, min_length=2)
    last_name = db.StringField(max_length=50, min_length=2)

    def __str__(self):
        return str(self.username)

    def __repr__(self):
        return "User(username=%r)" % self.username


@app.route('/')
def index():
    return app.send_static_file('index.html')


@app.route('/user')
def get_users():
    return User.objects().to_json()


@app.route('/user/create', methods=['POST'])
def create_user():
    # return make_response(render_template('not_found.html'), 404)
    username = request.form.get('username', False)
    password = request.form.get('password', False)
    email = request.form.get('email', False)
    password = request.form.get('password', False)
    first_name = request.form.get('firstName', False)
    last_name = request.form.get('lastName', False)

    new_user = User(username=username, password=password, email=email, first_name=first_name, last_name=last_name)
    try:
        new_user.save()
    except Exception, e:
        return ('Invalid Input: %s' % e.message, 400, None)
    else:
        return 'Success'


if __name__ == "__main__":
    app.run(host="0.0.0.0", port=4000)
    try:
        pass
    except Exception, e:
        raise e
