<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


/**
 * This function is used to print the content of any data
 */
function pre($data)
{
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}

/**
 * This function used to get the CI instance
 */
if(!function_exists('get_instance'))
{
    function get_instance()
    {
        $CI = &get_instance();
    }
}

/**
 * This function used to generate the hashed password
 * @param {string} $plainPassword : This is plain text password
 */
if(!function_exists('getHashedPassword'))
{
    function getHashedPassword($plainPassword)
    {
        return password_hash($plainPassword, PASSWORD_DEFAULT);
    }
}

/**
 * This function used to generate the hashed password
 * @param {string} $plainPassword : This is plain text password
 * @param {string} $hashedPassword : This is hashed password
 */
if(!function_exists('verifyHashedPassword'))
{
    function verifyHashedPassword($plainPassword, $hashedPassword)
    {
        return password_verify($plainPassword, $hashedPassword) ? true : false;
    }
}

/**
 * This method used to get current browser agent
 */
if(!function_exists('getBrowserAgent'))
{
    function getBrowserAgent()
    {
        $CI = get_instance();
        $CI->load->library('user_agent');

        $agent = '';

        if ($CI->agent->is_browser())
        {
            $agent = $CI->agent->browser().' '.$CI->agent->version();
        }
        else if ($CI->agent->is_robot())
        {
            $agent = $CI->agent->robot();
        }
        else if ($CI->agent->is_mobile())
        {
            $agent = $CI->agent->mobile();
        }
        else
        {
            $agent = 'Unidentified User Agent';
        }

        return $agent;
    }
}

if(!function_exists('setProtocol'))
{
    function setProtocol()
    {
        $CI = &get_instance();
                    
        $CI->load->library('email');
        
        $config['protocol'] = PROTOCOL;
        $config['mailpath'] = MAIL_PATH;
        $config['smtp_host'] = SMTP_HOST;
        $config['smtp_port'] = SMTP_PORT;
        $config['smtp_user'] = SMTP_USER;
        $config['smtp_pass'] = SMTP_PASS;
        $config['charset'] = "utf-8";
        $config['mailtype'] = "html";
        $config['newline'] = "\r\n";
        
        $CI->email->initialize($config);
        
        return $CI;
    }
}

if(!function_exists('emailConfig'))
{
    function emailConfig()
    {
        $CI->load->library('email');
        $config['protocol'] = PROTOCOL;
        $config['smtp_host'] = SMTP_HOST;
        $config['smtp_port'] = SMTP_PORT;
        $config['mailpath'] = MAIL_PATH;
        $config['charset'] = 'UTF-8';
        $config['mailtype'] = "html";
        $config['newline'] = "\r\n";
        $config['wordwrap'] = TRUE;
    }
}

if(!function_exists('resetPasswordEmail'))
{
    function resetPasswordEmail($detail)
    {
        $data["data"] = $detail;
        //print_r($detail);
        // die('ghjgjgjhgj');
        
        $CI = setProtocol();        
        //echo EMAIL_FROM;
        $CI->email->from(EMAIL_FROM, FROM_NAME);
        $CI->email->subject("Reset Password");
        $CI->email->message($CI->load->view('email/resetPassword', $data, TRUE));
        $CI->email->to($detail["email"]);
        $status = $CI->email->send();
		//echo $CI->email->print_debugger();
        ///echo $status;die();
		        /*require FCPATH.'application/third_party/phpmailer/PHPMailerAutoload.php';
				//die('jgjhgj');
        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->SMTPSecure = "tls"; 
        $mail->Debugoutput = 'html';
        $mail->Host = "mail.alabrartravelsbwn.com";
        $mail->Port = 587;
        $mail->SMTPAuth = true;   
        $mail->Username = "sajjid@alabrartravelsbwn.com";    
        $mail->Password = "sajjid@06333";
        $mail->setFrom('sajjid@alabrartravelsbwn.com', 'admin');
        $mail->IsHTML(true);
        $mail->addAddress($detail["email"]);
        $mail->Subject = 'OTP from company';
        $mail->Body    = 'gjhgjhg';
        $mail->AltBody = 'hjkhkj';
		if(!$mail->send()){
			$status = "notsend";
		}
		else{
			$status = "send";
		}
		echo $status;
		die('asfdas');*/
        return $status;
    }
}

