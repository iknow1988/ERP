<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="<?php print(base_url());?>css/login_css.css" media="screen" />
<title>client_entry_view</title>
</head>

<body>
    <?php echo form_open('registration_controller/client_entry'); ?>
    <div align="center">
        <h1>
            Client Registration
        </h1>
        <br/>
        <br/>
    </div>
    <div align="center">
<table width="400" border="0">
    <tr>
      <td>Name</td>
      <td><input type="text" name="name" id="name" /></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><input type="text" name="password" id="password" /></td>
    </tr>
    <tr>
      <td>Mobile No</td>
      <td><input type="text" name="mobile" id="mobile" /></td>
    </tr>
    <tr>
      <td>Telephone No</td>
      <td><input type="text" name="telephone" id="telephone" /></td>
    </tr>
    <tr>
      <td>Fax No</td>
      <td><input type="text" name="fax" id="fax" /></td>
    </tr>
    <tr>
      <td>Email Address</td>
      <td><input type="text" name="email" id="email" /></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><input type="text" name="address" id="address" />
      </td>
    </tr>
    <tr>
      <td>Country</td>
        <td><select name="country" id="country">
                <OPTION>Choose</OPTION>
		<?php foreach($records as $r) : ?>
		<option><?php echo $r->country_name; ?></option>
		<?php endforeach; ?>
        </select></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="Submit" id="Submit" value="Submit" /></td>
    </tr>
  </table>
    </div>
<?php echo form_close(); ?>
</body>
</html>