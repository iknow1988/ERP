<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report_controller extends CI_Controller {

        public function issue_report()
	{
                $this->load->model('query_model');
		$data['list'] = $this->query_model->issue();
                $data['department'] = $this->query_model->department();
                $this->load->model('product_model');
                $this->load->model('workorder_model');
                $data['records_employee_id']=$this->workorder_model->employee_details();
                $data['records_product_id'] = $this->product_model->get_all();
                $data['myview']="report_view.php";
                $this->load->view("template_client",$data);
                //$this->load->view("report_view",$data);

        }
        public function service_report()
	{
                $this->load->model('query_model');
		$data['list'] = $this->query_model->service();
                $data['myview']="service_report_view.php";
                $this->load->view("template_client",$data);
                //$this->load->view("report_view",$data);

        }
        public function product_report()
	{
                $this->load->model('product_model');
		$data['list'] = $this->product_model->get_all();
                $data['myview']="product_report_view.php";
                $this->load->view("template_client",$data);
                //$this->load->view("report_view",$data);

        }
        public function vendor_report()
	{
                $this->load->model('query_model');
		$data['list'] = $this->query_model->vendor();
                $this->load->model('product_model');
                $data['records_product_id'] = $this->product_model->get_all();
                $data['myview']="vendor_report_view.php";
                $this->load->view("template_client",$data);
                //$this->load->view("report_view",$data);

        }
        public function client_report()
	{
                $this->load->model('query_model');
		$data['list'] = $this->query_model->client();
                $data['myview']="client_report_view.php";
                $this->load->view("template_client",$data);
                //$this->load->view("report_view",$data);

        }
        public function employee_report()
	{
                $this->load->model('query_model');
		$data['list'] = $this->query_model->employee();
                $data['myview']="employee_report_view.php";
                $this->load->view("template_client",$data);
                //$this->load->view("report_view",$data);

        }
        public function receive_report()
	{
                $this->load->model('query_model');
		$data['list'] = $this->query_model->receive();
                $data['myview']="receive_report_view.php";
                $this->load->view("template_client",$data);
                //$this->load->view("report_view",$data);

        }
         public function inventory_balance_report()
	{
                $this->load->model('product_model');
		$data['list'] = $this->product_model->get_all();
                $data['myview']="inventory_balance_report_view.php";
                $this->load->view("template_client",$data);
                //$this->load->view("report_view",$data);

        }
          public function transaction_report()
	{
                $this->load->model('query_model');
                $this->load->library('calendar');
		$data['list_1'] = $this->query_model->transaction_1();
 		$data['list_2'] = $this->query_model->transaction_2();
                $data['myview']="transaction_report_view.php";
                $this->load->view("template_client",$data);
                //$this->load->view("report_view",$data);

        }
        function transaction_search()
        {
                $name = $this->input->post('dateofbirth');
                $this->load->model('query_model');
                $data['list_1'] = $this->query_model->transaction_search_1($name);
                $data['list_2'] = $this->query_model->transaction_search_2($name);
                //$this->load->view("transaction_report_view",$data);
                $data['myview']="transaction_report_view.php";
                $this->load->view("template_client",$data);

        }
        public function store_out_report()
	{
                $this->load->model('query_model');
		$data['list'] = $this->query_model->out();
                $data['myview']="store_out_report_view.php";
                $this->load->view("template_client",$data);
                //$this->load->view("report_view",$data);

        }
}
