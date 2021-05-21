<?php
error_reporting(E_ALL);
class Search extends CI_Controller {
   
	public function __construct(){   
        parent::__construct();
		
		$this->load->helper(array('form'));

		/*if(!$this->session->userdata('is_logged_in')){
            redirect('admin');
        }*/
		$this->load->model('front/search_model');
		$this->title = 'Search';
		$this->comman_class = 'search';
	}
	function index()
	{
		if(isset($_POST) && count($_POST)>0)
		{	
		$data['from_loc']   = $this->input->post('from_loc');
		$data['to_loc']     = $this->input->post('to_loc');
		$data['via']     	= $this->input->post('via');
		$data['trip']    	= $this->input->post('trip');
		$data['drop']    	= $this->input->post('drop'); 
		$data['passenger'] 	= $this->input->post('passenger');
		$data['luggage'] 	= $this->input->post('luggage');
		$data['from_lat'] 	= $this->input->post('from_lat');
		$data['from_lng'] 	= $this->input->post('from_lng');
		$data['to_lat'] 	= $this->input->post('to_lat');
		$data['to_lng'] 	= $this->input->post('to_lng');
		$data['pickup'] 	= $this->input->post('pickup');	
		$data['MinEndDate'] = $this->input->post('MinEndDate');	
		
		// set commision start
		$data['commission'] = $this->search_model->get_commission();
		
			// check if extra commision is exist or not //start
			$date = date("Y-m-d", strtotime($data['pickup']));
			$data['extra_commission'] = $this->search_model->get_extra_commission($date);	
			if($data['extra_commission'] != '0'){
				$data['commission'] = $data['commission'] + $data['extra_commission'];
			}
			// check if extra commision is exist or not //end
		$data['commission']."<br />";
		// set commision end
		
		// Needed Car calculations		
		$PassengerWiseNeededCar = $data['passenger'] / 4;
		$LuggageWiseNeededCar = $data['luggage'] / 3;
		$NeededCar = $PassengerWiseNeededCar > $LuggageWiseNeededCar ? $PassengerWiseNeededCar : $LuggageWiseNeededCar;
		//		
		
		$n = $NeededCar;
		$x = 1;				 //this function will convert 1.25 to 2 or 1.66 to 2
		$data['NeededCar'] = (ceil($n)%$x === 0) ? ceil($n) : round(($n+$x/2)/$x)*$x;
		 
		// set finaldistance & finalduration start{
		$distance_duration = $this->gettimedistance($data['from_loc'], $data['to_loc'] ,$data['via'], $data['trip'], $data['pickup']);
		$data['finaldistance'] = $distance_duration['distance'];
		$data['finalduration'] = $distance_duration['duration']; //echo "<br>";
		
		$time = new DateTime($data['pickup']);
		$time->add(new DateInterval('PT' . $data['finalduration'] . 'M'));
		$data['going_out_end'] = $time->format('Y-m-d H:i:s');
		
		// check datetime wise duration 
		//$datetime_wise_duration = $this->get_time_diff($data['pickup'], $data['drop']);
				
		// Search for going out
		$providers = $this->search_model->search($data);
		//echo $this->db->last_query();
		$data['providers'] = array();
		$data['return_providers'] = array();
		$CurrentHour = $this->convert_to_float(date("H:i", strtotime($data['pickup'])));
		
		foreach($providers as $provider)
		{
			// check proviser is in distance or not
			if($provider['MileRange'] >= $provider['Distance'] && $provider['MileRange'] >= $provider['toDistance'] )
			{
				// check pickup hours fall in open & close hours
				$OpenHour = $this->convert_to_float($provider['OpenHour']);
				$CloseHour = $this->convert_to_float($provider['CloseHour']);
				
				if($OpenHour <= $CurrentHour && $CurrentHour <= $CloseHour )
				{	
					// get no of car bookred at this time
					$nums = $this->db->select('SUM(`NeededCar`) as nums')
									 ->where('StartDateTime <=', date("Y-m-d H:i:s", strtotime($data['pickup'])))
							 		 ->where('GoingOutEnd >=', date("Y-m-d H:i:s", strtotime($data['pickup'])))
									 ->where('StartDateTime >=', $data['going_out_end'])
									 ->where('GoingOutEnd <=', $data['going_out_end'])
									 ->where('ProviderID', $provider['ID'])->get('booking')->result_array();
					
					$nums = $nums[0]['nums'];
					
					// check for dynamic date time for available car
					if(($provider['TotalVehicle'] - $nums) >= $data['NeededCar'])
					{
						$data['providers'][] = $provider;	
					}		 
				}
			}
		}
		
		// Search for return
		if($data['trip'] == 'round')
		{
			$CurrentHour = $this->convert_to_float(date("H:i", strtotime($data['drop'])));
			$return_distance_duration = $this->gettimedistance($data['to_loc'], $data['from_loc'] ,'', $data['trip'], $data['drop']);
			$data['returndistance'] = $return_distance_duration['distance'];
			$data['returnduration'] = $return_distance_duration['duration'];
			
			$time = new DateTime($data['drop']);
			$time->add(new DateInterval('PT' . $data['returnduration'] . 'M'));
			$data['ReturnEnd'] = $time->format('Y-m-d H:i:s');
			
			$return_providers = $this->search_model->search($data, 'drop');
			foreach($return_providers as $provider)
			{
				if($provider['MileRange'] >= $provider['Distance'] && $provider['MileRange'] >= $provider['toDistance'])
				{
					// check drop off hours fall in open & close hours
					$OpenHour = $this->convert_to_float(date("H:i", strtotime($provider['OpenHour'])));
					$CloseHour = $this->convert_to_float(date("H:i", strtotime($provider['CloseHour'])));
					
					if($OpenHour <= $CurrentHour && $CurrentHour <= $CloseHour )
					{
						// get no of car bookred at this time
						$nums = $this->db->select('SUM(`NeededCar`) as nums')
									 ->where('EndDateTime <=', date("Y-m-d H:i:s", strtotime($data['drop'])))
							 		 ->where('ReturnEnd >=', date("Y-m-d H:i:s", strtotime($data['drop'])))
									 ->where('StartDateTime >=', $data['going_out_end'])
									 ->where('GoingOutEnd <=', $data['going_out_end'])
							 		 ->where('ProviderID', $provider['ID'])->get('booking')->result_array();
					
						$nums = $nums[0]['nums'];
						
						// check for dynamic date time 
						if(($provider['TotalVehicle'] - $nums) >= $data['NeededCar'])
						{
							$data['return_providers'][] = $provider;
						}
					}
				}
			}	
		}
		
		//set page title
		$data['page_title'] = $this->title ." | ". ADMIN_TITLE ;
		
		//<Assets> start
		$data['css'] = 	[
							"<link rel='stylesheet' href='".base_url('front/css/jquery-ui.css')."' />",
							"<link rel='stylesheet' href='".base_url('front/css/jquery-ui-timepicker-addon.css')."' />",
							'<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">'
						];
		$data['js'] = 	[
							"<script src='http://maps.googleapis.com/maps/api/js?key=".GOOGLE_PLACE."&libraries=places'></script>",
							"<script src='". base_url('front/js/jquery-ui.min.js')."'></script>",
							"<script src='". base_url('front/js/jquery-ui-timepicker-addon.js')."'></script>",
							"<script src='". base_url('front/js/jquery.validate.min.js')."'></script>",
							"<script src='". base_url('front/js/comman.js')."'></script>",
						];	
		//</Assets> end											
		
		$data['main_content'] = 'front/'.$this->comman_class;
        $this->load->view('front/template', $data);
		}
	}
	function convert_to_float($val){
		$val = explode(":",$val);
		return $val[0].".".$val[1];
	}
	function get_time_diff($start, $end)
	{
		$datetime1 = new DateTime($end);
		$datetime2 = new DateTime($start);
		$interval = $datetime1->diff($datetime2);
		
		$totalMinute = 0;
		if($interval->format('%a') > 0)
		{
			$totalMinute += $interval->format('%a') * 24 * 60;
		}
		if($interval->format('%h') > 0)
		{
			$totalMinute += $interval->format('%h') * 60;
		}
		if($interval->format('%i') > 0)
		{
			$totalMinute += $interval->format('%i');
		}
		return $totalMinute;
	}
	function gettimedistance($fromLoc, $toLoc, $via, $trip, $time = '')
	{
		if ($time != '')
		{
			$time = strtotime($time);
		}
		else
		{
			$time = time();	
		}
		
		$fromLoc 		= urlencode($fromLoc);//"Ahmedabad, Gujarat");
		$toLoc 			= urlencode($toLoc);//"Nadiad, Gujarat");
		$departure_time = $time; 
		
		if($via == '')
		{
			$url = "https://maps.googleapis.com/maps/api/distancematrix/json?units=imperial&origins=".$fromLoc."&destinations=".$toLoc."&departure_time=".$departure_time."&traffic_model=best_guess&key=".GOOGLE_PLACE."";
		
			$json = json_decode(file_get_contents($url));
			if(empty($json))
			{
				echo "here";	
				exit;
			}
			$data['distance'] = $json->rows[0]->elements[0]->distance->text;
			$data['duration'] = $json->rows[0]->elements[0]->duration_in_traffic->text;
			
			// distance duration format to normal
			$distance = explode(' ',$data['distance']);
			
			if ($distance[1] == 'mi')
			{						
				$data['distance'] = $distance[0];
			}
			if ($distance[1] == 'ft')
			{						// convert to mile
				$data['distance'] = $distance[0] * 0.000189394;
			}
			
			// converting duration format to normal	
			$duration = explode(' ',$data['duration']);
			if(isset($duration[2]))
			{
				$first_duration = $duration[0] * 60;
				$first_duration += $duration[2];	
			}
			else
			{
				$first_duration = $duration[0];	
			}
			$data['duration'] = $first_duration;
			
			return $data;		
			
			/*else
			{
				$url = "https://maps.googleapis.com/maps/api/distancematrix/json?units=imperial&origins=".$toLoc."&destinations=".$fromLoc."&departure_time=".$departure_time."&traffic_model=best_guess&key=".GOOGLE_PLACE."";
		
				$json = json_decode(file_get_contents($url));
				
				$data['distance2'] = $json->rows[0]->elements[0]->distance->text;
				$data['duration2'] = $json->rows[0]->elements[0]->duration_in_traffic->text;	
				
				$duration = explode(' ',$data['duration2']);
				if(isset($duration[2]))
				{
					$first_duration = $duration[0] * 60;
					$first_duration += $duration[2];	
				}
				else
				{
					$first_duration = $duration[0];	
				}
				$data['duration2'] = $first_duration;
				
				$data['distance'] = $data['distance'] + $data['distance2']; 
				$data['duration'] = $data['duration'] + $data['duration2'];
				return $data;
			}*/
		}
		else
		{
			$via = urlencode($via);//"Maninagar, Ahmedabad, Gujarat");
			
			$url = "https://maps.googleapis.com/maps/api/directions/json?units=imperial&origin=".$fromLoc."&destination=".$toLoc."&waypoints=".$via."&key=".GOOGLE_PLACE."";
			$json = json_decode(file_get_contents($url));
			$data['distance1'] = explode(' ',$json->routes[0]->legs[0]->distance->text);
			$data['duration1'] = explode(' ',$json->routes[0]->legs[0]->duration->text);
			$data['distance2'] = explode(' ',$json->routes[0]->legs[1]->distance->text);
			$data['duration2'] = explode(' ',$json->routes[0]->legs[1]->duration->text);
			
			$data['distance'] = $data['distance1'][0] + $data['distance2'][0];
			
			if(isset($data['duration1'][2]))
			{
				$first_duration = $data['duration1'][0] * 60;
				$first_duration += $data['duration1'][2];	
			}
			else
			{
				$first_duration = $data['duration1'][0];	
			}
			
			if(isset($data['duration2'][2]))
			{
				$secound_duration = $data['duration2'][0] * 60;
				$secound_duration += $data['duration2'][2];	
			}
			else
			{
				$secound_duration = $data['duration2'][0];	
			}
			$data['duration'] = $first_duration + $secound_duration;
			
			return $data;		
			
			/*else
			{
				$url = "https://maps.googleapis.com/maps/api/distancematrix/json?units=imperial&origins=".$toLoc."&destinations=".$fromLoc."&departure_time=".$departure_time."&traffic_model=best_guess&key=".GOOGLE_PLACE."";
		
				$json = json_decode(file_get_contents($url));
				
				$data['distance2'] = $json->rows[0]->elements[0]->distance->text;
				$data['duration2'] = $json->rows[0]->elements[0]->duration_in_traffic->text;	
				
				$duration = explode(' ',$data['duration2']);
				if(isset($duration[2]))
				{
					$first_duration = $duration[0] * 60;
					$first_duration += $duration[2];	
				}
				else
				{
					$first_duration = $duration[0];	
				}
				$data['duration2'] = $first_duration;
				
				$data['distance'] = $data['distance'] + $data['distance2']; 
				$data['duration'] = $data['duration'] + $data['duration2'];
				return $data;
			}*/
		}
	}	
	function getjsontimedistance()
	{
		$fromLoc = $_POST['fromLoc'];
		$toLoc   = $_POST['toLoc'];
		$time    = $_POST['time'];
		
		if ($time != '')
		{
			$time = strtotime($time);
		}
		else
		{
			$time = time();	
		}
		
		$fromLoc 		= urlencode($fromLoc);//"Ahmedabad, Gujarat");
		$toLoc 			= urlencode($toLoc);//"Nadiad, Gujarat");
		$departure_time = $time; 
		
		$url = "https://maps.googleapis.com/maps/api/distancematrix/json?units=imperial&origins=".$fromLoc."&destinations=".$toLoc."&departure_time=".$departure_time."&traffic_model=best_guess&key=AIzaSyDtFUynkvvH1frH5vB5LhYKyHdZJDAtvHo";
	
		$json = json_decode(file_get_contents($url));
		if(empty($json))
		{
			echo "here";	
			exit;
		}
		$distance = $json->rows[0]->elements[0]->distance->text;
		$duration = $json->rows[0]->elements[0]->duration_in_traffic->text;
		
		// distance duration format to normal
		$distance = explode(' ',$distance);
		
		if ($distance[1] == 'mi')
		{						
			$data['distance'] = $distance[0];
		}
		if ($distance[1] == 'ft')
		{						// convert to mile
			$data['distance'] = $distance[0] * 0.000189394;
		}
		
		// converting duration format to normal
		$duration = explode(' ',$duration);
		
		if(isset($duration[2]))
		{
			$first_duration = $duration[0] * 60;
			$first_duration += $duration[2];	
		}
		else
		{
			$first_duration = $duration[0];	
		}
		$data['duration'] = $first_duration;
		
		echo json_encode( $data );		
			
	}
}