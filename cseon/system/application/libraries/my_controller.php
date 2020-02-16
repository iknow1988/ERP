<?php
class MY_Controller extends Controller {
    var $vars;
    function  __construct() {
        parent::__construct();
        $this->load->library('session');
        if (!$this->session->userdata('loggedin')) {
            header('Location: /cseon');
        }
        $this->vars["module"] = "CSE Office";
    }
    function _context() {
        $res = $this->vars["module"];
        if (!empty($this->vars["category"])) {
            $res .= "/".$this->vars["category"];
        }
        if (!empty($this->vars["page"])) {
            $res .= "/".$this->vars["page"];
        }
        return $res;
    }
}
?>
