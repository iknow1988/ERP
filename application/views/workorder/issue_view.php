<html>
    <head>
<script type="text/javascript">
function initit() {
    alert("Do Something!");
}
</script>
     <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-1.5.2.js"></script>
 <!--link href="<?php echo base_url();?>public/css/style.css" rel="stylesheet" type="text/css" /-->
        <!--link href="<?php echo base_url();?>public/css/login_css.css" rel="stylesheet" type="text/css" /-->
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
    <?php echo form_open('workorder_controller/issue');?>
    <div align="center">

        <h1>ISN</h1>
        <h2>Information Services Network Ltd.</h2>
        <h3>Issue</h3>

    </div>
    <table width="100%" cellpadding="0" cellspacing="0" bordercolor="000" style="font:Arial, Helvetica, sans-serif" align="center">
        <thead>
            <tr>
                <th>Store Requisition ID</th>
                <th>Employee ID</th>
                <th>Status</th>
                <th>Remarks</th>
            </tr>
        </thead>
        <br/>
      <?php
      foreach ($store_requisition as $row)
      {
         $id=$row->store_requisition_id;
         echo "<td>$row->store_requisition_id</td>";
         $a="<input type='hidden' id='store_requisition_id' name='store_requisition_id' value='$row->store_requisition_id'/>";
         echo $a;         
         //echo "<td>$row->employee_id</td>";?>
        <td><select name="employee_id" id="employee_id"><?php echo form_error('employee_id'); ?>
            <OPTION>Choose</OPTION>
            <?php foreach($records_employee_id as $r) : ?>
            <option value=<?php echo $r->employee_id; ?>><?php echo $r->employee_name; ?></option>
            <?php endforeach; ?>
        </select></td>
        <?php
         //$a="<input type='hidden' id='employee_id' name='employee_id' value='$row->employee_id'/>";
         //echo $a;
         echo "<td>$row->status</td>";
         echo "<td>$row->remarks</td>";
         echo "</tr>";
     }
    ?>
    </table>
    <table width="100%" cellpadding="0" cellspacing="0" bordercolor="000" style="font:Arial, Helvetica, sans-serif" align="center">
        <thead>
            <tr>
                <th><INPUT type="checkbox" name="chk1"/></th>
                <th>Issue ID</th>
                <th>Product Name</th>
                <th>Stock On Hand</th>
                <th>Asked Quantity</th>
                <th>Issued Quantity</th>
                <th>Issue Item</th>
                <th>Remarks</th>
            </tr>
        </thead>
        <br/>
      <?php
      foreach ($trn_store_requisition as $row)
      {
         if(($row->status=="not issued")||($row->status=="partial"))
         {
             $id=1;
             echo "<TD><INPUT type='checkbox' id='chk".$row->product_id."' name='chk".$row->product_id."' /></TD>";
             echo "<td>$issue_id</td>";
             $a="<input type='hidden' id='issue_id' name='issue_id' value='$issue_id'/>";
             echo $a;
			 foreach($records_product_id as $prod)
			 {
			 	if($prod->product_id==$row->product_id)
				{
					echo "<td>$prod->product_name</td>";
				}
			 }
             $a="<input type='hidden' id='product_id".$row->product_id."' name='product_id".$row->product_id."' value='$row->product_id'/>";
             echo $a;
             foreach($records_product_id as $r){
             if($row->product_id==$r->product_id)
             {
                 echo "<td>$r->product_quantity</td>";
             }
         }
             echo "<td>$row->product_quantity</td>";
             $a="<input type='hidden' id='product_quantity".$row->product_id."' name='product_quantity".$row->product_id."' value='$row->product_quantity'/>";
             echo $a;
             echo "<td>$row->issued_quantity</td>";
             $a="<input type='hidden' id='issued_quantity".$row->product_id."' name='issued_quantity".$row->product_id."'value='$row->issued_quantity'/>";
             echo $a;
             $a="<td><input type='text' name='issued_item".$row->product_id."' id='issued_item".$row->product_id."'/></td>";
             echo $a;
             $a="<td><input type='text' name='remarks".$row->product_id."' id='remarks".$row->product_id."' /></td>";
             echo $a;
             echo "</tr>";
         }
         else
         {
                echo"Issued";
         }
     }
    ?>
    </table>
    <div align="center">
          <input type='submit' name='issue' id='issue' value='Issue'/>  
    </div>
<?php echo form_close();?>
</body>
</html>
