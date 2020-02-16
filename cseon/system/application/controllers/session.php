<?php
class Session extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }

    public function login()
    {
        $this->load->model('user', '', true);
//        echo "Server response : " . $this->input->post('username')."/"
//                   . $this->input->post('password');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $name = $this->user->authenticate($username, $password);
        if ($name == false) {
            print("error");
        } else {
            $this->session->set_userdata('loggedin', true);
            print($name);
        }
//        $this->load->view('header');
//        $this->load->view('sessions/login');
//        $this->load->view('footer');
    }

//    public function authenticate()
//    {
//        $this->load->model('user', '', true);
//        if ($this->user->authenticate($this->input->post('username'), $this->input->post('password')))
//        {
//            $this->session->set_userdata('loggedin', true);
//            header('Location: /');
//        }
//        else
//        {
//            header('Location: /sessions/login');
//        }
//    }

    public function logout()
    {
        $this->session->unset_userdata('loggedin');
        header('Location: /cseon');
    }
}
?>