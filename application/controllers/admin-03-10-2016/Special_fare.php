<?php
//error_reporting(0);
class Special_fare extends CI_Controller {
   
	public function __construct(){   
        parent::__construct();
		
		$this->load->helper(array('form', 'url'));
		if(!$this->session->userdata('is_logged_in')){
            redirect('admin');
        }
		$this->load->model('admin/special_fare_model', 'Special_fare_model');
		$this->load->library('Ajax_pagination');
		$this->load->helper('global_function');
		$this->perPage = 10;
		
		$this->title = 'Global Settings';
		$this->comman_class = 'special_fare';
	}
	function index(){
		
		$data['page_title'] = $this->title ." | ". ADMIN_TITLE ;
		
		if(isset($_POST) && count($_POST) > 0){ 
			$params = array(
				'Commission' => $this->input->post('Commission'),
			);
			$this->db->where('ID','1');
            $this->db->update('commission',$params); 
		}
		
		//$searchKey = $this->input->post('searchKey');
		$data['searchKey'] = '';
		$data['pagesize'] = $this->input->post('pagesize');
		if($data['pagesize'] != ''){
			$this->perPage = $data['pagesize'];
		}else{
			$data['pagesize'] = 10;
		}
		
		//total rows count
		$totalRec = count($this->Special_fare_model->getRows());//array('searchKey'=>$searchKey)));
        
        //pagination configuration
        $config['target']      = '#'.$this->comman_class;
        $config['base_url']    = base_url('admin_ajax/'.$this->comman_class);
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        
        $this->ajax_pagination->initialize($config);
        
        //get the posts data
        $data['providers'] = $this->Special_fare_model->getRows(array('limit'=>$this->perPage));//,'searchKey'=>$searchKey));
		$data['commission'] = $this->db->get_where('commission',array('ID' => '1'))->row_array();
		
		$data['main_content'] = 'admin/'.$this->comman_class.'/list';
        $this->load->view('includes/template', $data);
	}	
	function add()
    {   
		$data['page_title'] = 'Create '.$this->title ." | ". ADMIN_TITLE ;
		
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $NewDate = $this->input->post('NewDate');
			$NewExtra = $this->input->post('NewExtra');
			
			if(!empty($NewDate) or !empty($NewExtra)){
				$countNewDate = count($NewDate);
				$countNewExtra = count($NewExtra);
				
				if($countNewDate > $countNewExtra){
					$count = $countNewDate;	
				}else{
					$count = $countNewExtra;	
				}
				
				for($i=0; $i<$count; $i++){
					$insert[] = array(
								'Date' => date("Y-m-d", strtotime($NewDate[$i])),
								'Extra' => $NewExtra[$i],				
							);
				}	
				$this->db->insert_batch('global_setting', $insert); 
			}
			
			redirect('admin/special_fare/');
        }
        else
        {
			$data['Providers'] = $this->db->select('ID,CompanyName')->get('provider')->result_array();
			$data['main_content'] = 'admin/special_fare/add';
			$this->load->view('includes/template', $data);
        }
    }  

    /*
     * Editing a special_fare
     */
    function edit($ID)
    {   
        $data['page_title'] = 'Edit '.$this->title ." | ". ADMIN_TITLE ;
		
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'Date' => date("Y-m-d", strtotime($this->input->post('Date'))),
					'Extra' => $this->input->post('Extra'),
                );

                $this->Special_fare_model->update_special_fare($ID,$params);            
                
				$NewDate = $this->input->post('NewDate');
				$NewExtra = $this->input->post('NewExtra');
				
				if(!empty($NewDate) or !empty($NewExtra)){
					$countNewDate = count($NewDate);
					$countNewExtra = count($NewExtra);
					
					if($countNewDate > $countNewExtra){
						$count = $countNewDate;	
					}else{
						$count = $countNewExtra;	
					}
					
					for($i=0; $i<$count; $i++){
						$insert[] = array(
									'Date' => date("Y-m-d", strtotime($NewDate[$i])),
									'Extra' => $NewExtra[$i],				
								);
 					}	
					$this->db->insert_batch('global_setting', $insert); 
				}
				
				redirect('admin/special_fare/');
            }
            else
            {   
                $data['extra'] = $this->Special_fare_model->get_special_fare($ID);
				
				$data['main_content'] = 'admin/special_fare/edit';
				$this->load->view('includes/template', $data);
            }
        
    } 

    /*
     * Deleting special_fare
     */
    function remove($ID)
    {
        $special_fare = $this->Special_fare_model->get_special_fare($ID);

        // check if the special_fare exists before trying to delete it
        if(isset($special_fare['ID']))
        {
            $this->Special_fare_model->delete_special_fare($ID);
            redirect('admin/special_fare/');
        }
        else
            show_error('The special_fare you are trying to delete does not exist.');
    }
	function delete()
    {
		if(!empty($this->input->post('ids'))){
			$this->db->where_in('ID', $this->input->post('ids'));
			$this->db->delete('global_setting');
		}
		redirect('admin/special_fare/');
    }
}