<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Workorder_controller extends CI_Controller {

    function index()
    {
        $this->load->library('session');
        $this->load->model('workorder_model');
        if ($this->input->post('submit'))
        {
            $this->load->model('workorder_model');
            $this->workorder_model->insert_entry();
            $data['myview']="workorder/add_workorder_view.php";
            $this->load->view("template_client",$data);
        }
        if ($this->input->post('create_order'))
        {
            $this->load->model('workorder_model');
            $data['records_client_id']=$this->workorder_model->client_id();
            $data['records_service_id']=$this->workorder_model->service_id();
            $data['myview']="workorder/create_workorder_view.php";
            $this->load->view("template_client",$data);
        }
        elseif ($this->input->post('create_workorder'))
        {
            $this->load->model('workorder_model');
            $this->load->library('form_validation');
            $config = array(
                array(
                    'field'   => 'client_id',
		    'label'   => 'client_id',
                        'rules'   => 'required'
				   ),
                array(
				   'field'   => 'service_id',
				   'label'   => 'service_id',
				   'rules'   => 'required'
				   ),
				array(
				   'field'   => 'workorder_date',
				   'label'   => 'workorder_date',
				   'rules'   => 'required'
				));
            $this->form_validation->set_rules($config);
            if ($this->form_validation->run() == FALSE)
            {
                $data['records_client_id']=$this->workorder_model->client_id();
                $data['records_service_id']=$this->workorder_model->service_id();
                $data['list']= $this->workorder_model->workorders();
                $data['myview']="workorder/create_workorder_view.php";
                $this->load->view("template_client",$data);
            }
            else {
                    $data=$this->workorder_model->insert_entry_mas_workorder_of_service();
                    redirect("workorder_controller");
            }
        }
        elseif ($this->input->post('approve'))
        {
            $employee=1;
            $manager=0;
            if($employee)
            {
                $id=$this->session->flashdata('id');
                $this->load->model('workorder_model');
                $data=$this->workorder_model->update_approval($id);
            }
            if($manager)
            {
                $id=$this->session->flashdata('id');
                $this->load->model('workorder_model');
                $data=$this->workorder_model->update_approval_manager($id);
            }
            redirect("product_controller/success");
        }
        else
        {
            $data['records_client_id']=$this->workorder_model->client_id();
            $data['records_service_id']=$this->workorder_model->service_id();
            $data['list']= $this->workorder_model->workorders();
            $data['myview']="workorder/create_workorder_view.php";
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

    public function workorders_1($id)
    {
        $this->load->library('pagination');
        $this->load->model('workorder_model');
        $data['list']= $this->workorder_model->workorders_1($id);
        $size= $this->workorder_model->workorders();
        $data['records_client_id']=$this->workorder_model->client_id();
        $data['records_service_id']=$this->workorder_model->service_id();
        $data['records_employee_id']=$this->workorder_model->employee_id();
        $config['base_url'] = 'http://localhost/isnontest/index.php//workorder_controller/workorders_1/';
        $config['total_rows'] = count($size);
        $config['per_page'] = '5';
        $config['num_links'] ='2';
        $this->pagination->initialize($config);
        $data['links']=$this->pagination->create_links();
        $data['myview']="workorder/workorder_total_view.php";
        $this->load->view("template_client",$data);

    }
       public function workorders()
    {
        $this->load->library('pagination');
        $this->load->model('workorder_model');
        $data['list']= $this->workorder_model->workorders_1(0);
        $size= $this->workorder_model->workorders();
        $data['records_client_id']=$this->workorder_model->client_id();
        $data['records_service_id']=$this->workorder_model->service_id();
        $data['records_employee_id']=$this->workorder_model->employee_id();
        $config['base_url'] = 'http://localhost/isnontest/index.php//workorder_controller/workorders_1/';
        $config['total_rows'] = count($size);
        $config['per_page'] = '5';
        $config['num_links'] ='2';
        $this->pagination->initialize($config);
        $data['links']=$this->pagination->create_links();
        $data['myview']="workorder/workorder_total_view.php";
        $this->load->view("template_client",$data);

    }
    function workorder_approve($id)
    {
        $this->load->model('workorder_model');
        $data=$this->workorder_model->update_approval_manager($id);
        redirect("workorder_controller/workorders");
    }
    public function workorder_detail($id)
    {
        $this->load->library('session');
        //$data['purchase_id']=$id;
        $this->load->model('workorder_model');
        $data['list']= $this->workorder_model->getDetail($id);
        //$data['myview']="purchase/purchase_requisition_detail_view.php";
        $this->load->view("workorder/workorder_detail_view",$data);

    }
    public function create_store_requisition_view()
    {
        $this->load->library('session');
        $data['myview']="workorder/new_store_requisition_view.php";
        $this->load->view("template_client",$data);

    }
    public function create_store_requisition()
    {
            $this->load->model('workorder_model');
            $data=$this->workorder_model->insert_entry_mas_store_requisition();
            redirect("workorder_controller");

    }
    public function add_product_to_store_requisition_view()
    {
            $this->load->library('session');
            $data['myview']="workorder/add_product_to_store_requisition_view.php";
            $this->load->view("template_client",$data);

    }
    public function add_product_to_store_requisition()
    {
            $this->load->library('session');
            $this->load->model('workorder_model');
            $this->workorder_model->insert_trn_store_requisition();
            $data['myview']="workorder/add_product_to_store_requisition_view.php";
            $this->load->view("template_client",$data);

    }
    public function store_requisitions()
    {
        $this->load->model('workorder_model');
        $data['records_client_id']=$this->workorder_model->client_id();
        $data['records_employee_id']=$this->workorder_model->employee_id();
        $data['list']= $this->workorder_model->store_requisitions();
        $data['myview']="workorder/store_requisition_total_view.php";
        $this->load->view("template_client",$data);
    }
    public function store_requisitions_store_manager()
    {
        $this->load->model('workorder_model');
        $data['records_client_id']=$this->workorder_model->client_id();
        $data['records_employee_id']=$this->workorder_model->employee_id();
        $data['list']= $this->workorder_model->store_requisitions_store_manager();
        $data['myview']="workorder/store_requisition_total_store_manager_view.php";
        $this->load->view("template_client",$data);
    }
    public function store_requisition_detail($id)
    {
            $this->load->library('session');
            //$data['purchase_id']=$id;
            $this->load->model('workorder_model');
            $this->load->model('product_model');
            $data['records_product_id'] = $this->product_model->get_all();
            $data['list']= $this->workorder_model->store_requisition_getDetail($id);
            //$data['myview']="purchase/purchase_requisition_detail_view.php";
            $this->load->view("workorder/store_requisition_detail_view",$data);

    }
    public function store_requisition_approve($id)
    {
        $this->load->model('workorder_model');
        $this->workorder_model->store_requisition_update_approval_manager($id);
        redirect("workorder_controller/store_requisitions");

    }
    public function store_requisition_disapprove($id)
    {
        $this->load->model('workorder_model');
        $workorder_id=$this->workorder_model->workorder_id_from_store_requisition_id($id);
        $this->workorder_model->update_workorder_status_disapprove($workorder_id);
        $this->workorder_model->store_requisition_update_disapproval_manager($id);
        redirect("workorder_controller/store_requisitions");

    }
    public function store_requisition_approve_store_manager($id)
    {
        $this->load->model('workorder_model');
        $this->workorder_model->store_requisition_update_approval_store_manager($id);
        redirect("workorder_controller/store_requisitions_store_manager");

    }
    public function approved_store_requisitions()
    {
        $this->load->model('workorder_model');
        $data['records_client_id']=$this->workorder_model->client_id();
        $data['records_employee_id']=$this->workorder_model->employee_id();
        $data['list']= $this->workorder_model->approved_store_requisitions();
        $data['myview']="workorder/approved_store_requisition_view.php";
        $this->load->view("template_client",$data);
    }
    //===================================
function store_requisition_office_use_view()
{    
        $this->load->model('product_model');
        $this->load->model('workorder_model');
        $data['records'] = $this->product_model->get_all();
        $id = $this->workorder_model->max_store_requisition_id();
        $data['store_requisition_id']=$id+1;
        $data['myview']="workorder/store_requisition_office_use_view.php";
        $this->load->view("template_client",$data);
}

function store_requisition_view($var)
{    
        $this->load->model('product_model');
        $this->load->model('workorder_model');
        $data['records'] = $this->product_model->get_all();
        $id = $this->workorder_model->max_store_requisition_id();
        $data['store_requisition_id']=$id+1;
        $data['workorder_of_service_id']=$var;
        $data['workorder']=$this->workorder_model->getDetail_workorder($var);
        $this->load->view("workorder/store_requisition_form_view",$data);
}
function store_requisition_edit_view($var)
{
            $this->load->library('session');
            $this->load->model('workorder_model');
            $id= $this->workorder_model->store_requisition_getDetail_from_workorder_id($var);
            $data['list']= $this->workorder_model->store_requisition_getDetail($id);
            $this->load->view("workorder/store_requisition_edit_view",$data);
}
function store_requisition_office_use_create()
{
    $this->load->library('form_validation');
    $config = array(
				array(
				   'field'   => 'store_requisition_date',
				   'label'   => 'store_requisition_date',
				   'rules'   => 'required'
				   ),
        array(
				   'field'   => 'store_requisition_date',
				   'label'   => 'store_requisition_date',
				   'rules'   => 'required'
				   ),
        array(
				   'field'   => 'txt[]',
				   'label'   => 'amount',
				   'rules'   => 'required'
				   ),
				array(
				   'field'   => 'country[]',
				   'label'   => 'name',
				   'rules'   => 'required'
				));
    $this->form_validation->set_rules($config);
    if ($this->form_validation->run() == FALSE)
    {
            redirect("workorder_controller/store_requisition_view/".$this->input->post('workorder_id'));
    }
    else 
    {
        $this->load->model('workorder_model');
        $data['store_requisition_id'] = $this->workorder_model->max_store_requisition_id();
        $chkbox =  $this->input->post('chk');
        $txtbox = $this->input->post('txt');
        $country = $this->input->post('country');
        $data['store_requisition_id']=$this->input->post('store_requisition_id');
        $data['remarks']=$this->input->post('remarks');
        $data['requisition_date']=$this->input->post('store_requisition_date');
        $data['expected_requisition_date']=$this->input->post('expected_requisition_date');
        $this->workorder_model->insert_entry_mas_store_requisition_office_use($data,$chkbox,$txtbox,$country);
        redirect("workorder_controller/store_requisition_office_use_view");
    }
}
function store_requisition_create()
{
    //$chkbox = $_POST['chk'];
    //$txtbox = $_POST['txt'];
    //$country = $_POST['country'];
    $this->load->library('form_validation');
    $config = array(
				array(
				   'field'   => 'store_requisition_date',
				   'label'   => 'store_requisition_date',
				   'rules'   => 'required'
				   ),
        array(
				   'field'   => 'store_requisition_date',
				   'label'   => 'store_requisition_date',
				   'rules'   => 'required'
				   ),
        array(
				   'field'   => 'txt[]',
				   'label'   => 'amount',
				   'rules'   => 'required'
				   ),
				array(
				   'field'   => 'country[]',
				   'label'   => 'name',
				   'rules'   => 'required'
				));
    $this->form_validation->set_rules($config);
    if ($this->form_validation->run() == FALSE)
    {
            redirect("workorder_controller/store_requisition_view/".$this->input->post('workorder_id'));
    }
    else {

    $this->load->model('workorder_model');
    $data['store_requisition_id'] = $this->workorder_model->max_store_requisition_id();
    $chkbox =  $this->input->post('chk');
    $txtbox = $this->input->post('txt');
    $country = $this->input->post('country');
    $data['store_requisition_id']=$this->input->post('store_requisition_id');
    $data['workorder_id']=$this->input->post('workorder_id');
    $data['remarks']=$this->input->post('remarks');
    $data['requisition_date']=$this->input->post('store_requisition_date');
    $data['expected_requisition_date']=$this->input->post('expected_requisition_date');
    $data['workorder']=$this->workorder_model->getDetail_workorder($this->input->post('workorder_id'));
    $this->workorder_model->update_workorder_status($this->input->post('workorder_id'));
    //$this->load->view("test2",$data);
    $this->workorder_model->insert_entry_mas_store_requisition($data,$chkbox,$txtbox,$country);
    }
}
    public function approved_store_requisitions_issue()
    {
        $this->load->model('workorder_model');
                $data['records_client_id']=$this->workorder_model->client_id();
        $data['records_employee_id']=$this->workorder_model->employee_id();
        $data['list']= $this->workorder_model->approved_store_requisitions_issue();
        $data['myview']="workorder/approved_store_requisition_issue_view.php";
        $this->load->view("template_client",$data);
    }
    public function issue_view($var)
    {
        $this->load->model('product_model');
        $this->load->model('workorder_model');
        $data['records'] = $this->product_model->get_all();
        $id = $this->workorder_model->max_issue_id();
        $data['issue_id']=$id+1;
        $data['store_requisition_id']=$var;
        $data['records_product_id'] = $this->product_model->get_all();
        $data['records_employee_id']=$this->workorder_model->employee_id();
        $data['store_requisition']=$this->workorder_model->store_requisition_mas_Detail($var);
        $data['trn_store_requisition']=$this->workorder_model->store_requisition_getDetail($var);
        $this->load->view("workorder/issue_view",$data);
    }
    function issue()
    {
        $this->load->model('workorder_model');
        $this->load->model('product_model');
        $var=$this->input->post('store_requisition_id', TRUE);
        //$chk=$this->input->post('chk', TRUE);
        $trn_store_requisition=$this->workorder_model->store_requisition_getDetail($var);
        foreach ($trn_store_requisition as $row)
        {
            $buttonid="chk".$row->product_id;
            if($this->input->post($buttonid))
            {
                $prodid="product_id".$row->product_id;
                $issued_item_id="issued_item".$row->product_id;
                $prod=$this->input->post($prodid);
                $issued_item=$this->input->post($issued_item_id);
                $asked=$this->input->post("product_quantity".$row->product_id);
                $issued=$this->input->post("issued_item".$row->product_id);
                $already_issued=$this->input->post("issued_quantity".$row->product_id);
                $store=$this->input->post('store_requisition_id', TRUE);
                if($asked==($issued+$already_issued))
                {
                    $status="complete";
                }
                else if($asked > $issued + $already_issued)
                {
                    $status="partial";
                }
                else
                {
                    $status="over";
                    redirect("workorder_controller/issue_view/".$this->input->post('store_requisition_id', TRUE) );

                }
                $this->workorder_model->update_trn_store_requisition_status($status,$prod,$issued);
                if($asked==($issued+$already_issued))
                {
                    $this->workorder_model->update_store_requisition_status_2($store);
                }
                $transaction_id=$this->workorder_model->max_transaction_id();
                $transaction_id=$transaction_id+1;
                $balance=$this->product_model->get_product_balance($prod);
                $this->workorder_model->insert_mas_issue();
                $issue_date=date("Y-m-d H:i:s");
                $data = array(
                    'transaction_id' =>$transaction_id,
                    'transaction_date' => $issue_date
                );
                $this->workorder_model->insert_mas_product_transaction($data);
                $asked_quantity=$this->input->post("product_quantity".$row->product_id);
                $data = array(
                'issue_id' => $this->input->post('issue_id'),
                'transaction_id' =>$transaction_id,
                'product_id' => $prod,
                'product_quantity' => $this->input->post("issued_item".$row->product_id),
                'issue_date' => $issue_date,
                'balance_quantity' => $balance,
                'status'=>$status,
                'remarks'=>$this->input->post('remarks'.$row->product_id)
                );
                $this->workorder_model->insert_trn_issue($data);
                $this->product_model->dec_balance($prod,$issued);
            }
        }
                redirect("workorder_controller/issue_view/".$this->input->post('store_requisition_id', TRUE) );
    }
}
?>