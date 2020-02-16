<html>

 <!--link href="<?php echo base_url();?>public/css/style.css" rel="stylesheet" type="text/css" /-->
    <!--
        <link rel="stylesheet" type="text/css" href="<?php print(base_url());?>css/login_css.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="<?php print(base_url());?>css/jquery-ui.css" />-->
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
        <h2>Information Services Network Ltd.</h2>
        <h3>Approved Store Requisitions</h3>

    </div>
    <br/>
    <h2>CLIENT USE</h2>
    <table width="100%" cellpadding="0" cellspacing="0" bordercolor="000" style="font:Arial, Helvetica, sans-serif" align="center">
    <thead>
   <tr>
        <th>Store Requisition ID</th>
        <th>Status</th>
        <th>Client Name</th>
        <th>Employee Name</th>
        <th>Work Order Of Service ID</th>
        <th>Requisition Date</th>
        <th></th>
      </tr>
    </thead>
    <br/>
      <?php
      foreach ($list as $row)
      {
        if($row->requisition_type=="client use")
        {          
         //echo "<table border=1>";
         echo "<tr>";
         $a="<td><a class='iframe' href=".base_url()."index.php/workorder_controller/store_requisition_detail/".$row->store_requisition_id.">".$row->store_requisition_id."</a>&nbsp;<br></br></td>";
		 echo $a;
         echo "<td>$row->status</td>";
         foreach($records_client_id as $r){
             if($row->client_id==$r->client_id)
             {
                 echo "<td>$r->client_name</td>";
             }
         }
         foreach($records_employee_id as $r){
             if($row->employee_id==$r->employee_id)
             {
                 echo "<td>$r->employee_name</td>";
             }
         }
         $a="<td><a class='iframe' href=".base_url()."index.php/workorder_controller/workorder_detail/".$row->workorder_of_service_id.">".$row->workorder_of_service_id."</a>&nbsp;<br></br></td>";
		 echo $a;
         echo "<td>$row->requisition_date</td>";
         if($row->status=="approved by Store Manager")
         {
            $a="<td><a class='iframe' href=".base_url()."index.php/workorder_controller/issue_view/".$row->store_requisition_id.">Click To Issue</a>&nbsp;<br></br></td>";
            echo $a;
         }
         else
         {
             echo "<td></td>";
         }
	 echo "</tr>";
     }
      }
    ?>
</table>
    <br/>
    <h2>OFFICE USE</h2>
    <table width="100%" cellpadding="0" cellspacing="0" bordercolor="000" style="font:Arial, Helvetica, sans-serif" align="center">
    <thead>
   <tr>
        <th>Store Requisition ID</th>
        <th>Status</th>
        <th>Employee Name</th>
        <th>Requisition Date</th>
        <th></th>
      </tr>
    </thead>
    <br/>
      <?php
      foreach ($list as $row)
      {
        if($row->requisition_type=="office use")
        {          
         //echo "<table border=1>";
         echo "<tr>";
         $a="<td><a class='iframe' href=".base_url()."index.php/workorder_controller/store_requisition_detail/".$row->store_requisition_id.">".$row->store_requisition_id."</a>&nbsp;<br></br></td>";
		 echo $a;
         echo "<td>$row->status</td>";
         foreach($records_employee_id as $r){
             if($row->employee_id==$r->employee_id)
             {
                 echo "<td>$r->employee_name</td>";
             }
         }
         echo "<td>$row->requisition_date</td>";
         if($row->status=="approved by Store Manager")
         {
            $a="<td><a class='iframe' href=".base_url()."index.php/workorder_controller/issue_view/".$row->store_requisition_id.">Click To Issue</a>&nbsp;<br></br></td>";
            echo $a;
         }
         else
         {
             echo "<td></td>";
         }
	 echo "</tr>";
     }
      }
    ?>
</table>    
</body>
</html>

