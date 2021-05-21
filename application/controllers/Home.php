<?php
error_reporting(1);
class Home extends CI_Controller {
   
	public function __construct(){   
        parent::__construct();
		
		$this->load->helper(array('form', 'url'));
		/*if(!$this->session->userdata('is_logged_in')){
            redirect('admin');
        }*/
		$this->title = 'Home';
		$this->comman_class = 'home';
	}
	function index($action = '')
	{	
		/*echo "<pre>";
		print_r($this->session->userdata());
		exit;*/
		// check if redirected from payment page to home
		if($action == 'clear')
		{
			$this->session->unset_userdata('booking_details');
			$this->session->unset_userdata('action');
		}
		// check if redirect from facebook login in payment page 
		if($this->session->userdata('action'))
		{
			redirect('booking_detail');	
		}
		
		$data['page_title'] = $this->title ." | ". ADMIN_TITLE ;
		
		//Assets
		$data['css'] = 	[
							"<link rel='stylesheet' href='".base_url('front/css/jquery-ui.css')."' />",
							"<link rel='stylesheet' href='".base_url('front/css/jquery-ui-timepicker-addon.css')."' />"
						];
		$data['js'] = 	[
							"<script src='http://maps.googleapis.com/maps/api/js?key=".GOOGLE_PLACE."&libraries=places'></script>",
    						"<script src='". base_url('front/js/jquery-ui.min.js')."'></script>",
							"<script src='". base_url('front/js/jquery-ui-timepicker-addon.js')."'></script>",
							"<script src='". base_url('front/js/jquery.validate.min.js')."'></script>",
							"<script src='". base_url('front/js/comman.js')."'></script>",
						];						
		
		$data['main_content'] = 'front/'.$this->comman_class;
        $this->load->view('front/template', $data);
	}
	public function gettimedistance()
	{
		$fromLoc = urlencode($this->input->post('fromLoc')); 
		$toLoc = urlencode($this->input->post('toLoc')); 
		$via = urlencode($this->input->post('via')); 
		$departure_time = time(); //$this->input->post('departure_time');
		
		$url = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=".$fromLoc."&destinations=".$toLoc."&departure_time=".$departure_time."&traffic_model=best_guess&key=".GOOGLE_PLACE."";
		
		$json = json_decode(file_get_contents($url));
		
		$data['distance'] = $json->rows[0]->elements[0]->distance->text;
		$data['duration'] = $json->rows[0]->elements[0]->duration_in_traffic->text;
		echo json_encode( $data );
	}	
}