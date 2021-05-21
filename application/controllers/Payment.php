<?php
require(APPPATH.'/libraries/stripe-php/init.php');
error_reporting(0);
class Payment extends CI_Controller {
   
	public function __construct(){   
        parent::__construct();
		
		$this->load->helper(array('form', 'global_function'));
		$this->load->library('email');
		$this->load->model('front/users_model');
		/*if(!$this->session->userdata('is_logged_in')){
            redirect('admin');
        }*/
		
		$this->title = 'Payment';
		$this->comman_class = 'payment';
	}
	function update_available_car($car, $ID)
	{
		$this->db->set('AvailableVehicle', '`AvailableVehicle`-'.$car, FALSE);
		$this->db->where('ID', $ID);
		$this->db->update('provider');
	}
	function index()
	{	
	  if(isset($_POST) && count($_POST)>0)
	  {	
		// check if user is guest or register // add user if it is guest start{
		if($this->session->userdata('user_logged_in') == false)
		{
			$params['FirstName'] = $this->input->post('FirstName');
			$params['LastName']  = $this->input->post('LastName');
			$params['Email'] 	 = $this->input->post('Email');
			$params['Contact']   = $this->input->post('Contact');
			$params['IsGuest']   = '1';
			
			$isexist = $this->users_model->user_exist($params['Email']);
			
			if($isexist){
				$UserID = $this->users_model->get_user($params['Email']);
				$this->users_model->update_user($params, $UserID);	
			}else{
				$UserID = $this->users_model->add_user($params);	
			}
        }
		else
		{
			$UserID = $this->session->userdata('UserID');
		}
		$data['PID']  		 	  	= $this->input->post('PID');
		$data['Fare']     			= $this->input->post('Fare');
		$data['Commission']    		= $this->input->post('Commission');
		$data['CommissionOnFare']  	= $this->input->post('CommissionOnFare');
		$data['TotalFare']    		= $this->input->post('TotalFare');
		$data['trip'] 				= $this->input->post('trip');
		
		// Set default finalfare & finalcommission if trip is single
		$finalfare = $data['TotalFare'];
		$finalcommission = $data['CommissionOnFare'];
		
		if($data['trip'] == 'round')
		{
			$data['PID2']  			 	= $this->input->post('PID2');
			$data['Fare2']     			= $this->input->post('Fare2');
			$data['Commission2']    	= $this->input->post('Commission2');
			$data['CommissionOnFare2']  = $this->input->post('CommissionOnFare2');
			$data['TotalFare2']    		= $this->input->post('TotalFare2');
			
			// change default finalfare & finalcommission if trip is round
			$finalfare = $data['TotalFare'] + $data['TotalFare2'];
			$finalcommission = $finalfare;
		}
		
		// check if user is guest or register // add user if it is guest end}
		$stripeToken = $this->input->post('stripeToken');
		
		//$fare_details = $this->session->userdata('provider_details');
		$provider_details = $this->db->select('ID,StripeID')->where('ID', $data['PID'])->get('provider')->row_array();
		
		//save booking detail before payment start
		$booking_data['UserID']			= $UserID;
		$booking_data['ProviderID']		= $data['PID'];
		$booking_data['FromLoc']		= $this->input->post('from_loc');
		$booking_data['ToLoc'] 	 		= $this->input->post('to_loc');
		$booking_data['Via'] 			= $this->input->post('via');
		$booking_data['IsRound'] 		= $this->input->post('trip')=='single' ? 0 : 1;
		$booking_data['StartDateTime'] 	= convert_date_time_db($this->input->post('pickup'));
		$booking_data['EndDateTime'] 	= convert_date_time_db($this->input->post('drop'));
		$booking_data['Passanger'] 		= $this->input->post('passenger');
		$booking_data['Luggage'] 		= $this->input->post('luggage');
		$booking_data['TotalFare']      = $finalfare;
		$booking_data['NeededCar'] 		= $this->input->post('NeededCar'); 
		$booking_data['GoingOutEnd'] 	= $this->input->post('going_out_end'); 
		$booking_data['ReturnEnd'] 		= $this->input->post('ReturnEnd'); 
		
		$BookingID = $this->users_model->add_booking($booking_data);
		//echo $this->db->last_query();
		// save booking detail before payment end
		// stripe payment process start
		$stripe_key = STRIPE_SECRET;
		\Stripe\Stripe::setApiKey($stripe_key);
		
		try{
			$charge = \Stripe\Charge::create(
				array(
					"amount" => $finalfare * 100, // amount in cents
					"currency" => "gbp",
					"source" => $stripeToken,
					"description" => "Test",
					"application_fee" => $finalcommission * 100, // amount in cents
					"destination" => $provider_details['StripeID']
				)
			);
			
		}
		catch (\Stripe\Error\InvalidRequest $a)
		{
			$error = $a->getMessage();
		}
		catch (Stripe\Error\ApiConnection $e)
		{
			$error = $e->getMessage();
		}
		catch (Stripe\Error\Base $b)
		{
			$error = $b->getMessage();
		}
		// stripe payment process end
		//save payment detail start
		$TransID = $charge->id;
		if($TransID)
		{
			if($data['trip'] == 'single')
			{
				$payment_data['BookingID']			= $BookingID;
				$payment_data['UserID']				= $UserID;
				$payment_data['ProviderID']			= $data['PID'];
				$payment_data['StripeTransID']		= $TransID;
				$payment_data['TotalFee']			= $finalfare;
				$payment_data['TaxiFee']			= $data['Fare'];
				$payment_data['AdminFee']			= $data['CommissionOnFare'];
				$payment_data['AdminPercentage']	= $data['Commission'];
				$payment_data['PaymentDateTime']	= date('Y-m-d H:i:s');
				$this->users_model->add_payment($payment_data);	
				
				//update available car after successful booking
				$this->update_available_car($booking_data['NeededCar'], $data['PID']);
				
				$provider_1 = $this->db->select('Email,CompanyName,StreetAddress,ContactNumber')->where('ID', $data['PID'])->get('provider')->row_array();
				$user_details = $this->db->select('FirstName,LastName,Email,Contact')->where('ID', $UserID)->get('user')->row_array();
				
				$booking_data_1 = $booking_data;
				$booking_data_1['Fare'] = $data['Fare'];
				$booking_data_1['FirstName'] = $user_details['FirstName'];
				$booking_data_1['LastName'] = $user_details['LastName'];
				$booking_data_1['Email'] = $user_details['Email'];
				$booking_data_1['Contact'] = $user_details['Contact'];
				$booking_data_1['CompanyName'] = $provider_1['CompanyName'];
				$booking_data_1['sdate'] = 'start';
				
				$this->email
					 ->from(ADMIN_EMAIL, TITLE)
					 ->to($provider_1['Email'])
					 ->subject('Booking from '.TITLE)
					 ->message($this->load->view('mail/booking', $booking_data_1, true))
					 ->set_mailtype('html');
				
				$this->email->send();
			}
			else
			{
				$payment_data['BookingID']			= $BookingID;
				$payment_data['UserID']				= $UserID;
				$payment_data['ProviderID']			= $data['PID'];
				$payment_data['StripeTransID']		= $TransID;
				$payment_data['TotalFee']			= $this->input->post('TotalFare');
				$payment_data['TaxiFee']			= $data['Fare'];
				$payment_data['AdminFee']			= $data['CommissionOnFare'];
				$payment_data['AdminPercentage']	= $data['Commission'];
				$payment_data['Status']				= 'Pending';
				$payment_data['PaymentDateTime']	= date('Y-m-d H:i:s');
				$this->users_model->add_payment($payment_data);	
				
				//update available car after successful booking
				$this->update_available_car($booking_data['NeededCar'], $data['PID']);
				
				$payment_data['BookingID']			= $BookingID;
				$payment_data['UserID']				= $UserID;
				$payment_data['ProviderID']			= $data['PID2'];
				$payment_data['StripeTransID']		= $TransID;
				$payment_data['TotalFee']			= $data['TotalFare2'];
				$payment_data['TaxiFee']			= $data['Fare2'];
				$payment_data['AdminFee']			= $data['CommissionOnFare2'];
				$payment_data['AdminPercentage']	= $data['Commission2'];
				$payment_data['Status']				= 'Pending';
				$payment_data['PaymentDateTime']	= date('Y-m-d H:i:s');
				$this->users_model->add_payment($payment_data);	
				
				//update available car after successful booking
				$this->update_available_car($booking_data['NeededCar'], $data['PID2']);
				
				$provider_1 = $this->db->select('Email,CompanyName,StreetAddress,ContactNumber')->where('ID', $data['PID'])->get('provider')->row_array();
				$provider_2 = $this->db->select('Email,CompanyName,StreetAddress,ContactNumber')->where('ID', $data['PID2'])->get('provider')->row_array();
				$user_details = $this->db->select('FirstName,LastName,Email,Contact')->where('ID', $UserID)->get('user')->row_array();
				
				$booking_data_1 = $booking_data;
				$booking_data_1['Fare'] = $data['Fare'];
				$booking_data_1['FirstName'] = $user_details['FirstName'];
				$booking_data_1['LastName'] = $user_details['LastName'];
				$booking_data_1['Email'] = $user_details['Email'];
				$booking_data_1['Contact'] = $user_details['Contact'];
				$booking_data_1['CompanyName'] = $provider_1['CompanyName'];
				$booking_data_1['sdate'] = 'start';
				
				$this->email
					 ->from(ADMIN_EMAIL, TITLE)
					 ->to($provider_1['Email'])
					 ->subject('Booking from '.TITLE)
					 ->message($this->load->view('mail/booking', $booking_data_1, true))
					 ->set_mailtype('html');
				
				$this->email->send();
				
				$booking_data_2 = $booking_data;
				$booking_data_2['FromLoc'] 	= $booking_data['ToLoc'];
				$booking_data_2['ToLoc'] 	= $booking_data['FromLoc'];
				$booking_data_2['Fare'] 	= $data['Fare2'];
				$booking_data_2['FirstName'] = $user_details['FirstName'];
				$booking_data_2['LastName'] = $user_details['LastName'];
				$booking_data_2['Email']   	= $user_details['Email'];
				$booking_data_2['Contact'] 	= $user_details['Contact'];
				$booking_data_2['CompanyName'] = $provider_2['CompanyName'];
				$booking_data_2['sdate'] = 'end';
				
				$this->email
					 ->from(ADMIN_EMAIL, TITLE)
					 ->to($provider_2['Email'])
					 ->subject('Booking from '.TITLE)
					 ->message($this->load->view('mail/booking', $booking_data_2, true))
					 ->set_mailtype('html');
				
				$this->email->send();
			}
			
			$data = array();
			
			$data['BookingID'] 		= $BookingID;
			$data['FromLoc']   		= $booking_data['FromLoc'];
			$data['Via']			= $this->input->post('via');
			$data['ToLoc']     		= $booking_data['ToLoc'];
			$data['StartDateTime'] 	= $this->input->post('pickup');
			$data['EndDateTime']   	= $this->input->post('drop');
			$data['Passanger'] 		= $booking_data['Passanger'];
			$data['Luggage'] 		= $booking_data['Luggage'];
			$data['TotalFare'] 		= $this->input->post('TotalFare');
			$data['NeededCar'] 		= $booking_data['NeededCar'];			
			$data['provider']       = $provider_1;
			$data['trip'] 			= $this->input->post('trip');
			
			
			// mail to user
			$data['UserName'] = $this->session->userdata('username'); 
			$this->email
				 ->from(ADMIN_EMAIL, TITLE)
				 ->to($user_details['Email'])
				 ->subject('Taxi Booking | '.TITLE)
				 ->message($this->load->view('mail/booking_user', $data, true))
				 ->set_mailtype('html');
			
			$this->email->send();
				 
			if($data['trip'] == 'round'){
				$data['provider2']  = $provider_2;
				$data['TotalFare'] 	= $this->input->post('TotalFare2');
				
				// mail to user for return trip
				$this->email
					 ->from(ADMIN_EMAIL, TITLE)
					 ->to($user_details['Email'])
					 ->subject('Taxi Booking | '.TITLE)
					 ->message($this->load->view('mail/booking_user_return', $data, true))
					 ->set_mailtype('html');
					 
				$this->email->send();	 
			}
			
			$data['UserName'] = "Admin"; 
			// mail to admin
			$this->email
				 ->from(ADMIN_EMAIL, TITLE)
				 ->to(BOOKING_EMAIL)
				 ->subject('Booking Inquiry')
				 ->message($this->load->view('mail/booking_user', $data, true))
				 ->set_mailtype('html');
			
			$this->email->send();
			
			$this->session->unset_userdata('booking_details');
			$this->session->unset_userdata('action');
			
			redirect('booking/success/'.$BookingID); 
		}
	  }
		// save payment detail end
		
	}
	
	
}
