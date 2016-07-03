<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email extends CI_Controller {
    
    public function index()
    {
            $this->load->view('email');
    }
    
    public function sendmail()
    {
        $this->load->library('Monil');
        $this->load->model('email_model');       
        $monil = new Monil(); 
        
        $captcha = $this->input->post('g-recaptcha-response');
        $secret = '6LfIJCQTAAAAAOkoNG0-4rbXx6J3_wfofbs6fmn_';
        $response = json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secret."&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']), true);
                
        if($response['success'])
        {    
            $from = $monil->test_input($this->input->post('from'));
            $to = $monil->test_input($this->input->post('to'));
            $subject = $monil->test_input($this->input->post('subject'));
            $body = $this->input->post('body');
            $data = $this->email_model->sendEmail($monil,$from,$to,$subject,$body);
        } else {
            $data = array("status" => "captchaerror");
        }
        echo json_encode($data);
    }  
    
}
