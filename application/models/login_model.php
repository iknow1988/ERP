<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Login_model extends CI_Model {

    function check_entry()
    {
       $uname= $this->input->post('username', TRUE);
       $passwd= $this->input->post('password', TRUE);
       $this->load->database();

       $sql = "SELECT * FROM employee_login WHERE BINARY employee_username = ? AND BINARY employee_password = ?";
       $query =$this->db->query($sql, array($uname, $passwd));
		   if ($query->num_rows() == 0){
			   $this->session->set_flashdata('message', 'Invalid Login');

				 //  $this->load->view('Home');
				   return 0;
			}
			else
			{
				//$this->load->view('Librarian_Home');
				$newdata = array(
					   'employee_id'  => $uname
				   );

				$this->session->set_userdata($newdata);
				return 1;

			}

    }
    function role_profile()
    {
        $employee_id = $this->session->userdata('employee_id');
		echo $employee_id;
		//die();
        $q=$this->db->query("select * from page join role_profile where role_profile.page_id = page.page_id  and employee_id='$employee_id'");
        if($q->num_rows() > 0)
        {
            foreach ($q->result() as $row)
            {
                $data[] = $row;
            }
            return $data;
        }
    }
    function get_department()
    {
        $this->db->select('*');
        $this->db->from('mas_department');
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
    function get_employee_id()
    {
        $this->db->select('*');
        $this->db->from('trn_employee');
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
}

?>
