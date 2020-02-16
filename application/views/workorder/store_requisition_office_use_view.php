<HTML>
<HEAD>
    <script type="text/javascript" src="<?php echo base_url(); ?>jquery.js"></script>
    <script SRC="<?php echo base_url(); ?>calendar.js" LANGUAGE="JavaScript"></script>
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
</HEAD>
<BODY>
    <div align="center">

        <h1>ISN</h1>
        <h2>Information Services Network Ltd.</h2>
        <h3>Store Requisition Form</h3>

    </div>
    <?php echo form_open("workorder_controller/store_requisition_office_use_create");?>
    <table width="90%" cellpadding="0" cellspacing="0" bordercolor="000" style="font:Arial, Helvetica, sans-serif" align="center">
        <tr>
            <td align="left">
                <label>Store Requisition Date</label>
            </td>
            <td>
                                <input type="hidden" id="store_requisition_id" name="store_requisition_id" value="<?php echo $store_requisition_id ; ?>"/>
                <input type="text" name="store_requisition_date" value="<?php echo set_value('store_equisition_date'); ?>" id="store_requisition_date" /><?php echo form_error('store_requisition_date'); ?>
                <A HREF="javascript:doNothing()" onClick="setDateField(store_requisition_date);top.newWin = window.open('<?php echo base_url()?>calendar.html','cal','dependent=yes,width=250,height=230,screenX=200,screenY=300,titlebar=yes')"><IMG SRC="<?php echo base_url()?>cal.jpg" BORDER=0></A>
            </td>                            
        </tr>
        <tr>
            <td>
                <label>Expected Requisition Date</label>
            </td>
            <td>
                <input type="text" name="expected_requisition_date" value="<?php echo set_value('expected_requisition_date'); ?>" id="expected_requisition_date" /><?php echo form_error('expected_requisition_date'); ?>
                <A HREF="javascript:doNothing()" onClick="setDateField(expected_requisition_date);top.newWin = window.open('<?php echo base_url()?>calendar.html','cal','dependent=yes,width=250,height=230,screenX=200,screenY=300,titlebar=yes')"><IMG SRC="<?php echo base_url()?>cal.jpg" BORDER=0></A>
            </td>           
        </tr>
        <tr>
            <td>
                <label>Remarks</label>
            </td>
            <td>
                <input type="text" name="remarks" id="remarks"/>
            </td>
        </tr>
        <tr>
            <td>
                <INPUT type="button" value="Add More Item" onclick="addRow('dataTable')" />
            </td>
            <td>
                <INPUT type="button" value="Delete Selected Item" onclick="deleteRow('dataTable')" />
            </td>
        </tr>
        <tr>
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
                </table>
        </tr>
        <tr>
            <TABLE width="90%"id="dataTable" width="350px" border="1">
                <TR>
                    <TD><INPUT type="checkbox" name="chk[]"/></TD>
                    <TD>
                        <select name="country[]">
                            <OPTION>Choose</OPTION>
                            <?php foreach($records as $r) : ?>
                            <option><?php echo $r->product_name; ?><?php echo form_error('name'); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </TD>
                    <TD><INPUT type="text" name="txt[]"/><?php echo form_error('amount'); ?></TD>
                </TR>
            </TABLE>
        </tr>
    </table>
             <div align="center">
             <input type="submit" name="submit" id="submit" value="submit"/>
        </div>
            <?php echo form_close();?>
</BODY>
</HTML>
