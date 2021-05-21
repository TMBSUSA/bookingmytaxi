<?php
//error_reporting(0);
class Holidays extends CI_Controller {
   
	public function __construct(){   
        parent::__construct();
		
		$this->load->helper(array('form', 'url'));
		if(!$this->session->userdata('is_logged_in')){
            redirect('admin');
        }
		$this->load->model('admin/holidays_model', 'Holidays_model');
		$this->load->library('Ajax_pagination');
		$this->perPage = 10;
		
		$this->title = 'Holidays';
		$this->comman_class = 'holidays';
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
		$totalRec = count($this->Holidays_model->getRows());//array('searchKey'=>$searchKey)));
        
        //pagination configuration
        $config['target']      = '#'.$this->comman_class;
        $config['base_url']    = base_url('admin_ajax/'.$this->comman_class);
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        
        $this->ajax_pagination->initialize($config);
        
        //get the posts data
        $data['providers'] = $this->Holidays_model->getRows(array('limit'=>$this->perPage));//,'searchKey'=>$searchKey));
		
		$data['main_content'] = 'admin/'.$this->comman_class.'/list';
        $this->load->view('includes/template', $data);
	}	
	function add()
    {   
		$data['page_title'] = 'Create '.$this->title ." | ". ADMIN_TITLE ;
		
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'ProviderID' => $this->input->post('ProviderID'),
				'Date' =>  date("Y-m-d", strtotime($this->input->post('Date'))),
            );
            
            $special_fare_id = $this->Holidays_model->add_special_fare($params);
            redirect('admin/holidays/index');
        }
        else
        {
			$data['Providers'] = $this->db->select('ID,CompanyName')->get('provider')->result_array();
			$data['main_content'] = 'admin/holidays/add';
			$this->load->view('includes/template', $data);
        }
    }  

    /*
     * Editing a special_fare
     */
    function edit($ID)
    {   
        $data['page_title'] = 'Edit '.$this->title ." | ". ADMIN_TITLE ;
		
		// check if the special_fare exists before trying to edit it
        $special_fare = $this->Holidays_model->get_special_fare($ID);
        
        if(isset($special_fare['ID']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'ProviderID' => $this->input->post('ProviderID'),
					'Date' => date("Y-m-d", strtotime($this->input->post('Date'))),
                );

                $this->Holidays_model->update_special_fare($ID,$params);            
                redirect('admin/holidays/index');
            }
            else
            {   
                $data['special_fare'] = $this->Holidays_model->get_special_fare($ID);
				
				$data['Providers'] = $this->db->select('ID,CompanyName')->get('provider')->result_array();
				$data['main_content'] = 'admin/holidays/edit';
				$this->load->view('includes/template', $data);
            }
        }
        else
            show_error('The special_fare you are trying to edit does not exist.');
    } 

    /*
     * Deleting special_fare
     */
    function remove($ID)
    {
        $special_fare = $this->Holidays_model->get_special_fare($ID);

        // check if the special_fare exists before trying to delete it
        if(isset($special_fare['ID']))
        {
            $this->Holidays_model->delete_special_fare($ID);
            redirect('admin/holidays/index');
        }
        else
            show_error('The special_fare you are trying to delete does not exist.');
    }
}