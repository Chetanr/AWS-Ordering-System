<!DOCTYPE html>
<title>
View Cart
</title> 
    <?php
        include_once('custHead.php');
    ?>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script type = "text/javascript" src = "<?php echo base_url('assets/js/hideButton.js')?>">
</script>
<body>
    <link rel = "stylesheet" href = "<?php echo base_url('assets/css/viewCart.css')?>"> 
    <form method = "POST" action = "<?php echo site_url('customer/placeOrder');?>">
    <div class = "table-div">
          <table class = "table">
            <thead>
                <tr>
                    <th>Customer</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Drive Link/Image Name</th>
                    <th>Order Kind</th>
                    <th>Size</th>
                    <th>Mount</th>
                    <th>Order Type</th>
                    <th>Order Subtype</th>
                    <th>Frame Type</th>
                    <th>Comments</th>
                </tr>
            </thead>
            <tbody id = "tbody" value = "<?php count($this->cart->contents())?>">
                <?php if($this->cart->contents()){ foreach($this->cart->contents() as $item){ ?>
                <tr rowspan = "1">
                    <td colspan = "1"><?php echo $item['customer'] ?></td>
                    <td colspan = "1"><?php echo $item['address'] ?></td>
                    <td colspan = "1"><?php echo $item['phone']; ?></td>
                    <td colspan = "1"><?php echo $item['pic']; ?></td>
                    <td colspan = "1"><?php echo $item['order_kind']; ?></td>
                    <td colspan = "1"><?php echo $item['size']; ?></td>
                    <td colspan = "1"><?php echo $item['mount']; ?></td>
                    <td colspan = "1"><?php echo $item['order_type']; ?></td>
                    <td colspan = "1"><?php echo $item['order_subtype']; ?></td>
                    <td colspan = "1"><?php echo $item['frame']; ?></td>
                    <td colspan = "1"><?php echo $item['comments']; ?></td>
                    <td colspan = "1">
                        <a href="<?=site_url('customer/removeItem/'.$item['rowid']) ?>" class="btn btn-info btn-lg">
                            <span class="glyphicon glyphicon-remove"></span>                                    
                        </a>
                    </td>
                </tr>
                <?php } }else{ ?>
                <tr><td>Your Cart is empty.!</td></tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <div id = "submit-div">
            <button type = "submit" id = "submit">Place Order</button>
    </div>
    </form>
</body>

</html>