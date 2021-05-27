<?php

class Customlib {

    var $CI;

    function __construct() {

        $this->CI = & get_instance();
define('FIREBASE_API_KEYN', 'AIzaSyDM7pjb7B4f0NllJI_4T-hs6j4Q_lIO-wM');
        //$this->CI->load->library('email');
    }

    function status() {

        $array = array();

        $array['active'] = "Active";

        $array['inactive'] = "Inactive";

        return $array;
    }

    function jobExperience() {
        $array = array();
        $array['0'] = "Fresher";
        $array['1'] = "1 Year";
        $array['2'] = "2 Year";
        $array['3'] = "3 Year";
        $array['4'] = "4 Year";
        $array['5'] = "5 Year";
        $array['6'] = "6 Year";
        $array['7'] = "7 Year";
        $array['8'] = "8 Year";
        $array['9'] = "9 Year";
        $array['10'] = "10 Year";
        $array['11'] = "11 Year";
        $array['12'] = "12 Year";
        $array['13'] = "13 Year";
        $array['14'] = "14 Year";
        $array['15'] = "15 Year";
        $array['16'] = "16 Year";
        $array['17'] = "17 Year";
        $array['18'] = "18 Year";
        $array['19'] = "19 Year";
        $array['20'] = "20 Year";
        $array['21'] = "21 Year";
        $array['22'] = "22 Year";
        $array['23'] = "23 Year";
        $array['24'] = "24 Year";
        $array['25'] = "25 Year";
        $array['26'] = "26 Year";
        $array['27'] = "27 Year";
        $array['28'] = "28 Year";
        $array['29'] = "29 Year";
        $array['30'] = "30 Year";
        $array['31'] = "31 Year";
        $array['32'] = "32 Year";
        $array['33'] = "33 Year";
        $array['34'] = "34 Year";
        $array['35'] = "35 Year";
        $array['36'] = "36 Year";
        $array['37'] = "37 Year";
        $array['38'] = "38 Year";
        $array['39'] = "39 Year";
        $array['40'] = "40 Year";
        return $array;
    }

