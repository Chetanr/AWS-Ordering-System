<!DOCTYPE html>
<html>
<title>
Welcome
</title>

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body>
    <link rel = "stylesheet" href = "<?php echo base_url('assets/css/login.css')?>">
        <form id = "login-form" method = "POST" action = "<?php echo site_url('login/validate'); ?>">
            <br>
            <br>
            <br>
            <div id = "login-frame">
                    <div id = "user">
                        <label for = "Username" >Username:</label>
                        <input type = "text" name = "user" class = "textbox">
                    </div>
                <br>
                <br>
                    <div id = "pwd">
                        <label for = "Password">Password:</label>
                        <input type = "password" name = "password" class = "textbox">
                    </div>
                <br>
                <br>
                    <div>
                        <button type = "submit" id = "submit">Submit</button>
                        <br>
                        <a href="<?php echo site_url('login/forgotPassword/');?>" > Forgot Password </a>
                        <br>
                        <br>
                        <label id = "invalid-label" name = "invalid"><?php echo isset($error) ? $error : ''; ?></label>
                    </div>
    
            </div>
        </form>

    </body>
    
</html>