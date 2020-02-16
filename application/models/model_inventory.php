
<?php
    class Model_inventory extends CI_Model {

    var $title   = '';
    var $content = '';
    var $date    = '';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }


    function get_storereq()
    {
        $query=$this->db->query("SELECT store_requisition_id,
                                        workorder_of_service_id,
                                        client_id,
                                        requisition_date
                                   FROM mas_store_requisition
                                   WHERE status!='2'
                                  ");
        return $query;
    }
    function detail_storereq($sreqid)
    {
        $query=$this->db->query("SELECT *
                                   FROM mas_store_requisition
                                   WHERE store_requisition_id=$sreqid");
        return $query;
    }
     function detail_storereq_product($reqproductid)
    {
          $query=$this->db->query("SELECT *
                                    FROM trn_store_requisition
                                    WHERE store_requisition_id=$reqproductid");
         return $query;
    }
    function approve_storereq_model($sreqid,$sts)
    {
      
         $query=$this->db->query("UPDATE mas_store_requisition 
                                    SET status=$sts
                                    WHERE store_requisition_id =$sreqid");
      
    }
    function get_storereq_approved()
    {
       /* $query=$this->db->query("SELECT distinct (mas_store_requisition.store_requisition_id),mas_store_requisition.requistion_date,
                                    mas_store_requisition.status,trn_store_requisition.product_id,
                                    trn_store_requisition.product_quantity,trn_store_requisition.remarks
                                    FROM mas_store_requisition,trn_store_requisition
                                   WHERE mas_store_requisition.store_requisition_id=trn_store_requisition.store_requisition_id AND mas_store_requisition.status!='NULL'");

    */
       $query=$this->db->query("SELECT *
                                   FROM mas_store_requisition
                                   WHERE status='2' AND final_status !='3'
                                  ");
        return $query;
    }

    function detail_storereq_product_sk($reqproductid)
    {
            $query=$this->db->query("SELECT *
                                   FROM trn_store_requisition
                                   WHERE store_requisition_id=$reqproductid");
            return $query;
    }
    function issue_storereq_product_sk($reqproductid)
    {
         $query=$this->db->query("SELECT *
                                   FROM trn_store_requisition
                                   WHERE store_requisition_id=$reqproductid");
            return $query;
    }
    function dummy_sk($reqid)
    {
        $query=$this->db->query("SELECT *
                                   FROM mas_store_requisition
                                   WHERE store_requisition_id=$reqid");
            return $query;

    }
   /* function submit_issue_model($issueid,$reqid,$proid,$quantity,$comment)
    {
        $data["issue_id"]=$issueid;
        $data["product_id"]=$proid;
        $data["product_quantity"]=$quantity;
        $data["remarks"]=$comment;
       // $data["Title"]=$comment;
      //  $data["Lab"]=$lab;
      //  $data["Reporter_ID"]=$rid;
        // $data["Lab"]=$this->id;
      //  $data["Date_Of_Reporting"]=date('Y-m-d');
        $this->db->insert('trn_issue',$data);
        $data1["issue_id"]=$issueid;
        $data1["store_requisition_id"]=$reqid;
      //  $data1["Lab"]=$lab;
      //  $data1["Date"]=date('Y-m-d');
       $this->db->insert('mas_issue',$data1);
    }*/

    /* for issue*/

    function get_product_id($store_id)
    {
        $query=$this->db->query("SELECT *
                                   FROM trn_store_requisition
                                   WHERE store_requisition_id=$store_id");
            return $query;

    }
    function max_issue_id()
    {
        $query=$this->db->query("SELECT issue_id
                                   FROM mas_issue
                                   ORDER BY issue_id");
         return $query;
    }
    function get_store_dummy($store_req_id)
    {
        $query=$this->db->query("SELECT *
                                   FROM mas_store_requisition
                                   WHERE store_requisition_id=$store_req_id");
            return $query;

    }
    function insert_to_mas_issue($max_id,$store_reqid,$employeeid,$status_up,$entry_by_id)
    {
        $data["issue_id"]=$max_id;
        $data["store_requisition_id"]=$store_reqid;
        $data["employee_id"]=$employeeid;
        $data["status"]=$status_up;
        $data["entry_by"]=$entry_by_id;
       
        $this->db->insert('mas_issue',$data);
    }
    function insert_to_trn_issue($issue_id,$pid,$pquanity,$issue_remarks)
    {
        $data["issue_id"]=$issue_id;
        $data["product_id"]=$pid;
        $data["product_quantity"]=$pquanity;
        $data["remarks"]=$issue_remarks;
        
        $this->db->insert('trn_issue',$data);
    }
   function update_strreq_finalstatus($sreqid,$sts)
    {

         $query=$this->db->query("UPDATE mas_store_requisition
                                    SET final_status=$sts
                                    WHERE store_requisition_id =$sreqid");

    }
}
?>