<script type="text/javascript" src="<?php echo base_url(); ?>jquery.js"></script>
<SCRIPT SRC="<?php echo base_url(); ?>calendar.js" LANGUAGE="JavaScript"></SCRIPT>
<?php echo form_open('registration_controller/create'); ?>
     <div align="center">
        <h1>
            Employee Registration
        </h1>
         <br/>
         <br/>
    </div>
    <div align="center">
<table width="400" border="0">
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Name</td>
      <td><input type="text" name="name" id="name" /></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><input type="text" name="address" id="address" /></td>
    </tr>
    <tr>
        <td>Date Of Birth</td>
        <td><label>
		<input type="text" name="dateofbirth" value="<?php echo set_value('dateofbirth'); ?>" id="dateofbirth" /><?php echo form_error('dateofbirth'); ?>
		<A HREF="javascript:doNothing()" onClick="setDateField(dateofbirth);top.newWin = window.open('<?php echo base_url()?>calendar.html','cal','dependent=yes,width=210,height=230,screenX=200,screenY=300,titlebar=yes')"><IMG SRC="<?php echo base_url()?>cal.jpg" BORDER=0></A></td>
		</label></td>
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
      <td><input type="text" name="username" id="username" /></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><input type="password" name="password" id="password" /></td>
    </tr>
    <tr>
      <td>Confirm Password</td>
      <td><input type="password" name="confirm_password" id="confirm_password" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
        <td>Designation</td>
        <td><select name="designation" id="designation">
                <OPTION>Choose</OPTION>
		<?php foreach($records_designation as $r) : ?>
		<option><?php echo $r->designation_name; ?></option>
		<?php endforeach; ?>
        </select></td>
    </tr>
    <tr>
        <td>Section</td>
        <td><select name="section" id="section">
                <OPTION>Choose</OPTION>
		<?php foreach($records_section as $r) : ?>
		<option><?php echo $r->section_name; ?></option>
		<?php endforeach; ?>
        </select></td>
    </tr>
    <tr>
        <td>Department</td>
        <td><select name="department" id="department">
                <OPTION>Choose</OPTION>
		<?php foreach($records_department as $r) : ?>
		<option><?php echo $r->department_name; ?></option>
		<?php endforeach; ?>
        </select></td>
    </tr>
    <tr>
      <td><label>Joining Date</label></td>
      <td>
          <p>
            <input type="text" name="joining_date" value="<?php echo set_value('joining_date'); ?>" id="joining_date" /><?php echo form_error('joining_date'); ?>
            <a HREF="javascript:doNothing()" onClick="setDateField(joining_date);top.newWin = window.open('<?php echo base_url()?>calendar.html','cal','dependent=yes,width=250,height=230,screenX=200,screenY=300,titlebar=yes')"><IMG SRC="<?php echo base_url()?>cal.jpg" BORDER=0></a>
          </p>
      </td>
    </tr>
    <tr>
      <td><label>Resignation Date</label></td>
      <td>
          <p>
            <input type="text" name="resignation_date" value="<?php echo set_value('resignation_date'); ?>" id="resignation_date" /><?php echo form_error('resignation_date'); ?>
            <a HREF="javascript:doNothing()" onClick="setDateField(resignation_date);top.newWin = window.open('<?php echo base_url()?>calendar.html','cal','dependent=yes,width=250,height=230,screenX=200,screenY=300,titlebar=yes')"><IMG SRC="<?php echo base_url()?>cal.jpg" BORDER=0></a>
          </p>
      </td>
    </tr>
    <tr>
      <td>Salary</td>
      <td><input type="text" name="salary" id="salary" /></td>
    </tr>
    <tr>
      <td>Bonus</td>
      <td><input type="text" name="bonus" id="bonus" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="submit" id="submit" value="Submit" /></td>
    </tr>
  </table>
    </div>
<?php echo form_close(); ?>