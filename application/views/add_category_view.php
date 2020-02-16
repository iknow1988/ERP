<div align="center">
      <br/>
      <h1>Add A Category</h1>
      <br/>
      <br/>
      <?php echo form_open('product_controller/add_category');?>
      <table width="476" border="1">
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
       <tr>
        <td>New Category Name</td>
        <td><input type="text" name="category_name" id="category_name" /></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Parent Category</td>
        <td><select name="parent_category_id" id="parent_category_id">
                <OPTION>Choose</OPTION>
		<?php foreach($records as $r) : ?>
		<option><?php echo $r->category_name; ?></option>
		<?php endforeach; ?>
        </select></td>
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
