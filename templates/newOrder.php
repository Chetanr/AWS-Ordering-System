<!DOCTYPE html>
<title>
New Order
</title> 
    <?php
        include_once('custHead.php');
    ?>

<head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
    
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script type = "text/javascript" src = "<?php echo base_url('assets/js/newOrder.js')?>">
</script>

<body>
<link rel = "stylesheet" href = "<?php echo base_url('assets/css/newOrder.css')?>">
    <div id= "order-form">
        <form id="order-form" action = "<?php echo site_url('customer/addToCart'); ?>" method = "POST">
        <label id = "invalid-label" name = "invalid"><?php echo isset($error) ? $error : ''; ?></label>
            <div class = "customer">
                <label for = "customer" ><Strong>Customer Name:</Strong></label>
                &nbsp &nbsp<input type = "text" id = "customer_name" name = "customer" class = "textbox">
            </div>
            <div class = "address">
                <label for = "address" ><Strong>Customer Address:</Strong></label>
                &nbsp &nbsp<input type = "text" id = "address" name = "address" class = "textbox">
            </div>
            <div class = "stateZip">
            <label for = "state" ><Strong>State:</Strong></label>
                <select id = "state" name = "state" label = " ">
                        <option value = "">Select a State</option>
                        <option value = "NSW">NSW</option>
                        <option value = "QLD">QLD</option>
                        <option value = "SA">SA</option>
                        <option value = "TAS">TAS</option>
                        <option value = "WA">WA</option>
                        <option value = "VIC">VIC</option>
                </select>
                &nbsp &nbsp<label for = "zip" ><Strong>Zip:</Strong></label>
                &nbsp<input type = "text" name = "zip" id = "zip" class = "textbox" maxlength="4">
            </div>

            <div class = "phone">
                <label for = "phone" ><Strong>Customer Phone:</Strong></label>
                &nbsp &nbsp<input type = "text" name = "phone" id = "phone" class = "textbox" maxlength="10">
            </div>

            <div class = "pic">
                <label for = "pic" ><Strong>ImageName/Drive link to picture:</Strong></label>
                &nbsp &nbsp<input type = "text" name = "pic" id = "link" class = "textbox">
            </div>

            <div class = "order-type">
                <label for = "order" ><Strong>Order Type:</Strong></label>
                <label for = "print"><input type="radio" id = "print-only" class = "order-type"  name = "ordertype" value = "print-only" onclick = "show(1)">Print Only</label>
                <label for = "print"><input type="radio" id = "print-frame" class = "order-type"  name = "ordertype" value = "print-frame" onclick = "show(0)">Print Frame</label>
                <label for = "print"><input type="radio" id = "canvas-only" class = "order-type" name = "ordertype" value = "canvas-only" onclick = "show(3)">Canvas Stretched</label>
                <label for = "print"><input type="radio" id = "canvas-frame" class = "order-type" name = "ordertype" value = "canvas-frame" onclick = "show(2)">Canvas Frame</label>
            </div>
            
            <div class = "print-frame-class" id = "print-frame-class" style="display: none">
      	        <div class = "size">
                    <label for = "customer" ><Strong>Size:</Strong></label>
                    <input list="sizes" name="print-frame-size" id = "size"/></label>
                        <datalist id="sizes">
                            <option value="Select a size or enter a custom size">
                            <option value="A4 (210 x 297)">
                            <option value="A3 (297 x 420)">
                            <option value="A2 (420 x 594)">
                            <option value="A1 (594 x 841)">
                            <option value="A0 (841 x 1189)">
                            <option value="B2 (500 x 707)">
                            <option value="B1 (707 x 1000)">
                            <option value="B0 (1000 x 1414)">
                        </datalist>
                    &nbsp<label for = "type" >mm</label>
                </div>
                <div class = "mount">
                    <label for = "mount" ><Strong>Mount(60mm):</Strong></label>
                    <select id = "mount" name = "print-frame-mount" label = " ">
                        <option value = "">Select a Mount</option>
                        <option value = "black">Black</option>
                        <option value = "white">White</option>
                        <option value = "none">None</option>
                    </select>
                </div>
                <div class = "type">
                    <label for = "type" ><Strong>Orientation:</Strong></label>
                    <select id = "type" name = "print-frame-type" label = " ">
                        <option value = "none">Select an orientation</option>
                        <option value = "landscape">Landscape</option>
                        <option value = "portrait">Portrait</option>
                    </select>
                </div>
                <div class = "sub-type">
                    <label for = "sub-type" ><Strong>Border:</Strong></label>
                    <select id = "sub-type" name = "print-frame-subtype" label = " ">
                        <option value = "none">Select a border</option>
                        <option value = "with border">With Border</option>
                        <option value = "without border">Without Border</option>
                    </select>
                </div>
                <div class = "frame">
                    <label for = "frame" ><Strong>Frame:</Strong></label>
                    <select id = "frame" name = "frame1" label = " ">
                        <option value = "none">Select a sub type</option>
                        <option value = "print frame Black">Print Frame (Black)</option>
                        <option value = "print frame White">Print Frame (White)</option>
                        <option value = "print frame Oak">Print Frame (Oak)</option>
                    </select>
                </div>
                <div class = "frame">
                    <label for = "frame" ><Strong>Comments(optional):</Strong></label>
                    <input type="textbox" id = "comments" name = "comments1">
                </div>
                <div class = "submit-button">
                    <button type = "submit" id = "submit">Add to Cart</button>
                </div>
            </div>

            <div class = "print-only-class" id = "print-only-class" style="display: none" data-target = "2">
      	        <div class = "size">
                    <label for = "customer" >Size:</label>
                    <input list="sizes" name="print-only-size" id = "size"/></label>
                        <datalist id="sizes">
                            <option value="Select a size or enter a custom size">
                            <option value="A4 (210 x 297)">
                            <option value="A3 (297 x 420)">
                            <option value="A2 (420 x 594)">
                            <option value="A1 (594 x 841)">
                            <option value="A0 (841 x 1189)">
                            <option value="B2 (500 x 707)">
                            <option value="B1 (707 x 1000)">
                            <option value="B0 (1000 x 1414)">
                        </datalist>
                    &nbsp<label for = "type" >mm</label>
                </div>
                <div class = "type">
                    <label for = "type" >Orientation:</label>
                    <select id = "type" name = "print-only-type" label = " ">
                        <option value = "none">Select an orientation:</option>
                        <option value = "landscape">Landscape</option>
                        <option value = "portrait">Portrait</option>
                    </select>
                </div>
                <div class = "sub-type">
                    <label for = "sub-type" >Border:</label>
                    <select id = "sub-type" name = "print-only-subtype" label = " ">
                        <option value = "none">Select a border</option>
                        <option value = "with border">With Border</option>
                        <option value = "without border">Without Border</option>
                    </select>
                </div>
                <div class = "frame">
                    <label for = "frame" ><Strong>Comments(optional):</Strong></label>
                    <input type="textbox" id = "comments" name = "comments2">
                </div>
                <div class = "submit-button">
                    <button type = "submit" id = "submit">Add to Cart</button>
                </div>
            </div>

            <div class = "canvas-frame-class" id = "canvas-frame-class" style="display: none" data-target = "3">
                <div class = "size">
                    <label for = "customer" >Size:</label>
                    <input list="sizes" name="canvas-frame-size" id = "size"/></label>
                        <datalist id="sizes">
                            <option value="Select a size or enter a custom size">
                            <option value="A4 (210 x 297)">
                            <option value="A3 (297 x 420)">
                            <option value="A2 (420 x 594)">
                            <option value="A1 (594 x 841)">
                            <option value="A0 (841 x 1189)">
                            <option value="B2 (500 x 707)">
                            <option value="B1 (707 x 1000)">
                            <option value="B0 (1000 x 1414)">
                        </datalist>
                    &nbsp<label for = "type" >mm</label>
                </div>
                <div class = "type">
                    <label for = "type" >Orientation:</label>
                    <select id = "type" name = "canvas-frame-type" label = " ">
                        <option value = "none">Select an orientation</option>
                        <option value = "landscape">Landscape</option>
                        <option value = "portrait">Portrait</option>
                    </select>
                </div>
                <div class = "sub-type">
                    <label for = "sub-type" >Wrap:</label>
                    <select id = "sub-type" name = "canvas-frame-subtype" label = " ">
                        <option value = "none">Select a wrap</option>
                        <option value = "white edge">White Edge</option>
                        <option value = "gallery wrap">Gallery Wrap</option>
                    </select>
                </div>
                <div class = "frame">
                    <label for = "frame" >Frame:</label>
                    <select id = "frame" name = "frame2" label = " ">
                        <option value = "none">Select a sub type</option>
                        <option value = "canvas stretch only">Canvas (Stretch Only)</option>
                        <option value = "canvas frame Black">Canvas Frame (Black)</option>
                        <option value = "canvas frame White">Canvas Frame (White)</option>
                        <option value = "canvas frame Oak">Canvas Frame (Oak)</option>
                    </select>
                </div>
                <div class = "frame">
                    <label for = "frame" ><Strong>Comments(optional):</Strong></label>
                    <input type="textbox" id = "comments" name = "comments3">
                </div>
                <div class = "submit-button">
                    <button type = "submit" id = "submit">Add to Cart</button>
                </div>
            </div>

            <div class = "canvas-only-class" id ="canvas-only-class" style="display: none" data-target = "4">
      	        <div class = "size">
                    <label for = "customer" >Size:</label>
                    <input list="sizes" name="canvas-only-size" id = "size"/></label>
                        <datalist id="sizes">
                            <option value="Select a size or enter a custom size">
                            <option value="A4 (210 x 297)">
                            <option value="A3 (297 x 420)">
                            <option value="A2 (420 x 594)">
                            <option value="A1 (594 x 841)">
                            <option value="A0 (841 x 1189)">
                            <option value="B2 (500 x 707)">
                            <option value="B1 (707 x 1000)">
                            <option value="B0 (1000 x 1414)">
                        </datalist>
                    &nbsp<label for = "type" >mm</label>
                </div>
                <div class = "type">
                    <label for = "type" >Type:</label>
                    <select id = "type" name = "canvas-only-type" label = " ">
                        <option value = "none">Select an orientation</option>
                        <option value = "landscape">Landscape</option>
                        <option value = "portrait">Portrait</option>
                    </select>
                </div>
                <div class = "sub-type">
                    <label for = "sub-type" >Edge Type:</label>
                    <select id = "sub-type" name = "canvas-only-subtype" label = " ">
                        <option value = "">Select an edge type</option>
                        <option value = "white edge">White Edge</option>
                        <option value = "gallery wrap">Gallery Wrap</option>
                    </select>
                </div>
                <div class = "frame">
                    <label for = "frame" ><Strong>Comments(optional):</Strong></label>
                    <input type="textbox" id = "comments" name = "comments4">
                </div>
                <div class = "submit-button">
                    <button type = "submit" id = "submit">Add to Cart</button>
                    <label id = "invalid-label" name = "invalid"><?php echo isset($error) ? $error : ''; ?></label>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
