<?php
//error_reporting(0);
class User extends CI_Controller {
   
	public function __construct(){   
        parent::__construct();
		
		$this->load->helper(array('form', 'url'));
		if(!$this->session->userdata('is_logged_in')){
            redirect('admin');
        }
		$this->load->model('admin/user_model', 'User_model');
		$this->load->library('Ajax_pagination');
		$this->perPage = 10;
		
		$this->title = 'User';
		$this->comman_class = 'user';
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
		$totalRec = count($this->User_model->getRows());//array('searchKey'=>$searchKey)));
        
        //pagination configuration
        $config['target']      = '#'.$this->comman_class;
        $config['base_url']    = base_url('admin_ajax/'.$this->comman_class);
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        
        $this->ajax_pagination->initialize($config);
        
        //get the posts data
        $data['providers'] = $this->User_model->getRows(array('limit'=>$this->perPage));//,'searchKey'=>$searchKey));
		
		$data['main_content'] = 'admin/'.$this->comman_class.'/list';
        $this->load->view('includes/template', $data);
	}	
	function add()
    {   
        $data['page_title'] = 'Create '.$this->title ." | ". ADMIN_TITLE ;
		
		if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'FirstName' => $this->input->post('FirstName'),
				'LastName' => $this->input->post('LastName'),
				'Email' => $this->input->post('Email'),
				'Contact' => $this->input->post('Contact'),
				'ProfilePic' => $this->input->post('ProfilePic'),
				'Password' => $this->input->post('Password'),
				'Status' => $this->input->post('Status'),
            );
            
            $user_id = $this->User_model->add_user($params);
            redirect('admin/user/');
        }
        else
        {
			$data['main_content'] = 'admin/'.$this->comman_class.'/add';
        	$this->load->view('includes/template', $data);
        }
    }  

    /*
     * Editing a user
     */
    function edit($ID)
    {   
        $data['page_title'] = 'Edit '.$this->title ." | ". ADMIN_TITLE ;
		// check if the user exists before trying to edit it
        $user = $this->User_model->get_user($ID);
        
        if(isset($user['ID']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'FirstName' => $this->input->post('FirstName'),
					'LastName' => $this->input->post('LastName'),
					'Email' => $this->input->post('Email'),
					'Contact' => $this->input->post('Contact'),
					'ProfilePic' => $this->input->post('ProfilePic'),
					'Password' => $this->input->post('Password'),
					'Status' => $this->input->post('Status'),
                );

                $this->User_model->update_user($ID,$params);            
                redirect('admin/user/');
            }
            else
            {   
                $data['user'] = $this->User_model->get_user($ID);
    
				$data['main_content'] = 'admin/'.$this->comman_class.'/edit';
        		$this->load->view('includes/template', $data);
            }
        }
        else
            show_error('The user you are trying to edit does not exist.');
    } 

    /*
     * Deleting user
     */
    function remove($ID)
    {
        $user = $this->User_model->get_user($ID);

        // check if the user exists before trying to delete it
        if(isset($user['ID']))
        {
            $this->User_model->delete_user($ID);
            redirect('admin/user/');
        }
        else
            show_error('The user you are trying to delete does not exist.');
    }
	function delete()
    {
		if(!empty($this->input->post('ids'))){
			$this->db->where_in('ID', $this->input->post('ids'));
			$this->db->delete('user');
		}
		redirect('admin/user/');
    }
}