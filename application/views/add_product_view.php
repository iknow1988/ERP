<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add Product</title>
        <link href="<?php echo base_url();?>public/css/colorbox.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="<?php echo base_url();?>public/js/jquery.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>public/js/jquery.colorbox.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>public/js/MYCreated.js"></script>
        <script language="text/javascript">
        //PRELOADER GLOBAL
        $(function(){
            $("#ajaxLoad").ajaxStart(function(){
		$(this).html('<img src="<?php echo base_url();?>public/img/ajax-loader.gif" />');
            });
            $("#ajaxLoad").ajaxSuccess(function(){
   		$(this).html('');
            });
            $("#ajaxLoad").ajaxError(function(url){
   		alert('Error: HTTP Connection was Interrupted. Please try again or refresh the page.');
            });
        });

        </script>
</head>


<body>
  <div align="center">
      <?php echo form_open('product_controller/add_product');?>
      <h1>Add Product</h1>
  <br/>
      <table width="500" border="1" align="center">
        <tr><h2><a class='iframe' href="<?php echo base_url();?>index.php/product_controller/category_add_popup">Click to Add Categories</a></h2></tr>
      <tr>
        <td>Category ID</td>
        <td><select name="category_id" id="category_id">
                <OPTION>Choose</OPTION>
		<?php foreach($records as $r) : ?>
		<option><?php echo $r->category_name; ?></option>
		<?php endforeach; ?>
        </select></td>
      </tr>
      <tr>
        <td>Brand ID</td>
        <td>
            <select name="brand_id" id="brand_id"><?php echo form_error('brand_id'); ?>
                <OPTION>Choose</OPTION>
                <?php foreach($records_brand as $r) : ?>
                <option value=<?php echo $r->brand_id; ?>><?php echo $r->brand_name; ?></option>
                <?php endforeach; ?>
            </select>
        </td>
      </tr>  
              <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Product Name</td>
        <td><input type="text" name="product_name" id="product_name" /></td>
      </tr>
              <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Product Quantity</td>
        <td><input type="text" name="product_quantity" id="product_quantity" /></td>
      </tr>
       </tr>
              <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Reorder Level</td>
        <td><input type="text" name="reorder_level" id="reorder_level" /></td>
      </tr>
              <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Product Details</td>
        <td><textarea name="product_details" id="product_details" cols="45" rows="5"></textarea></td>
      </tr>
              <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Unit Price</td>
        <td><input type="text" name="unit_price" id="unit_price" /></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><input type="submit" name="submit" id="submit" value="Submit" /></td>
      </tr>      
    </table>
    <?php echo form_close();?>
  </div>
</body>
</html>