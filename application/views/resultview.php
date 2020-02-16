<html>
<head>
<script type="text/javascript" src="<?php echo base_url(); ?>jquery.js"></script>
<script TYPE="text/javascript">
function find_content() {
 $.post('<?php echo base_url(); ?>index.php/search', { search_text: $("#search_text").val() },
	function (output){
	$('#results').html(output).show();
	});
}
</script>


</head>
<body>

 <?php echo form_open('result'); ?>
 Search
<input type="text" name="search_text" value="<?php echo set_value('search_text'); ?>" id="search_text" onkeyup="find_content();"/>

  </br>
 
<?php    form_close();?>
   <label><div id="results"></div></label>
  </body>
  </html>