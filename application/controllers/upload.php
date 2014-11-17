<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//session_start();
class Welcome extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
           $this->load->helper('form');
           $this->load->database();

               $this->load->helper('url');
           }
        /**
         * Index Page for this controller.
         *
         * Maps to the following URL
         * 		http://example.com/index.php/welcome
         *	- or -  
         * 		http://example.com/index.php/welcome/index
         *	- or -
         * Since this controller is set as the default controller in 
         * config/routes.php, it's displayed at http://example.com/
         *
         * So any other public methods not prefixed with an underscore will
         * map to /index.php/welcome/<method_name>
         * @see http://codeigniter.com/user_guide/general/urls.html
         */
        public function index()
        {
                $this->load->view('welcome_message');
        }

        public function show_image(){ ; 
                // Load the model
            $this->load->model('login_model');
            // Validate the user can login
            $pass = $this->input->post('password');
            $username = $this->input->post('username');
            $result2 = $this->login_model->check_validation(); 
            //print_r($result2);
            if($result2 && !empty($result2)){
                $result['detail'] = $this->login_model->validate();
                //print_r($result);

                //$this->session->set_userdata('logged_in', $result);
                $this->session->set_userdata('pass', $pass);
                $this->session->set_userdata('user', $username);
                //$session_data = $this->session->userdata('logged_in');print_r($session_data);
                //$this->load->helper("url");

                //redirect( $this->config->item("base_url") . 'welcome/show_image');
                 $this->load->view("show_image",$result);
            }else{
                echo "Password incorrect";
                $this->load->view('welcome_message');
            }
        }
        public function process_first(){ 
            // Load the model
            $this->load->model('login_model');
            // Validate the user can login
            $pass = $this->input->post('password');
            $username = $this->input->post('username');
            $result1 = $this->login_model->check_validation_for_new_user();
            //print_r($result1);

            if($result1 || $username=='0') {
                echo "Password are allready exist. please choose another password";
                $this->load->view('welcome_message');
            }else if(!$result1 && empty($result1)&& $username!='0'){
                $result['detail'] = $this->login_model->validate_first();
                //$this->session->set_userdata('logged_in', $result);
                //$this->session->set_userdata('pass', $pass);
                $this->session->set_userdata('user', $username);
                //$session_data = $this->session->userdata('logged_in');print_r($session_data);
                $this->load->helper("url");
                //redirect( $this->config->item("base_url") . 'welcome/show_image');
                $this->load->view("show_image",$result);
                }

        }
        //public function show_image(){
        //redirect( $this->config->item("base_url") . 'show_image');
        //$session_data = $this->session->userdata('logged_in');
        //$result['detail']=$this->process();
        //$result['user_detail']=$this->process_first();
        //print_r($result);
        //print_r($session_data);
        //$data['user']=$session_data;
        //$this->load->view("show_image",$result);
        //unset($this->session->userdata);
            
        public function upload_image() {
            for ($i = 0; $i < count($_FILES['file']['name']); $i++){
                $name = $_FILES["file"]["name"][$i];
                $temp=$_FILES["file"]["tmp_name"][$i];
                $path = $_SERVER['DOCUMENT_ROOT']."/sumedha_sarvesh/project1/uploads/".$name;
                //echo $path;
                move_uploaded_file($temp, $path);
            }
            $this->load->model('login_model');
            $result = $this->login_model->upload();
            $this->session->set_userdata('logged_in', $result);
            $this->load->helper("url");
            redirect( $this->config->item("base_url") . 'welcome/show_image');
        }
        public function logout() {
            // $data= $this->session->userdata('user');
            //$data['p']= $this->session->userdata($pass);
            // $data['user']= $this->session->userdata($result);
            $this->session->sess_destroy('user');
            //$this->session->sess_destroy('user');
            $this->load->view('welcome_message','refresh');

        }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */