<!DOCTYPE html>
<html>
    <?php
        $_SESSION['tok'] = $tok;
    ?>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href = "<?php echo base_url('assets/css/newPassword.css')?>">
        <form id = "reset-form" method = "POST" action = "<?php echo site_url('login/updatePassword/'); ?>">
            <br>
            <br>
            <br>
            <div id = "reset-frame">
                    <div id = "pwd">
                        <label for = "Username" >New Password:</label>
                        <input type = "password" name = "pwd" class = "textbox">
                      
                    </div>
                <br>
                <br>
                    <div id = "new-pwd">
                        <label for = "Password">Confirm Password:</label>
                        <input type = "password" name = "new-pwd" class = "textbox">
                    </div>
                <br>
                <br>
                    <div>
                        <button type = "submit" id = "reset">Reset Password</button>
                        <label id = "invalid-label" name = "invalid"><?php echo isset($error) ? $error : ''; ?></label>
                    </div>
    
            </div>
        </form>

    </body>
    
</html>