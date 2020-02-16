<?php

class Workorder_model extends CI_Model {

    function Registration_model()
    {
        parent::Model();
    }
    function client_id()
    {

        $this->db->select('*');
        $this->db->from('mas_client');
        $q = $this->db->get();
        if($q->num_rows() > 0)
        {
            foreach ($q->result() as $row)
            {
                $data[] = $row;
            }
            return $data;
        }
    }
    function service_id()
    {

        $this->db->select('*');
        $this->db->from('mas_service');
        $q = $this->db->get();
        if($q->num_rows() > 0)
        {
            foreach ($q->result() as $row)
            {
                $data[] = $row;
            }
            return $data;
        }
    }
    function employee_id()
    {

        $this->db->select('*');
        $this->db->from('mas_employee');
        $q = $this->db->get();
        if($q->num_rows() > 0)
        {
            foreach ($q->result() as $row)
            {
                $data[] = $row;
            }
            return $data;
        }
    }
        function employee_details()
    {

        $this->db->select('*');
        $this->db->from('mas_employee');
        $this->db->join('trn_employee', 'mas_employee.employee_id = trn_employee.employee_id');
        $this->db->join('mas_department', 'trn_employee.department_id = mas_department.department_id');
        $q = $this->db->get();
        if($q->num_rows() > 0)
        {
            foreach ($q->result() as $row)
            {
                $data[] = $row;
            }
            return $data;
        }
    }
    function insert_entry()
    {
	$data = array(
               'workorder_of_service_id' => $this->input->post('wokorder_of_service_id', TRUE),
               'product_id' => $this->input->post('product_id', TRUE),
               'product_quantity' => $this->input->post('product_quantity', TRUE),
               'remarks' => $this->input->post('remarks', TRUE)
            );

	$this->db->insert('trn_workorder_of_service', $data);

    }


	function insert_entry_mas_workorder_of_service()
        {
            $this->load->library('session');
            $employee_id = $this->session->userdata('employee_id');
            $this->db->select_max('workorder_of_service_id');
            $q = $this->db->get('mas_workorder_of_service');
            $abc=$q->row();
            $id=$abc->workorder_of_service_id;
            $id+=1;
            $workorder_date = date("Y-m-d H:i:s");
            $entry_date = date("Y-m-d H:i:s");
            $data = array(
                'workorder_of_service_id' => $id,
                'client_id' => $this->input->post('client_id', TRUE),
                'employee_id' => $employee_id,
                'service_id' => $this->input->post('service_id', TRUE),
                'workorder_date' => $this->input->post('workorder_date', TRUE),
                'remarks' => $this->input->post('remarks', TRUE),
                'status' =>'pending',
                'entry_by' => $employee_id,
                'entry_date' => $entry_date
            );

            $this->db->insert('mas_workorder_of_service', $data);
            $this->session->set_flashdata('id', $id);
            $data['id']=$id;
            return $data;
            }

