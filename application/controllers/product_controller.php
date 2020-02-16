<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product_controller extends CI_Controller {

        public function index()
	{
                $this->load->model('category_model');
		$data['records'] = $this->category_model->get_category_name();
                $data['myview']="add_product_view.php";
                $this->load->view("template_client",$data);
	}
        public function add_product_page()
	{
                $this->load->model('category_model');
		$data['records'] = $this->category_model->get_category_name();
                $data['myview']="add_product_view.php";
                $this->load->view("template_client",$data);
	}
        public function product_add_popup()
	{
                $this->load->model('category_model');
		$data['records'] = $this->category_model->get_category_name();
                $data['records_brand'] = $this->category_model->get_brand_all();
                //$this->load->view("popup_view",$data);
                $this->load->view("add_product_view",$data);

	}
        public function category_add_popup()
	{
                $this->load->model('category_model');
		$data['records'] = $this->category_model->get_category_name();
                $this->load->view("add_category_view",$data);
	}
        public function brand_add_popup()
	{
                $this->load->model('category_model');
		$data['records'] = $this->category_model->get_category_name();
                $this->load->view("add_brand_view",$data);
	}
        public function product_details_popup($var)
	{
                $this->load->model('product_model');
		$data['list'] = $this->product_model->get_details($var);
                //$data['myview']="details_product_view.php";
                $this->load->view("details_product_view",$data);
	}
        public function category_details_popup()
	{
                $this->load->model('category_model');
		$data['list'] = $this->category_model->get_all();
                $this->load->view("details_category_view",$data);
	}
        public function product()
	{
               /* $this->load->library('table');
                $this->load->model('product_model');
                $data['query'] = $this->db->get('mas_product');
                $data['myview']="product_view.php";
                $this->load->view("template_client",$data);*/

                $this->load->model('product_model');
		$data['list'] = $this->product_model->get_all();
                $data['myview']="product_view.php";
                $this->load->view("template_client",$data);
	}
        public function add_product()
	{
                $this->load->model('product_model');
                $this->load->model('category_model');
		$product_id = $this->product_model->max_product_id();
                $cat_name = $this->input->post('category_id');
		$category_id = $this->category_model->get_category_id($cat_name);
                $data = array(
			'product_id' => $product_id+1,
			'category_id' => $category_id,
                        'brand_id' => $this->input->post('brand_id'),
                        'product_name' => $this->input->post('product_name'),
			'product_quantity' => $this->input->post('product_quantity'),
                        'reorder_level' => $this->input->post('reorder_level'),
			'product_details' => $this->input->post('product_details'),
                        'unit_price' => $this->input->post('unit_price')
		);
                $this->load->model('product_model');
                $this->product_model->insert($data);
                redirect("product_controller/success");
	}
        public function success()
	{
                $this->load->view("success_view");
	}
        public function add_category_page()
	{
                $this->load->model('category_model');
		$data['records'] = $this->category_model->get_category_name();
                $data['myview']="add_category_view.php";
                $this->load->view("template_client",$data);
	}
        public function category()
	{
                $this->load->library('table');
                $this->load->model('category_model');
                $data['query'] = $this->db->get('mas_category');
                $data['myview']="category_view.php";
                $this->load->view("template_client",$data);
	}
        public function add_category()
	{
                $this->load->model('category_model');
		$res = $this->category_model->max_category_id();
                $cat_name = $this->input->post('parent_category_id');
		$parent_category_id = $this->category_model->get_category_id($cat_name);
                $data = array(
			'category_id' => $res+1,
                        'category_name' => $this->input->post('category_name'),
			'parent_category_id' => $parent_category_id

                    );
                $this->category_model->insert($data);
                //redirect("product_controller/category");
                redirect("product_controller/success");
	}
       public function add_brand()
	{
                $this->load->model('category_model');
		$brand = $this->category_model->max_brand_id();
                $data = array(
			'brand_id' => $brand+1,
                        'brand_name' => $this->input->post('brand_name'),

                    );
                $this->category_model->insert_brand($data);
                //redirect("product_controller/category");
                redirect("product_controller/success");
	}        
        function product_pdf()
        {
         $this->load->helper(array('dompdf', 'file'));
         $this->load->model('product_model');
         $data['list'] = $this->product_model->get_all();
         $html = $this->load->view('test_product', $data, true);
         pdf_create($html, 'filename');
        }
        function category_pdf()
        {
         $this->load->helper(array('dompdf', 'file'));
         $this->load->model('category_model');
         $data['list'] = $this->category_model->get_all();
         $html = $this->load->view('test_category', $data, true);
        // $this->load->view('test_category', $data);
         pdf_create($html, 'filename');
        }
        function issue_pdf()
        {
         $this->load->helper(array('dompdf', 'file'));
         $dat['frm'] = $this->input->post('dateofbirth');
            $dat['to'] = $this->input->post('dateofbirth1');
            $dat['department'] = $this->input->post('department_id');
            $this->load->model('query_model');
            $this->load->model('product_model');
            $this->load->model('workorder_model');
            $data['list'] = $this->product_model->issue_report($dat);
            $data['department'] = $this->query_model->department();
            $data['records_employee_id']=$this->workorder_model->employee_details();
            $data['records_product_id'] = $this->product_model->get_all();
         $html = $this->load->view('test_issue', $data, true);
         pdf_create($html, 'filename');
        }
}
