<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class validate extends CI_Controller {

    function __construct() {
        
    parent::__construct();
    
   $this->load->library('session');
   $this->load->helper('form');
   $this->load->database();
 
        $this->load->helper('url');
        }
        public function check_validation() {echo "sarvesjh";
            $user_pass= $this->input->post('password12');
            $this->load->model('validation_model');
             $result = $this->validation_model->check_validation();
             while($result>0){
                if($user_pass==$result['password']) {
                    
                    return true;
                }
                 
             }
             
            
        
        
 }
}