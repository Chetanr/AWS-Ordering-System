<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.=
w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body>
    <link rel = "stylesheet" href = "<?php echo base_url('assets/css/forgotPassword.css')?>">
    <form id = "forgot-email-form" method = "POST" action = "<?php echo site_url('login/validateEmail'); ?>">
        <div id = "forgot-password-frame">
            <div id = "email">
                <label>Enter registered email id:</label>
                <input type = "text" name = "email" class = "textbox">
            </div>
            <br>
            <br>
            <div id = "submit-button">
                <button type = "submit" id = "submit">Submit</button>
                <br>
                <label id = "invalid-label" name = "invalid"><?php echo isset($error) ? $error : ''; ?></label>
            </div>
        </div>
    </body>