<?php
error_reporting(1);
class User extends CI_Controller {
   
	public function __construct()
	{   
        parent::__construct();
		$this->load->model('front/users_model');
		$this->comman_class = 'user';
	}
	function register($from = '')
	{
		$data['page_title'] = "Register | ". TITLE ;
		
		if(isset($_POST) && count($_POST) > 0)     
        {   			
			$params = array(
				'FirstName' => $this->input->post('FirstName'),
				'LastName' 	=> $this->input->post('LastName'),
				'Email' 	=> $this->input->post('Email'),
				'Contact' 	=> $this->input->post('Contact'),
				'Password' 	=> sha1($this->input->post('Password')),
            );
			
			
			$isexist = $this->users_model->user_exist($params['Email'], $params['Contact']);
			if(!$isexist)
			{
				$userID = $this->users_model->add_user($params);
				
				$data = array(
					'UserID' => $userID,
					'username' => $params['FirstName'],
					'user_logged_in' => true,
				);
				$this->session->set_userdata($data);
				redirect('home');
				$data['error'] = '1';	
			}
			else
			{
				$data['error'] = '0';
			}
        }
		$data['css'] = 	array(
							"<script src='". base_url('front/js/jquery.js')."'></script>",
							"<script src='http://maps.googleapis.com/maps/api/js?key=".GOOGLE_PLACE."&libraries=places'></script>",
						);
		
		$data['js'] = 	array(
							"<script src='". base_url('front/js/jquery-ui.min.js')."'></script>",
							"<script src='". base_url('front/js/jquery-ui-timepicker-addon.js')."'></script>",
							"<script src='". base_url('front/js/comman.js')."'></script>",
							"<script src='". base_url('front/js/jquery.validate.min.js')."'></script>",
							"<script src='". base_url('front/js/register.js')."'></script>",
							"<script src='". base_url('front/js/login.js')."'></script>"
						);	
						
        if ($from == ''){
			$data['main_content'] = 'front/register';	
		}else{
			if($this->session->userdata('booking_details'))
			{
				$booking_details = $this->session->userdata('booking_details');		
				$data['PID']  			 	= $booking_details['PID'];
				$data['Fare']     			= $booking_details['Fare'];
				$data['Commission']    		= $booking_details['Commission'];
				$data['CommissionOnFare']  	= $booking_details['CommissionOnFare'];
				$data['TotalFare']    		= $booking_details['TotalFare'];
				$data['NeededCar']    		= $booking_details['NeededCar'];
				
				$data['from_loc']   = $booking_details['from_loc'];
				$data['to_loc']     = $booking_details['to_loc'];
				$data['via']     	= $booking_details['via'];
				$data['trip']    	= $booking_details['trip'];
				$data['pickup']  	= $booking_details['pickup'];
				$data['drop']    	= $booking_details['drop'];
				$data['passenger'] 	= $booking_details['passenger'];
				$data['luggage'] 	= $booking_details['luggage'];
				$data['from_lat'] 	= $booking_details['from_lat'];
				$data['from_lng'] 	= $booking_details['from_lng'];
				$data['to_lat'] 	= $booking_details['to_lat'];
				$data['to_lng'] 	= $booking_details['to_lng'];
				$data['going_out_end'] = $booking_details['going_out_end'];
				$data['ReturnEnd'] 	   = $booking_details['ReturnEnd'];
				
				if($data['trip'] == 'round')
				{
					$data['PID2']  			 	= $booking_details['PID2'];
					$data['Fare2']     			= $booking_details['Fare2'];
					$data['Commission2']    	= $booking_details['Commission2'];
					$data['CommissionOnFare2']  = $booking_details['CommissionOnFare2'];
					$data['TotalFare2']    		= $booking_details['TotalFare2'];
				}
			}
			$data['main_content'] = 'front/booking_detail';	
		}
		
		$this->load->view('front/template', $data);	      
	}
	
