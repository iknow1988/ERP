<?php

class Test extends CI_Controller {

    function index()
    {
        $this->load->model('product_model');
	$data['records'] = $this->product_model->get_all();
        //$this->load->view("workorder/store_requisition_form_view",$data);
        //$this->load->view("workorder/t",$data);
        //$this->load->view("xml",$data);
        $this->load->view("test3",$data);
    }
    function result()
    {
        //$chkbox = $_POST['chk'];
        //$txtbox = $_POST['txt'];
        //$country = $_POST['country'];
        $this->load->model('workorder_model');
	$data['store_requisition_id'] = $this->workorder_model->max_store_requisition_id();
        $data['chkbox'] =  $this->input->post('chk');
        $data['txtbox'] = $this->input->post('txt');
        $data['country'] = $this->input->post('country');
        $data['store_requisition_id']=
        $this->load->view("test2",$data);
        
    }
}
?>