if(!function_exists('setFlashData'))
{
    function setFlashData($status, $flashMsg)
    {
        $CI = get_instance();
        $CI->session->set_flashdata($status, $flashMsg);
    }
}

//////////////date////////////////

function date_change_db($date){
	 if(!empty($date)){
		$exp_date = explode('/',$date);
		if(sizeof($exp_date)>1)
			return $exp_date[2].'-'.$exp_date[1].'-'.$exp_date[0];
	 }
	 else
	 	return;
	}
function date_db($date){
	 if(!empty($date)){
		$exp_date = explode('/',$date);
		if(sizeof($exp_date)>1)
			return date('Y-m-d',strtotime($exp_date));
			//return $exp_date[2].'-'.$exp_date[1].'-'.$exp_date[0];
	 }
	 else
	 	return;
	}	
	function date_change_view($date){
		if(!empty($date)){
			$exp_date = explode('-',$date);
			if(sizeof($exp_date)>1)
				return $exp_date[2].'/'.$exp_date[1].'/'.$exp_date[0];
		}
		else		
			return;
	}
	
	function date_range_db1($date_range){
		$date1 = explode(' - ',$date_range);
		return $date1[0];
	}
	function date_range_db2($date_range){
		$date2 = explode(' - ',$date_range);
		return $date2[1];
	}
	function get_date($data){
		$date2 = explode(' ~ ',$data);
		return $date2[0];
	}
	function get_time($data){
		$date2 = explode(' ~ ',$data);
		return $date2[1];
	}
	function check_permission($p_id)
	{ 
		$ci =& get_instance();
	//echo $ci->isAdminAgent();die();	
		if($ci->isUser() == false){
			$ur = $ci->session->userdata('userId');
			//echo $ur['user_id'];
			$ci->db->select(array('right_id'));
			$ci->db->from('user_rights');
			$ci->db->where('user_id',$ur);
			$ci->db->where('right_id',$p_id);
			$query = $ci->db->get();
			$res = $query->row();
			$res->right_id;
			if(!$res->right_id){
				$ci->session->set_flashdata('permission_error',"You don't have permissions to access this page, please contact your system administrator");
				//echo $ci->session->flashdata('permission_error');die();
				redirect(base_url('dashboard'));
				}
			}
	}
	function change_case($data)
	{
		$change = str_replace('_',' ',$data);
		echo ucwords($change);
		
	}
    function send_sms($mobile, $message)
    {
        $ci =& get_instance();
        $ci->db->select(array('sms','smsuser','smspass'));
        $ci->db->from('configration');
        $ci->db->where('id',1);
        $query = $ci->db->get();
        $res = $query->row();
        if($res->sms == 'Yes'){
           $username = $res->smsuser; ///Your Username
           $password = $res->smspass; ///Your Password 
        //$mobile = $this->input->post('phone'); ///Recepient Mobile Number
        $sender = "SenderID";
        ////sending sms
        $part = "http://sendpk.com/";
           $url = "http://sendpk.com/api/sms.php?username=".$username."&password=".$password."&mobile=".$mobile."&sender=".urlencode($mobile)."&message=".urlencode($message);
            //$url = $part."api/sms.php?username=".$username."&password=".$password."&mobile=".$mobile."&sender=".urlencode($sender)."&message=".urlencode($message)." ";
            //die();
            $ch = curl_init();
            $timeout = 3000;
            curl_setopt($ch,CURLOPT_URL,$url);
            
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
            curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);
            $responce = curl_exec($ch);
            curl_close($ch);
            //echo $responce;
        /*Print Responce*/
        }
        
    }

?>