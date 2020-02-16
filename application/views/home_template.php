<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>ISN</title>
        <meta http-equiv="Content-Language" content="English" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" type="text/css" href="<?php print(base_url());?>css/login_css.css" media="screen" />
        <!--link rel="stylesheet" type="text/css" href="<?php print(base_url());?>css/jquery-ui.css" /-->
        <!----------------------------------------------------------/-->

    </head>
    <body>
        <div id="wrap">
             <div id="header">
            </div>
            <div id="content">
                <div id="context">
                    <a href="">ISN Home</a>
                </div>
                <div class="left">
                </div>
                <div class="right">
                    <?php $this->load->view($myview); ?>
                </div>
            </div>
            <div style="clear: both;"> </div>
            <div id="footer">
                &copy;ISN
            </div>
        </div>
    </body>
</html>