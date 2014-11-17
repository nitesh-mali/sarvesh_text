<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//session_start();
class Welcome extends CI_Controller {
   private $logged_in = false;
   function __construct(){
        parent::__construct();
        $this->load->model("user_model");
        $this->load->library("Utility");
    }
    public function index(){  
        $this->load->view('target');
    }
    public function login_user(){  
        $this->load->view('login');
    }
    public function signin_user(){  
        $this->load->view('signup');
    }
    public function signup() {
         $data = array();
         if ($this->input->server('REQUEST_METHOD') === 'POST'){
           $username = $this->input->post("username");
           $password = $this->input->post("password"); 
           $address = $this->input->post("address"); 
           $phone_number = $this->input->post("phone"); 
           $email = $this->input->post("email"); 
           $data = array('username'=>$username,'password'=>$password,'address'=>$address,'phone_number'=>$phone_number,'email'=>$email);
           //$user =array($data['username'],$data['password']);
          //print_r($data['username']);
         // print_r($data);
        //exit;
           $users = user_model::signinUserByCondition($data);
           if(isset($users) && is_array($users) && count($users)>0){//echo "sarvesh";
           redirect($this->config->item("base_url") . "welcome/signin_user");
           }else if($data['username']!= '' && $data['username']!= '0'){ //echo"hjfgbhjaf";
               $this->session->set_userdata("user",$data);
               $user = $this->session->userdata("user");
               user_model::insertSignInData($user);
               //print_r($user);
               $data["redirect"] = $this->config->item("base_url") . "newUser/dashboard";
           }else{//echo "bvgdfjvd";
               redirect($this->config->item("base_url") . "welcome/signin_user");
           }
         }
               $this->load->view('signup',$data);
    }
   
    public function login(){
        //$data = array();
        if ($this->input->server('REQUEST_METHOD') === 'POST'){
            // form get submitted
            
            $username = $this->input->post("username");
            $password = $this->input->post("password");
            //echo "==>".$password;
            $users = user_model::getUserByCondition(array("username" => $username));
            //print_r($users);
            $user = isset($users) && is_array($users) && count($users) > 0  ? $users[0] : NULL;
            //echo "====>".$user->password;
            if($user->password === $password){//echo "dbdstgr";
                // logged in
               $this->session->set_userdata("user",$user);
               redirect($this->config->item("base_url") . "user/dashboard");
            }else{
                // error occur
                echo "password doesn't match";
                $this->load->view('login');
            }
        }else{
                // error occur
                //echo "password doesn't match";
                $this->load->view('login');
            }
        
          // $this->load->view('login',$data);
    }
    public function ajax_check() {
        
         //$username =  $this->input->post('username');
        //$password = $this->input->post("password");
        
        //echo ($username);
        //echo ($password);
        echo true;
    }
    public function text_match() {
        $term=$_GET["term"];
 
       //$query=mysql_query("SELECT distinct username FROM user where username like '$term%'");
        $json=array();
        $users = user_model::getTextMatchCondition($term);
        foreach($users as $user){
        $json[]=$user->username; 
            
        }
//        while($student=mysql_fetch_array($query)){
//         $json[]=array(
//        'value'=> $student["username"]
//        'label'=>$student["name"]." - ".$student["id"]
//     );
//    }
 
        echo json_encode($json);
        
    }
    public function resetpassword() {
       if ($this->input->server('REQUEST_METHOD') === 'POST'){
           $email = $this->input->post("username");
           $result = user_model::forFetchPassword($email);
           //print_r($result);
           $result1= isset($result) && count($result)>0 ? $result[0] : null;
           $row = $result1->password;
           if($row !=''){
               //echo $result1->password;
                
               $ci = &get_instance();
               $to = $result1->email;
               $subject = 'sadvfdsjh'; 
               $msg = "Your new Password is:".$result1->password;
               Utility::sendEmail($ci,$to,$subject,$msg);
               $sucess['success'] = "Your Pssword are sending successfully on your email";
               $this->load->view('login',$sucess);
           }else if($result1 == null) {
               $error['error'] = "you are not valid user";
               $this->load->view('login',$error);
           }     
       }else{
           $this->load->view('login');
       } 
    }
     public function ajax_check_device_value() {
        
        $result = user_model::device_data();
        echo json_encode($result);
    }
     public function ajax_device_os() {
         $datstring = $this->input->post('dataString');
        
        $result = user_model::device_os($datstring);
        echo json_encode($result);
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */