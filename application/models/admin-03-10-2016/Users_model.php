<?php
class Users_model extends CI_Model {
    
	function validate($userName, $password){		
		$this->db->where('email', $userName);
		$this->db->where('password', sha1($password));		
		$query = $this->db->get('admin')->num_rows();
		
		if($query == 1){
			//echo "True";
			return true;
		}else{
			//echo "Flase";
			return false;			
		} 
	}	
	
	public function user_by_user_name($UserName)
    {
		$this->db->from('user');
		$this->db->where('email', $UserName);
		$query = $this->db->get();	
		return $query->result_array(); 	
	}
	
	public function get_admin_by_id($id)
    {
		$this->db->from('user');
		$this->db->where('id', $id);
		$query = $this->db->get();	
		return $query->result_array(); 
    }   
	
	public function checkOldPass($oldpassword, $adminID)
	{
		$this->db->where('password', sha1($oldpassword));
		$this->db->where('id', $adminID);
		$query = $this->db->count_all_results('user');
		
		if($query > 0)
			return 1;
		else
			return 0;
	}
	
	function update_user($fieldname,$id, $data,$table) {
		$this->db->where($fieldname, $id);
		$this->db->update($table, $data);
		return 1;
	}	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
    function get_db_session_data()
	{
		$query = $this->db->select('user_data')->get('ci_sessions');
		
		$user = array(); /* array to store the user data we fetch */
		foreach ($query->result() as $row)
		{
		    $udata = unserialize($row->user_data);
		    /* put data in array using username as key */
		    $user['userName'] = $udata['userName']; 
			$user['adminID'] = $udata['adminID']; 
		    $user['is_logged_in'] = $udata['is_logged_in']; 
		}
		return $user;
	}
	
	function create_member($data){
		$insert = $this->db->insert('tblInternalUser',$data);
		return $insert;
	}
	
	
	
	function create_multiupload($data){
		$insert = $this->db->insert('tblInternalUser', $data);
	    return $insert;
	      
	}//create_member
	
	
	
	
	
	
	public function search_by_field($field,$field_value,$return_value = false){

		$this->db->select($field);
		$this->db->from('tbl_admin');
		$this->db->where($field,$field_value);
		$query = $this->db->get();		
        if($query->num_rows > 0){
			$rr = $query->result_array();
			return ($return_value == TRUE ) ? $rr[0][$field] : true;
		}
		else
			return false;		
	}
	public function single_value_return($table,$field,$where_field,$where_value,$return_value = false){

		$this->db->select($field);
		$this->db->from($table);
		$this->db->where($where_field,$where_value);
		$query = $this->db->get();		
        if($query->num_rows > 0){
			$rr = $query->result_array();
			return ($return_value == TRUE ) ? $rr[0][$field] : true;
		}
		else
			return false;		
	}
	function count_member($userID=null, $search_string=null, $order=null)
    {
		$this->db->select('tbl_user.*');
		$this->db->from('tbl_user');
		if($userID != null && $userID != 0){
			$this->db->where('user.userID', $userID);
		}

		if($search_string){
			$this->db->like('tbl_devices.deviceType', $search_string);
			$this->db->or_like('tbl_user.firstName', $search_string);			
		}

		$this->db->join('tbl_devices', 'tbl_devices.deviceID = tbl_user.deviceType', 'left');
		
		if($order){
			$this->db->order_by($order, 'Asc');
		}else{
		    $this->db->order_by('tbl_user.userID', 'Asc');
		}		
		
		$query = $this->db->get();		
		return $query->num_rows();        
    }
	
	public function get_members($deviceID=null,$search_string=null, $order=null, $order_type='Asc', $limit_start=null, $limit_end=null)
    {   
		$this->db->from('tbl_user');
		$this->db->order_by('userID','DESC');		
		$query = $this->db->get();	
		return $query->result_array(); 	
    }	
	
	public function get_check_members($noDay,$deviceID=null,$search_string=null, $order=null, $order_type='Asc', $limit_start=null, $limit_end=null)
    {
		//SELECT * FROM `tbl_user` WHERE DATE_FORMAT(lastActiveDateTime, '%m/%d/%Y') > DATE_SUB(CURDATE(), INTERVAL -2 DAY) 
		$this->db->select('tbl_user.*');
		$this->db->select('tbl_devices.deviceType');
		$this->db->from('tbl_user');
		$this->db->join('tbl_devices', 'tbl_devices.deviceID = tbl_user.deviceType', 'left');
		$this->db->where('tbl_user.lastActiveDateTime < (DATE_SUB(NOW(), INTERVAL '.$noDay.' DAY))');
		$this->db->where('tbl_user.eStatus','1');
		if($search_string){
			$this->db->like('tbl_devices.deviceType', $search_string);
			$this->db->or_like('tbl_user.firstName', $search_string);			
			$this->db->or_like('tbl_user.lastName', $search_string);
			$this->db->or_like('tbl_user.email', $search_string);
		}
		
		if($order){
			$this->db->order_by($order, $order_type);
		}else{
		    $this->db->order_by('tbl_user.userID', 'Asc');
		}
		if(!empty($limit_start) && !empty($limit_end) )
		{		
			$this->db->limit($limit_start,$limit_end);    
		}
		$query = $this->db->get();	
		return $query->result_array(); 	
    
	}	
	
