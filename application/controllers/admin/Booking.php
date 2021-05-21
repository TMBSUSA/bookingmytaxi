<?php
//error_reporting(0);
class Booking extends CI_Controller {
   
	public function __construct(){   
        parent::__construct();
		
		$this->load->helper(array('form', 'url'));
		if(!$this->session->userdata('is_logged_in')){
            redirect('admin');
        }
		$this->load->model('admin/booking_model', 'Booking_model');
		$this->load->library('Ajax_pagination');
		$this->load->helper('global_function');
		$this->perPage = 10;
		
		$this->title = 'Booking';
		$this->comman_class = 'booking';
	}
	function index(){
		
		$data['page_title'] = $this->title ." | ". ADMIN_TITLE ;
		
		//$searchKey = $this->input->post('searchKey');
		$data['searchKey'] = '';
		$data['pagesize'] = $this->input->post('pagesize');
		if($data['pagesize'] != ''){
			$this->perPage = $data['pagesize'];
		}else{
			$data['pagesize'] = 10;
		}
		
		//total rows count
		$totalRec = count($this->Booking_model->getRows());//array('searchKey'=>$searchKey)));
        
        //pagination configuration
        $config['target']      = '#'.$this->comman_class;
        $config['base_url']    = base_url('admin_ajax/'.$this->comman_class);
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        
        $this->ajax_pagination->initialize($config);
        
        //get the posts data
        $data['providers'] = $this->Booking_model->getRows(array('limit'=>$this->perPage));//,'searchKey'=>$searchKey));
		
		$data['main_content'] = 'admin/'.$this->comman_class.'/list';
        $this->load->view('includes/template', $data);
	}
	function view($ID)
    {   
		$data['page_title'] = $this->title ." | ". ADMIN_TITLE ;
        
        $data['booking'] = $this->Booking_model->get_booking_details($ID);
		
		if($data['booking']['IsRound'] == 1)
		{
			$data['return_company_details'] = $this->Booking_model->get_company_details($ID);
		}
		$data['main_content'] = 'admin/'.$this->comman_class.'/view';
        $this->load->view('includes/template', $data);
	}
	function add()
    {   
		$data['page_title'] = 'Create '.$this->title ." | ". ADMIN_TITLE ;
		
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'UserID' => $this->input->post('UserID'),
				'ProviderID' => $this->input->post('ProviderID'),
				'IsRound' => $this->input->post('IsRound'),
				'StartDate' => $this->input->post('StartDate'),
				'EndDate' => $this->input->post('EndDate'),
				'StartTime' => $this->input->post('StartTime'),
				'EndTime' => $this->input->post('EndTime'),
				'Luggage' => $this->input->post('Luggage'),
				'TotalFare' => $this->input->post('TotalFare'),
				'Rating' => $this->input->post('Rating'),
				'Status' => $this->input->post('Status'),
            );
            
            $booking_id = $this->Booking_model->add_booking($params);
            redirect('admin/booking/');
        }
        else
        {
			$data['main_content'] = 'admin/'.$this->comman_class.'/add';
        	$this->load->view('includes/template', $data);
        }
    }  

    /*
     * Editing a booking
     */
    function edit($ID)
    {   
		$data['page_title'] = 'Edit '.$this->title ." | ". ADMIN_TITLE ;
        // check if the booking exists before trying to edit it
        $booking = $this->Booking_model->get_booking($ID);
        
        if(isset($booking['ID']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'UserID' => $this->input->post('UserID'),
					'ProviderID' => $this->input->post('ProviderID'),
					'IsRound' => $this->input->post('IsRound'),
					'StartDate' => $this->input->post('StartDate'),
					'EndDate' => $this->input->post('EndDate'),
					'StartTime' => $this->input->post('StartTime'),
					'EndTime' => $this->input->post('EndTime'),
					'Luggage' => $this->input->post('Luggage'),
					'TotalFare' => $this->input->post('TotalFare'),
					'Rating' => $this->input->post('Rating'),
					'Status' => $this->input->post('Status'),
                );

                $this->Booking_model->update_booking($ID,$params);            
                redirect('admin/booking/');
            }
            else
            {   
                $data['booking'] = $this->Booking_model->get_booking($ID);
    
				$data['main_content'] = 'admin/'.$this->comman_class.'/edit';
        		$this->load->view('includes/template', $data);
            }
        }
        else
            show_error('The booking you are trying to edit does not exist.');
    } 

    /*
     * Deleting booking
     */
    function remove($ID)
    {
        $booking = $this->Booking_model->get_booking($ID);

        // check if the booking exists before trying to delete it
        if(isset($booking['ID']))
        {
            $this->Booking_model->delete_booking($ID);
            redirect('admin/booking/');
        }
        else
            show_error('The booking you are trying to delete does not exist.');
    }
	function action()
    {
		if($this->input->post('action') == 'Delete'){
			if(!empty($this->input->post('bid'))){
				$this->db->where_in('ID', $this->input->post('bid'));
				$this->db->delete('booking');
			}
		}
		if($this->input->post('action') == 'Mark as Completed'){
			if(!empty($this->input->post('bid'))){
				$this->db->where_in('ID', $this->input->post('bid'));
				$this->db->update('booking', array('Status' => 'Completed'));
			}
		}
		if($this->input->post('action') == 'Mark as Failed'){
			if(!empty($this->input->post('bid'))){
				$this->db->where_in('ID', $this->input->post('bid'));
				$this->db->update('booking', array('Status' => 'Failed'));
			}
		}
		redirect('admin/booking/');
    }
}