<html>
<title>
Change Password
</title> 
    <?php
        include_once('custHead.php');
    ?>

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel = "stylesheet" href = "<?php echo base_url('assets/css/changePassword.css')?>">
        <form id = "customer-form" action = "<?php echo site_url('customer/updatePassword'); ?>" method = "POST">
        <br>
        <br>
        <br>
        <div id = "password-details">
            <div id = "oldPassword">
                <label for = "existing-password"><Strong>Current Password:</Strong></label>
                <input type = "text" name = "currentPassword" class = "style-2">
            </div>
            <br>
            <br>
            <div id = "newPassword">
                <label for = "new-password"><Strong>New Password:</Strong></label>
                &nbsp &nbsp &nbsp <input type = "text" name = "newPassword" class = "style-2">
            </div>
            <br>
            <br>
            <div id = "confirmPassword">
                <label for = "confirm-password"><Strong>Confirm Password:</Strong></label>
                <input type = "text" name = "confirmPassword" class = "style-2">
            </div>
            <br>
            <br>
            <div>
                <button type = "submit" id = "submit">Submit</button>
            </div> 
            <div>
                <label id = "invalid-label" name = "invalid"><?php echo isset($error) ? $error : ''; ?></label>
            <div>
        </div>
    </body>
</html>