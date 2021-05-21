<?php
//error_reporting(0);
class City extends CI_Controller {
   
	public function __construct(){   
        parent::__construct();
		
		$this->load->helper(array('form', 'url'));
		if(!$this->session->userdata('is_logged_in')){
            redirect('admin');
        }
		$this->load->model('admin/city_model', 'ci_model');
		$this->load->library('Ajax_pagination');
		$this->perPage = 10;
		
	}
	function index(){
		
		$data['page_title'] = 'Cities' ." | ". ADMIN_TITLE ;
		
		//$searchKey = $this->input->post('searchKey');
		$data['searchKey'] = '';
		$data['pagesize'] = $this->input->post('pagesize');
		if($data['pagesize'] != ''){
			$this->perPage = $data['pagesize'];
		}else{
			$data['pagesize'] = 10;
		}
		
		//total rows count
		$totalRec = count($this->ci_model->getRows());//array('searchKey'=>$searchKey)));
        
        //pagination configuration
        $config['target']      = '#provider';
        $config['base_url']    = base_url('admin_ajax/city');
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        
        $this->ajax_pagination->initialize($config);
        
        //get the posts data
        $data['providers'] = $this->ci_model->getRows(array('limit'=>$this->perPage));//,'searchKey'=>$searchKey));
		
		$data['main_content'] = 'admin/city/list';
        $this->load->view('includes/template', $data);
	}	
	function add()
    {   
        $data['page_title'] = 'Create City' ." | ". ADMIN_TITLE ;
		
		if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'CityName' => $this->input->post('CityName'),
				'CountryID' => $this->input->post('CountryID'),
            );
            
            $city_id = $this->ci_model->add_city($params);
            redirect('admin/city/');
        }
        else
        {
			$data['main_content'] = 'admin/city/add';
        	$this->load->view('includes/template', $data);
        }
    }  

    /*
     * Editing a city
     */
    function edit($ID)
    {   
        $data['page_title'] = 'Edit City' ." | ". ADMIN_TITLE ;
		// check if the city exists before trying to edit it
        $city = $this->ci_model->get_city($ID);
        
        if(isset($city['ID']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'CityName' => $this->input->post('CityName'),
					'CountryID' => $this->input->post('CountryID'),
                );

                $this->ci_model->update_city($ID,$params);            
                redirect('admin/city/');
            }
            else
            {   
                $data['city'] = $this->ci_model->get_city($ID);
    
				$data['main_content'] = 'admin/city/edit';
        		$this->load->view('includes/template', $data);
            }
        }
        else
            show_error('The city you are trying to edit does not exist.');
    } 

    /*
     * Deleting city
     */
    function remove($ID)
    {
        $city = $this->ci_model->get_city($ID);

        // check if the city exists before trying to delete it
        if(isset($city['ID']))
        {
            $this->ci_model->delete_city($ID);
            redirect('admin/city/');
        }
        else
            show_error('The city you are trying to delete does not exist.');
    }
	function delete()
    {
		if(!empty($this->input->post('ids'))){
			$this->db->where_in('ID', $this->input->post('ids'));
			$this->db->delete('city');
		}
		redirect('admin/city/');
    }
}