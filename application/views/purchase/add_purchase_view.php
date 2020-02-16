<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="<?php echo base_url();?>public/css/colorbox.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="<?php echo base_url();?>public/js/jquery.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>public/js/jquery.colorbox.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>public/js/MYCreated.js"></script>
        <script language="text/javascript">
        //PRELOADER GLOBAL
        $(function(){
            $("#ajaxLoad").ajaxStart(function(){
		$(this).html('<img src="<?php echo base_url();?>public/img/ajax-loader.gif" />');
            });
            $("#ajaxLoad").ajaxSuccess(function(){
   		$(this).html('');
            });
            $("#ajaxLoad").ajaxError(function(url){
   		alert('Error: HTTP Connection was Interrupted. Please try again or refresh the page.');
            });
        });

        </script>

<title>Add Product</title>
        <link rel="stylesheet" type="text/css" href="<?php print(base_url());?>css/login_css.css" media="screen" />
        <!--link rel="stylesheet" type="text/css" href="<?php print(base_url());?>css/jquery-ui.css" /-->
		   <SCRIPT language="javascript">
        function addRow(tableID) {

            var table = document.getElementById(tableID);

            var rowCount = table.rows.length;
            var row = table.insertRow(rowCount);

            var colCount = table.rows[0].cells.length;

            for(var i=0; i<colCount; i++) {

                var newcell = row.insertCell(i);

                newcell.innerHTML = table.rows[0].cells[i].innerHTML;
                //alert(newcell.childNodes);
                switch(newcell.childNodes[0].type) {
                    case "text":
                            newcell.childNodes[0].value = "";
                            break;
                    case "checkbox":
                            newcell.childNodes[0].checked = false;
                            break;
                    case "select-one":
                            newcell.childNodes[0].selectedIndex = 0;
                            break;
                }
            }
        }

        function deleteRow(tableID) {
            try {
            var table = document.getElementById(tableID);
            var rowCount = table.rows.length;

            for(var i=0; i<rowCount; i++) {
                var row = table.rows[i];
                var chkbox = row.cells[0].childNodes[0];
                if(null != chkbox && true == chkbox.checked) {
                    if(rowCount <= 1) {
                        alert("Cannot delete all the rows.");
                        break;
                    }
                    table.deleteRow(i);
                    rowCount--;
                    i--;
                }

            }
            }catch(e) {
                alert(e);
            }
        }

    </SCRIPT>
        <style type="text/css">
        h1, h2, h3, h4, h5, h6, li, blockquote, p, th, td {
            font-family: Helvetica, Arial, Verdana, sans-serif; /*Trebuchet MS,*/
        }
        h1, h2, h3, h4 {
            color: #5E88B6;
            font-weight: normal;
            text-align: center;
        }
        h4, h5, h6 {
            color: #5E88B6;
        }
        h2 {
            margin: 0 auto auto auto;
            font-size: x-large;
        }
        li, blockquote, p, th, td {
            font-size: 80%;
        }

        table {
            width:95%;
            border-top:1px solid #e5eff8;
            border-right:1px solid #e5eff8;
            margin: 0 auto;
            border-collapse:collapse;
            font-size: 16px;
            }
        tr.odd td    {
            background:#f7fbff
            }
        tr.odd .column1    {
            background:#f4f9fe;
            }
        .column1    {
            background:#D8DFEA;
            }
        td {
            color:#444;
            border-bottom:1px solid #CC6600;
            border-left:1px solid #CC6600;
            padding: 2px;
            text-align:center;
            }
        th {
            font-weight:normal;
            color: #3B5998;
            text-align:center;
            border-bottom: 1px solid #CC6600;
            border-left:1px solid #CC6600;
            padding: 2px 2px 2px 5px;
            }
        thead th {
            background:#D8DFEA;
            text-align:center;
            font:bold 11px "Century Gothic","Trebuchet MS",Arial,Helvetica,sans-serif;
            color:#3B5998;
            }
        tfoot th {
            text-align:center;
            background:#f4f9fe;
            }
        tfoot th strong {
            font:bold 01px "Century Gothic","Trebuchet MS",Arial,Helvetica,sans-serif;
            margin: 0;
            color:#66a3d3;
                }
        tfoot th em {
            color:#f03b58;
            font-weight: bold;
            font-size: 10px;
            font-style: normal;
            }

        #footer {
            border-top: 1px solid #CCC;
            text-align: right;
        }

        P.breakhere {page-break-after: always}
        </style>
</head>


<body>
<div>
     <?php echo form_open('purchase_controller');?>
     <div align="center">

        <h1>ISN</h1>
        <h2>Information Services Network Ltd.</h2>
        <h3>Product Quantity</h3>
	</div>

    <table width="100%" cellpadding="0" cellspacing="0" bordercolor="000" style="font:Arial, Helvetica, sans-serif">

    <thead>
   <tr>
        <th>Product ID</th>
        <th>Product Name</th>
        <th>Product Quantity</th>
        <th>Get Details</th>
      </tr>
    </thead>
    <br/>
      <?php
      foreach ($list as $row)
      {
         //echo "<table border=1>";
         echo "<tr>";
         echo "<td>$row->product_id</td>";
         echo "<td>$row->product_name</td>";
         echo "<td>$row->product_quantity</td>";
         $a= "<a class='iframe' href=".base_url()."index.php/product_controller/product_details_popup/".$row->product_id.">Get Details</a>";
         echo "<td>".$a."</td>";
         echo "</tr>";
     }
    ?>
</table>
    <br/>
    <div align = "right">
	<INPUT type="button" value="Add More" onclick="addRow('dataTable')" />
    <INPUT type="button" value="Delete Selected Product" onclick="deleteRow('dataTable')" style="margin-right:18px" />
	</div>
	<br/>
	<div>
	        <h2>Purchase Requisition Form</h2><br>
	</div>
    <table width="auto" cellpadding="0" cellspacing="0" bordercolor="000" style="font:Arial, Helvetica, sans-serif" align="center" >
        <tr>
        <thead>
            <th>
                <INPUT type="checkbox" name="chk1"/>
            </th>
            <th>
                Product Name
            </th>
            <th>
                Product Brand
            </th>            
            <th>
                Enter Product Amount
            </th>
             <th>
                Remarks
            </th>           
        </thead>
        </tr>
    <!--/table-->
    <!--TABLE width="auto"id="dataTable" width="350px" border="1"-->
	    <!--table width="90%" id="dataTable" cellpadding="0" cellspacing="0" bordercolor="000" style="font:Arial, Helvetica, sans-serif" align="center"-->

	
        <TR>
            <TD><INPUT type="checkbox" name="chk[]"/></TD>
            <TD>
                <select name="country[]">
                    <OPTION>Choose</OPTION>
                    <?php foreach($records as $r) : ?>
                    <option><?php echo $r->product_name; ?></option>
                    <?php endforeach; ?>
                </select>
            </TD>
            <TD>
            <select name="brand_id[]"><?php echo form_error('brand_id'); ?>
                <OPTION>Choose</OPTION>
                <?php foreach($records_brand as $r) : ?>
                <option value=<?php echo $r->brand_id; ?>><?php echo $r->brand_name; ?></option>
                <?php endforeach; ?>
            </select>    
            </TD>
            <TD><INPUT type="text" name="txt[]"/></TD>
            <TD><INPUT type="rmk" name="rmk[]"/></TD>
        </TR>
    </table>
	<br/>
    <div align="center"><input type="submit" name="submit" id="submit" value="Submit"/></div>
	<?php echo form_close();?>
  </div>
</body>
</html>