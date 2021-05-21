<?php
//error_reporting(0);
require(APPPATH.'/libraries/stripe-php/init.php');

class Providers extends CI_Controller {
   
	public function __construct(){   
        parent::__construct();
		
		$this->load->helper(array('form', 'url'));
		if(!$this->session->userdata('is_logged_in')){
            redirect('admin');
        }
		$this->load->model('admin/provider_model', 'ci_model');
		$this->load->library('Ajax_pagination');
		$this->load->helper('global_function');
		$this->perPage = 10;
		
	}
	function index(){
		
		//$searchKey = $this->input->post('searchKey');
		$data['searchKey'] = '';
		$data['pagesize'] = $this->input->post('pagesize');
		if($data['pagesize'] != ''){
			$this->perPage = $data['pagesize'];
		}else{
			$data['pagesize'] = 10;
		}
		
		$data['page_title'] = 'Taxi Providers' ." | ". ADMIN_TITLE ;
		//total rows count
		$totalRec = count($this->ci_model->getRows());//array('searchKey'=>$searchKey)));
        
        //pagination configuration
        $config['target']      = '#provider';
        $config['base_url']    = base_url('admin_ajax/provider');
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        
        $this->ajax_pagination->initialize($config);
        
        //get the posts data
        $data['providers'] = $this->ci_model->getRows(array('limit'=>$this->perPage));//,'searchKey'=>$searchKey));
		
		$data['main_content'] = 'admin/provider/list';
        $this->load->view('includes/template', $data);
	}	
	function add()
    {   
        $data['page_title'] = 'Create Taxi Providers' ." | ". ADMIN_TITLE ;
		
		$this->load->library('form_validation');

		$this->form_validation->set_rules('PostCode','PostCode','numeric');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'CompanyName' => $this->input->post('CompanyName'),
				'StreetAddress' => $this->input->post('StreetAddress'),
				'PostCode' => $this->input->post('PostCode'),
				'City' => $this->input->post('City'),
				'ContactPerson' => $this->input->post('ContactPerson'),
				'OtherContact' => $this->input->post('OtherContact'),
				'ContactNumber' => $this->input->post('ContactNumber'),
				'Email' => $this->input->post('Email'),
				'ContractStartDate' => date("Y-m-d", strtotime($this->input->post('ContractStartDate'))),
				'ContractEndDate' => date("Y-m-d", strtotime($this->input->post('ContractEndDate'))),
				'MileRange' => $this->input->post('MileRange'),
				'TotalVehicle' => $this->input->post('TotalVehicle'),
				'Status' => $this->input->post('Status'),
            );
            
