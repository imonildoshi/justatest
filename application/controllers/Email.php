<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email extends CI_Controller {
    
    public function index()
    {
	$data['error'] = $this->session->flashdata('error');
	$data['success'] = $this->session->flashdata('success');
        $this->load->view('email',$data);
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
            $fromname = $monil->test_input($this->input->post('fromname'));
            $to = $monil->test_input($this->input->post('to'));
            $subject = $monil->test_input($this->input->post('subject'));
            $body = $this->input->post('body');
            $data = $this->email_model->sendEmail($monil,$fromname,$from,$to,$subject,$body);
        } else {
            $data = array("status" => "captchaerror");
        }
        echo json_encode($data);
    }

    public function sendmailget()
    {
        $this->load->library('Monil');
	$this->load->library('session');
        $this->load->model('email_model');       
        $monil = new Monil(); 
        
        $captcha = $this->input->get('g-recaptcha-response');
        $secret = '6LfIJCQTAAAAAOkoNG0-4rbXx6J3_wfofbs6fmn_';
        $response = json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secret."&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']), true);
                
        if($response['success'])
        {    
            $from = $monil->test_input($this->input->get('from'));
            $fromname = $monil->test_input($this->input->get('fromname'));
            $to = $monil->test_input($this->input->get('to'));
            $subject = $monil->test_input($this->input->get('subject'));
            $body = $this->input->get('body');
            $data = $this->email_model->sendEmail($monil,$fromname,$from,$to,$subject,$body);
	    $this->session->set_flashdata('success','success');
            redirect('/');
        } else {
            $this->session->set_flashdata('error','captchaerror');
	    redirect('/');
        }
        echo json_encode($data);
    }    
    
}
