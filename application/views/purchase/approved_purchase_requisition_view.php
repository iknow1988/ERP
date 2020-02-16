<html>

 <!--link href="<?php echo base_url();?>public/css/style.css" rel="stylesheet" type="text/css" /-->
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
        <h3>Purchase Requisitions</h3>

    </div>

    <table width="100%" cellpadding="0" cellspacing="0" bordercolor="000" style="font:Arial, Helvetica, sans-serif" align="center">
    <thead>
   <tr>
        <th>Requisition ID</th>
        <th>Status</th>
        <th>Remarks</th>
        <th>Requisition Date</th>
        <th>Entry By</th>
        <th>Entry Date</th>
        <th>Update By</th>
        <th>Update Date</th>
      </tr>
    </thead>
    <br/>
      <?php
      foreach ($list as $row)
      {
         //echo "<table border=1>";
         echo "<tr>";
         $a="<td><a class='iframe' href=".base_url()."index.php/purchase_controller/approved_purchase_requisition_detail/".$row->purchase_requisition_id.">".$row->purchase_requisition_id."</a>&nbsp;<br></br></td>";
		 echo $a;
         echo "<td>$row->status</td>";
         echo "<td>$row->remarks</td>";
         echo "<td>$row->requisition_date</td>";
         echo "<td>$row->entry_by</td>";
         echo "<td>$row->entry_date</td>";
         echo "<td>$row->update_by</td>";
         echo "<td>$row->update_date</td>";
		 echo "</tr>";
     }
    ?>
</table>
</body>
</html>

