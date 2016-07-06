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

    public function saveClient($monil)
    {        
        $agent= $this->userAgent();
        $ip = $monil->getUserIpaddress();
        $location = $this->clientLocation($ip);
        $refer = $monil->getHttpReferer();
        //echo "$ip,{$data['agent']},{$data['platform']},$refer,{$location['country']},{$location['city']}";exit;
        $data = array(
            'ipaddress' => $ip,
            'country' => $location['country'],
            'city' => $location['city'],
            'platform' => $agent['platform'],
            'agent' => $agent['agent'],
            'referer' => $refer
        );
        $this->db->insert('spoof_hit_details',$data);
    }
    
    function clientLocation($ip)
    {
        $xml = simplexml_load_file("http://www.geoplugin.net/xml.gp?ip=".$ip);
        return array('country' => $xml->geoplugin_countryName, 'city' => $xml->geoplugin_city);
    }
    
    function userAgent()
    {
        $this->load->library('user_agent');

        if ($this->agent->is_browser())
        {
                $agent = $this->agent->browser().' '.$this->agent->version();
        }
        elseif ($this->agent->is_robot())
        {
                $agent = $this->agent->robot();
        }
        elseif ($this->agent->is_mobile())
        {
                $agent = $this->agent->mobile();
        }
        else
        {
                $agent = 'Unidentified User Agent';
        }
        return array("agent" => $agent, "platform" => $this->agent->platform());
    }
        
}        

