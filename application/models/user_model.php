<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of user_model
 *
 * @author sspl
 */
class user_model extends CI_Model {
    //put your code here
    public function getUserByCondition($conditions = ''){
        if(is_array($conditions) && count($conditions) > 0){
            $this->db->where($conditions);
        }
        $query = $this->db->get("user");
        //echo $this->db->last_query();
        return $query->result();
    }
    public function getUserContent($pass) {//print_r($pass);
        $this->db->select('images');
        $this->db->from('upload_images');
        $this->db->join('user','user.password = upload_images.password');
        $this->db->where('upload_images.password', $pass); 
        $query = $this->db->get();
        return $query->result();    
    }
    public function insertUuploadImage($pass) {//print_r($pass);
        for ($i = 0; $i < count($_FILES['file']['name']); $i++){
        $name = $_FILES["file"]["name"][$i];
        $data =array('password'=>$pass,'images'=>$name);
        //print_r($data);
        $this->db->insert('upload_images',$data);
        }   
    }
    public function selectUploadeImage($pass) {
        $this->db->select('images');
        $this->db->from('upload_images');
        $this->db->join('user','user.password = upload_images.password');
        $this->db->where('upload_images.password', $pass); 
        $query = $this->db->get();
        return $query->result();
    }
    public function insertUuploadImageByNewUser($pass) {//print_r($pass);
        for ($i = 0; $i < count($_FILES['file']['name']); $i++){
        $name = $_FILES["file"]["name"][$i];
        $data =array('password'=>$pass,'images'=>$name);
        //print_r($data);
        $this->db->insert('upload_images',$data);
        }     
    }
    public function selectUuploadImageByNewUser($pass) {
        $this->db->select('images');
        $this->db->from('upload_images');
        //$this->db->join('user','user.password = upload_images.password');
        $this->db->where('upload_images.password', $pass); 
        $query = $this->db->get();
        return $query->result();   
    }
    public function signinUserByCondition($data) {
        $this->db->select('username','password');
        $this->db->from('user');
        $this->db->where('user.username',$data['username']);
        $this->db->where('user.password',$data['password']);
        $query = $this->db->get();
        //$this->db->insert('user',$data);
        //$this->db->select('images');
        //$this->db->from('upload_images');
        //$this->db->join('user','user.password = upload_images.password');
        //$this->db->where('upload_images.password', $data->password); 
        //$query = $this->db->get();
        return $query->result();
    }
    public function insertSignInData($user) {
        $this->db->insert('user',$user);
        
    }
    public function getTextMatchCondition($term) {
        $this->db->distinct();
        $this->db->select('username');
        $this->db->from('user');
        $this->db->like('username',$term,'after');
        $query = $this->db->get();
        return $query->result();     
    }
    public function deleteSelectImage($password) {
       $username =  $this->input->post('cblist');
       $select_images=array();
       for($i = 0; $i< count($username); $i++){
       $select_images = $username[$i];
       $this->db->where('upload_images.password',$password);
       $this->db->where('upload_images.images',$select_images);
       $this->db->delete('upload_images');
       //$this->db->from('upload_images');      
        }       
    }
    public function forFetchPassword($email) {
        $this->db->select('*');
        $this->db->from("user");
        $this->db->where('username',$email);
        $query = $this->db->get();
        return $query->result();    
    }
    public function device_data(){
        $this->db->select('device_type');
        $this->db->distinct('device_type');
        $this->db->from("md_display_device_metadata");
        $query = $this->db->get();
        return $query->result();
    }
    public function device_os(){
        $userId = $_POST["datas"];
        $this->db->select('device_os');
        $this->db->distinct('device_os');
        $this->db->from("md_display_device_metadata");
        $this->db->where('device_type',$userId);
        $query = $this->db->get();
        return $query->result();
    }
}
