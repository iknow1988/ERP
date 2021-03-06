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
<body>
    <div align="center">

        <h1>ISN</h1>
        <h2>Information Services Networkd Ltd.</h2>
        <h3>Service Report</h3>

    </div>

    <table width="100%" cellpadding="0" cellspacing="0" bordercolor="000" style="font:Arial, Helvetica, sans-serif" align="center">
    <thead>
   <tr>
        <th>Connection ID</th>
        <th>Service ID</th>
        <th>Service Name</th>
        <th>Type Of User</th>
        <th>Connection Address</th>
        <th>Type Of Account</th>
        <th>Bandwidth</th>
        <th>No Of PC</th>
        <th>Connection Date</th>
      </tr>
    </thead>
    <br/>
      <?php
      foreach ($list as $row)
      {
         //echo "<table border=1>";
         echo "<tr>";
         echo "<td>$row->connection_id</td>";
         echo "<td>$row->service_id</td>";
         echo "<td>$row->service_name</td>";
         echo "<td>$row->type_of_user</td>";
         echo "<td>$row->connection_address</td>";
         echo "<td>$row->type_of_account</td>";
         echo "<td>$row->bandwidth</td>";
         echo "<td>$row->no_of_pc</td>";
         echo "<td>$row->connection_date</td>";
        echo "</tr>";
     }
    ?>
</table>
</body>
</html>

