<?php defined('BASEPATH') OR exit('No direct script access allowed');
class User_Authentication extends CI_Controller
{
    function __construct() {
		parent::__construct();
		$this->load->model('user');
    }
    
    public function index(){
		// Include the facebook api php libraries
		include_once APPPATH."libraries/facebook-api-php-codexworld/facebook.php";
		
		// Facebook API Configuration
		$appId = '1608705872759230';
		$appSecret = '014430803a81b01a596c8fbbc46a9cea';
		$redirectUrl = base_url() .'user_Authentication/';
		$fbPermissions = 'email';
		
		//Call Facebook API
		$facebook = new Facebook(array(
		  'appId'  => $appId,
		  'secret' => $appSecret
		
		));
		$fbuser = $facebook->getUser();
		
        if ($fbuser) {
			$userProfile = $facebook->api('/me?fields=id,first_name,last_name,email,gender,locale,picture');
            // Preparing data for database insertion
			$userData['fbID'] = $userProfile['id'];
            $userData['FirstName'] = $userProfile['first_name'];
            $userData['LastName'] = $userProfile['last_name'];
            $userData['Email'] = $userProfile['email'];
			$userData['ProfilePic'] = $userProfile['picture']['data']['url'];
			// Insert or update user data
            $userID = $this->user->checkUser($userData);
            if(!empty($userID))
			{
                $data = array(
					'UserID' => $userID,
					'user_logged_in' => true,
				);
				
				$this->session->set_userdata($data);
            } 
			else {
               $data['userData'] = array();
            }
        } else {
			$fbuser = '';
            $data['authUrl'] = $facebook->getLoginUrl(array('redirect_uri'=>$redirectUrl,'scope'=>$fbPermissions));
        }
		$this->load->view('user_authentication/index',$data);
    }	
	public function logout() {
		$this->session->unset_userdata('userData');
        $this->session->sess_destroy();
		redirect('/user_authentication');
    }
}
