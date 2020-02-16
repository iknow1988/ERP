<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Search extends CI_Controller {
    function index1()
    {
		$this->load->library('table');
		$name = $this->input->post('search_text');
		$this->load->database();
		$query = $this->db->query("SELECT * FROM mas_product where product_name like '%$name%'");
		$data['table']=$this->table->generate($query);
		$this->load->view('searchview', $data);
		 
	
    }
    function index()
    {
                $name = $this->input->post('search_text');
                $this->load->model('product_model');
                $data['list'] = $this->product_model->product_report($name);
                $this->load->view("test",$data);


    }
    function issue_report()
    {
                $dat['frm'] = $this->input->post('dateofbirth');
                $dat['to'] = $this->input->post('dateofbirth1');
                $dat['department'] = $this->input->post('department_id');
                //echo $this->input->post('department_id');
                //echo $this->input->post('dateofbirth1');
                //echo $this->input->post('dateofbirth');
                $this->load->model('query_model');
                $this->load->model('product_model');
                $this->load->model('workorder_model');
                $data['list'] = $this->product_model->issue_report($dat);
                //$data['list'] = $this->query_model->issue();
                $data['department'] = $this->query_model->department();
                $data['records_employee_id']=$this->workorder_model->employee_details();
                $data['records_product_id'] = $this->product_model->get_all();
                $this->load->view("report_result_view",$data);


    }
    function inventory_balance()
    {
                $name['name'] = $this->input->post('search_text');
                $name['id'] = $this->input->post('search_id_text');
                $this->load->model('product_model');
                $data['list'] = $this->product_model->product_report($name);
                $this->load->view("inventory_balance_result_report_view",$data);


    }
           
}

?>
