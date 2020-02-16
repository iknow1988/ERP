<?php  
class Employee_model extends CI_Model {

    function Employee_model() {
        parent::__construct();
    }



    function getData() {
        $this->db->select('employee_id, sex, employee_name');

		$query = $this->db->get('mas_employee');
		return $query;
// Produces: SELECT title, content, date FROM mytable
    }
}  
?>  