<?php

class YSlip extends MY_Controller {
    function  __construct() {
        parent::__construct();
    }
//    function index() {
//
//    }
    function newslip() {
        $this->vars["category"] = "Yellow Slip";
        $this->vars["page"] = "New Slip";
        $this->vars["context"] = $this->_context();
        $this->vars["content_view"] = "yslip/newslip";
        $this->load->view("template1", $this->vars);
    }
    function report() {
        $this->vars["category"] = "Yellow Slip";
        $this->vars["page"] = "Reports";
        $this->vars["context"] = $this->_context();
        $this->vars["content_view"] = "yslip/reports";
        $this->load->view("template1", $this->vars);
    }
}
?>
