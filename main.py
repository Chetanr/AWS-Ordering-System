from os import stat
from flask import *
import boto3
import json
import requests
from botocore.exceptions import ClientError
from boto3.dynamodb.conditions import Key
from decimal import Decimal
from aws_requests_auth.aws_auth import AWSRequestsAuth

from jinja2.utils import consume


app = Flask(__name__)


app.secret_key = "0123456789"

client = boto3.client('apigateway')



@app.route('/')
def root():
    return render_template(
        'login.html')

@app.route('/viewOrders')
def viewOrders():
    return render_template('viewOrders.html')

@app.route('/newOrder')
def newOrder():
    return render_template('newOrder.html', error = "")

@app.route('/placeOrder', methods = ['POST'])
def placeOrder():
    customer_name = request.form['customer']
    address = request.form['address']
    state = request.form['state']
    zip = request.form['zip']
    phone = request.form['phone']
    file = request.form['file']
    order_type = request.form['ordertype']
    if (order_type == "photo"):
        size = request.form['print-only-size']
        orientation = request.form['print-only-type']
    elif (order_type == "canvas"):
        size = request.form['canvas-only-size']
        orientation = request.form['canvas-only-type']
    elif (order_type == "doc"):
        size = request.form['document-size']
        orientation = request.form['document-type']
    
    # check if any field is left empty
    if (customer_name or address or state or zip or phone or file or size or orientation):
        return render_template('newOrder.html', error = "Please enter all the fields.!")
    
    #code to insert order into database
    return size

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

@app.route('/login', methods = ['POST'])
def login():
    email = request.form['user']
    password = request.form['password']
    auth = AWSRequestsAuth(aws_access_key='AKIA4P2RQVNEPSRFQ6VB',
                       aws_secret_access_key='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',
                       aws_host='ys4vvs9479.execute-api.us-east-1.amazonaws.com',
                       aws_region='us-east-1',
                       aws_service='execute-api')
    response = requests.get("https://ys4vvs9479.execute-api.us-east-1.amazonaws.com/getUser/getuser?",params= {"email":email}, auth=auth).json()
    if (response['password'] == password):
        session['username'] = email
        if (email == 'admin'):
            return render_template('adminHead.html')
        else:
            return render_template('custHead.html')
    else:
        return render_template('login.html',invalid="id or password in invalid")

@app.route('/register')
def register():
    return render_template('register.html')

@app.route('/register_user', methods = ['POST'])
def register_user():
    email = request.form['email']
    password = request.form['password']
    auth = AWSRequestsAuth(aws_access_key='AKIA4P2RQVNEPSRFQ6VB',
                       aws_secret_access_key='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',
                       aws_host='hkr41ye1c4.execute-api.us-east-1.amazonaws.com',
                       aws_region='us-east-1',
                       aws_service='execute-api')
    response = requests.post("https://hkr41ye1c4.execute-api.us-east-1.amazonaws.com/live/register?",params= {"email":email, "password" : password}, auth=auth)
    app.logger.info(response.json())
    if (response.json() is None):
        return render_template('login.html')
    else:
        return render_template('register.html', invalid="failed to register. Try again.")



if __name__ == '__main__':
    # This is used when running locally only. When deploying to Google App
    # Engine, a webserver process such as Gunicorn will serve the app. This
    # can be configured by adding an `entrypoint` to app.yaml.

    # Flask's development server will automatically serve static files in
    # the "static" directory. See:
    # http://flask.pocoo.org/docs/1.0/quickstart/#static-files. Once deployed,
    # App Engine itself will serve those files as configured in app.yaml.
    app.run(host='127.0.0.1', port=8080, debug=True)
