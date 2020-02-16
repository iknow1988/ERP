<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Result extends CI_Controller {
    function index()
    {

        $this->load->helper(array('form', 'url'));
       // $this->load->library('form_validation');
        //$this->load->library('session');

            $this->load->view('resultview');
        }

}

?>
