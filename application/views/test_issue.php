<html>
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
    font-size: 14px;
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
    text-align:left;
    }
th {
    font-weight:normal;
    color: #3B5998;
    text-align:left;
    border-bottom: 1px solid #CC6600;
    border-left:1px solid #CC6600;
    padding: 2px 2px 2px 5px;
    }
thead th {
    background:#D8DFEA;
    text-align:left;
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
<body>
    <div align="center">
        <h1>ISN</h1>
        <h2>Information Services Network Ltd.</h2>
        <h3>Issue Report</h3>
    </div>
      <?php $size=count($list);
      if($size > 0)
      {?>
        <table width="100%" cellpadding="0" cellspacing="0" bordercolor="000" style="font:Arial, Helvetica, sans-serif">
    <thead>       
   <tr>
        <th>Date</th>
        <th>Issue ID</th>
        <th>Employee Name</th>
        <th>Department</th>
        <th>Product Name</th>
        <th>Issued Quantity</th>
        <th>Unit Price</th>
        <th>Total Price</th>
      </tr>
    </thead>
    <?php }?>
    <br/>
      <?php
      $size=count($list);
      if($size > 0)
      {
        foreach ($list as $row)
        {
            echo "<tr>";
            $token = strtok($row->issue_date, " ");
            echo "<td>$token</td>";
            echo "<td>$row->issue_id</td>";
            foreach($records_employee_id as $r){
                if($row->employee_id==$r->employee_id)
                {
                    echo "<td>$r->employee_name</td>";
                }
            }
            foreach($records_employee_id as $r){
                if($row->employee_id==$r->employee_id)
                {
                    echo "<td>$r->department_name</td>";
                }
            }
            foreach($records_product_id as $r){
                if($row->product_id==$r->product_id)
                {
                    echo "<td>$r->product_name</td>";
                }
            }
            $issued_quantity=$row->product_quantity;
            echo "<td>$row->product_quantity</td>";
                    foreach($records_product_id as $r){
                if($row->product_id==$r->product_id)
                {
                    $unit_price=$r->unit_price;
                    echo "<td>$r->unit_price</td>";
                }
            }
            $total=$issued_quantity*$unit_price;
            echo "<td>$total</td>";
            echo "</tr>";
        }
      }
      else
      {
          echo "No Records Found";
      }
    ?>
    <br>
</table>
</body>
</html><?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>

