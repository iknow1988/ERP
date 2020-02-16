<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Purchase_controller extends CI_Controller {

    public function index()
	{
			$this->load->library('session');
			
          
			if ($this->input->post('submit'))
			{
				$this->load->model('purchase_model');
				$data['purchase_requisition_id'] = $this->purchase_model->max_purchase_requisition_id();
				$chkbox =  $this->input->post('chk');
				$txtbox = $this->input->post('txt');
                                $rmkbox = $this->input->post('rmk');
				$country = $this->input->post('country');
                                $brand_id=$this->input->post('brand_id');
				$this->purchase_model->insert_entry($data,$chkbox,$txtbox,$country,$brand_id,$rmkbox);
				redirect("purchase_controller");
			}
			elseif ($this->input->post('ok'))
			{
				redirect("product_controller/success");
			}
			elseif ($this->input->post('approve'))
			{
				
				$var1 = $this->session->userdata('p_id');
				$this->load->library('session');
				$employee_id = $this->session->userdata('employee_id');
				if($employee_id==2)
				{
					//$id=$this->session->flashdata('id');
					$this->load->model('purchase_model');
					$data=$this->purchase_model->store_manager_approve($var1); 
				}
				elseif($employee_id==6)//MD
				{
					$this->load->model('purchase_model');
					$data=$this->purchase_model->md_approve($var1); 
					
				
				}
			 
				 redirect("product_controller/success");
			}
			
			
			else
			{
				$this->load->model('product_model');
                                $this->load->model('category_model');
				$data['records'] = $this->product_model->get_all();
                                $data['list'] = $this->product_model->get_all();
                                $data['records_brand'] = $this->category_model->get_brand_all();
				$data['myview']="purchase/add_purchase_view.php";
				$this->load->view("template_client",$data);
				
			}
	}
        
		
	public function add_product_page()
	{
        $this->load->model('category_model');
		$data['records'] = $this->category_model->get_category_name();
        $data['myview']="add_product_view.php";
        $this->load->view("template_client",$data);
	}
	
	public function purchase_requisition_detail($id)
	{
		$this->load->library('session');
		//$data['purchase_id']=$id;
		$this->load->model('purchase_model');
		$data['list']= $this->purchase_model->getDetail($id);
		//$data['myview']="purchase/purchase_requisition_detail_view.php";
        $this->load->view("purchase/purchase_requisition_detail_view",$data);
	
	}
	public function add_workorder_page()
	{
		$this->load->model('purchase_model');
		$this->load->model('product_model');
		$data['tarik'] = $this->purchase_model->get_p_id();
		$data['tonmoy'] = $this->purchase_model->get_vendor();
		$data['records'] = $this->product_model->get_all();
		$data['records_trn_requisitions'] = $this->product_model->get_all_trn_purchase_requisition();
		$data['records_mas_requisitions'] = $this->product_model->get_all_mas_purchase_requisition();
        $data['myview']="purchase/new_workorder_of_purchase_view.php";
        $this->load->view("template_client",$data);
	}
	
	public function add_workorder()
	{
		$this->load->model('purchase_model');
		$data['workorder_of_purchase_id'] = $this->purchase_model->max_workorder_of_purchase_id();
		$chkbox =  $this->input->post('chk');
		$txtbox = $this->input->post('txt');
		$country = $this->input->post('country');
		$x = $this->input->post('vendor');
		$y = $this->input->post('purchase');
		$this->purchase_model->insert_entry_new_workorder($data,$chkbox,$txtbox,$country,$x,$y);
		redirect("purchase_controller/add_workorder_page");
			
	}
	public function receive_page()
	{
		$this->load->model('purchase_model');
		$this->load->model('workorder_model');
		$this->load->model('product_model');
		$data['records_product_id'] = $this->product_model->get_all();
		$data['records_employee_id']=$this->workorder_model->employee_id();
		$data['tonmoy'] = $this->purchase_model->get_all_workorder();
                $data['myview']="purchase/receive_view.php";
                $this->load->view("template_client",$data);
	}
	public function receive_with_id()
	{
		$this->load->model('purchase_model');
		$this->load->model('workorder_model');
		$this->load->model('product_model');
		$data['records_product_id'] = $this->product_model->get_all();
		$data['records_employee_id']=$this->workorder_model->employee_id();
		$var1 = $this->input->post('catagory');
		if($var1 == "Receive From Employee")
		{
			redirect('purchase_controller/id_chara_receive');
		
		}
		$var2 = $this->input->post('workorder_id');
		$this->load->library('session');
		$this->session->set_userdata('naval',$var2);
		$data['list'] = $this->purchase_model->getWorkorder($var2);
		$data['myview']="purchase/receive_with_id_view.php";
        $this->load->view("template_client",$data);
		
	
	}
	public function id_chara_receive()
	{
		$this->load->model('purchase_model');
		$data['tonmoy'] = $this->purchase_model->getEmployee();
		$this->load->model('product_model');
		$data['records'] = $this->product_model->get_all();
		$data['myview']="purchase/employee_receive_view.php";
        $this->load->view("template_client",$data);
		
	}
	public function receive_koro_employee()
	{
                $this->load->model('purchase_model');
                $data['eid']= $this->input->post('employee');
                $chkbox =  $this->input->post('chk');
                $txtbox = $this->input->post('txt');
                $country = $this->input->post('country');
                $this->purchase_model->receive_korlam_employee($data,$chkbox,$txtbox,$country);
                redirect('purchase_controller/receive_page');
	}
	public function receive_koro()
	{
                $this->load->library('session');
                $id = $this->session->userdata('naval');
                $this->load->model('purchase_model');
                $this->purchase_model->receive_korlam($id);
                redirect('purchase_controller/receive_page');
	}
	function existing_requisitions()
	{
		$this->load->model('purchase_model');
		$this->load->model('workorder_model');
		$data['list']= $this->purchase_model->purchase();
		$data['records_employee_id']=$this->workorder_model->employee_id();
		$data['myview']="purchase/purchase_requisition_view.php";
                $this->load->view("template_client",$data);
	
	
	}
	function existing_requisitions_md()
	{
		$this->load->model('purchase_model');
		$this->load->model('workorder_model');
		$data['records_employee_id']=$this->workorder_model->employee_id();
		$data['list']= $this->purchase_model->purchase_md();
		$data['myview']="purchase/purchase_requisition_view.php";
                $this->load->view("template_client",$data);
	
	
	}
	function approved_requisitions()
	{
		$this->load->model('purchase_model');
		$data['list']= $this->purchase_model->purchase_store_keeper();
		$data['myview']="purchase/approved_purchase_requisition_view.php";
                $this->load->view("template_client",$data);
	
	
	}
	function approved_purchase_requisition_detail($id)
	{
		$this->load->library('session');
		$this->load->model('product_model');
		//$data['purchase_id']=$id;
		$this->load->model('purchase_model');
		$data['records_product_id'] = $this->product_model->get_all();
		$data['list']= $this->purchase_model->getDetail($id);
		//$data['myview']="purchase/purchase_requisition_detail_view.php";
                $this->load->view("purchase/approved_purchase_requisition_detail_view",$data);
	
	}
	function existing_workorder()
	{
            $this->load->model('purchase_model');
            $data['list'] = $this->purchase_model->existing_workorder_kaj();
            $data['myview']="purchase/workorder_of_purchase_view.php";
            $this->load->view("template_client",$data);
	}
	function approve_workorder()
	{
            $this->load->model('purchase_model');
            $data['list'] = $this->purchase_model->existing_workorder_kaj();
            $data['myview']="purchase/approve_workorder_of_purchase.php";
            $this->load->view("template_client",$data);
	}
	function workorder_approve_storemanager($id)
	{
		$this->load->model('purchase_model');
        $this->purchase_model->workorder_approval_store_manager($id);
        redirect("purchase_controller/approve_workorder");
	}
	function workorder_detail($id)
	{
            $this->load->model('purchase_model');
            $data['list'] = $this->purchase_model->detail_workorder_kaj($id);
            $this->load->view("purchase/workorder_of_purchase_detail_view",$data);
	
	}
	
}
