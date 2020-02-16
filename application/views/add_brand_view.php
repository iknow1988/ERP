<div align="center">
      <br/>
      <h1>Add A Brand</h1>
      <br/>
      <br/>
      <?php echo form_open('product_controller/add_brand');?>
      <table width="476" border="1">
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
       <tr>
        <td>New Brand Name</td>
        <td><input type="text" name="brand_name" id="brand_name" /></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
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
