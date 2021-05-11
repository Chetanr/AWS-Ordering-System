<html>
<title>
Edit Order
</title> 
    <?php
        include_once('adminHead.php');
    ?>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href = "<?php echo base_url('assets/css/viewPreviousOrders.css')?>">
    <br>
    <div class = "table-div">
        <?php if($h->num_rows() > 0){ foreach($h->result() as $row){ ?>
        <form id = "login-form" method = "POST" action = "<?php echo site_url('admin/updateOrder/'.$row->sub_order_num); ?>">
            <table class = "table">
                <thead>
                    <tr>
                        <th>Item Number</th>
                        <th>Customer</th>
                        <th>Address</th>
                        <th>Status</th>
                        <th>Order Date</th>
                        <th>Order Kind</th>
                        <th>Order Type</th>
                        <th>Order Subtype</th>
                        <th>Tracking Number</th>
                        <th>Courier Company</th>
                    </tr>
                </thead>
                <tbody>
                    
                    <tr rowspan = "1">
                        <td colspan = "1">
                            <div id = "order-num" value = "<?php echo $row->sub_order_num; ?>">
                                <?php echo $row->sub_order_num; ?>
                            </div>
                        </td>
                        <td colspan = "1">
                            <div>
                                <?php echo $row->customer; ?>
                            </div>
                        </td>
                        <td colspan = "1">
                            <div>
                                <input type = "text" name = "address" class = "textbox" value = "<?php echo $row->address; ?>">
                            </div>
                        </td>
                        <td colspan = "1">
                            <div>
                                <select name = "status">
                                    <option value = "RECEIVED"> Received</option>
                                    <option value = "IN PROGRESS">In Progress</option>
                                    <option value = "SHIPPED">Order Shipped</option>
                                    <option value = "CANCELLED">Cancelled</option>
                                </select>
                            </div>
                        </td>
                        <td colspan = "1">
                            <div>
                                <?php echo $row->order_date; ?>
                            </div>
                        </td>
                        <td colspan = "1">
                            <div>
                                <?php echo $row->order_kind; ?>
                            </div>
                        </td>
                        <td colspan = "1">
                            <div>
                                <?php echo $row->order_type; ?>
                            </div>
                        </td>
                        <td colspan = "1">
                            <div>
                                <?php echo $row->order_sub_type; ?>
                            </div>
                        </td>
                        <td colspan = "1">
                            <div>
                                <input name = "tracking-num" type = "text" name = "user" class = "textbox" value = "<?php echo $row->tracking_num; ?>">
                            </div>
                        </td>
                        <td colspan = "1">
                            <div>
                                <input name = "courier-company" type = "text" name = "user" class = "textbox" value = "<?php echo $row->courier_company; ?>">
                            </div>
                        </td>
                        <td>
                            <div>
                            <button type = "submit" id = "submit">Update</button>
                            </div>
                        </td>
                    </tr>
                    <?php } }else{ ?>
                    <tr><td>No order(s) found...</td></tr>
                    <?php } ?>
                </tbody>
            </table>
        </form>
    </div>
    </body>
</html>
