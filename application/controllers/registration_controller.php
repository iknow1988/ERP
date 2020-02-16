<?php

class Registration_controller extends CI_Controller {

    function index()
    {
        $this->load->model('registration_model');
        $data['records_department'] = $this->registration_model->get_department_name();
        $data['records_section'] = $this->registration_model->get_section_name();
        $data['records_designation'] = $this->registration_model->get_designation_name();
        $data['myview']="employee_registration_view.php";
        $this->load->view("template_client",$data);
    }
    function create()
    {
        $this->load->model('registration_model');
        $employee_id = $this->registration_model->max_employee_id();
        $data = array(
                'employee_id' => $employee_id+1,
                'employee_name' => $this->input->post('name'),
                'employee_address' => $this->input->post('address'),
                'date_of_birth' => $this->input->post('date_of_birth'),
                'sex' => $this->input->post('sex')
        );
        $this->registration_model->mas_employee_insert($data);
        $data = array(
                'employee_id' => $employee_id+1,
                'employee_username' => $this->input->post('username'),
                'employee_password' => $this->input->post('password')
        );
        $this->registration_model->employee_login_insert($data);
        $designation_name = $this->input->post('designation');
        $designation_id = $this->registration_model->designation_id($designation_name);
        $department = $this->input->post('department');
        $department_id = $this->registration_model->department_id($department);
        $section = $this->input->post('section');
        $section_id = $this->registration_model->section_id($section);
        $data = array(
            'employee_id' => $employee_id+1,
            'department_id' => $department_id,
            'section_id' => $section_id,
            'designation_id' => $designation_id,
            'joining_date' => $this->input->post('joining_date'),
            'resignation_date' => $this->input->post('resignation_date'),
            'salary' => $this->input->post('salary'),
            'bonus' => $this->input->post('bonus')
        );
        $this->registration_model->trn_employee_insert($data);
    }
    function update_view()
    {

        $this->load->library('session');
        $this->load->model('registration_model');
        $employee_id = $this->session->userdata('employee_id');
        //$employee_id=1;
        $data['records_mas_employee'] = $this->registration_model->get_employee_details_mas($employee_id);
        $data['records_trn_employee'] = $this->registration_model->get_employee_details_trn($employee_id);
        $data['records_employee_login'] = $this->registration_model->get_employee_details_login($employee_id);
        $data['records_department'] = $this->registration_model->get_department_name();
        $data['records_section'] = $this->registration_model->get_section_name();
        $data['records_designation'] = $this->registration_model->get_designation_name();
        $data['myview']="employee_update_view.php";
        $this->load->view("template_client",$data);

    }
    function update()
    {
        $this->load->library('session');
        $this->load->model('registration_model');
        $employee_id = $this->session->userdata('employee_id');
        //$employee_id=1;
        $data = array(
                'employee_name' => $this->input->post('name'),
                'employee_address' => $this->input->post('address'),
                'date_of_birth' => $this->input->post('date_of_birth'),
                'sex' => $this->input->post('sex')
        );
        $this->load->model('registration_model');
        $this->registration_model->mas_employee_update($data,$employee_id);
        $data = array(
                'employee_username' => $this->input->post('username')
        );
        $this->load->model('registration_model');
        $this->registration_model->employee_login_update($data,$employee_id);
        $designation_name = $this->input->post('designation');
        $designation_id = $this->registration_model->designation_id($designation_name);
        $department = $this->input->post('department');
        $department_id = $this->registration_model->department_id($department);
        $section = $this->input->post('section');
        $section_id = $this->registration_model->section_id($section);
        $data = array(
            'department_id' => $department_id,
            'section_id' => $section_id,
            'designation_id' => $designation_id,
            'joining_date' => $this->input->post('joining_date'),
            'resignation_date' => $this->input->post('resignation_date'),
            'salary' => $this->input->post('salary'),
            'bonus' => $this->input->post('bonus')
        );
        $this->registration_model->trn_employee_update($data,$employee_id);
    }
    function client_entry_view()
    {
        $this->load->model('registration_model');
        $data['records'] = $this->registration_model->get_country_name();
        $data['myview']="client_entry_view.php";
        $this->load->view("template_client",$data);
    }
    function client_entry()
    {
        $this->load->model('registration_model');
        $client_id = $this->registration_model->max_client_id();
        $data = array(
            'client_id' => $client_id+1,
            'client_name' => $this->input->post('name'),
            'client_password' => $this->input->post('password'),
            'mobile_no' => $this->input->post('mobile'),
            'telephone_no' => $this->input->post('telephone'),
            'fax_no' => $this->input->post('fax'),
            'email_address' => $this->input->post('email'),
            'address' => $this->input->post('address'),
            'country' => $this->input->post('country')                    
        );
        $this->registration_model->mas_client_insert($data);
    }
}

?>