	function workorders_1($id)
	{

            //$this->db->select('*');
            //$this->db->from('mas_workorder_of_service');
            $q = $this->db->query("select * from mas_workorder_of_service limit $id,5");
            if($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                    $data[] = $row;
            }
            return $data;
            }


	}
        function workorders()
	{

            $this->db->select('*');
            $this->db->from('mas_workorder_of_service');
            $q = $this->db->get();
            if($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                    $data[] = $row;
            }
            return $data;
            }


	}
	function getDetail($id)
	{
		$this->db->select('*');
		$this->db->from('trn_workorder_of_service');
		$this->db->where('workorder_of_service_id',$id);
		$q = $this->db->get();
		if($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                    $data[] = $row;
            }
            return $data;
            }
	}


	function update_approval($id)
	{
		$this->db->select('*');
		$this->db->from('mas_workorder_of_service');
		$this->db->where('workorder_of_service_id',$id);
		$this->db->where('status',"0");
		$q = $this->db->get();
		if($q->num_rows() > 0) {
                $data = array(
               'status' => 1
            );

		$this->db->where('workorder_of_service_id', $id);
		$this->db->update('mas_workorder_of_service', $data);
            }
	}

	function update_approval_manager($id)
	{
		$this->db->select('*');
		$this->db->from('mas_workorder_of_service');
		$this->db->where('workorder_of_service_id',$id);
		$this->db->where('status',"pending");
		$q = $this->db->get();
		if($q->num_rows() > 0) {
                 $data = array(
               'status' =>"approved"
            );

		$this->db->where('workorder_of_service_id', $id);
		$this->db->update('mas_workorder_of_service', $data);
            }
	}
    function insert_trn_store_requisition()
    {

	$data = array(
               'store_requisition_id' => $this->input->post('wokorder_of_service_id', TRUE),
               'product_id' => $this->input->post('product_id', TRUE),
               'product_quantity' => $this->input->post('product_quantity', TRUE),
               'remarks' => $this->input->post('remarks', TRUE)
            );

	$this->db->insert('trn_store_requisition', $data);

    }
	function store_requisitions()
	{

            $this->db->select('*');
            $this->db->from('mas_store_requisition');
            $q = $this->db->get();
            if($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                    $data[] = $row;
            }
            return $data;
            }


	}
        function store_requisitions_store_manager()
	{

            $this->db->select('*');
            $this->db->from('mas_store_requisition');
            $q = $this->db->get();
            if($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                    $data[] = $row;
            }
            return $data;
            }


	}
	function store_requisition_getDetail($id)
	{
            $this->db->select('*');
            $this->db->from('trn_store_requisition');
            $this->db->where('store_requisition_id',$id);
            $q = $this->db->get();
            if($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                    $data[] = $row;
            }
            return $data;
            }
	}
        function store_requisition_getDetail_from_workorder_id($id)
	{
            $this->db->select('store_requisition_id');
            $this->db->from('mas_store_requisition');
            $this->db->where('workorder_of_service_id',$id);
            $q = $this->db->get();
            if($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                    $data = $row->store_requisition_id;
            }
            return $data;
            }
	}
        function workorder_id_from_store_requisition_id($id)
	{
            $this->db->select('workorder_of_service_id');
            $this->db->from('mas_store_requisition');
            $this->db->where('store_requisition_id',$id);
            $q = $this->db->get();
            if($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                    $data = $row->workorder_of_service_id;
            }
            return $data;
            }
	}
	function store_requisition_mas_Detail($id)
	{
            $this->db->select('*');
            $this->db->from('mas_store_requisition');
            $this->db->where('store_requisition_id',$id);
            $q = $this->db->get();
            if($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                    $data[] = $row;
            }
            return $data;
            }
	}
	function store_requisition_update_approval($id)
	{
		$this->db->select('*');
		$this->db->from('mas_store_requisition');
		$this->db->where('store_requisition_id',$id);
		$this->db->where('status',"0");
		$q = $this->db->get();
		if($q->num_rows() > 0) {
                $data = array(
               'status' => 1
            );

		$this->db->where('store_requisition_id', $id);
		$this->db->update('mas_store_requisition', $data);
            }
	}

	function store_requisition_update_approval_manager($id)
	{
		$this->db->select('*');
		$this->db->from('mas_store_requisition');
		$this->db->where('store_requisition_id',$id);
		$this->db->where('status',"pending");
		$q = $this->db->get();
                if($q->num_rows() > 0) {
                 $data = array(
               'status' => "approved by Marketing Supervisor"
            );

		$this->db->where('store_requisition_id', $id);
		$this->db->update('mas_store_requisition', $data);
            }
	}
	function store_requisition_update_disapproval_manager($id)
	{
		$this->db->select('*');
		$this->db->from('mas_store_requisition');
		$this->db->where('store_requisition_id',$id);
		$this->db->where('status',"pending");
		$q = $this->db->get();
                if($q->num_rows() > 0) {
                 $data = array(
               'status' => "Dismissed"
            );

		$this->db->where('store_requisition_id', $id);
		$this->db->update('mas_store_requisition', $data);
            }
	}
        function store_requisition_update_approval_store_manager($id)
	{
		$this->db->select('*');
		$this->db->from('mas_store_requisition');
		$this->db->where('store_requisition_id',$id);
		$this->db->where('status',"approved by Marketing Supervisor");
		$q = $this->db->get();
                if($q->num_rows() > 0) {
                 $data = array(
               'status' => "approved by Store Manager"
            );

		$this->db->where('store_requisition_id', $id);
		$this->db->update('mas_store_requisition', $data);
            }
	}
	function approved_store_requisitions()
	{
            $this->load->library('session');
            $employee_id = $this->session->userdata('employee_id');
            $this->db->select('*');
            $this->db->from('mas_store_requisition');
            $this->db->where('status',!"pending");
            $this->db->where('employee_id',$employee_id);
            $q = $this->db->get();
            if($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                    $data[] = $row;
            }
            return $data;
            }

	}
	function approved_store_requisitions_issue()
	{
            $this->db->select('*');
            $this->db->from('mas_store_requisition');
            $this->db->where('status',!"pending");
            $q = $this->db->get();
            if($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                    $data[] = $row;
            }
            return $data;
            }

	}

    //============================================
    function max_store_requisition_id() {

        $this->db->select_max('store_requisition_id');
        $q = $this->db->get('mas_store_requisition');
        if($q->num_rows() > 0) {

            foreach ($q->result() as $row) {
                    $data = $row->store_requisition_id;
            }
            return $data;
            }
    }
     function max_issue_id() {

        $this->db->select_max('issue_id');
        $q = $this->db->get('mas_issue');
        if($q->num_rows() > 0) {

            foreach ($q->result() as $row) {
                    $data = $row->issue_id;
            }
            return $data;
            }
    }
     function max_transaction_id() {

        $this->db->select_max('transaction_id');
        $q = $this->db->get('mas_product_transaction');
        if($q->num_rows() > 0) {

            foreach ($q->result() as $row) {
                    $data = $row->transaction_id;
            }
            return $data;
            }
    }
    function insert_entry_mas_store_requisition($data,$chkbox,$txtbox,$country)
    {
            $this->load->library('session');
            $this->load->model('workorder_model');
            $this->load->model('product_model');
            $employee_id = $this->session->userdata('employee_id');
            $this->db->select_max('store_requisition_id');
            $q = $this->db->get('mas_store_requisition');
            $abc=$q->row();
            $id=$abc->store_requisition_id;
            $id+=1;
            $workorder_date = date("Y-m-d H:i:s");
            $client_id=$this->workorder_model->get_client_id($data['workorder_id']);
            $data = array(
            'store_requisition_id' => $data['store_requisition_id'],
            'workorder_of_service_id' =>$data['workorder_id'],
            'requisition_type'=>"client use",
            'client_id' => $client_id,
            'employee_id' => $employee_id,
            'status' =>'pending',
            'remarks' => $data['remarks'],
            'requisition_date' => $data['requisition_date'],
            'expected_requisition_date' => $data['expected_requisition_date'],
            'final_status' => '0',
            'entry_by'=>$employee_id,
            'entry_date'=>$workorder_date
            );

            $this->db->insert('mas_store_requisition', $data);

            foreach($txtbox as $a => $b)
            {
                $product_id=$this->product_model->get_product_id_var($country[$a]);
                $data = array(
                   'store_requisition_id' =>$data['store_requisition_id'] ,
                   'product_id' => $product_id,
                   'product_quantity' => $txtbox[$a],
                   'issued_quantity' => 0,
                   'status'=>"not issued"
                );
            $this->db->insert('trn_store_requisition', $data);                   
            }
            //echo " $country[$a] - $txtbox[$a]  - <br />";
        }
        function insert_entry_mas_store_requisition_office_use($data,$chkbox,$txtbox,$country)
        {
            $this->load->library('session');
            $this->load->model('workorder_model');
            $this->load->model('product_model');
            $employee_id = $this->session->userdata('employee_id');
            $this->db->select_max('store_requisition_id');
            $q = $this->db->get('mas_store_requisition');
            $abc=$q->row();
            $id=$abc->store_requisition_id;
            $id+=1;
            $workorder_date = date("Y-m-d H:i:s");
            $data = array(
            'store_requisition_id' => $data['store_requisition_id'],
            'requisition_type'=>"office use",
            'employee_id' => $employee_id,
            'status' =>'pending',
            'remarks' => $data['remarks'],
            'requisition_date' => $data['requisition_date'],
            'expected_requisition_date' => $data['expected_requisition_date'],
            'final_status' => '0',
            'entry_by'=>$employee_id,
            'entry_date'=>$workorder_date
            );

            $this->db->insert('mas_store_requisition', $data);

            foreach($txtbox as $a => $b)
            {
                $product_id=$this->product_model->get_product_id_var($country[$a]);
                $data = array(
                   'store_requisition_id' =>$data['store_requisition_id'] ,
                   'product_id' => $product_id,
                   'product_quantity' => $txtbox[$a],
                   'issued_quantity' => 0,
                   'status'=>"not issued"
                );
            $this->db->insert('trn_store_requisition', $data);                   
            }
            //echo " $country[$a] - $txtbox[$a]  - <br />";
        }
	function getDetail_workorder($id)
	{
            $this->db->select('*');
            $this->db->from('mas_workorder_of_service');
            $this->db->where('workorder_of_service_id',$id);
            $q = $this->db->get();
            if($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                    $data[] = $row;
            }
            return $data;
            }
	}
        function get_client_id($var)
        {
            $this->db->select('client_id');
            $this->db->from('mas_workorder_of_service');
            $this->db->where('workorder_of_service_id',$var);
            $q = $this->db->get();
            if($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                    $data = $row->client_id;
            }
            return $data;
            }
	}
        function insert_trn_issue($data)
        {
           $this->db->insert('trn_issue',$data);
	}
        function insert_mas_product_transaction($data)
        {
           $this->db->insert('mas_product_transaction',$data);
	}
       function insert_mas_issue()
        {
            $this->load->library('session');
            $employee_id = $this->session->userdata('employee_id');

            $data = array(
                   'issue_id' => $this->input->post('issue_id', TRUE),
                   'store_requisition_id' => $this->input->post('store_requisition_id', TRUE),
                   'employee_id' => $this->input->post('employee_id', TRUE),
                   'status' => "incomplete",
                   'entry_by' => $employee_id
                );
            $this->db->select('*');
            $this->db->from('mas_issue');
            $this->db->where('issue_id',$this->input->post('issue_id', TRUE));
            $q = $this->db->get();
            if($q->num_rows()==0)
            {
                $this->db->insert('mas_issue', $data);
            }

        }
        function update_trn_store_requisition_status($status,$prod,$c)
        {
            $this->db->select('*');
            $this->db->from('trn_store_requisition');
            $this->db->where('store_requisition_id',$this->input->post('store_requisition_id', TRUE));
            $this->db->where('product_id',$prod );
            $q = $this->db->get();
            if($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                    $data = $row->issued_quantity;
            }
            $this->db->where('store_requisition_id',$this->input->post('store_requisition_id', TRUE) );
            $this->db->where('product_id',$prod );
            $data = array(
                   'status' =>$status,
                   'issued_quantity'=>$c+$data
                );
            $this->db->update('trn_store_requisition',$data);
            }
        }
        function update_workorder_status($var)
        {
            $data = array(
                   'status' =>"store requisition forwarded"
                );
           $this->db->where('workorder_of_service_id',$var );
           $this->db->update('mas_workorder_of_service',$data);
        }
        function update_workorder_status_disapprove($var)
        {
            $data = array(
                   'status' =>"approved"
                );
           $this->db->where('workorder_of_service_id',$var );
           $this->db->update('mas_workorder_of_service',$data);
        }
        function update_store_requisition_status_2($var)
        {
            $id=2;
            $this->db->select('*');
            $this->db->from('trn_store_requisition');
            $this->db->where('store_requisition_id',$var);
            $q = $this->db->get();
            if($q->num_rows() > 0) {
                foreach ($q->result() as $row)
                {
                    if($row->status!="complete")
                    {
                        $id=1;
                    }
                }
            }
            if($id==2)
            {
                $data = array(
                    'status' =>"issued"
                );
                $this->db->where('store_requisition_id',$var );
                $this->db->update('mas_store_requisition',$data);
            }

        }
}
?>
