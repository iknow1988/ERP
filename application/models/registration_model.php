<?php

class Registration_model extends CI_Model {

    function mas_employee_insert($data)
    {

        $this->db->insert('mas_employee',$data);

    }
    function mas_employee_update($data,$id)
    {
        $this->db->where('employee_id', $id);
        $this->db->update('mas_employee',$data);

    }
    function trn_employee_insert($data)
    {

        $this->db->insert('trn_employee',$data);

    }
    function trn_employee_update($data,$id)
    {
        $this->db->where('employee_id', $id);
        $this->db->update('trn_employee',$data);

    }
    function employee_login_insert($data)
    {

        $this->db->insert('employee_login',$data);

    }
     function employee_login_update($data,$id)
    {

        $this->db->where('employee_id', $id);
        $this->db->update('employee_login',$data);

    }
    function get_employee_details_mas($employee_id)
    {
        $this->db->select('*');
        $this->db->from('mas_employee');
        $this->db->where('employee_id',$employee_id);
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
    function get_employee_details_trn($employee_id)
    {
        $this->db->select('*');
        $this->db->from('trn_employee');
        $this->db->where('employee_id',$employee_id);
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
    function get_employee_details_login($employee_id)
    {
        $this->db->select('*');
        $this->db->from('employee_login');
        $this->db->where('employee_id',$employee_id);
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
    function section_id($var)
    {

        $this->db->select('section_id, section_name');
        $this->db->from('mas_section');
        $this->db->where('section_name',$var);
        $q = $this->db->get();
        if($q->num_rows() > 0) {
                foreach ($q->result() as $row) {
                        $data = $row->section_id;
                }
        }
        return $data;

    }
    function section_name($var)
    {

        $this->db->select('section_id, section_name');
        $this->db->from('mas_section');
        $this->db->where('section_id',$var);
        $q = $this->db->get();
        if($q->num_rows() > 0) {
                foreach ($q->result() as $row) {
                        $data = $row->section_name;
                }
        }
        return $data;

    }
    function designation_id($var)
    {
        $this->db->select('designation_id, designation_name');
        $this->db->from('mas_designation');
        $this->db->where('designation_name',$var);
        $q = $this->db->get();
        if($q->num_rows() > 0) {
                foreach ($q->result() as $row) {
                        $data = $row->designation_id;
                }
        }
        return $data;

    }
    function designation_name($var)
    {

        $this->db->select('designation_id, designation_name');
        $this->db->from('mas_designation');
        $this->db->where('designation_id',$var);
        $q = $this->db->get();
        if($q->num_rows() > 0) {
                foreach ($q->result() as $row) {
                        $data = $row->designation_name;
                }
        }
        return $data;

    }
    function department_id($var)
    {

        $this->db->select('department_id, department_name');
        $this->db->from('mas_department');
        $this->db->where('department_name',$var);
        $q = $this->db->get();
        if($q->num_rows() > 0) {
                foreach ($q->result() as $row) {
                        $data = $row->department_id;
                }
        }
        return $data;
    }
    function department_name($var)
    {

        $this->db->select('department_id, department_name');
        $this->db->from('mas_department');
        $this->db->where('department_id',$var);
        $q = $this->db->get();
        if($q->num_rows() > 0) {
                foreach ($q->result() as $row) {
                        $data = $row->department_name;
                }
        }
        return $data;
    }
    function get_section_name()
    {

        $this->db->select('section_id, section_name');
        $this->db->from('mas_section');
        $q = $this->db->get();
        if($q->num_rows() > 0) {
                foreach ($q->result() as $row) {
                        $data[] = $row;
                }
        }
        return $data;

    }
    function get_designation_name()
    {

        $this->db->select('designation_id, designation_name');
        $this->db->from('mas_designation');
        $q = $this->db->get();
        if($q->num_rows() > 0) {
                foreach ($q->result() as $row) {
                        $data[] = $row;
                }
        }
        return $data;

    }
    function get_department_name()
    {

        $this->db->select('department_id, department_name');
        $this->db->from('mas_department');
        $q = $this->db->get();
        if($q->num_rows() > 0) {
                foreach ($q->result() as $row) {
                        $data[] = $row;
                }
        }
        return $data;
    }
    function max_employee_id() {

        $this->db->select_max('employee_id');
        $q = $this->db->get('mas_employee');
        if($q->num_rows() > 0) {

            foreach ($q->result() as $row) {
                    $data = $row->employee_id;
            }
            return $data;
            }
    }
    //============================================
    function max_client_id() {

        $this->db->select_max('client_id');
        $q = $this->db->get('mas_client');
        if($q->num_rows() > 0) {

            foreach ($q->result() as $row) {
                    $data = $row->client_id;
            }
            return $data;
            }
    }
    function get_country_name()
    {

        $this->db->select('country_id,country_name');
        $this->db->from('mas_country');
        $q = $this->db->get();
        if($q->num_rows() > 0) {
                foreach ($q->result() as $row) {
                        $data[] = $row;
                }
        }
        return $data;
    }
    function mas_client_insert($data)
    {

        $this->db->insert('mas_client',$data);

    }
}
?>