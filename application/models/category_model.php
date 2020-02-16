<?php

class Category_model extends CI_Model {

    function get_all() {
    $q = $this->db->get('mas_category');
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
        $this->db->from('mas_category');
        $this->db->where('category_id',$var);
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


    function get_category_id($var) {
		$this->db->select('category_id, category_name');
		$this->db->from('mas_category');
                $this->db->where('category_name',$var);
		$q = $this->db->get();
		if($q->num_rows() > 0) {
			foreach ($q->result() as $row) {
				$data = $row->category_id;
			}
			return $data;
		}

	}
    function get_category_name() {
		$this->db->select('category_id, category_name');
		$this->db->from('mas_category');
                $this->db->where('category_id != 0');
		$q = $this->db->get();
		if($q->num_rows() > 0) {
			foreach ($q->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
    }
    function get_brand_all() {
		$q = $this->db->get('mas_brand');
		if($q->num_rows() > 0) {
			foreach ($q->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
    }    
       function insert($data) {

           $this->db->insert('mas_category',$data);
	}
       function insert_brand($data) {

           $this->db->insert('mas_brand',$data);
	}
        function max_category_id() {

            $this->db->select_max('category_id');
            $q = $this->db->get('mas_category');
            if($q->num_rows() > 0) {
           
                foreach ($q->result() as $row) {
                        $data = $row->category_id;
                }
                return $data;
		}
	}
       function max_brand_id() {

            $this->db->select_max('brand_id');
            $q = $this->db->get('mas_brand');
            if($q->num_rows() > 0) {
           
                foreach ($q->result() as $row) {
                        $data = $row->brand_id;
                }
                return $data;
		}
	}

}

?>
