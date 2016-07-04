<?php

class Email_model extends CI_Model {
        
        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }

        public function sendEmail($to,$from,$subject,$body)
        {
                echo "$to,$from,$subject,$body";
                                                
                return array("status" => "success");
        }
        
}        

