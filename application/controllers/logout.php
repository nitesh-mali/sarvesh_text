<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//session_start();
class logout extends CI_Controller {

    function __construct() {
       parent::__construct();
       $this->load->library('session');
       $this->load->helper('form');
       $this->load->database();
       $this->load->helper('url');
    }
        
    public function logout1() {
        //echo 'ravi';
        // session_start;
        //echo"=>".$pass = $this->session->userdata('password');
        //$username = $this->session->userdata('password');

        //echo"=>".$this->session->userdata("user",$username);
        //echo"=>".$this->session->set_userdata("password",$pass);
        $this->session->unset_userdata('password');
        $this->session->unset_userdata('user');
        //echo"=>".$pass = $this->session->userdata('password');
        //echo"=>".$pass = $this->session->userdata('user');
        //session_destroy();
        redirect($this->config->item("base_url") .'welcome'); 


    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */