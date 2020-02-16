<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <script type="text/javascript">
            function base_url() {
                return "<?php print(base_url());?>";
            }
        </script>

        <title>CSE Online : <?php echo $module; ?></title>
        <meta http-equiv="Content-Language" content="English" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/template1.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/jquery-ui.css" />
        <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-ui.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/login.js"></script>
    </head>
    <body>
        <div id="wrap">
            <div id="header"></div>

            <div id="content">
                <div id="context">
                    <?php echo $context; ?>
                    <div id="login">
                        username: <input type="text" id="username" value=""/>
                        password: <input type="password" id="password" value=""/>
                        <input type="button" id="btn_login" value="Login" />
                    </div>
                    <div id="loggedin">
                        <span id="logged_name"></span>
                        <input type="button" id="btn_logout" value="Logout"/>
                    </div>
                </div>
                <div class="left">
                    <?php
                    $this->menu->load($module);
                    $bu = base_url();
                    foreach ($this->menu->getCategories() as $cat) {
                        print("<h2>$cat</h2>\n");
                        print("<ul>\n");
                        foreach ($this->menu->getPages($cat) as $mi) {
                            print("<li><a href='$bu{$mi->url}'>{$mi->page}</a></li>\n");
                        }
                        print("</ul>\n");
                    }
                    ?>
                </div>
                <div class="right">
                    <?php $this->load->view($content_view); ?>
                </div>
            </div>
            <div style="clear: both;"> </div>

            <div id="footer">
                &copy;Department of CSE, BUET. Online automation prototype by CSE'07 batch
            </div>
        </div>
    </body>
</html>