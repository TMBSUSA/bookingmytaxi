<?php
class Dashboard extends CI_Controller {
   
	public function __construct(){   
        parent::__construct();
		
		if(!$this->session->userdata('is_logged_in')){
            redirect('admin');
        }
		$this->load->model('admin/users_model', 'ci_model');
		$this->load->helper(array('form'));	
	}
	function index(){
		$data['page_title'] = 'Dashboard' ." | ". ADMIN_TITLE ;
		
		$data['companies'] = $this->db->get('provider')->num_rows();
		$data['cities'] = $this->db->get('city')->num_rows();
		
		$data['main_content'] = 'admin/dashboard';
        $this->load->view('includes/template', $data);
	}	
}