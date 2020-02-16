<html>
    <head>
        <script type="text/javascript" src="<?php echo base_url(); ?>jquery.js"></script>
        <script TYPE="text/javascript" SRC="<?php echo base_url(); ?>calendar.js" LANGUAGE="JavaScript"></script>
        <script TYPE="text/javascript">
                function find_content() {
                $.post('<?php echo base_url(); ?>index.php/search', { search_text: $("#search_text").val() },
                    function (output){
                    $('#results').html(output).show();
                    });
                }
        </script>
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
    <?php echo form_open("report_controller/transaction_search")?>
    <div align="center">

        <h1>ISN</h1>
        <h2>Information Services Network Ltd.</h2>
        <h3>Product Transaction Report</h3>

    </div>
    <div>
        <hr>
        <table>
            <tr>
                <td>
                    Select A Date
                </td>
                <td>
		<input type="text" name="dateofbirth" value="<?php echo set_value('dateofbirth'); ?>" id="dateofbirth" /><?php echo form_error('dateofbirth'); ?>
		<A HREF="javascript:doNothing()" onClick="setDateField(dateofbirth);top.newWin = window.open('<?php echo base_url()?>calendar.html','cal','dependent=yes,width=230,height=230,screenX=200,screenY=300,titlebar=yes')"><IMG SRC="<?php echo base_url()?>cal.jpg" BORDER=0></A></td>
                <td><input type="submit" align="center" name="submit" id="submit" value="Search"/></td>
            </tr>
        </table>
    </div>
    <table width="100%" cellpadding="0" cellspacing="0" bordercolor="000" style="font:Arial, Helvetica, sans-serif">
      <?php if(count($list_1)>0||count($list_2)>0)
      {?>
        <thead>
        <tr>
        <th>Transaction ID</th>
        <th>Issue ID</th>
        <th>Receive ID</th>
        <th>Product ID</th>
        <th>Received Quantity</th>
        <th>Date</th>
      </tr>
    </thead>
     <?php } ?>
    <br/>
      <?php
      $size=count($list_1);
      if($size>0)
      {
          foreach ($list_1 as $row)
          {
             //echo "<table border=1>";
             echo "<tr>";
             echo "<td>$row->transaction_id</td>";
             echo "<td>$row->issue_id</td>";
             echo "<td></td>";
             echo "<td>$row->product_id</td>";
             echo "<td>$row->product_quantity</td>";
             echo "<td>$row->transaction_date</td>";
            echo "</tr>";
         }
      }
      else {
          echo 'not found';

      }
      $size=count($list_2);
      if($size>0)
      {
           foreach ($list_2 as $row)
          {
             //echo "<table border=1>";
             echo "<tr>";
             echo "<td>$row->transaction_id</td>";
             echo "<td></td>";
             echo "<td>$row->receive_id</td>";
             echo "<td>$row->product_id</td>";
            // echo "<td></td>";
             echo "<td>$row->product_quantity</td>";
             echo "<td>$row->transaction_date</td>";
            echo "</tr>";
         }
      }
      else {
          //echo 'not found';

      }
    ?>
</table>
    <?php  echo form_close() ?>
</body>
</html>


