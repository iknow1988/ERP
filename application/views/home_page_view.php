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
P.breakhere {page-break-after: always}
</style>
<div align="center">        
    <h1>ISN</h1>
    <h2>Information Services Network Ltd.</h2>
<br/>       
    <h1>
        Welcome <?php foreach ($mas as $row) {
                  echo $row->employee_name;
              }?>        
    </h1>
</div>