from os import stat
from flask import *
import boto3
import json
from jinja2.utils import consume
import requests
from botocore.exceptions import ClientError
from boto3.dynamodb.conditions import Key
from decimal import Decimal
from aws_requests_auth.aws_auth import AWSRequestsAuth
import datetime


app = Flask(__name__)


app.secret_key = "0123456789"

client = boto3.client('apigateway')



@app.route('/')
def root():
    return render_template(
        'login.html')

@app.route('/viewOrders')
def viewOrders():
    auth = AWSRequestsAuth(aws_access_key='AKIA4P2RQVNEPSRFQ6VB',
                       aws_secret_access_key='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',
                       aws_host='x815zgcusj.execute-api.us-east-1.amazonaws.com',
                       aws_region='us-east-1',
                       aws_service='execute-api')
    response = requests.get("https://x815zgcusj.execute-api.us-east-1.amazonaws.com/orders/getorders?", auth=auth).json()
    return render_template('viewOrders.html', orders = response)

@app.route('/edit')
def edit():
    return "hi"

@app.route('/newOrder')
def newOrder():
    return render_template('newOrder.html', error = "")

@app.route('/placeOrder', methods = ['POST'])
def placeOrder():
    customer_name = request.form['customer']
    address = request.form['address']
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

    if (customer_name or address or file or size or orientation != ""):
        order_num = session['totalOrders'] + 1
        date = datetime.datetime.now().date()
        status = "RECEIVED"
        auth = AWSRequestsAuth(aws_access_key='AKIA4P2RQVNEPSRFQ6VB',
                       aws_secret_access_key='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',
                       aws_host='qktj7cxwqd.execute-api.us-east-1.amazonaws.com',
                       aws_region='us-east-1',
                       aws_service='execute-api')
        response = requests.post("https://qktj7cxwqd.execute-api.us-east-1.amazonaws.com/createOrder/neworder?",params= {"address": address.replace(" ","%20"), "status":status, "date":date, "customer":customer_name, "email":session['username'], "file":file, "order_num":order_num, "order_type":order_type, "orientation":orientation, "size":"A1"}, auth=auth)
        session['totalOrders'] = order_num
        auth = AWSRequestsAuth(aws_access_key='AKIA4P2RQVNEPSRFQ6VB',
                       aws_secret_access_key='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',
                       aws_host='x815zgcusj.execute-api.us-east-1.amazonaws.com',
                       aws_region='us-east-1',
                       aws_service='execute-api')
        response = requests.get("https://x815zgcusj.execute-api.us-east-1.amazonaws.com/orders/getorders?", auth=auth).json()
        return render_template('viewPreviousOrders.html', orders = response, email=session['username'])
    else:
        return render_template('newOrder.html', invalid = "Please enter all the fields.!")
    

@app.route('/previousOrders')
def previousOrders():
    auth = AWSRequestsAuth(aws_access_key='AKIA4P2RQVNEPSRFQ6VB',
                       aws_secret_access_key='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',
                       aws_host='x815zgcusj.execute-api.us-east-1.amazonaws.com',
                       aws_region='us-east-1',
                       aws_service='execute-api')
    response = requests.get("https://x815zgcusj.execute-api.us-east-1.amazonaws.com/orders/getorders?", auth=auth).json()
    return render_template('viewPreviousOrders.html', orders = response, email = session['username'])


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
    if (response is False):
        return render_template('login.html',invalid="id or password is invalid. Try again.!")
    if (response['password'] == password):
        session['username'] = email
        setSession()
        if (email == 'admin'):
            return render_template('adminHead.html')
        else:
            return render_template('custHead.html')
    else:
        return render_template('login.html',invalid="id or password is invalid. Try again.!")

def setSession():
    auth = AWSRequestsAuth(aws_access_key='AKIA4P2RQVNEPSRFQ6VB',
                       aws_secret_access_key='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',
                       aws_host='x815zgcusj.execute-api.us-east-1.amazonaws.com',
                       aws_region='us-east-1',
                       aws_service='execute-api')
    response = requests.get("https://x815zgcusj.execute-api.us-east-1.amazonaws.com/orders/getorders/", auth=auth).json()
    session['orders'] = response['Items']
    session['totalOrders'] = response['Count']


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
    app.run(host='127.0.0.1', port=8080, debug=True)
