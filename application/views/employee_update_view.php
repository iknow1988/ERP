<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <script type="text/javascript" src="<?php echo base_url(); ?>jquery.js"></script>
        <script SRC="<?php echo base_url(); ?>calendar.js" LANGUAGE="JavaScript"></script>
<title>employee_registration_view</title>
</head>

<body>
<?php echo form_open('registration_controller/update'); ?>
  <table width="400" border="0">
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Name</td>
 		<?php foreach($records_mas_employee as $r) : ?>
      <td><input type="text" name="name" id="name" value="<?php echo $r->employee_name ; ?>" /></td>
      		<?php endforeach; ?>
    </tr>
    <tr>
      <td>Address</td>
 		<?php foreach($records_mas_employee as $r) : ?>
      <td><input type="text" name="address" id="address"value="<?php echo $r->employee_address ; ?>" /></td>
            		<?php endforeach; ?>
    </tr>
    <tr>
      <td><label>Date Of Birth</label></td>
 		<?php foreach($records_mas_employee as $r) : ?>
      <td>
          <p>
            <input type="text" name="date_of_birth" value="<?php echo $r->date_of_birth ; ?>"value="<?php echo set_value('date_of_birth'); ?>" id="date_of_birth" /><?php echo form_error('date_of_birth'); ?>
            <a HREF="javascript:doNothing()" onClick="setDateField(date_of_birth);top.newWin = window.open('<?php echo base_url()?>calendar.html','cal','dependent=yes,width=250,height=230,screenX=200,screenY=300,titlebar=yes')"><IMG SRC="<?php echo base_url()?>cal.jpg" BORDER=0></a>
                  		<?php endforeach; ?>
          </p>
      </td>
    </tr>
    <tr>
      <td>Sex</td>
      <td><select name="sex" id="sex">
        <option value="Male">Male</option>
        <option value="Female">Female</option>
      </select></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Username</td>
       		<?php foreach($records_employee_login as $r) : ?>
      <td><input type="text" name="username" id="username" value="<?php echo $r->employee_username ; ?>" /></td>
                <?php endforeach; ?>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
        <td>Designation</td>
        <td><select name="designation" id="designation">
		<?php foreach($records_trn_employee as $r) : ?>
                <?php $designation_id = $r->designation_id; ?>
                <?php $designation = $this->registration_model->designation_name($designation_id);?>
                <option selected=<?php $designation ?> ><?php echo $designation?></option>
		<?php endforeach; ?>
		<?php foreach($records_designation as $r) : ?>
		<option><?php echo $r->designation_name; ?></option>
		<?php endforeach; ?>
        </select></td>
    </tr>
    <tr>
        <td>Section</td>
        <td><select name="section" id="section">
		<?php foreach($records_trn_employee as $r) : ?>
                <?php $section_id = $r->section_id; ?>
                <?php $section = $this->registration_model->section_name($section_id);?>
                <option selected=<?php $section?>><?php echo $section?></option>
		<?php endforeach; ?>
		<?php foreach($records_section as $r) : ?>
		<option><?php echo $r->section_name; ?></option>
		<?php endforeach; ?>
        </select></td>
    </tr>
    <tr>
        <td>Department</td>
        <td><select name="department" id="department">
		<?php foreach($records_trn_employee as $r) : ?>
                <?php $department = $r->department_id; ?>
                <?php $department_id = $this->registration_model->department_name($department);?>
                <option selected=<?php $department?>><?php echo $department_id?></option>
		<?php endforeach; ?>
		<?php foreach($records_department as $r) : ?>
		<option><?php echo $r->department_name; ?></option>
		<?php endforeach; ?>
        </select></td>
    </tr>
    <tr>
      <td><label>Joining Date</label></td>
      <td>
          <p>
        		<?php foreach($records_trn_employee as $r) : ?>
            <input type="text" name="joining_date" value="<?php echo $r->joining_date ; ?>" value="<?php echo set_value('joining_date'); ?>" id="joining_date" /><?php echo form_error('joining_date'); ?>
            <a HREF="javascript:doNothing()" onClick="setDateField(joining_date);top.newWin = window.open('<?php echo base_url()?>calendar.html','cal','dependent=yes,width=250,height=230,screenX=200,screenY=300,titlebar=yes')"><IMG SRC="<?php echo base_url()?>cal.jpg" BORDER=0></a>
                  		<?php endforeach; ?>
          </p>
      </td>
    </tr>
    <tr>
      <td><label>Resignation Date</label></td>
      <td>
          <p>
        		<?php foreach($records_trn_employee as $r) : ?>
            <input type="text" name="resignation_date" value="<?php echo $r->resignation_date ; ?>" value="<?php echo set_value('resignation_date'); ?>" id="resignation_date" /><?php echo form_error('resignation_date'); ?>
            <a HREF="javascript:doNothing()" onClick="setDateField(resignation_date);top.newWin = window.open('<?php echo base_url()?>calendar.html','cal','dependent=yes,width=250,height=230,screenX=200,screenY=300,titlebar=yes')"><IMG SRC="<?php echo base_url()?>cal.jpg" BORDER=0></a>
                    		<?php endforeach; ?>
          </p>
      </td>
    </tr>
    <tr>
      <td>Salary</td>
        		<?php foreach($records_trn_employee as $r) : ?>
      <td><input type="text" name="salary" id="salary" value="<?php echo $r->salary ; ?>" /></td>
                     		<?php endforeach; ?>
    </tr>
    <tr>
      <td>Bonus</td>
         		<?php foreach($records_trn_employee as $r) : ?>
      <td><input type="text" name="bonus" id="bonus" value="<?php echo $r->bonus ; ?>" /></td>
                           		<?php endforeach; ?>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="update" id="submit" value="update" /></td>
    </tr>
  </table>
<?php echo form_close(); ?>
</body>
</html>