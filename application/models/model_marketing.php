
<?php
    class Model_marketing extends CI_Model {

    var $title   = '';
    var $content = '';
    var $date    = '';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function get_workorder()
    {
        $query=$this->db->query("SELECT workorder_of_service_id,
                                        client_id,
                                        employee_id,
                                        service_id
                                   FROM mas_workorder_of_service
                                  ");
        return $query;
    }

    function detail_workorder($workid)
    {
        $query=$this->db->query("SELECT *
                                   FROM mas_workorder_of_service
                                   WHERE workorder_of_service_id=$workid");
        return $query;
    }
    function detail_workorder_product($workproductid)
    {
          $query=$this->db->query("SELECT *
                                    FROM trn_workorder_of_service
                                    WHERE workorder_of_service_id=$workproductid");
         return $query;
    }
    function add_storereq($workid)
    {
          $query=$this->db->query("SELECT *
                                   FROM mas_workorder_of_service
                                   WHERE workorder_of_service_id=$workid");
        return $query;
    }
     function add_storereq_product($workproductid)
    {
          $query=$this->db->query("SELECT *
                                    FROM trn_workorder_of_service
                                    WHERE workorder_of_service_id=$workproductid");
         return $query;
    }
    function dummy($id)
    {
         $query=$this->db->query("SELECT *
                                    FROM mas_workorder_of_service
                                    WHERE workorder_of_service_id=$id");
         return $query;
    }
    function insert_to_mas_store_requisition($max_strq,$wid,$clientid,$employeeid)
    {//change
        $data["store_requisition_id"]=$max_strq;
        $data["workorder_of_service_id"]=$wid;
        $data["client_id"]=$clientid;
        $data["employee_id"]=$employeeid;
        $data["entry_by"]=$employeeid;
        $data["update_by"]=$employeeid;
        $this->db->insert('mas_store_requisition',$data);
        // return $query;
    }
    function max_store_req()
    {
        $query=$this->db->query("SELECT store_requisition_id
                                   FROM mas_store_requisition
                                   ORDER BY store_requisition_id");
         return $query;
    }
     function get_product_id($work_id)
    {
        $query=$this->db->query("SELECT *
                                   FROM trn_workorder_of_service
                                   WHERE workorder_of_service_id=$work_id
                                   ");
         return $query;
    }
    function  insert_to_trn_storereq($store_id,$product,$quantity,$remk)
    {
        $data["store_requisition_id"]=$store_id;
        $data["product_id"]=$product;
        $data["product_quantity"]=$quantity;
        $data["remarks"]=$remk;

        $this->db->insert('trn_store_requisition',$data);
    }

    function  get_prodcut_id()
    {
        $query=$this->db->query("SELECT *
                                   FROM mas_product
                                   ");
         return $query;
    }
    function get_client_id()
    {
        $query=$this->db->query("SELECT client_id
                                   FROM mas_client
                                   ");
         return $query;
    }
    function max_work_id()
    {
        $query=$this->db->query("SELECT workorder_of_service_id
                                   FROM mas_workorder_of_service
                                   ORDER BY workorder_of_service_id");
         return $query;
    }
    function inset_to_mas_work_order_service($max_work_id,$get_cid,$eid,$serviceid,$entryid,$update_id)
    {
        $data["workorder_of_service_id"]=$max_work_id;
        $data["client_id"]=$get_cid;
        $data["employee_id"]=$eid;
        $data["service_id"]=$serviceid;
         $data["entry_by"]=$entryid;
        $data["update_by"]=$update_id;
       
        $this->db->insert('mas_workorder_of_service',$data);
    }
    function inset_to_trn_work_order_service($max_work_id,$productid,$pquantity,$remarks)
    {
        $data["workorder_of_service_id"]=$max_work_id;
        $data["product_id"]=$productid;
        $data["product_quantity"]=$pquantity;
        $data["remarks"]=$remarks;
        // $data["entry_by"]=$entryid;
        //$data["update_by"]=$update_id;

        $this->db->insert('trn_workorder_of_service',$data);
    }

}
?>