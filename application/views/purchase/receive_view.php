<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add Product</title>
        <!--link rel="stylesheet" type="text/css" href="<?php print(base_url());?>css/login_css.css" media="screen" /-->
        <!--link rel="stylesheet" type="text/css" href="<?php print(base_url());?>css/jquery-ui.css" /-->

</head>
<body>
<?php echo form_open('purchase_controller/receive_with_id');?>
<div align="left">
	Select A Catagory <select name="catagory">
                    <option>Receive From Vendor</option>
					<option>Receive From Employee</option>
                </select>
</div>
<br/>
<div align="left">
		
Workorder of Purchase ID <select name="workorder_id">
                    <OPTION>Choose</OPTION>
                    <?php foreach($tonmoy as $r) : ?>
                    <?php if($r->status=="approved by Store Manager"){?>
                    <option><?php echo $r->workorder_of_purchase_id; ?></option>
                    <?php } ?>
                    <?php endforeach; ?>
                </select>
</div>
<br/>
<div align="left">
	<input type="submit" name = "proceed" id="proceed" value="Proceed">
</div>
    <?php echo form_close();?>
</body>
</html>