	function validate_credentials($from = '')
	{	
		$data['page_title'] = "Login | ". TITLE ;	
		
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		//facebook
		include_once APPPATH."libraries/facebook-api-php-codexworld/facebook.php";
		
		// Facebook API Configuration
		$appId = FB_KEY;
		$appSecret = FB_SECRET;
		$redirectUrl = base_url(). 'user/validate_credentials/';
		$fbPermissions = 'email';
		
		//Call Facebook API
		$facebook = new Facebook(array(
		  'appId'  => $appId,
		  'secret' => $appSecret
		
		));
		$fbuser = $facebook->getUser();
		
        if ($fbuser) 
		{
			$userProfile = $facebook->api('/me?fields=id,first_name,last_name,email,gender,locale,picture');
            // Preparing data for database insertion
			$userData['fbID'] = $userProfile['id'];
            $userData['FirstName'] = $userProfile['first_name'];
            $userData['LastName'] = $userProfile['last_name'];
            $userData['Email'] = $userProfile['email'];
			//$userData['ProfilePic'] = $userProfile['picture']['data']['url'];
			// Insert or update user data
			$userID = $this->users_model->check_user($userData);
			if(!empty($userID))
			{
				$data = array(
					'UserID' => $userID,
					'username' => $userData['FirstName'],
					'user_logged_in' => true,
				);
				$this->session->set_userdata($data);
				redirect('home');
            }
        } 
		else 
		{
			$fbuser = '';
            $data['authUrl'] = $facebook->getLoginUrl(array('redirect_uri'=>$redirectUrl,'scope'=>$fbPermissions));
        }		
		
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////		
		// Include the google api php libraries
		include_once APPPATH."libraries/google-api-php-client/Google_Client.php";
		include_once APPPATH."libraries/google-api-php-client/contrib/Google_Oauth2Service.php";
		
		// Google Project API Credentials
		$clientId = GOOGLE_KEY;
        $clientSecret = GOOGLE_SECRET;
        $redirectUrl = base_url()."user/validate_credentials/";
		
		// Google Client Configuration
        $gClient = new Google_Client();
        $gClient->setApplicationName('Login to Booking My Taxi');
        $gClient->setClientId($clientId);
        $gClient->setClientSecret($clientSecret);
        $gClient->setRedirectUri($redirectUrl);
        $google_oauthV2 = new Google_Oauth2Service($gClient);

        if (isset($_REQUEST['code'])) {
            $gClient->authenticate();
            $this->session->set_userdata('token', $gClient->getAccessToken());
        }

        $token = $this->session->userdata('token');
        if (!empty($token)) {
            $gClient->setAccessToken($token);
        }

        if ($gClient->getAccessToken()) 
		{
			$userProfile = $google_oauthV2->userinfo->get();
            // Preparing data for database insertion
			$userData['gID'] = $userProfile['id'];
            $userData['FirstName'] = $userProfile['given_name'];
            $userData['LastName'] = $userProfile['family_name'];
            $userData['Email'] = $userProfile['email'];
			$userData['ProfilePic'] = $userProfile['picture'];
			// Insert or update user data
            $userID = $this->users_model->checkGoogleUser($userData);
			if(!empty($userID))
			{
                $data = array(
					'UserID' => $userID,
					'username' => $userData['FirstName'],
					'user_logged_in' => true,
				);
				$this->session->set_userdata($data);
				redirect('home');
			} 
			else 
			{
               $data['userData'] = array();
            }
        } else {
            $data['authUrlGoogle'] = $gClient->createAuthUrl();
        }
		
		if(isset($_POST) && count($_POST) > 0)     
        { 
			$email = $this->input->post('Email');
			$password = sha1($this->input->post('Password'));	
			
			$is_valid = $this->users_model->validate($email, $password);
			if($is_valid)
			{	
				$UserID = $this->users_model->get_user($email);
				$user_data = $this->users_model->get_user_data($UserID);
				$data = array(
					'UserID' => $UserID,
					'username' => $user_data['FirstName'],
					'user_logged_in' => true,
				);
				
				$this->session->set_userdata($data);
				redirect('home');
			}
			else
			{ 
				$data['error'] = '10';
			}
		}
		$data['css'] = 	array(
							"<script src='". base_url('front/js/jquery.js')."'></script>",
							"<script src='http://maps.googleapis.com/maps/api/js?key=".GOOGLE_PLACE."&libraries=places'></script>",
						);
		
		$data['js'] = 	array(
							"<script src='". base_url('front/js/jquery-ui.min.js')."'></script>",
							"<script src='". base_url('front/js/jquery-ui-timepicker-addon.js')."'></script>",
							"<script src='". base_url('front/js/comman.js')."'></script>",
							"<script src='". base_url('front/js/jquery.validate.min.js')."'></script>",
							"<script src='". base_url('front/js/login.js')."'></script>",
							"<script src='". base_url('front/js/register.js')."'></script>"
						);
		
		if ($from == ''){
			$data['main_content'] = 'front/login';	
		}else{
			if($this->session->userdata('booking_details'))
			{
				$booking_details = $this->session->userdata('booking_details');		
				$data['PID']  			 	= $booking_details['PID'];
				$data['Fare']     			= $booking_details['Fare'];
				$data['Commission']    		= $booking_details['Commission'];
				$data['CommissionOnFare']  	= $booking_details['CommissionOnFare'];
				$data['TotalFare']    		= $booking_details['TotalFare'];
				$data['NeededCar']    		= $booking_details['NeededCar'];
				
				$data['from_loc']   = $booking_details['from_loc'];
				$data['to_loc']     = $booking_details['to_loc'];
				$data['via']     	= $booking_details['via'];
				$data['trip']    	= $booking_details['trip'];
				$data['pickup']  	= $booking_details['pickup'];
				$data['drop']    	= $booking_details['drop'];
				$data['passenger'] 	= $booking_details['passenger'];
				$data['luggage'] 	= $booking_details['luggage'];
				$data['from_lat'] 	= $booking_details['from_lat'];
				$data['from_lng'] 	= $booking_details['from_lng'];
				$data['to_lat'] 	= $booking_details['to_lat'];
				$data['to_lng'] 	= $booking_details['to_lng'];
				$data['going_out_end'] = $booking_details['going_out_end'];
				$data['ReturnEnd'] 	   = $booking_details['ReturnEnd'];
				
				if($data['trip'] == 'round')
				{
					$data['PID2']  			 	= $booking_details['PID2'];
					$data['Fare2']     			= $booking_details['Fare2'];
					$data['Commission2']    	= $booking_details['Commission2'];
					$data['CommissionOnFare2']  = $booking_details['CommissionOnFare2'];
					$data['TotalFare2']    		= $booking_details['TotalFare2'];
				}
			}
			
			$data['main_content'] = 'front/booking_detail';	
		}
		$this->load->view('front/template', $data);
	}
    function forgotpassword()
	{
		$data['page_title'] = "Forgot Password | ". TITLE ;	
		
		if(isset($_POST) && count($_POST) > 0)     
        { 
			$email = $this->input->post('Email');
			$is_exist = $this->users_model->user_exist($email);
			if($is_exist)
			{	
				$this->load->model('front/comman_model');
				
				//Update ResetKey in database
				$params['ResetKey'] = $this->comman_model->generate_random('32');
				$where['Email'] = $email;
				$this->comman_model->update('user', $params, $where);
				$user = $this->comman_model->select('FirstName','user',$where);
				
				// Send Email
				$msg = $this->comman_model->forgot_password_html($params['ResetKey'], $user[0]['FirstName']);
				$this->comman_model->send_mail(ADMIN_EMAIL,$email, 'Reset Password - '.TITLE, $msg);
				$data['error'] = '1';
			}
			else
			{ 
				$data['error'] = '0';
			}
		}
		
		$data['js'] = 	array(
							"<script src='". base_url('front/js/jquery.validate.min.js')."'></script>",
							"<script src='". base_url('front/js/forgotpassword.js')."'></script>"
						);
		
		$data['main_content'] = 'front/forgotpassword';
		$this->load->view('front/template', $data);
	}
	function reset_password($ResetKey)
	{
		$data['page_title'] = "Reset Password | ". TITLE ;	
		
		if(isset($_POST) && count($_POST) > 0)     
        { 
			$this->load->model('front/comman_model');
			$is_exist = $this->comman_model->num_rows('user', array('ResetKey' => $ResetKey));
			if($is_exist)
			{	
				//Update Password & ResetKey in database
				$params['ResetKey'] = '';
				$params['Password'] = sha1($this->input->post('Password'));
				$where['ResetKey'] = $ResetKey;
				$this->comman_model->update('user', $params, $where);
				
				$data['error'] = '1';
			}
			else
			{ 
				$data['error'] = '0';
			}
		}
		
		$data['js'] = 	array(
							"<script src='". base_url('front/js/jquery.validate.min.js')."'></script>",
							"<script src='". base_url('front/js/resetpassword.js')."'></script>"
						);
		
		$data['ResetKey'] = $ResetKey;
		$data['main_content'] = 'front/resetpassword';
		$this->load->view('front/template', $data);
	}
	function profile()
	{
		if(!$this->session->userdata('user_logged_in')){
            redirect('home');
        }
		$data['page_title'] = "Edit Profile | ". TITLE ;	
		
		if(isset($_POST) && count($_POST) > 0)     
        { 				
			$this->load->model('front/comman_model');
			$params['FirstName'] = $this->input->post('FirstName');
			$params['LastName'] = $this->input->post('LastName');
			$params['Email'] 	= $this->input->post('Email');
			$params['Contact'] 	= $this->input->post('Contact');
			
			$where['ID'] = $this->session->userdata('UserID');
			$isexist = $this->users_model->user_exist($params['Email'], $where['ID'], $params['Contact']);
			
			if(!$isexist)
			{
				$this->comman_model->update('user', $params, $where);
				$this->session->set_userdata('username', $params['FirstName']);
				$data['error'] = '1';
			}
			else
			{
				$data['error'] = '0';
			}
		}
		
		$data['js'] = 	array(
							"<script src='". base_url('front/js/jquery.validate.min.js')."'></script>",
							"<script src='". base_url('front/js/profile.js')."'></script>"
						);
		
		$data['user'] = $this->users_model->get_user_identity($this->session->userdata('UserID'));
		$data['main_content'] = 'front/edit_profile';
		$this->load->view('front/template', $data);
	}
	function change_password()
	{
		if(!$this->session->userdata('user_logged_in')){
            redirect('home');
        }
		$data['page_title'] = "Change Password | ". TITLE ;	
		
		if(isset($_POST) && count($_POST) > 0)     
        { 				
			$this->load->model('front/comman_model');
			
			$where['Password'] 	= sha1($this->input->post('OldPassword'));
			$where['ID'] 		= $this->session->userdata('UserID');
			$num = $this->comman_model->num_rows('user', $where);
			
			if ($num != '0')
			{
				$params['Password'] = sha1($this->input->post('Password'));
				$this->comman_model->update('user', $params, $where);	
				$data['error'] = '1';
			}
			else{
				$data['error'] = '0';	
			}
			
		}
		
		$data['js'] = 	array(
							"<script src='". base_url('front/js/jquery.validate.min.js')."'></script>",
							"<script src='". base_url('front/js/change_password.js')."'></script>"
						);
		
		$data['main_content'] = 'front/change_password';
		$this->load->view('front/template', $data);
	}
	function booking()
	{
		if(!$this->session->userdata('user_logged_in')){
            redirect('home');
        }
		$data['page_title'] = "Booking History | ". TITLE ;	
		$this->load->model('admin/booking_model', 'Booking_model');
		
		$data['css'] = 	array('<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">'
						);
		
		$data['booking'] = $this->users_model->get_booking_history($this->session->userdata('UserID'));
		//echo $this->db->last_query();
		$data['main_content'] = 'front/booking_history';
		$this->load->view('front/template', $data);
	}
	function rating($UserID, $ProviderID, $BookingID)
	{
		$data['page_title'] = "Cab Rating | ". TITLE ;	
		
		if(isset($_POST) && count($_POST) > 0)     
        {
			$params['UserID']     = $UserID;
			$params['ProviderID'] = $ProviderID;
			$params['BookingID']  = $BookingID;
			$params['QueRating']  = implode(",",$this->input->post('question'));
			$params['AvgRating']  = array_sum($this->input->post('question')) / 5;
			$params['CreatedOn']  = date('Y-m-d H:i:s');
			
			// save data in table and if not save properly then redirect to home page
			if($this->users_model->add_rating($params))
			{
				$this->load->model('front/comman_model');
			
				// get all rating for that perticular provider
				$all_rating = $this->comman_model->select('SUM(`AvgRating`) as Rating, COUNT(`ProviderID`) as num','rating', array('ProviderID' => $ProviderID));
				
				// calculate AvgRating
				$total_rating = $all_rating[0]['Rating'] / $all_rating[0]['num']; 
				
				// convert float rating to interger with over_round custom function
				$total_rating = $this->comman_model->over_round($total_rating);
				
				// update AvgRating in provider table
				$this->comman_model->update('provider', array('AvgRating' => $total_rating), array('ID' => $ProviderID));
				
				$date['error'] = 1;
				$data['main_content'] = 'front/rating_success';
			}
			else{
				redirect('home');	
			}
		}
		else{
			$data['main_content'] = 'front/rating';	
		}
		
		$data['js'] = 	array(
							"<script src='". base_url('front/js/jquery.validate.min.js')."'></script>",
							"<script src='". base_url('front/js/rating.js')."'></script>"
						);
		$data['UserID'] = $UserID;
		$data['ProviderID'] = $ProviderID;
		$data['BookingID'] = $BookingID;
		
		$data['provider_details'] = $this->db->select('CompanyName,StreetAddress,ContactNumber')->where('ID', $ProviderID)->get('provider')->row_array();
		
		$this->load->view('front/template', $data);
	}
	function logout(){		
		$array_items = array('user_email' => '', 'user_logged_in' => '');
		$this->session->unset_userdata($array_items);
		$this->session->sess_destroy();
		redirect('home');
	}	
	