            $provider_id = $this->ci_model->add_provider($params);
            redirect('admin/providers/');
        }
        else
        {
			$data['cities'] = $this->db->get('city')->result_array();
			
			$data['main_content'] = 'admin/provider/add';
        	$this->load->view('includes/template', $data);
        }
    }  

    /*
     * Editing a provider
     */
    function edit($ID)
    {   
        $data['page_title'] = 'Edit Taxi Providers' ." | ". ADMIN_TITLE ;
		
		// check if the provider exists before trying to edit it
        $provider = $this->ci_model->get_provider($ID);
        
        if(isset($provider['ID']))
        {
            $this->load->library('form_validation');

			//$this->form_validation->set_rules('PostCode','PostCode','numeric');
			if(isset($_POST) && count($_POST) > 0)     
        	{                  	
			    $Logo = '';
				if(isset($_FILES['ProfilePic']['name'])) 
				{
					$upload_conf = array(
					'upload_path'   => realpath('./uploads/provider/logo'),
					'allowed_types' => 'gif|jpg|png|jpeg',
					'max_size'      => '10240',
					'encrypt_name'  => true,
					);
					
					$this->load->library('upload');
					$this->upload->initialize( $upload_conf );
					$field_name = 'ProfilePic';
					
					if ( !$this->upload->do_upload('ProfilePic','')){
						$error['upload']= $this->upload->display_errors();				
					}else{
						$upload_data = $this->upload->data();
						
						$resize_conf = array(
							'upload_path'  => realpath('./uploads/provider/logo/thumb/'),
							'source_image' => $upload_data['full_path'], 
							'new_image'    => $upload_data['file_path'].'/thumb/'.$upload_data['file_name'],
							'width'        => 250,
							'height'       => 250);
						
						$this->load->library('image_lib'); 
						$this->image_lib->initialize($resize_conf);
						
						// do it!
						if ( ! $this->image_lib->resize()){
							// if got fail.
							$error['resize'] = $this->image_lib->display_errors();						
						}else{
							$Logo = $upload_data['file_name'];						
						}	
					}
				}
				else
				{
					$Logo = '';
				}
				
				$params = array(
					'CompanyName' => $this->input->post('CompanyName'),
					'StreetAddress' => $this->input->post('StreetAddress'),
					'PostCode' => $this->input->post('PostCode'),
					'City' => $this->input->post('City'),
					'State' => $this->input->post('State'),
					'Country' => $this->input->post('Country'),
					'ContactPerson' => $this->input->post('ContactPerson'),
					'ContactNumber' => $this->input->post('ContactNumber'),
					'OtherContact' => $this->input->post('OtherContact'),
					'Email' => $this->input->post('Email'),
					'ContractStartDate' => date("Y-m-d", strtotime($this->input->post('ContractStartDate'))),
					'ContractEndDate' => date("Y-m-d", strtotime($this->input->post('ContractEndDate'))),
					'MileRange' => $this->input->post('MileRange'),
					'TotalVehicle' => $this->input->post('TotalVehicle'),
					'Logo' => $Logo,
					'Status' => $this->input->post('Status'),
                );

                $this->ci_model->update_provider($ID,$params);            
                redirect('admin/providers/index');
            }
            else
            {   
                $data['provider'] = $this->ci_model->get_provider($ID);
    			$data['cities'] = $this->db->get('city')->result_array();
				
				$data['main_content'] = 'admin/provider/edit';
        		$this->load->view('includes/template', $data);
            }
        }
        else
            show_error('The provider you are trying to edit does not exist.');
    } 
	
	function pricing($ID)
    {   
		// check if the provider exists before trying to edit it
        $provider = $this->ci_model->get_provider($ID);
        
        if(isset($provider['ID']))
        {
           if(isset($_POST) && count($_POST) > 0)     
        	{                  	
			    $params = array(
					'BaseCost' => $this->input->post('BaseCost'),
					'RatePerMin' => $this->input->post('RatePerMin'),
					'RatePerMile' => $this->input->post('RatePerMile'),
                );

                $this->ci_model->update_provider($ID,$params);            
                redirect('admin/providers/');
            }
        }
        else
            show_error('The provider you are trying to edit does not exist.');
    } 
	function workingdays($ID)
    {   
		// check if the provider exists before trying to edit it
        $provider = $this->ci_model->get_provider($ID);
        
        if(isset($provider['ID']))
        {
           	if(isset($_POST) && count($_POST) > 0)     
        	{                  	
				if(!empty($this->input->post('CloseDates'))){
					$CloseDates = implode(',', array_filter($this->input->post('CloseDates')));
					
					$params = array(
						'CloseDates' => $CloseDates,
						'OpenHour' => $this->input->post('OpenHour'),
						'CloseHour' => $this->input->post('CloseHour'),
					);
	
					$this->ci_model->update_provider($ID,$params);   
				}
                redirect('admin/providers/');
            }
        }
        else
            show_error('The provider you are trying to edit does not exist.');
    } 
	function banking($ID)
    {   
		// check if the provider exists before trying to edit it
        $provider = $this->ci_model->get_provider($ID);
        
        if(isset($provider['ID']))
        {
           	if(isset($_POST) && count($_POST) > 0)     
        	{                  	
			    $Identity = '';
				if(isset($_FILES['ProfilePic']['name'])) 
				{
					$upload_conf = array(
					'upload_path'   => realpath('./uploads/provider/identity'),
					'allowed_types' => 'gif|jpg|png|jpeg',
					'max_size'      => '10240',
					'encrypt_name'  => true,
					);
					
					$this->load->library('upload');
					$this->upload->initialize( $upload_conf );
					$field_name = 'ProfilePic';
					
					if ( !$this->upload->do_upload('ProfilePic','')){
						$error['upload']= $this->upload->display_errors();				
					}else{
						$upload_data = $this->upload->data();
						
						$resize_conf = array(
							'upload_path'  => realpath('./uploads/provider/identity/thumb/'),
							'source_image' => $upload_data['full_path'], 
							'new_image'    => $upload_data['file_path'].'/thumb/'.$upload_data['file_name'],
							'width'        => 250,
							'height'       => 250);
						
						$this->load->library('image_lib'); 
						$this->image_lib->initialize($resize_conf);
						
						if ( ! $this->image_lib->resize()){
							$error['resize'] = $this->image_lib->display_errors();						
						}else{
							$Identity = $upload_data['file_name'];
							if($provider['Identity'] != ''){
								if(file_exists("uploads/provider/identity/".$provider['Identity'])){
									unlink("uploads/provider/identity/".$provider['Identity']);
									unlink("uploads/provider/identity/thumb/".$provider['Identity']);
								}		
							}
						}	
					}
				}
				else
				{
					$Identity = '';
				}
				
				$params = array(
					'FirstName' => $this->input->post('FirstName'),
					'LastName' => $this->input->post('LastName'),
					'Ownersdob' => date("Y-m-d", strtotime($this->input->post('Ownersdob'))),
					'OwnersAddress' => $this->input->post('OwnersAddress'), 
					'OwnersCity' => $this->input->post('OwnersCity'),
					'OwnersPostalCode' => $this->input->post('OwnersPostalCode'),
					'AdditionalOwners' => $this->input->post('AdditionalOwners'),
					'IBAN' => $this->input->post('IBAN'),
					'AccountNo' => $this->input->post('AccountNo'),
					'CompanyName' => $this->input->post('CompanyName'),
					'BusinessTaxID' => $this->input->post('BusinessTaxID')
                );
				if($Identity != ''){
					$params['Identity'] = $Identity;
				}

                $this->ci_model->update_provider($ID,$params);            
                
/////////////////////////////////////////////////////////////////////////////////////////
//Stripe Start
				$user = $this->ci_model->get_provider($ID);
				$this->load->model('admin/city_model');
				$CompanyCity = $this->city_model->get_city($user['City']);
				$OwnnerCity = $this->city_model->get_city($params['OwnersCity']);         
				
				$dob = explode('-',$params['Ownersdob']);
                $Y = $dob[0];
                $M = $dob[1];
                $D = $dob[2];
				
			$stripe_key = "sk_test_y4IzEfbCTF5O6n8YnTTbhoSl";
			\Stripe\Stripe::setApiKey($stripe_key);
			
			// if stripe not exist start
			if($user['StripeID'] == "") {
				try {
					$account = \Stripe\Account::create(
						array(
							"country" => "GB",
							"managed" => true,
							"legal_entity" => array(
								'additional_owners' => $params['AdditionalOwners'],
								'address' => array(
									'city' => $CompanyCity['CityName'],
									'country' => 'GB',
									"line1" => $user['StreetAddress'],
									"line2" => 'GB',
									"postal_code" => $user['PostCode'],
								),
								'business_name' => $user['CompanyName'],
								'business_tax_id' => $params['BusinessTaxID'],
								'dob' => array(
									'day' => $D,
									'month' => $M,
									'year' => $Y
								),
								'first_name' => $params['FirstName'],
								'last_name' => $params['LastName'],
								'personal_address' => array(
									'city' => $OwnnerCity['CityName'],
									'line1' => $params['OwnersAddress'],
									'postal_code' => $params['OwnersPostalCode'],
								),
								'type' => 'company'
							),
							'tos_acceptance' => array(
								'date' => time(),
								'ip' => $_SERVER['REMOTE_ADDR']
							),
							'external_account' => array(
								"object" => "bank_account",
								"country" => "GB",
								"currency" => "GBP",
								"account_holder_name" => $params['FirstName']." ".$params['LastName'],
								"account_holder_type" => 'company',
								"iban" => $params['IBAN'],
								"account_number" => $params['AccountNo']
							)
						)
					);
					
					if($account->id != "" && $user['Identity'] != "")
					{
					  	$document = fopen(realpath('./uploads/provider/identity')."/".$user['Identity'],'r');
						
						$fileResponse = \Stripe\FileUpload::create(
							array(
								"purpose" => "identity_document",
								"file" => $document
							)
						);
						
						$update_account = \Stripe\Account::retrieve($account->id);
						$update_account->legal_entity->verification->document = $fileResponse->id;
						$update_account->save();
					}
					
				}
				catch (\Stripe\Error\InvalidRequest $a)
				{
					$error = $a->getMessage();
					redirect("admin/providers/edit_banking/".$ID."/".$error);
					//debug($error);
				}
				catch (Stripe\Error\ApiConnection $e)
				{
					$error = $e->getMessage();
					redirect("admin/providers/edit_banking/".$ID."/".$error);
					//debug($error);
				}
				catch (Stripe\Error\Base $b)
				{
					$error = $b->getMessage();
					redirect("admin/providers/edit_banking/".$ID."/".$error);
					//debug($error);
				}
			}
			// End stripe not exist 
			// if stripe exist start
			else
			{
				try {
					if($user['StripeID'] != "" && $user['Identity'] != "")
					{
						$document = fopen(realpath('./uploads/provider/identity')."/".$user['Identity'],'r');
						
						$fileResponse = \Stripe\FileUpload::create(
							array(
								"purpose" => "identity_document",
								"file" => $document
							)
						);
						
						$update_account = \Stripe\Account::retrieve($user['StripeID']);
						$update_account->legal_entity->verification->document = $fileResponse->id;
						$update_account->save();
					}
					$account = \Stripe\Account::retrieve($user['StripeID']);
					$account->legal_entity->address->city = $CompanyCity['CityName'];
					$account->legal_entity->address->country = "GB";
					$account->legal_entity->address->line1 = $user['StreetAddress'];
					$account->legal_entity->address->line2 = "GB";
					$account->legal_entity->address->postal_code = $user['PostCode'];
					$account->legal_entity->business_name = $user['CompanyName'];
					$account->legal_entity->business_tax_id = $params['BusinessTaxID'];
					$account->legal_entity->dob->day = $D;
					$account->legal_entity->dob->month = $M;
					$account->legal_entity->dob->year = $Y;
					$account->legal_entity->additional_owners = (!empty($params['AdditionalOwners'])) ? $params['AdditionalOwners'] : 'No';
					$account->legal_entity->first_name = $params['FirstName'];
					$account->legal_entity->last_name = $params['LastName'];
					$account->legal_entity->personal_address->city = $OwnnerCity['CityName'];
					$account->legal_entity->personal_address->line1 = $params['OwnersAddress'];
					$account->legal_entity->personal_address->postal_code = $params['OwnersPostalCode'];
					$account->legal_entity->type = 'company';
					$account->external_accounts->object = "bank_account";
					$account->external_accounts->country = "GB";
					$account->external_accounts->currency = "GBP";
					$account->external_accounts->account_holder_name = $params['FirstName']." ".$params['LastName'];
					$account->external_accounts->account_holder_type = 'company';
					$account->external_accounts->iban = $params['IBAN'];
					$account->external_accounts->account_number = $params['AccountNo'];

					$account->save();
				}
				catch (\Stripe\Error\InvalidRequest $a)
				{
					$error = $a->getMessage();
					redirect("admin/providers/edit_banking/".$ID."/".$error);
					//debug($error);	
				}
				catch (Stripe\Error\ApiConnection $e)
				{
					$error = $e->getMessage();
					redirect("admin/providers/edit_banking/".$ID."/".$error);
					//debug($error);	
				}
				catch (Stripe\Error\Base $b)
				{
					$error = $b->getMessage();
					redirect("admin/providers/edit_banking/".$ID."/".$error);
					//debug($error);	
				}
			}
			// End stripe exist
			// Update Stripe details in database
			if(isset($account) && $account->id != "")
			{
				$account = \Stripe\Account::retrieve($account->id);
				
				$param['StripeID'] = $account->id;
				$param['StripeVerification'] = $account->legal_entity->verification->status;
				$param['VerificationDetailsCode'] = $account->legal_entity->verification->details_code;
				$param['VerificationMsg'] = json_encode($account->verification);
				$param['TransfersEnabled'] = ($account->transfers_enabled == true)?"1":"0";
				
				$this->db->where('ID',$ID);
				$this->db->update('provider',$param);
				
				// Send Email start			
				if($param['StripeVerification'] == "verified") {
					$from = ADMIN_EMAIL;
					$to = $user['Email'];
					$subject = MSG_ACCOUNT_VERIFIED;
					$body = $this->load->view('mail/account_verified', $user, true);
					send_email($subject, $to, $from, $body);
				}
				if($param['StripeVerification'] == "pending") {
					$from = ADMIN_EMAIL;
					$to = $user['Email'];
					$subject = MSG_ACCOUNT_PENDING;
					$body = $this->load->view('mail/account_pending', $user, true);
					send_email($subject, $to, $from, $body);
				}
				// Send Email end
			}
			// End Update Stripe details
//Stripe end				
///////////////////////////////////////////////////////////////////
				redirect('admin/providers/');
            }
        }
        else
            show_error('The provider you are trying to edit does not exist.');
    } 
	
    /*
     * Deleting provider
     */
	function edit_banking($ID, $error){
		$data['page_title'] = 'Edit Taxi Providers' ." | ". ADMIN_TITLE ;
		
		$data['provider'] = $this->ci_model->get_provider($ID);
		$data['cities'] = $this->db->get('city')->result_array();
		$data['error'] = $error;
		
		$data['main_content'] = 'admin/provider/edit';
		$this->load->view('includes/template', $data);	
	}
	 
    function remove($ID)
    {
        $provider = $this->ci_model->get_provider($ID);

        // check if the provider exists before trying to delete it
        if(isset($provider['ID']))
        {
            $this->ci_model->delete_provider($ID);
            redirect('admin/providers/index');
        }
        else
            show_error('The provider you are trying to delete does not exist.');
    }
	function delete()
    {
		if(!empty($this->input->post('ids'))){
			$this->db->where_in('ID', $this->input->post('ids'));
			$this->db->delete('provider');
		}
		redirect('admin/providers/');
    }
	function check_stripe_status()
    {
        $users = $this->db->select('StripeID,ID,Email,CompanyName')
						  ->where('StripeVerification','pending')
						  ->or_where('StripeVerification','unverified')->get('provider')->result_array();
        
		foreach($users as $user)
		{
			$account = \Stripe\Account::retrieve($users['StripeID']);

			$param['StripeID'] = $account->id;
			$param['StripeVerification'] = $account->legal_entity->verification->status;
			$param['VerificationDetailsCode'] = $account->legal_entity->verification->details_code;
			$param['VerificationMsg'] = json_encode($account->verification);
			$param['TransfersEnabled'] = ($account->transfers_enabled == true)?"1":"0";
			
			$this->db->where('ID',$user['ID']);
			$this->db->update('provider',$param);
			
			if($param['StripeVerification'] == "verified") {
				$from = ADMIN_EMAIL;
				$to = $user['Email'];
				$subject = MSG_ACCOUNT_VERIFIED;
				$body = $this->load->view('mail/account_verified', $user, true);
				send_email($subject, $to, $from, $body);
			}
		}
    }
}