<html>    
<title>
Dashboard
</title> 
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <link rel = "stylesheet" href = "<?php echo base_url('assets/css/admin.css')?>">
</head>
    <br>
    <div class = "header">
        <form id = "login-form" method = "post" method = "POST">
            <a href = "<?=site_url('admin/loadViewOrders') ?>" class="menu-item" value = "View orders"> View Orders </a>
            <span class = "space"></span>
            <a href = "<?=site_url('admin/loadViewCustomers') ?>" class="menu-item" value = "View orders"> View Customers </a>
            <span class = "space"></span>
            <a href = "<?=site_url('admin/loadAddCustomers') ?>" class="menu-item" id = "customer"> Add Customer </a>
            <span class = "space"></span>
            <a href = "<?=site_url('admin/changePassword') ?>" class="menu-item" id = "changePassword"> Change Password </a>
            <span class = "logoutSpace"></span>
            <a href = "<?=site_url('admin/logout') ?>" class="menu-item" id = "logout"> Logout </a>
        </form>
    </div>