	function ajax_login()
	{	
		if(isset($_POST) && count($_POST) > 0)     
        { 
			$email = $this->input->post('Email');
			$password = sha1($this->input->post('Password'));	
			
			$is_valid = $this->users_model->validate($email, $password);
			if($is_valid)
			{	
				$UserID = $this->users_model->get_user($email);
				$user_data = $this->users_model->get_user_data($UserID);
				$data = array(
					'UserID' => $UserID,
					'username' => $user_data['FirstName'],
					'user_logged_in' => true,
				);
				
				$this->session->set_userdata($data);
				echo 1;
			}
			else
			{ 
				echo 0;
			}
		}
		else
		{
			echo 0;	
		}
	}
	function ajax_register()
	{
		if(isset($_POST) && count($_POST) > 0)     
        {   			
			$params = array(
				'FirstName' => $this->input->post('FirstName'),
				'LastName' 	=> $this->input->post('LastName'),
				'Email' 	=> $this->input->post('Email'),
				'Contact' 	=> $this->input->post('Contact'),
				'Password' 	=> sha1($this->input->post('Password')),
            );
            
			$isexist = $this->users_model->user_exist($params['Email'], "", $params['Contact']);
			if(!$isexist)
			{
				$UserID = $this->users_model->add_user($params);
				
				$user_data = $this->users_model->get_user_data($UserID);
				$data = array(
					'UserID' => $UserID,
					'username' => $user_data['FirstName'],
					'user_logged_in' => true,
				);
				
				$this->session->set_userdata($data);
				echo 1;	
			}
			else
			{
				echo 2;	
			}
        }
		else
		{
			echo 0;	
		}	      
	}
	function ajax_get_user()
	{	
		if($this->session->userdata('user_logged_in'))
		{
			$user = $this->users_model->get_user_identity($this->session->userdata('UserID'));
			echo json_encode($user);
		}
		else
		{
			echo 0;
		}	
	}
}