<?php

/**
 * Created By : Nitesh
 * Created Date :  Apr 30, 2014, 7:26:07 PM
 * Modified By : sspl
 * Modified Date : Apr 30, 2014, 7:26:07 PM
 * Class Description : Class Utility is used for 
 */
class Utility {
    public function sendEmail($ci,$to,$subject,$msg){//echo "saghsfdshjfgv";
            try{
                $config['protocol'] = 'smtp';
                $config['smtp_host'] = "ssl://smtp.gmail.com";
                $config['smtp_port'] = 465;
                $config['smtp_user'] = EMAIL_USERNAME;
                $config['smtp_pass'] = EMAIL_PASSWORD;
                $config["mailtype"] = 'html';
                $ci->load->library('email',$config);
                $ci->email->set_newline("\r\n");
                $ci->email->from(EMAIL_FROM,EMAIL_FROM_NAME);
                $ci->email->to($to); 
                $ci->email->subject($subject);
                $ci->email->message($msg);
                if(!$ci->email->send()){
                    echo $ci->email->print_debugger();
                    return false;
                }
                return true;
            }catch (Exception $e){
                return false;
            }
//            
//            $headers  = "From:".EMAIL_FROM."\r\n";
//            $headers .= "Content-type: text/html\r\n";
//            if(mail($to,$subject,$msg, $headers)){
//                return true;
//            }
//            return false;
        
        
//            $config["mailtype"] = 'html';
//            $ci->load->library('email',$config);
//            //$ci->email->set_newline("\r\n");
//            $ci->email->from(EMAIL_FROM,EMAIL_FROM_NAME);
//            $ci->email->to($to); 
//            $ci->email->subject($subject);
//            $ci->email->message($msg);
//            if(!$ci->email->send()){
//                echo $ci->email->print_debugger();
//                return false;
//            }
//            return true;
        }
        public function encryption($msg){
            $this->load->library('encrypt');
            return base64_encode( $this->encrypt->encode($msg) );
        }
        public function decryption($encrptedMsg){
            $this->load->library('encrypt');
            return $this->encrypt->decode(base64_decode($encrptedMsg));
        }
}
