<?php

class Purchase_model extends CI_Model {

    function Registration_model()
    {
        parent::Model();
    }
	function insert_entry($data,$chkbox,$txtbox,$country,$brand_id,$rmkbox)
    {
            $this->load->library('session');
            $this->load->model('purchase_model');
            $this->load->model('product_model');
            $employee_id = $this->session->userdata('employee_id');
            $this->db->select_max('purchase_requisition_id');
            $q = $this->db->get('mas_purchase_requisition');
            $abc=$q->row();
            $id=$abc->purchase_requisition_id;
            $id+=1;
            $date = date("Y-m-d H:i:s");
            $data = array(
            'purchase_requisition_id' => $id,
            'status' =>0,
            'remarks' => " ",
            'requisition_date' => $date,
            'entry_by'=>$employee_id,
            'entry_date'=>$date,
			'update_by' => NULL,
			'update_date'=> NULL
            );

            $this->db->insert('mas_purchase_requisition', $data);

            foreach($txtbox as $a => $b)
            {
                $product_id=$this->product_model->get_product_id_var($country[$a]);
                $data = array(
                   'purchase_requisition_id' =>$data['purchase_requisition_id'] ,
                   'product_id' => $product_id,
                   'product_quantity' => $txtbox[$a],
                   'brand_id' =>$brand_id[$a],
                   'remarks'=>$rmkbox[$a]
                );
            $this->db->insert('trn_purchase_requisition', $data);                   
            }
            
        }
	function max_purchase_requisition_id()
	{
		$this->db->select_max('purchase_requisition_id');
        $q = $this->db->get('mas_purchase_requisition');
        if($q->num_rows() > 0) {

            foreach ($q->result() as $row) {
                    $data = $row->purchase_requisition_id;
            }
            return $data;
            }
	
	}
	
	
	function insert_entry_mas_purchase_requisition()
    {
			$this->db->select_max('purchase_requisition_id');
            $q = $this->db->get('mas_purchase_requisition');
			$abc=$q->row();
			$id=$abc->purchase_requisition_id;
			$id+=1;
			$req_date = date("Y-m-d H:i:s");
			$data = array(
               'purchase_requisition_id' => $id,
               'status' => 0,
			   'remarks' => $this->input->post('remarks', TRUE),
               'requisition_date' => $req_date
			   
            );

	$this->db->insert('mas_purchase_requisition', $data);
	$this->session->set_flashdata('id', $id);
	$data['id']=$id;
    return $data;
	}
	
