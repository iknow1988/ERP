<?php 
echo form_open('login');
?>
<div id="context2">
    <div id="login">
        username: <input type="text" name="username" id="username"/><?php echo form_error('username'); ?>
        password: <input type="password"  name="password" id="password" /><?php echo form_error('password'); ?>
        <input type="submit" name="Login" id="Login" value="Login" > <?php echo form_error('Login');  ?>
    </div>
</div>
<div align="left">

<p>
  <!--label for="basic-combo">Choose the department:</label><br /-->
  <!--select id="basic-combo" name="basic-combo"  size="1">
      <OPTION>Choose</OPTION>
    <?php foreach($list as $r) : ?>
    <option><?php echo $r->department_name; ?></option>
    <?php endforeach; ?>
  </select-->
</p>  
<p>
  <!--select id="username" name="username"  size="1">
      <OPTION>Choose</OPTION>
    <?php foreach($list1 as $r) : ?>
    <option><?php echo $r->employee_id; ?></option>
    <?php endforeach; ?>
  </select-->
</p>
<?php echo $this->session->flashdata('message');?>
<?php echo form_close();?>
</div>
	   