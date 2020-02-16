<?php

class Product_model extends CI_Model {

    function get_all() {
    $q = $this->db->get('mas_product');
    if($q->num_rows() > 0)
    {
        foreach ($q->result() as $row)
        {
            $data[] = $row;
        }

    }
        return $data;
    }
	
	function get_all_trn_purchase_requisition() {
    $q = $this->db->get('trn_purchase_requisition');
    if($q->num_rows() > 0)
    {
        foreach ($q->result() as $row)
        {
            $data[] = $row;
        }

    }
        return $data;
    }
	
		function get_all_mas_purchase_requisition() {
    $q = $this->db->get('mas_purchase_requisition');
    if($q->num_rows() > 0)
    {
        foreach ($q->result() as $row)
        {
            $data[] = $row;
        }

    }
        return $data;
    }
	
    function get_details($var) {

        $this->db->select('*');
        $this->db->from('mas_product');
        $this->db->where('product_id',$var);
        $q = $this->db->get();
        if($q->num_rows() > 0)
        {
            foreach ($q->result() as $row)
            {
                $data[] = $row;
            }

        }
            return $data;
        }
    function get_product_balance($var) {

        $this->db->select('product_quantity');
        $this->db->from('mas_product');
        $this->db->where('product_id',$var);
        $q = $this->db->get();
        if($q->num_rows() > 0)
        {
            foreach ($q->result() as $row)
            {
                $data = $row->product_quantity;
            }
            return $data;
        }
    }
    function dec_balance($prod,$issued)
    {
        $this->db->select('product_quantity');
        $this->db->from('mas_product');
        $this->db->where('product_id',$prod);
        $q = $this->db->get();
        if($q->num_rows() > 0)
        {
            foreach ($q->result() as $row)
            {
                $q = $row->product_quantity;
            }
        }
        $data = array(
            'product_quantity' =>$q-$issued
        );
        $this->db->where('product_id',$prod );
        $this->db->update('mas_product',$data);

    }
    function product_report($var) {

        $name=$var['name'];
        $id=$var['id'];
        if($id==null &&$name!=null )
        $q = $this->db->query("SELECT * FROM mas_product where product_name like '%$name%'");
        else if($name==null && $id!=null)
        $q = $this->db->query("SELECT * FROM mas_product where product_id like '%$id%'");
        else if($id!=null && $name != null)
        $q = $this->db->query("SELECT * FROM mas_product where product_name like '%$name%' AND product_id like '%$id%'");
        else
        {
            $q = $this->db->query("SELECT * FROM mas_product where product_name like '%$name%' OR product_id like '%$id%'");
        }
        if($q->num_rows() > 0)
        {
            foreach ($q->result() as $row)
            {
                $data[] = $row;
            }
            return $data;

        }
    }
    function issue_report($var) {           
        $frm=$var['frm'];
        $to=$var['to'];
        $department=$var['department'];
        //echo $frm;
        //echo $to;
        //echo $department;
        if($frm==null && $to==null && $department=="Choose" )
        {
            $q = $this->db->query("SELECT * FROM mas_issue, trn_issue WHERE mas_issue.issue_id = trn_issue.issue_id");
        }
        else if($frm==null && $to==null && $department !="Choose" )
        {
            $q = $this->db->query("SELECT * FROM mas_issue, trn_issue, trn_employee, mas_department WHERE mas_issue.issue_id = trn_issue.issue_id AND mas_issue.employee_id = trn_employee.employee_id AND mas_department.department_id =  '$department' AND trn_employee.department_id= '$department'");
        }
        else if($frm==null && $to!=null && $department=="Choose" )
        {
            $q = $this->db->query("SELECT * FROM mas_issue, trn_issue WHERE mas_issue.issue_id = trn_issue.issue_id AND trn_issue.issue_date BETWEEN '".$to." 00:00:00' and '".$to." 23:23:59'");
        
        }
        else if($frm==null && $to!=null && $department!="Choose" )
        {
            $q = $this->db->query("SELECT * FROM mas_issue, trn_issue, trn_employee, mas_department WHERE mas_issue.issue_id = trn_issue.issue_id AND mas_issue.employee_id = trn_employee.employee_id AND mas_department.department_id =  '$department' AND trn_employee.department_id= '$department' AND trn_issue.issue_date BETWEEN '".$to." 00:00:00' and '".$to." 23:23:59'");     
        }
        else if($frm!=null && $to==null && $department=="Choose" )
        {
            $q = $this->db->query("SELECT * FROM mas_issue, trn_issue WHERE mas_issue.issue_id = trn_issue.issue_id AND trn_issue.issue_date BETWEEN '".$frm." 00:00:00' and '".$frm." 23:23:59'");
                 
        }
        else if($frm!=null && $to==null && $department!="Choose")
        {
            $q = $this->db->query("SELECT * FROM mas_issue, trn_issue, trn_employee, mas_department WHERE mas_issue.issue_id = trn_issue.issue_id AND mas_issue.employee_id = trn_employee.employee_id AND mas_department.department_id =  '$department' AND trn_employee.department_id= '$department' AND trn_issue.issue_date BETWEEN '".$frm." 00:00:00' and '".$frm." 23:23:59'");                      
        }
        else if($frm!=null && $to!=null && $department=="Choose" )
        {
            $q = $this->db->query("SELECT * FROM mas_issue, trn_issue WHERE mas_issue.issue_id = trn_issue.issue_id AND trn_issue.issue_date BETWEEN '".$frm." 00:00:00' and '".$to." 23:23:59'");       
        }
        else
        {
            $q = $this->db->query("SELECT * FROM mas_issue, trn_issue, trn_employee, mas_department WHERE mas_issue.issue_id = trn_issue.issue_id AND mas_issue.employee_id = trn_employee.employee_id AND mas_department.department_id =  '$department' AND trn_employee.department_id= '$department' AND trn_issue.issue_date BETWEEN '".$frm." 00:00:00' and '".$to." 23:23:59'");                      
        }
         if($q->num_rows() > 0)
         {
            foreach ($q->result() as $row) {
                    $data[] = $row;
         }
            return $data;
            }
    }    
    function get_product_id() {
		$this->db->select('product_id');
		$this->db->from('mas_product');
		$q = $this->db->get();
		if($q->num_rows() > 0) {
			foreach ($q->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}

	}
        function insert($data) {
            
           $this->db->insert('mas_product',$data);

	}
        function max_product_id() {

            $this->db->select_max('product_id');
            $q = $this->db->get('mas_product');
            if($q->num_rows() > 0) {

                foreach ($q->result() as $row) {
                        $data = $row->product_id;
                }
                return $data;
		}
	}

        //====================================
    function get_product_id_var($var) {

        $this->db->select('*');
        $this->db->from('mas_product');
        $this->db->where('product_name',$var);
        $q = $this->db->get();
        if($q->num_rows() > 0)
        {
            foreach ($q->result() as $row)
            {
                $data = $row->product_id;
            }
            return $data;
        }
        }
}

?>
