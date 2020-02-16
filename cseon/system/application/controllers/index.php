<?php
class Index extends Controller {
    var $vars;
    function  __construct() {
        parent::__construct();
        $this->vars["module"] = "CSE Office";
    }

    function index() {
        $this->vars["category"] = "";
        $this->vars["page"] = "";
        $this->vars["context"] = "";//$this->_context();
        $this->vars["content_view"] = "home_public";
//        print("Hello world");
        $this->load->view("template1", $this->vars);
    }
}
?>
