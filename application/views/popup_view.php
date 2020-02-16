<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<body>
  <div>
      <?php echo form_open('product_controller/add_product');?>
      <table width="476" border="0">
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
        <td>Product Name</td>
        <td><input type="text" name="product_name" id="product_name" /></td>
      </tr>
      <tr>
        <td>Product Quantity</td>
        <td><input type="text" name="product_quantity" id="product_quantity" /></td>
      </tr>
      <tr>
        <td>Reorder Level</td>
        <td><input type="text" name="reorder_level" id="reorder_level" /></td>
      </tr>
      <tr>
        <td>Product Details</td>
        <td><textarea name="product_details" id="product_details" cols="45" rows="5"></textarea></td>
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