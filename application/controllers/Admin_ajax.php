<?php
error_reporting(0);
class Admin_ajax extends CI_Controller {
   
	public function __construct(){   
        parent::__construct();
		
		$this->load->helper(array('url'));
		$this->load->library('Ajax_pagination');
		$this->load->helper('global_function');
		$this->perPage = 10;
	}
		
	function provider()
    {
        $this->load->model('admin/provider_model', 'ci_model');
		
		$searchKey = $this->input->post('searchKey');
		$pagesize = $this->input->post('pagesize');
		if($pagesize != ''){
			$this->perPage = $pagesize;
		}
		
		$page = $this->input->post('page');
        if(!$page){
            $offset = 0;
        }else{
            $offset = $page;
        }
        
        //total rows count
        $totalRec = count($this->ci_model->getRows(array('searchKey'=>$searchKey)));
        
        //pagination configuration
        $config['target']      = '#provider';
        $config['base_url']    = base_url('admin_ajax/provider');
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        
        $this->ajax_pagination->initialize($config);
        
        //get the posts data
        $data['providers'] = $this->ci_model->getRows(array('start'=>$offset,'limit'=>$this->perPage,'searchKey'=>$searchKey));
        
        //load the view
        $this->load->view('admin/provider/ajax-pagination-data', $data, false);
    }
	
	function city()
    {
        $this->load->model('admin/city_model', 'ci_model');
		
		$searchKey = $this->input->post('searchKey');
		$pagesize = $this->input->post('pagesize');
		if($pagesize != ''){
			$this->perPage = $pagesize;
		}
		
		$page = $this->input->post('page');
        if(!$page){
            $offset = 0;
        }else{
            $offset = $page;
        }
        
        //total rows count
        $totalRec = count($this->ci_model->getRows(array('searchKey'=>$searchKey)));
        
        //pagination configuration
        $config['target']      = '#provider';
        $config['base_url']    = base_url('admin_ajax/city');
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        
        $this->ajax_pagination->initialize($config);
        
        //get the posts data
        $data['providers'] = $this->ci_model->getRows(array('start'=>$offset,'limit'=>$this->perPage,'searchKey'=>$searchKey));
        
        //load the view
        $this->load->view('admin/city/ajax-pagination-data', $data, false);
    }
	function special_fare()
    {
        $this->load->model('admin/special_fare_model', 'ci_model');
		
		$searchKey = $this->input->post('searchKey');
		$pagesize = $this->input->post('pagesize');
		if($pagesize != ''){
			$this->perPage = $pagesize;
		}
		
		$page = $this->input->post('page');
        if(!$page){
            $offset = 0;
        }else{
            $offset = $page;
        }
        
        //total rows count
        $totalRec = count($this->ci_model->getRows(array('searchKey'=>$searchKey)));
        
        //pagination configuration
        $config['target']      = '#special_fare';
        $config['base_url']    = base_url('admin_ajax/special_fare');
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        
        $this->ajax_pagination->initialize($config);
        
        //get the posts data
        $data['providers'] = $this->ci_model->getRows(array('start'=>$offset,'limit'=>$this->perPage,'searchKey'=>$searchKey));
        
        //load the view
        $this->load->view('admin/special_fare/ajax-pagination-data', $data, false);
    }
	function holidays()
    {
        $this->load->model('admin/holidays_model', 'ci_model');
		
		$searchKey = $this->input->post('searchKey');
		$pagesize = $this->input->post('pagesize');
		if($pagesize != ''){
			$this->perPage = $pagesize;
		}
		
		$page = $this->input->post('page');
        if(!$page){
            $offset = 0;
        }else{
            $offset = $page;
        }
        
        //total rows count
        $totalRec = count($this->ci_model->getRows(array('searchKey'=>$searchKey)));
        
        //pagination configuration
        $config['target']      = '#provider';
        $config['base_url']    = base_url('admin_ajax/holidays');
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        
        $this->ajax_pagination->initialize($config);
        
        //get the posts data
        $data['providers'] = $this->ci_model->getRows(array('start'=>$offset,'limit'=>$this->perPage,'searchKey'=>$searchKey));
        
        //load the view
        $this->load->view('admin/holidays/ajax-pagination-data', $data, false);
    }
	function user()
    {
        $this->load->model('admin/user_model', 'ci_model');
		
		$searchKey = $this->input->post('searchKey');
		$pagesize = $this->input->post('pagesize');
		if($pagesize != ''){
			$this->perPage = $pagesize;
		}
		
		$page = $this->input->post('page');
        if(!$page){
            $offset = 0;
        }else{
            $offset = $page;
        }
        
        //total rows count
        $totalRec = count($this->ci_model->getRows(array('searchKey'=>$searchKey)));
        
        //pagination configuration
        $config['target']      = '#user';
        $config['base_url']    = base_url('admin_ajax/user');
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        
        $this->ajax_pagination->initialize($config);
        
        //get the posts data
        $data['providers'] = $this->ci_model->getRows(array('start'=>$offset,'limit'=>$this->perPage,'searchKey'=>$searchKey));
        
        //load the view
        $this->load->view('admin/user/ajax-pagination-data', $data, false);
    }
	function booking()
	{
		$this->load->model('admin/booking_model', 'ci_model');
		
		$searchKey = $this->input->post('searchKey');
		$pagesize = $this->input->post('pagesize');
		if($pagesize != ''){
			$this->perPage = $pagesize;
		}
		
		$page = $this->input->post('page');
        if(!$page){
            $offset = 0;
        }else{
            $offset = $page;
        }
        
        //total rows count
        $totalRec = count($this->ci_model->getRows(array('searchKey'=>$searchKey)));
        
        //pagination configuration
        $config['target']      = '#booking';
        $config['base_url']    = base_url('admin_ajax/booking');
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        
        $this->ajax_pagination->initialize($config);
        
        //get the posts data
        $data['providers'] = $this->ci_model->getRows(array('start'=>$offset,'limit'=>$this->perPage,'searchKey'=>$searchKey));
        
        //load the view
        $this->load->view('admin/booking/ajax-pagination-data', $data, false);
		
	}
}