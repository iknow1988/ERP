<?php
class Admin_controller extends CI_Controller {
    function index()
    {
        $data['myview']="admin_view.php";
        $this->load->view("template_client",$data);
    }
}

?>
