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
        <script type="text/javascript" src="<?php echo base_url(); ?>jquery.js"></script>
        <script SRC="<?php echo base_url(); ?>calendar.js" LANGUAGE="JavaScript"></script>
        <script type="text/javascript" src="<?php echo base_url();?>public/js/sortTable.js"></script>
<title>Add Product</title>
        <link rel="stylesheet" type="text/css" href="<?php print(base_url());?>css/login_css.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="<?php print(base_url());?>css/jquery-ui.css" />
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
</head>


<body>
    <div align="center">
        <h1>ISN</h1>
        <h2>Information Services Network Ltd.</h2>
        <h3>Workorder Of Service</h3>
    </div>

  <div>
      <?php echo form_open('workorder_controller');?>
      <table width="95%" cellpadding="0" cellspacing="0" bordercolor="000" style="font:Arial, Helvetica, sans-serif" border="1"style="border-top:1px solid #e5eff8;border-right:1px solid #e5eff8;">
        <thead>
            <tr align="center">
              <th>Client Name</th>
              <th>Service Name</th>
              <th>Workorder Date</th>
              <th>Remarks</th>
              <th></th>
            </tr>
        </thead>
          <br/>
            <tr align ="center">
              <td>
                  <select name="client_id" id="client_id"><?php echo form_error('client_id'); ?>
                        <OPTION>Choose</OPTION>
                        <?php foreach($records_client_id as $r) : ?>
                        <option value=<?php echo $r->client_id; ?>><?php echo $r->client_name; ?></option>
                        <?php endforeach; ?>
                 </select>
              </td>
              <td>
                  <select name="service_id" id="service_id"><?php echo form_error('service_id'); ?>
                        <OPTION>Choose</OPTION>
                        <?php foreach($records_service_id as $r) : ?>
                        <option value="<?php echo $r->service_id; ?>"><?php echo $r->service_name; ?></option>
                        <?php endforeach; ?>
                 </select>
              </td>
      <td>
          <p>
            <input type="text" name="workorder_date" value="<?php echo set_value('workorder_date'); ?>" id="workorder_date" /><?php echo form_error('workorder_date'); ?>
            <a HREF="javascript:doNothing()" onClick="setDateField(workorder_date);top.newWin = window.open('<?php echo base_url()?>calendar.html','cal','dependent=yes,width=250,height=230,screenX=200,screenY=300,titlebar=yes')"><IMG SRC="<?php echo base_url()?>cal.jpg" BORDER=0></a>
          </p>
      </td>
              <td><input type="text" name="remarks" id="remarks" /></td> 
              <td><input type="submit" name="create_workorder" id="create_workorder" value="Submit" align="center" /></td>               
            </tr>
   </table>
    <?php echo form_close();?>
  </div>
    <div align="center">
        <br/>
        <br/>
        <h1>Approved Workorders</h1>
        <br/>
        <?php $size=count($list);
        if($size>0)
        {?>
            <table id="table0" width="100%" cellpadding="0" cellspacing="0" bordercolor="000" style="font:Arial, Helvetica, sans-serif" align="center">
            <thead>
           <tr>
                <th>Workorder ID</th>
                <th>Status</th>
                <th>Client Name</th>
                <!--th>Employee ID</th-->
                <th>Service Name</th>
                <th></th>
                <th></th>
              </tr>
            </thead>
            <br/>
              <?php
              $this->load->library('session');
              $employee_id = $this->session->userdata('employee_id');
              foreach ($list as $row)
              {
                 if($row->employee_id==$employee_id)
                 {

                     echo "<td>$row->workorder_of_service_id</td>";
                     echo "<td>$row->status</td>";
                     foreach($records_client_id as $r){
                         if($row->client_id==$r->client_id)
                         {
                             echo "<td>$r->client_name</td>";
                         }
                     }
                     //echo "<td>$row->employee_id</td>";
                     foreach($records_service_id as $r){
                         if($row->service_id==$r->service_id)
                         {
                             echo "<td>$r->service_name</td>";
                         }
                     }
                     if($row->status=="approved")
                     {
                        $a="<td><a class='iframe' href=".base_url()."index.php/workorder_controller/store_requisition_view/".$row->workorder_of_service_id.">Store Requisition</a>&nbsp;<br></br></td>";
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
        <?php }
        else{
        echo "No Workorder Present";
        }?>
    </div>
</body>
</html>