	function inactive_member_count($noDay,$userID=null, $search_string=null, $order=null)
    {
		$this->db->select('tbl_user.*');
		$this->db->from('tbl_user');
		if($userID != null && $userID != 0){
			$this->db->where('user.userID', $userID);
		}

		if($search_string){
			$this->db->like('tbl_devices.deviceType', $search_string);
			$this->db->or_like('tbl_user.firstName', $search_string);			
		}

		$this->db->join('tbl_devices', 'tbl_devices.deviceID = tbl_user.deviceType', 'left');
		$this->db->where('tbl_user.lastActiveDateTime < (DATE_SUB(NOW(), INTERVAL '.$noDay.' DAY))');		
		$this->db->where('tbl_user.isLogin','0');
		if($order){
			$this->db->order_by($order, 'Asc');
		}else{
		    $this->db->order_by('tbl_user.userID', 'Asc');
		}		
		
		$query = $this->db->get();		
		return $query->num_rows();        
    }
	
	public function get_user_devicetoken($userID,$type)
    {   
		$this->db->from('tbl_devices');
		$this->db->where('userID IN ('.$userID.')');
		$this->db->where('deviceType', $type);
		$query = $this->db->get();	
		$result = $query->result_array();
		
		foreach($result as $val)
		{
			$data[] = $val['deviceToken'];
		}
		return $data; 	
    }
	
	public function get_user_multipleimage($userID)
    {   
		$this->db->from('tbl_user_media');
		$this->db->where('userID',$userID);
		$this->db->where('type','Image');
		//$this->db->where('isProfile','Yes');
		$query = $this->db->get();	
		return $query->result_array();	
	}
	
	public function get_user_video($userID)
    {   
		$this->db->from('tbl_user_media');
		$this->db->where('userID',$userID);
		$this->db->where('type','Video');
		$query = $this->db->get();	
		return $query->result_array();	
	}	
	
	public function get_setting()
    {   
		$this->db->from('tbl_setting');
		$query = $this->db->get();	
		return $query->result_array(); 	
    }	
	
	function updateSetting($data)
	{
		$this->session->set_userdata($data);
		return $this->db->update('tbl_setting', $data, array('settingID'=>'1'));
	}
	
	function updateUserApprove($userID)
	{
		$data['approved'] = '1';
		return $this->db->update('tbl_user_media', $data, array('userID'=>$userID));
	}
	
	function getAllImageName($userID)
	{
		$this->db->from('tbl_user_image');
		$this->db->where( 'userID IN ('.$userID.')' );
		//$this->db->where( array('userID'=>$userID) );
		$posts = $this->db->get()->result_array();
		
		if(count($posts) > 0 ) 
		{
			return $posts;
		}
	
		return false;
	}
	
	function getUserImageName($userID)
	{
		$this->db->from('tbl_user');
		$this->db->where( 'userID IN ('.$userID.')');
		//$this->db->where( array('userID'=>$userID) );
		$posts = $this->db->get()->result_array();
		
		if(count($posts) > 0 ) 
		{
			return $posts;
		}
	
		return false;
	}
	
	function updateUserStatus($id,$eStatus){
		$this->db->where('userID IN ('.$id.')');
		return $this->db->update('tbl_user', array('eStatus'=>$eStatus));	
	}
	
	function delete_member($id){
		
		$this->db->where('userID IN ('.$id.')');
		$this->db->delete('tbl_user'); 
		
		$this->db->where('userID IN ('.$id.')');
		$this->db->delete('tbl_user_media'); 
		
		$this->db->where('userID IN ('.$id.')');
		$this->db->delete('tbl_devices');
		
		$this->db->where('userID IN ('.$id.')');
		$this->db->delete('tbl_preferance'); 
		
		return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
	}

	function send_pushnotification($notification_text,$device_token)
	{			
		$payload = array();						
		$payload['aps'] = array(
			 'alert' => $notification_text, //Message to be displayed in Alert
			 'badge' =>  '1', 				//Number to be displayed in the top right of your app icon this should not be a string 
			 'sound' => 'default'      		//Default notification sound (you can customize this)
			  ); 
	   
		$payload = json_encode($payload);
		$apnsHost = 'gateway.sandbox.push.apple.com'; 
		$apnsCert = 'dev-cusat.pem';		
		
		$apnsPort = 2195;
		$streamContext = @stream_context_create();
		@stream_context_set_option($streamContext, 'ssl', 'local_cert', $apnsCert);
		$apns = @stream_socket_client('ssl://' . $apnsHost . ':' . $apnsPort, $error, $errorString, 60, STREAM_CLIENT_CONNECT, $streamContext); 
		// 60 is the timeout
		$apnsMessage = chr(0) . chr(0) . chr(32) . pack('H*', @str_replace(' ', '', $device_token)) . chr(0) . chr(strlen($payload)) . $payload;
	
		$result = @fwrite($apns, $apnsMessage);
		// socket_close($apns);
		@fclose($apns);
		// Push Notification Code End Here
		if(!$result){
			$msg = 'Message not delivered'. PHP_EOL;
		}else{
			$msg = 'MSG Delivered';
		}	
		return $msg;	
	} 
		
	function send_android_notification($notification_text,$reg_ids) 
	{
		$url = 'https://android.googleapis.com/gcm/send';
 
		$fields = array(
			'registration_ids' => $reg_ids,
			'data' => $notification_text,
		);
 
		//AIzaSyBQ3916hnfxVas-ZEJCc55EcdhrfYRIDLA
		 $headers = array(
			'Authorization: key='.GOOGLE_API_KEY,
			'Content-Type: application/json' 
		);
		
		// Open connection
		$ch = curl_init();
 
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