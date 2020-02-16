<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>New Store Requisition</title>
<!--
        <link rel="stylesheet" type="text/css" href="<?php print(base_url());?>css/login_css.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="<?php print(base_url());?>css/jquery-ui.css" />-->

</head>


<body>
  <div>
      <?php echo form_open('workorder_controller/create_store_requisition');?>
      <table width="476" border="0">
	  <!--tr>
        <td>Category ID</td>
        <td><select name="category_id" id="category_id">
                <OPTION>Choose</OPTION>
		<?php //foreach($records as $r) : ?>
		<option><?php //echo $r->category_name; ?></option>
		<?php //endforeach; ?>
        </select></td>
      </tr-->
	  <tr>
        <td>Work Order Of Service ID</td>
        <td><input type="text" name="order_id" id="order_id" /></td>
        </tr>
	  <tr>
        <td>Client ID</td>
        <td><input type="text" name="client_id" id="client_id" /></td>
      </tr>
      <tr>
        <td>Employee ID</td>
        <td><input type="text" name="employee_id" id="employee_id" /></td>
      </tr>
        <tr>
        <td>Remarks</td>
        <td><input type="text" name="remarks" id="remarks" /></td>
      </tr>
      <!--tr>
        <td>Reorder Level</td>
        <td><input type="text" name="reorder_level" id="reorder_level" /></td>
      </tr-->
      <!--tr>
        <td>Product Details</td>
        <td><textarea name="product_details" id="product_details" cols="45" rows="5"></textarea></td>
      </tr-->
      <!--tr>
        <td>Unit Price</td>
        <td><input type="text" name="unit_price" id="unit_price" /></td>
      </tr-->
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>

        <td><input type="submit" name="create_workorder" id="create_workorder" value="Submit" /></td>
      </tr>

    </table>
    <?php echo form_close();?>
  </div>
</body>
</html>