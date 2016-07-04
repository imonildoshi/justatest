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
        
        $from = $monil->test_input($this->input->post('from'));
        $to = $monil->test_input($this->input->post('to'));
        $subject = $monil->test_input($this->input->post('subject'));
        $body = $this->input->post('body');
        
        $data = $this->email_model->sendEmail($from,$to,$subject,$body);                
        echo json_encode($data);
    }  
    
}
