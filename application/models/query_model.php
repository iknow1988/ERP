<?php

class Query_model extends CI_Model {

    function issue() {

        $this->db->select('*');
        $this->db->from('mas_issue');
        $this->db->join('trn_issue', 'mas_issue.issue_id = trn_issue.issue_id');
        $q = $this->db->get();
        if($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                    $data[] = $row;
            }
            return $data;
            }
    }
    function department() {

   $q = $this->db->get('mas_department');
    if($q->num_rows() > 0)
    {
        foreach ($q->result() as $row)
        {
            $data[] = $row;
        }

    }
        return $data;
    }
    function service() {

        $this->db->select('*');
        $this->db->from('mas_service');
        $this->db->join('trn_service', 'mas_service.service_id = trn_service.service_id');
        $q = $this->db->get();
        if($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                    $data[] = $row;
            }
            return $data;
            }
    }
    function vendor() {

        $this->db->select('*');
        $this->db->from('mas_vendor');
        $this->db->join('trn_vendor', 'mas_vendor.vendor_id = trn_vendor.vendor_id');
        $this->db->join('mas_workorder_of_purchase', 'mas_vendor.vendor_id = mas_workorder_of_purchase.vendor_id');
        $q = $this->db->get();
        if($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                    $data[] = $row;
            }
            return $data;
            }
    }
    function client() {

        $this->db->select('*');
        $this->db->from('trn_client');
        $this->db->join('mas_client', 'trn_client.client_id = mas_client.client_id');
        $this->db->join('trn_service', 'trn_service.connection_id = trn_client.connection_id');
        $q = $this->db->get();
        if($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                    $data[] = $row;
            }
            return $data;
            }
    }
    function employee() {

        $this->db->select('*');
        $this->db->from('trn_employee');
        $this->db->join('mas_employee', 'mas_employee.employee_id = trn_employee.employee_id');
        $this->db->join('mas_department', 'mas_department.department_id = trn_employee.department_id');
        $this->db->join('mas_section', 'mas_section.section_id = trn_employee.section_id');
        $q = $this->db->get();
        if($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                    $data[] = $row;
            }
            return $data;
            }
    }
    function receive() {

        $this->db->select('*');
        $this->db->from('mas_product');
        $this->db->join('trn_receive', 'trn_receive.product_id = mas_product.product_id');
        //$this->db->join('mas_receive_from_vendor', 'mas_receive_from_vendor.receive_id = trn_receive.receive_id');
        //$this->db->join('mas_receive_from_employee', 'mas_receive_from_employee.receive_id = trn_receive.receive_id');
        $q = $this->db->get();
        if($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                    $data[] = $row;
            }
            return $data;
            }
    }
    function out() {

        $this->db->select('*');
        $this->db->from('mas_product');
        $this->db->join('trn_issue', 'trn_issue.product_id = mas_product.product_id');
        //$this->db->join('mas_receive_from_vendor', 'mas_receive_from_vendor.receive_id = trn_receive.receive_id');
        //$this->db->join('mas_receive_from_employee', 'mas_receive_from_employee.receive_id = trn_receive.receive_id');
        $q = $this->db->get();
        if($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                    $data[] = $row;
            }
            return $data;
            }
    }
    function transaction_1() {

        //$q=$this->db->query('SELECT * FROM trn_issue UNION SELECT * FROM trn_receive');
         $this->db->select('*');
         $this->db->from('mas_product_transaction');
         $this->db->join('trn_issue', 'mas_product_transaction.transaction_id = trn_issue.transaction_id','right outer');
         $q = $this->db->get();
         if($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                    $data[] = $row;
            }
            return $data;
            }
    }
    function transaction_2(){
         $this->db->select('*');
         $this->db->from('mas_product_transaction');
         $this->db->join('trn_receive', 'mas_product_transaction.transaction_id = trn_receive.transaction_id','right outer');
         $q = $this->db->get();
         if($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                    $data[] = $row;
            }
            return $data;
            }
    }
    function transaction_search_1($var) {

        //$q=$this->db->query('SELECT * FROM trn_issue UNION SELECT * FROM trn_receive');
         $this->db->select('*');
         $this->db->from('mas_product_transaction');
         $this->db->join('trn_issue', 'mas_product_transaction.transaction_id = trn_issue.transaction_id','right outer');
         $where="transaction_date between '".$var." 00:00:00' and '".$var." 23:23:59'";
         $this->db->where($where);
         $q = $this->db->get();
         if($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                    $data[] = $row;
            }
            return $data;
         }

    }
    function transaction_search_2($var){
         $this->db->select('*');
         $this->db->from('mas_product_transaction');
         $this->db->join('trn_receive', 'mas_product_transaction.transaction_id = trn_receive.transaction_id','right outer');
         $where="transaction_date between '".$var." 00:00:00' and '".$var." 23:23:59'";
         $this->db->where($where);
         $q = $this->db->get();
         if($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                    $data[] = $row;
            }
           return $data;
         }
    }
}

?>
