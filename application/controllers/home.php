<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

        public function index()
	{
                $this->load->model('category_model');
		$data['records'] = $this->category_model->get_category_name();
                $this->load->view("popup_view",$data);
	}
}
