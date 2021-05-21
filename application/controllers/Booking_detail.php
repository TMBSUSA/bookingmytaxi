<?php
class Booking_detail extends CI_Controller 
{   
	public function __construct()
	{   
        parent::__construct();
		
		$this->load->helper(array('form'));

		/*if(!$this->session->userdata('is_logged_in')){
            redirect('admin');
        }*/
		$this->load->model('front/users_model');
		$this->title = 'Booking Detail';
		$this->comman_class = 'booking_detail';
	}
	function index()
	{
		if(!$this->session->userdata('user_logged_in'))
		{
        //facebook
		include_once APPPATH."libraries/facebook-api-php-codexworld/facebook.php";
		
		// Facebook API Configuration
		$appId = FB_KEY;
		$appSecret = FB_SECRET;
		$redirectUrl = base_url(). 'booking_detail/index';
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
		}
		
		// if data posted from search else get from session
		if(isset($_POST) && count($_POST)>0)
		{	
			$data['PID']  			 	= $this->input->post('PID');
			$data['Fare']     			= $this->input->post('Fare');
			$data['Commission']    		= $this->input->post('Commission');
			$data['CommissionOnFare']  	= $this->input->post('CommissionOnFare');
			$data['TotalFare']    		= $this->input->post('TotalFare');
			$data['NeededCar']    		= $this->input->post('NeededCar');
			
			$data['from_loc']   = $this->input->post('from_loc');
			$data['to_loc']     = $this->input->post('to_loc');
			$data['via']     	= $this->input->post('via'); 
			$data['trip']    	= $this->input->post('trip');
			$data['pickup']  	= $this->input->post('pickup');
			$data['drop']    	= $this->input->post('drop');
			$data['passenger'] 	= $this->input->post('passenger');
			$data['luggage'] 	= $this->input->post('luggage');
			$data['from_lat'] 	= $this->input->post('from_lat');
			$data['from_lng'] 	= $this->input->post('from_lng');
			$data['to_lat'] 	= $this->input->post('to_lat');
			$data['to_lng'] 	= $this->input->post('to_lng');
			$data['going_out_end'] 	= $this->input->post('going_out_end');
			$data['ReturnEnd'] 	= $this->input->post('ReturnEnd') ? $this->input->post('ReturnEnd') : '';
			
			if($data['trip'] == 'round')
			{
				$data['PID2']  			 	= $this->input->post('PID2');
				$data['Fare2']     			= $this->input->post('Fare2');
				$data['Commission2']    	= $this->input->post('Commission2');
				$data['CommissionOnFare2']  = $this->input->post('CommissionOnFare2');
				$data['TotalFare2']    		= $this->input->post('TotalFare2');
			}	
			$session_data['booking_details'] = $data;
			$session_data['action'] = true;
			$this->session->set_userdata($session_data);
		}
		else
		{
			if($this->session->userdata('booking_details'))
			{
				$data['user'] = $this->users_model->get_user_data($this->session->userdata('UserID'));	
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
		}
		
		//set page title
		$data['page_title'] = $this->title ." | ". ADMIN_TITLE ;
		
		//Assets start
		$data['css'] = 	array(
							"<script src='". base_url('front/js/jquery.js')."'></script>",
							"<script src='". base_url('front/js/bootstrap-waitingfor.min.js')."'></script>",
							"<script src='http://maps.googleapis.com/maps/api/js?key=".GOOGLE_PLACE."&libraries=places'></script>",
						);
		$data['js'] = 	array(
							"<script src='". base_url('front/js/comman.js')."'></script>",	
							"<script src='". base_url('front/js/jquery-ui.min.js')."'></script>",
							"<script src='". base_url('front/js/jquery-ui-timepicker-addon.js')."'></script>",
							"<script src='". base_url('front/js/jquery.validate.min.js')."'></script>",
							"<script src='". base_url('front/js/register.js')."'></script>",
							"<script src='". base_url('front/js/login.js')."'></script>"
						);
		$data['jquery'] = 1;					
		//Assets end											
		
		$data['main_content'] = 'front/'.$this->comman_class;
		$this->load->view('front/template', $data);
	}
	function success($ID)
	{
		$data['page_title'] = $this->title ." | ". ADMIN_TITLE ;
		
		$data['booking'] = $this->users_model->get_booking_details($ID);	
		$data['provider'] = $this->users_model->get_provider_details($data['booking']['ProviderID']);	
		
		if($data['booking']['IsRound'] == 1){
			$data['provider2'] = $this->users_model->get_provider_2($ID);
		}
		$data['css'] = 	array(
							'<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">'
						);
		
		$data['main_content'] = 'front/payment_success';
        $this->load->view('front/template', $data);
	}
	function send_review_link()
	{
		$this->load->library('email');
		
		$users = $this->users_model->get_pending_review();	
		echo $this->db->last_query();
		echo "<pre>";
		print_r($users);
		if (!empty($users))
		{
			foreach($users as $user)
			{
				$this->email
					 ->from(ADMIN_EMAIL, TITLE)
					 ->to($user['Email'])
					 ->subject('Review Your Ride | '.TITLE)
					 ->message($this->load->view('mail/booking_review', $user, true))
					 ->set_mailtype('html');	
					 
				$this->email->send();	 
			}
		}
	}
	
	function gettimedistance(){
		$fromLoc = urlencode($this->input->post('fromLoc')); 
		$toLoc = urlencode($this->input->post('toLoc')); 
		$departure_time = time(); //$this->input->post('departure_time');
		
		$url = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=".$fromLoc."&destinations=".$toLoc."&departure_time=".$departure_time."&traffic_model=best_guess&key=".GOOGLE_PLACE."";
		
		$json = json_decode(file_get_contents($url));
		
		//print_r( $json );
		$data['distance'] = $json->rows[0]->elements[0]->distance->text;
		$data['duration'] = $json->rows[0]->elements[0]->duration_in_traffic->text;
		echo json_encode( $data );
	}	
}