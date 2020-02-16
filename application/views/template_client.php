<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>ISN</title>
        <meta http-equiv="Content-Language" content="English" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" type="text/css" href="<?php print(base_url());?>css/login_css.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="<?php print(base_url());?>css/jquery-ui.css" />
        <!--link href="<?php print(base_url());?>css/css_TR.css" type="text/css" media="screen, projection" rel="stylesheet"/-->
        <script type="text/javascript" src="<?php print(base_url());?>Java Script/jquery-1.5.2.js"></script>
        <script type="text/javascript" src="<?php print(base_url());?>Java Script/animatedMenuadmin.js"></script>
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
                    <br/>
                    <div id="f7">
                      <a href="<?php echo site_url("login/homepage"); ?>">Home Page</a><br/>
                    </div>
                    <div id="f3">
                        Forms
                    </div>
                    <div id="form"">
                        <?php
                        $this->load->library('session');
                        $list1 = $this->session->userdata('role_profile_get');
                        //echo $list1;
                        //die();
                        foreach ($list1 as $row)
                        {?>
                        <?php if($row->type=="Form"){?>
                            <a href="<?php echo site_url($row->href); ?>"style="text-decoration: none;color:gray;padding-left: 10px;font:bold 11px Georgia,serif;"><?php echo $row->aname; ?></a>&nbsp;<br/>
                        <?php }}
                        ?>
                    </div>
                    <div id="labwise">
                        Reports
                    </div>
                    <div id="report">
                         <?php
                        $this->load->library('session');
                        $list1 = $this->session->userdata('role_profile_get');
                        foreach ($list1 as $row)
                          {?>
                        <?php if($row->type=="Report"){?>
                            <a href="<?php echo site_url($row->href); ?>" style="text-decoration: none;color:gray;padding-left: 10px;font:bold 11px Georgia,serif;"><?php echo $row->aname; ?></a>&nbsp;<br/>
                         <?php }}

                        ?>
                    </div>
                     <div id="f7">
                      <a href="<?php echo site_url("login/logout"); ?>">Logout</a><br/>
                    </div>
                </div>
                <div class="right">
                    <p></p>
                  <p>&nbsp;</p>
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