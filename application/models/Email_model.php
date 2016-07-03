<?php

class Email_model extends CI_Model {
        
        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }

        public function sendEmail($monil,$fromname,$from,$toemail,$subject,$body)
        {        
                $to = array($toemail);
                $monil->sendEmail($fromname,$from,$to,$subject,$body);
                return array("status" => "success");
        }
        
}        

