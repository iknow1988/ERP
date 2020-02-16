<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Add Product</title>
        <link rel="stylesheet" type="text/css" href="<?php print(base_url());?>css/login_css.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="<?php print(base_url());?>css/jquery-ui.css" />
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

        body {
            margin: 0in;
        }
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
     <?php echo form_open('purchase_controller/receive_koro_employee');?>
     <div align="center">

        <h1>ISN</h1>
        <h2>Information Services Network Ltd.</h2>
        <h3>Receive From Employee Form</h3>

	</div>
	<br/><br/>
	<div align= "left" style="margin-left:18px">
	Employee ID <select name="employee">
		<OPTION>Choose</OPTION>
		<?php foreach($tonmoy as $r) : ?>
		<option><?php echo $r->employee_id;?></option>
		<?php endforeach; ?>
	</select>
	</div>
    <div align = "right">
	<INPUT type="button" value="Add Row" onclick="addRow('dataTable')" />

    <INPUT type="button" value="Delete Row" onclick="deleteRow('dataTable')" style="margin-right:18px" />
	</div>
	<br/>
    <table width="90%" cellpadding="0" cellspacing="0" bordercolor="000" style="font:Arial, Helvetica, sans-serif" align="center">
        <tr>
        <thead>
            <th>
                <INPUT type="checkbox" name="chk1"/>
            </th>
            <th>
                Product Name
            </th>
            <th>
                Enter Product Amount
            </th>
        </thead>
        </tr>	
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
            <TD><INPUT type="text" name="txt[]"/></TD>
        </TR>
    </table>
	<br/>
    <div align="center"><input type="submit" name="submit" id="submit" value="Receive"/></div>
	<?php echo form_close();?>
  </div>
</body>
</html>