<?php
class Login extends CI_Controller {
    function index()
    {
        
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('session');
        $config = array(
               array(
                     'field'   => 'username',
                     'label'   => 'Username',
                     'rules'   => 'required'
                  ),
            array(
                     'field'   => 'password',
                     'label'   => 'Password',
                     'rules'   => 'required'
                  )
            );
            $this->form_validation->set_rules($config);


            if ($this->form_validation->run() == FALSE)
		{
                    $this->load->model('login_model');
                    $data['list']=$this->login_model->get_department();
                    $data['list1']=$this->login_model->get_employee_id();
                    $data['myview']="login.php";
                    $this->load->view("home_template",$data);
		}
            else
		{
                    $this->load->model('login_model');
                    if(0==$this->login_model->check_entry())
                    {
                            // $this->load->view('Home');
                            redirect('login');
                    }
                    else
                    {
                            //redirect('login/homepage');
                            $data['role_profile_get']=$this->login_model->role_profile();
							//echo $this->login_model->role_profile();
							//die();
                            $this->load->model('category_model');
                            //$data['records'] = $this->category_model->get_category_name();
                            $this->session->set_userdata($data);
                            //redirect('product_controller');
                            //$data['myview']="add_product_view.php";
                            //$this->load->view("template_client",$data);
                             $this->load->model('registration_model');
                             $employee_id = $this->session->userdata('employee_id');
                             $data['mas']=$this->registration_model->get_employee_details_mas($employee_id);
                             $data['trn']=$this->registration_model->get_employee_details_trn($employee_id);
                             $data['myview']="home_page_view.php";
                             $this->load->view("template_client",$data);
                    }
			
		}

    }
    function logout()
    {
         $this->load->library('session');
         $this->session->sess_destroy();
         $data['myview']="login.php";
         $this->load->view("home_template",$data);
    }
    function homepage()
    {
          $this->load->library('session');
          $this->load->model('registration_model');
          $employee_id = $this->session->userdata('employee_id');
          $data['mas']=$this->registration_model->get_employee_details_mas($employee_id);
          $data['trn']=$this->registration_model->get_employee_details_trn($employee_id);
          $data['myview']="home_page_view.php";
          $this->load->view("template_client",$data);
    }
	
}

?>