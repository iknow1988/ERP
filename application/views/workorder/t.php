<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">

<html>
<head>
	<title>ComboBox Demo</title>
<script src="<?php echo base_url(); ?>combo/ComboBox.css"></script>
<style>
body          {font-size:9pt;font-family:verdana;}
button        {cursor:hand;border:1px solid black;font-family:arial;font-size:9pt;}
a             {color:red;}
a:hover       {color:blue}
</style>

</head>

<body>
<script src="<?php echo base_url(); ?>combo/ComboBox.js"></script>

<script>

dm=new ComboBox("dm")

dm.add(
       new ComboBoxItem("barge",1),
       new ComboBoxItem("benluc",2),
       new ComboBoxItem("benlieeeeck",3),
       new ComboBoxItem("taco",4)
      )

// generate 1000 more to test performance
for (var i = 0; i < 100; i++ )
	dm.add(new ComboBoxItem(String(i)));

</script>

<br><br><br>

<button hidefocus onClick="alert(dm.value)">Show Value</button>&nbsp;<button hidefocus
onClick="dm.add(new ComboBoxItem(window.prompt('Type in the text to add',''),window.prompt('Type in a value to add','')))"
>Add Item</button>&nbsp;<button hidefocus onClick="dm.remove(window.prompt('Type in an index to remove',''))"
>Remove Item</button>
<br>
<br>

</body>
</html>