	function purchase()
	{
		
		$this->db->select('*');
		$this->db->from('mas_purchase_requisition');
		$this->db->where('status','0');
		$q = $this->db->get();
		if($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                    $data[] = $row;
            }
            return $data;
            }
		

	}
	function purchase_md()
	{
		
		$this->db->select('*');
		$this->db->from('mas_purchase_requisition');
		$this->db->where('status','1');
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
		$this->db->from('trn_purchase_requisition');
		$this->db->where('purchase_requisition_id',$id);
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
		$this->db->from('mas_purchase_requisition');
		$this->db->where('purchase_requisition_id',$id);
		$this->db->where('status',"0");
		$q = $this->db->get();
		if($q->num_rows() > 0) {
          $data = array(
               'status' => 1
            );

		$this->db->where('purchase_requisition_id', $id);
		$this->db->update('mas_purchase_requisition', $data); 
            }
	}
	
	function update_approval_manager($id)
	{
		$this->db->select('*');
		$this->db->from('mas_purchase_requisition');
		$this->db->where('purchase_requisition_id',$id);
		$this->db->where('status',"1");
		$q = $this->db->get();
		if($q->num_rows() > 0) {
          $data = array(
               'status' => 2
            );

		$this->db->where('purchase_requisition_id', $id);
		$this->db->update('mas_purchase_requisition', $data); 
            }
	}
	function receive_korlam($id)
	{
	   $sql = "SELECT * FROM mas_workorder_of_purchase WHERE workorder_of_purchase_id = '$id' ";
       $query =$this->db->query($sql);
		if($query->num_rows() > 0) 
		{
			$b=$query->row();
			$vendorid=$b->vendor_id;
			$workorderid=$b->workorder_of_purchase_id;
			//transaction er kaj:
			$this->db->select_max('transaction_id');
			$this->db->from('mas_product_transaction');
			$q = $this->db->get();$a=$q->row();
			$id2 = $a->transaction_id;
			$id2=$id2+1;
			//insert into mas_product_transaction
			$data = array(
		   'transaction_id' => $id2
			);
			$this->db->insert('mas_product_transaction', $data);
			
			//insert into mas_receive
			
			$this->db->select_max('receive_id');
			$q = $this->db->get('mas_receive');
			$abc=$q->row();
			$idn=$abc->receive_id;
			$idn+=1;
			$this->load->library('session');
			$e_id = $this->session->userdata('employee_id');
			$data = array(
		   'receive_id' => $idn,
		   'received_by' => $e_id            
			);
			$this->db->insert('mas_receive', $data);
	
			foreach ($query->result() as $row) 
			{
					$unit_price_id="unit_price".$row->product_id;
					$notun_unit_price=$this->input->post($unit_price_id);
                    $productid = $row->product_id;
					$notun_product_quantity = $row->product_quantity;

					//product quantity update koro:
					
					$sql = "SELECT * FROM mas_product WHERE product_id = ".$productid;
					$query =$this->db->query($sql,$productid);
					$a=$query->row();
					$ager_product_quantity=($a->product_quantity);
					$product_quantity = ($notun_product_quantity + $ager_product_quantity);
					
					//unit price update koro:
					$ager_unit_price=$a->unit_price;
					$ager_temp=$ager_product_quantity*$ager_unit_price;
					$notun_temp=$notun_product_quantity*$notun_unit_price;
					$temp=$ager_temp+$notun_temp;
					$unit_price=(double)$temp/(double)$product_quantity;
					
					//akhon mas_product table update koro:
					
					$categoryid=$a->category_id;
					$prodname=$a->product_name;
					$rolevel=$a->reorder_level;
					$prod_details=$a->product_details;
					$remarks=$a->remarks;
					
					$data = array(
				    'product_id' => $productid,
				    'category_id' => $categoryid,
				    'product_name' => $prodname,
				    'product_quantity' => $product_quantity,
					'reorder_level' => $rolevel,
					'product_details' => $prod_details,
				    'unit_price' => $unit_price,
					'remarks' => $remarks
				    );
					$this->db->where('product_id', $productid);
					$this->db->update('mas_product', $data); 
	
					//insert into trn_receive
					
					$data = array(
				   'receive_id' => $idn,
				   'transaction_id' => $id2,
				   'product_id' => $productid,
				   'product_quantity' => $notun_product_quantity,
				   'unit_price' => $unit_price,
				   'balance_quantity' => $product_quantity
				   
				    );
					$this->db->insert('trn_receive', $data);
		
            }
			//mas_receive_from_vendor table e insert koro:
					
			$data = array(
		   'receive_id' => $idn,
		   'vendor_id' => $vendorid,
		   'workorder_of_purchase_id' => $workorderid,
		   'remarks' => " ",
			);
			$this->db->insert('mas_receive_from_vendor', $data);
			
			//trn_vendor table e insert koro:
			
			$date = date("Y-m-d H:i:s");
			$data = array(
		   'vendor_id' => $vendorid,
		   'workorder_of_purchase_id' => $workorderid,
		   'qos' =>" ",
		   'remarks' => " ",
		   'delivery_date' => $date
			);
			$this->db->insert('trn_vendor', $data);

                        //master workorder of purchase update
                    $data = array(
                        'status' =>"1"
                    );
                    $this->db->where('workorder_of_purchase_id',$workorderid );
                    $this->db->update('mas_workorder_of_purchase',$data);
			
        }
		else
		{
			echo "no data";
		
		}
	}
	
	function insert_workorder_entry()
    {
	
	$data = array(
               'purchase_requisition_id' => $this->input->post('purchase_requisition_id', TRUE),
			   'product_id' => $this->input->post('product_id', TRUE),
			   'workorder_of_purchase_id' => $this->input->post('workorder_of_purchase_id', TRUE),
			   'product_quantity' => $this->input->post('product_quantity', TRUE),
			   'vendor_id' => $this->input->post('vendor_id', TRUE),
			   'remarks' => $this->input->post('remarks', TRUE)
			   
            );
	//$v_data = array (
	//			
		//	);

	$this->db->insert('mas_workorder_of_purchase', $data);
    
	}
	
	function store_manager_approve($var1)
	{
			$id = $var1;
			$this->db->select('*');
			$this->db->from('mas_purchase_requisition');
			$this->db->where('purchase_requisition_id',$id);
			$q = $this->db->get();
			foreach ($q->result() as $row)
			{	$employee_id = $row->entry_by;
				$date = $row->entry_date;
			}
			
			$data = array(
            'purchase_requisition_id' => $id,
            'status' =>1,
            'remarks' => " ",
            'requisition_date' => $date,
            'entry_by'=>$employee_id,
            'entry_date'=>$date,
			'update_by' => NULL,
			'update_date'=> NULL
            );

			$this->db->where('purchase_requisition_id', $id);
			$this->db->update('mas_purchase_requisition', $data); 

	
	}
	function md_approve($var1)
	{
			$id = $var1;
			$this->db->select('*');
			$this->db->from('mas_purchase_requisition');
			$this->db->where('purchase_requisition_id',$id);
			$q = $this->db->get();
			foreach ($q->result() as $row)
			{	$employee_id = $row->entry_by;
				$date = $row->entry_date;
			}
			
			$data = array(
            'purchase_requisition_id' => $id,
            'status' =>2,
            'remarks' => " ",
            'requisition_date' => $date,
            'entry_by'=>$employee_id,
            'entry_date'=>$date,
			'update_by' => NULL,
			'update_date'=> NULL
            );

			$this->db->where('purchase_requisition_id', $id);
			$this->db->update('mas_purchase_requisition', $data); 

	
	}
	function purchase_store_keeper()
	{
		$this->db->select('*');
		$this->db->from('mas_purchase_requisition');
		$this->db->where('status','2');
		$q = $this->db->get();
		if($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                    $data[] = $row;
            }
            return $data;
            }
		
	
	}
	function get_vendor()
	{
		$this->db->select('vendor_id');
		$this->db->from('mas_vendor');
		$q = $this->db->get();
		if($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                    $data[] = $row;
            }
            return $data;
            }
	
	}
	function get_p_id()
	{
		$this->db->select('purchase_requisition_id');
		$this->db->from('mas_purchase_requisition');
		$this->db->where('status','2');
		$q = $this->db->get();
		if($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                    $data[] = $row;
            }
            return $data;
            }
	
	}
	function max_workorder_of_purchase_id()
	{
		$this->db->select_max('workorder_of_purchase_id');
        $q = $this->db->get('mas_workorder_of_purchase');
        if($q->num_rows() > 0) {

            foreach ($q->result() as $row) {
                    $data = $row->workorder_of_purchase_id;
            }
            return $data;
            }
	
	}
	function insert_entry_new_workorder($data,$chkbox,$txtbox,$country,$x,$y)
	{
		$this->db->select_max('workorder_of_purchase_id');
		$q = $this->db->get('mas_workorder_of_purchase');
		$abc=$q->row();
		$id=$abc->workorder_of_purchase_id;
		$id+=1;
		$employee_id = $this->session->userdata('employee_id');
		$date = date("Y-m-d H:i:s");
		foreach($txtbox as $a => $b)
		{
			$this->load->model('product_model');
			$product_id = $this->product_model->get_product_id_var($country[$a]);
			$data = array(
			   'purchase_requisition_id' => $y,
			   'product_id' => $product_id,
			   'workorder_of_purchase_id' => $id,
			   'product_quantity' => $txtbox[$a],
			   'status' =>"raised",
			   'vendor_id' => $x,
			   'remarks'=>" ",
			   'entry_by' => $employee_id,
			   'entry_date' => $date,
			   'update_by' => NULL,
			   'update_date' => NULL
			);
		$this->db->insert('mas_workorder_of_purchase', $data);                   
		}

	}
	function existing_workorder_kaj()
	{
		
		$q = $this->db->query('select distinct workorder_of_purchase_id, workorder_date, vendor_id, entry_by, entry_date,status, update_by, update_date from mas_workorder_of_purchase');
		if($q->num_rows() > 0) {

            foreach ($q->result() as $row) {
                    $data[] = $row;
            }
            return $data;
            }
	
	}
	function detail_workorder_kaj($id)
	{
		$this->db->select('*');
		$this->db->from('mas_workorder_of_purchase');
		$this->db->where('workorder_of_purchase_id',$id);
		$q = $this->db->get();
		if($q->num_rows() > 0) {

            foreach ($q->result() as $row) {
                    $data[] = $row;
            }
            return $data;
            }
	
	}
	function get_all_workorder()
	{
		$q = $this->db->query('select distinct workorder_of_purchase_id,status from mas_workorder_of_purchase');
		if($q->num_rows() > 0) {

            foreach ($q->result() as $row) {
                    $data[] = $row;
            }
            return $data;
            }
	
	}
	function getWorkorder($id)
	{
		$this->db->select('*');
		$this->db->from('mas_workorder_of_purchase');
		$this->db->where('workorder_of_purchase_id',$id);
		$q = $this->db->get();
		if($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                    $data[] = $row;
            }
            return $data;
            }
		
	
	}
	function getEmployee()
	{
		$this->db->select('employee_id');
		$this->db->from('mas_employee');
		$q = $this->db->get();
		if($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                    $data[] = $row;
            }
            return $data;
            }
	
	}
	function receive_korlam_employee($data,$chkbox,$txtbox,$country)
	{
		$employeeid = $this->input->post('employee');
		
		//transaction er kaj:
		
		$this->db->select_max('transaction_id');
		$this->db->from('mas_product_transaction');
		$q = $this->db->get();$a=$q->row();
		$id2 = $a->transaction_id;
		$id2=$id2+1;
		//insert into mas_product_transaction
		$data = array(
	   'transaction_id' => $id2
		);
		$this->db->insert('mas_product_transaction', $data);
		
		//insert into mas_receive
		
		$this->db->select_max('receive_id');
		$q = $this->db->get('mas_receive');
		$abc=$q->row();
		$idn=$abc->receive_id;
		$idn+=1;
		$this->load->library('session');
		$e_id = $this->session->userdata('employee_id');
		$data = array(
	   'receive_id' => $idn,
	   'received_by' => $e_id            
		);
		$this->db->insert('mas_receive', $data);

		foreach($txtbox as $x => $b)
		{
			$this->load->model('product_model');
			
			//mas_product table e update koro:
			
			$product_id = $this->product_model->get_product_id_var($country[$x]);
			$sql = "SELECT * FROM mas_product WHERE product_id = ?";
			$query =$this->db->query($sql,$product_id);
			$a=$query->row();
			$ager_product_quantity=($a->product_quantity);
			$myvar=(int)$txtbox[$x];
			$product_quantity = $ager_product_quantity + $myvar;
			$categoryid = $a->category_id;
			$prodname = $a->product_name;
			$rolevel = $a->reorder_level;
			$prodetails = $a->product_details;
			$unitprice = $a->unit_price;
			$remarks = $a->remarks;
			
			$data = array(
			'product_id' => $product_id,
			'category_id' => $categoryid,
			'product_name' => $prodname,
			'product_quantity' => $product_quantity,
			'reorder_level' => $rolevel,
			'product_details' => $prodetails,
			'unit_price' => $unitprice,
			'remarks' => $remarks
			);
			$this->db->where('product_id', $product_id);
			$this->db->update('mas_product', $data); 
			
			//trn receive e insert koro:
			
			$data = array(
		   'receive_id' => $idn,
		   'transaction_id' => $id2,
		   'product_id' => $product_id,
		   'product_quantity' => $txtbox[$x],
		   'unit_price' => $unitprice,
		   'balance_quantity' => $product_quantity
		   
			);
			$this->db->insert('trn_receive', $data);
			
			
	
		}
		
		//mas_receive_from_employee table e insert koro:
				
		$data = array(
	   'receive_id' => $idn,
	   'employee_id' => $employeeid,
	   'used_time' => 99999999
		);
		$this->db->insert('mas_receive_from_employee', $data);
	}
	function workorder_approval_store_manager($id)
	{
		$this->db->select('*');
		$this->db->from('mas_workorder_of_purchase');
		$this->db->where('workorder_of_purchase_id',$id);
		$this->db->where('status',"raised");
		$q = $this->db->get();
                if($q->num_rows() > 0) {
                 $data = array(
               'status' => "approved by Store Manager"
            );

		$this->db->where('workorder_of_purchase_id', $id);
		$this->db->update('mas_workorder_of_purchase', $data);
            }
	}
	
}
?>