    function getUserIp() {

        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {

            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {

            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {

            $ip = $_SERVER['REMOTE_ADDR'];
        }

        return $ip;
    }

    function getLoggedUserID() {
        //print_r($this->CI->session->userdata('cvm_admin_in'));die;
        return $this->CI->session->userdata('cvm_admin_in')['id'];
    }

    function getSeekerLoggedUserID() {

        return $this->CI->session->userdata('cvm_seeker_in')['id'];
    }
    
    function getCrmLoggedUserID() {

        return $this->CI->session->userdata('cvm_crm_in')['id'];
    }

    function getRecruiterLoggedUserID() {

        return $this->CI->session->userdata('cvm_recruiter_in')['id'];
    }

    function getBlogadminID() {

        return $this->CI->session->userdata('cvm_blogadmin_in')['id'];
    }

    public function read_admin_image() {

        $condition = "id =" . "'" . $this->CI->session->userdata('cvm_admin_in')['id'] . "'";

        $this->CI->db->select('image');

        $this->CI->db->from('cvm_admin');

        $this->CI->db->where($condition);

        $this->CI->db->limit(1);

        $query = $this->CI->db->get();



        if ($query->num_rows() == 1) {

            return $query->row();
        } else {

            return false;
        }
    }
    
    public function getAdminEmail() {
        $record = new stdClass();
        $record->settings_desc = "";
        $condition = "settings_title = 'Admin Email'";
        $this->CI->db->select('settings_desc');
        $this->CI->db->from('cvm_settings');
        $this->CI->db->where($condition);
        $this->CI->db->limit(1);
        $query = $this->CI->db->get();
        if ($query->num_rows() == 1) {
            return $query->row();
       } else {
            return $record;
        }
    }
    
    public function getEmailSubject() {
        $this->CI->db->select('*');
        $this->CI->db->from('cvm_ticket_cat');
        $query = $this->CI->db->get();
        if (!empty($query)) {
            return $query->result_array();
       } else {
            return FALSE;
        }
    }

    public function read_seeker_image() {

        $condition = "id =" . "'" . $this->CI->session->userdata('cvm_seeker_in')['id'] . "'";

        $this->CI->db->select('image');

        $this->CI->db->from('cvm_seeker');

        $this->CI->db->where($condition);

        $this->CI->db->limit(1);

        $query = $this->CI->db->get();



        if ($query->num_rows() == 1) {

            return $query->row();
        } else {

            return false;
        }
    }
    
    public function read_crm_image() {

        $condition = "id =" . "'" . $this->CI->session->userdata('cvm_crm_in')['id'] . "'";

        $this->CI->db->select('image');

        $this->CI->db->from('cvm_crm');

        $this->CI->db->where($condition);

        $this->CI->db->limit(1);

        $query = $this->CI->db->get();



        if ($query->num_rows() == 1) {

            return $query->row();
        } else {

            return false;
        }
    }

    public function read_recruiter_image() {

        $condition = "id =" . "'" . $this->CI->session->userdata('cvm_recruiter_in')['id'] . "'";

        $this->CI->db->select('image');

        $this->CI->db->from('cvm_recruiter');

        $this->CI->db->where($condition);

        $this->CI->db->limit(1);

        $query = $this->CI->db->get();



        if ($query->num_rows() == 1) {

            return $query->row();
        } else {

            return false;
        }
    }

    public function read_blogadmin_image() {

        $condition = "id =" . "'" . $this->CI->session->userdata('cvm_blogadmin_in')['id'] . "'";

        $this->CI->db->select('image');

        $this->CI->db->from('cvm_blog_admin');

        $this->CI->db->where($condition);

        $this->CI->db->limit(1);

        $query = $this->CI->db->get();



        if ($query->num_rows() == 1) {

            return $query->row();
        } else {

            return false;
        }
    }

    function notice_period() {

        $array = array();

        $array['0'] = "Serving Notice Period";

        $array['15'] = "15 Days";

        $array['30'] = "30 Days";

        $array['60'] = "60 Days";

        return $array;
    }

    function month() {

        $month = array("1" => "January", "2" => "February", "3" => "March", "4" => "April", "5" => "May", "6" => "June", "7" => "July", "8" => "August", "9" => "September", "10" => "October", "11" => "November", "12" => "December");

        return $month;
    }

    public function limit_words($words, $limit, $append = ' &hellip;') {

        // Remove html tage

        $crs_post_introtext = strip_tags($words);

        // Add 1 to the specified limit becuase arrays start at 0

        if (strlen($crs_post_introtext) > $limit) {

            $crs_post_introtext = substr($crs_post_introtext, 0, $limit);

            $crs_post_introtext = substr($crs_post_introtext, 0, strrpos($crs_post_introtext, ' ')) . $append;
        }

        // Return the result

        return $crs_post_introtext;
    }

    function sendMails($data) {
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'test@querycity.net', // change it to yours
            'smtp_pass' => '', // change it to yours
            'mailtype' => 'html',
            'charset' => 'iso-8859-1',
            'wordwrap' => TRUE
        );
        $message = $data['message'];
        $this->CI->load->library('email', $config);
        $this->CI->email->set_newline("\r\n");
        $this->CI->email->from($data['from']); // change it to yours
        $this->CI->email->to($data['to']); // change it to yours
        $this->CI->email->subject($data['subject']);
        $this->CI->email->message($message);
        if ($this->CI->email->send()) {
            return TRUE;
        } else {
            return FALSE;
            //show_error($this->email->print_debugger());
        }
    }

    function sendMail($data) {
        
        if (!empty($data)) {
            // Always set content-type when sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            // More headers
            $headers .= 'From: cvmantra' . "\r\n";
            // $headers .= 'Cc: myboss@example.com' . "\r\n";
            mail($data['to'], $data['subject'], $data['message'],$headers);
            
        }
    }

   public function readCRMQuickLink() {
        $condition = "status = 'crm'";
        $this->CI->db->select('*');
        $this->CI->db->from('cvm_quick_link');
        $this->CI->db->where($condition);
        $query = $this->CI->db->get();
        return $query->result();
        }

 
     public function readAdminQuickLink() {
        $condition = "status = 'admin'";
        $this->CI->db->select('*');
        $this->CI->db->from('cvm_quick_link');
        $this->CI->db->where($condition);
        $query = $this->CI->db->get();
        return $query->result();
        }
        
     public function readSeekerQuickLink() {
        $condition = "status = 'seeker'";
        $this->CI->db->select('*');
        $this->CI->db->from('cvm_quick_link');
        $this->CI->db->where($condition);
        $query = $this->CI->db->get();
        return $query->result();
        }
        
     public function readRecruiterQuickLink() {
        $condition = "status = 'recruiter'";
        $this->CI->db->select('*');
        $this->CI->db->from('cvm_quick_link');
        $this->CI->db->where($condition);
        $query = $this->CI->db->get();
        return $query->result();
        }
        
        
          function send_sms($number,$msg){
            $digit=substr($number,0,1);
                $msg=  str_replace(" ", "+", $msg);
                $number=($digit==0)?substr($number,1,  strlen($number)-1):$number;

	$ch = curl_init("http://login.heightsconsultancy.com/API/WebSMS/Http/v1.0a/index.php?username=cvmantra&password=A123456a&sender=CVMntr&to=".$number."&message=".$msg."&reqid=1&format={json|text}&route_id=113");
	// initialize curl handle
	
    //curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	
    $data = curl_exec($ch);
	
	curl_close($ch);
	
    //print($data);
	//$result=(strpos($data, 'Successful') !== false) ?  true :  false;

//return $result;
}


public function sendPushNotification($fields) {
        
      

        // Set POST variables
        $url = 'https://fcm.googleapis.com/fcm/send';

        $headers = array(
            'Authorization: key='.FIREBASE_API_KEYN ,
            'Content-Type: application/json'
        );
        // Open connection
        $ch = curl_init();
        
       // echo json_encode($fields);

        // Set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);

        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

        // Execute post
        $result = curl_exec($ch);
        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }

        // Close connection
        curl_close($ch);

        return $result;
    }


}

?>