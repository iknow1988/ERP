<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
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

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
    <div align="center">
        <h1>ISN</h1>
        <h2>Information Services Network Ltd.</h2>

    </div>
  <table width="525" border="1">
     <?php
		foreach ($list as $row)
    {?>
        <h3><?php echo $row->product_name ?></h3>
    <thead>
   <tr>
        <th>Attribute</th>
        <th>Value</th>
      </tr>
    </thead>
    <br/>
    <tr>
      <td>Product ID</td>
      <td><label id="product_id"><?php echo $row->product_id;?></label>&nbsp;</td>
    </tr>
    <tr>
      <td>Category ID</td>
      <td><label id="category_id"><?php echo $row->category_id;?></label>&nbsp;</td>
    </tr>
    <tr>
      <td>Product Name</td>
      <td><label id="product_name"><?php echo $row->product_name;?></label>&nbsp;</td>
    </tr>
    <tr>
      <td>Product Quantity</td>
      <td><label id="product_quantity"><?php echo $row->product_quantity;?></label>&nbsp;</td>
    </tr>
    <tr>
      <td>Reorder Level</td>
      <td><label id="reorder_level"><?php echo $row->reorder_level;?></label>&nbsp;</td>
    </tr>
    <tr>
      <td>Product Details</td>
      <td><label id="product_details"><?php echo $row->product_details;?></label>&nbsp;</td>
    </tr>
    <tr>
      <td>Unit Price</td>
      <td><label id="unit_price"><?php echo $row->unit_price;?></label>&nbsp;</td>
    </tr>
    <tr>
      <td>Remarks</td>
      <td><label id="remarks"><?php echo $row->remarks;?></label>&nbsp;</td>
    </tr>
	  <?php } ?>
  </table>
</form>
</body>
</html>