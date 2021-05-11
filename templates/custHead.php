<html>
<title>
Dashboard
</title>    
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel = "stylesheet" href = "<?php echo base_url('assets/css/customer.css')?>">
</head>
    <br>
    <div class = "customer-header">
        <form id = "login-form" method = "POST">
            <a href = "<?=site_url('customer/newOrder') ?>" class="customer-header-item"> New Order </a>
            <span class = "space"></span>
            <a href = "<?=site_url('customer/PreviousOrders') ?>" class="customer-header-item" id = "customer"> View Previous Orders </a>
            <span class = "passSpace"></span>
            <a href = "<?=site_url('customer/changePassword') ?>" class="customer-header-item" id = "changePassword"> Change Password </a>
            <span class = "logoutSpace"></span>
            <a href = "<?=site_url('customer/logout') ?>" class="customer-header-item" id = "logout"> Logout </a>
        </form>
    </div>
    <br>
    <br>
    <div>
        <a href="<?=site_url('customer/viewCart') ?>" class="btn btn-info btn-lg">
            <span class="glyphicon glyphicon-shopping-cart"></span>
        </a>
    </div>
</head>