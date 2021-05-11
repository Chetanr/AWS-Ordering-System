<!DOCTYPE html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <?php
     if (isset($h))
     {
        if($h == "customer")
        {
            include_once('custHead.php');
        }
        else if ($h == "admin")
        {
            include_once('adminHead.php');
        }
     }
        
    ?>

    <body>
    <link rel = "stylesheet" href = "<?php echo base_url('assets/css/custResponseLabel.css')?>">
        <div id = "label">
            <label id = "response-label" name = "invalid"><?php echo isset($data) ? $data : ''; ?></label>
        </div>
    </body>
</html>