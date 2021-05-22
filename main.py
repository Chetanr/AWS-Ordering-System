from flask import *
import boto3
import json
# import requests
from botocore.exceptions import ClientError
from boto3.dynamodb.conditions import Key
from decimal import Decimal




app = Flask(__name__)

app.secret_key = "0123456789"



@app.route('/')
def login():
    return render_template(
        'custHead.html')

@app.route('/viewOrders')
def viewOrders():
    return render_template('viewOrders.html')

@app.route('/newOrder')
def newOrder():
    return render_template('newOrder.html')

@app.route('/previousOrders')
def previousOrders():
    return render_template('viewPreviousOrders.html')

@app.route('/changePassword')
def changePassword():
    return render_template('changePassword.html')

@app.route('/changeAdminPassword')
def changeAdminPassword():
    return render_template('changeAdminPassword.html')

@app.route('/logout')
def logout():
    session.clear()
    return render_template('login.html')

@app.route('/register')
def register():
    return render_template('register.html')



if __name__ == '__main__':
    # This is used when running locally only. When deploying to Google App
    # Engine, a webserver process such as Gunicorn will serve the app. This
    # can be configured by adding an `entrypoint` to app.yaml.

    # Flask's development server will automatically serve static files in
    # the "static" directory. See:
    # http://flask.pocoo.org/docs/1.0/quickstart/#static-files. Once deployed,
    # App Engine itself will serve those files as configured in app.yaml.
    app.run(host='127.0.0.1', port=8080, debug=True)
