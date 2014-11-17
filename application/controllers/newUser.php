<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class newUser extends CI_Controller{
    private $is_logged_in = false;
    //private $user_id = NULL;
    private $password = NULL;
    function __construct() {
        parent::__construct();
        $this->load->model("user_model");
        $user = $this->session->userdata("user");
        if(isset($user) && !empty($user)){//echo "sarvesh";
            $this->is_logged_in = true;
            // $this->user_id = $user->id;
            $this->password =$user['password'];
            //echo  $this->password;    
        }
    }
    public function index(){}

    public function dashboard(){
        if($this->is_logged_in){
            //sjdf dsfjdslkj
            //echo "my id is " . $this->user_id;
            $user_content['detail'] = user_model::getUserContent($this->password);
            //print_r($user_content['detail']);
            $this->load->view("show_newuser_image",$user_content);
            //$this->logout();
        }else{
            redirect($this->config->item("base_url") . "welcome/signin_user");
        }
    }
    public function upload_image() {
        if($this->is_logged_in){
            //echo count($_FILES['file']['name']);
            //print_r($_FILES['file']['name']);
            for ($i = 0; $i < count($_FILES['file']['name']); $i++){
                $name = $_FILES["file"]["name"][$i];
                //echo count($name);
                if($_FILES['file']['name'][$i]!=''){//echo "sarvesh";
                    $temp=$_FILES["file"]["tmp_name"][$i];
                    $path = $_SERVER['DOCUMENT_ROOT']."/sumedha_sarvesh/project1/uploads/".$name;
                    //echo $path;
                    move_uploaded_file($temp, $path);
                }else {
                    redirect($this->config->item("base_url") . "newUser/dashboard");
                }
                //print_r($name);
                user_model::insertUuploadImageByNewUser($this->password);
                redirect($this->config->item("base_url") . "newUser/show_upload_image");
                //$user_content['detail'] = user_model::selectUuploadImageByNewUser($this->password);
                //print_r($user_content);
            } 
        }else{
            redirect($this->config->item("base_url") . "welcome/signin_user");
        }
    }
    public function show_upload_image() {
        if($this->is_logged_in){
           $user_content['detail'] = user_model::selectUuploadImageByNewUser($this->password); 
           $this->load->view("show_newuser_image",$user_content);
        }else{
           redirect($this->config->item("base_url") . "welcome/signin_user");
       }
    }
         public function delete() {
       //echo count($_POST['cblist']);
       if($this->is_logged_in){ 
       user_model::deleteSelectImage($this->password);
       redirect($this->config->item("base_url") . "newUser/show_upload_image");
       }
   }
    public function logout(){
        $this->session->sess_destroy();
        //echo "sarvesh";
        //print_r($this->session->userdata('user'));
   
        redirect($this->config->item("base_url") . "welcome/login");
    }
}

  ?>