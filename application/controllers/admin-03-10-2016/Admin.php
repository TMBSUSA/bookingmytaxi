<?php
class Admin extends CI_Controller {
   
	public function __construct(){   
        parent::__construct();
		
		$this->load->model('admin/users_model', 'ci_model');
		$this->load->helper(array('form', 'url'));
	}
	function index(){
		$this->session->userdata('is_logged_in') ? redirect('admin/dashboard') : $this->load->view('admin/login');		
	}	
    
	function validate_credentials(){
		
		$UserName = $this->input->post('email');
		$Password = $this->input->post('password');	
		//echo $UserName . $Password;
		if( !empty($UserName) && !empty($Password) )
		{	
			$is_valid = $this->ci_model->validate($UserName, $Password);

			if($is_valid){
				$data = array(
					'email' => $UserName,
					'is_logged_in' => true,
				);
				
				$this->session->set_userdata($data);
				redirect('admin/dashboard');
				
			}else{ // incorrect username or password
				$data['message_error'] = 'wrong';
				$this->load->view('admin/login', $data);	
			}
		}
		else
		{
			$data['message_error'] = 'blank';
			$this->load->view('admin/login', $data);
		}
	}
    
	function profile(){		
		$data['page_title'] = 'Update Profile' ." | ". SITE_NAME ;
		
		if(!$this->session->userdata('is_logged_in')){
            redirect('admin');
        }
		 
		$data['profile'] = $this->ci_model->get_admin_by_id($this->session->userdata('userID'));  
		$data['main_content'] = 'admin/profile';
        $this->load->view('includes/template', $data);		
	}
    
	
	public function update(){
		$data['page_title'] = 'Update Profile' ." | ". SITE_NAME ;
		
		if(!$this->session->userdata('is_logged_in')){
            redirect('admin');
        }

		$adminID = $this->session->userdata('userID');
  		
        if ($this->input->server('REQUEST_METHOD') === 'POST'){
			
			$OldPassword = $this->input->post('OldPassword');
			
			if($this->ci_model->checkOldPass($OldPassword, $adminID))
			{
				$data_to_store = array(
					'first_name' => $this->input->post('FirstName'),
					'last_name' => $this->input->post('LastName'),
					'password' =>  sha1($this->input->post('Password'))
				);
				
				if($this->ci_model->update_user('id',$adminID, $data_to_store,'user') == TRUE)
				{					
					$data['message_error'] = 'True';				
				}
				else
				{
					$data['message_error'] = 'Wrong';
				}
			}
			else
			{
				$data['message_error'] = 'oldWrong';
			}
        }
        $data['profile'] = $this->ci_model->get_admin_by_id($adminID);  
		$data['main_content'] = 'admin/profile';		
        $this->load->view('includes/template', $data);            
    }
		
	function logout(){
		
		$array_items = array('profilepic' => '', 'userName' => '', 'userID' => '', 'is_logged_in' => '', 'email'=> '');
		$this->session->unset_userdata($array_items);
		$this->session->sess_destroy();
		redirect('admin');
	}	
}