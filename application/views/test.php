<html>
<head>
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
    <table width="100%" cellpadding="0" cellspacing="0" bordercolor="000" style="font:Arial, Helvetica, sans-serif">
    <thead>
   <tr>
        <th>Product ID</th>
        <th>Category ID</th>
        <th>Product Name</th>
        <th>Product Quantity</th>
        <th>Reorder Level</th>
        <th>Product Details</th>
        <th>Unit Price</th>
        <th>Remarks</th>
      </tr>
    </thead>
    <br/>
      <?php
      $size=count($list);
      if($size > 0)
      {
          foreach ($list as $row)
          {
                 //echo "<table border=1>";
                 echo "<tr>";
                 echo "<td>$row->product_id</td>";
                 echo "<td>$row->category_id</td>";
                 echo "<td>$row->product_name</td>";
                 echo "<td>$row->product_quantity</td>";
                 echo "<td>$row->reorder_level</td>";
                 echo "<td>$row->product_details</td>";
                 echo "<td>$row->unit_price</td>";
                 echo "<td>$row->remarks</td>";
                echo "</tr>";
         }
      }
      else{
          echo "No Records Found";
      }
    ?>
</table>
</body>
</html>

