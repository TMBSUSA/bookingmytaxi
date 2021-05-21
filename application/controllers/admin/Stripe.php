<?php
//error_reporting(0);
require(APPPATH.'/libraries/stripe-php/init.php');

class Stripe extends CI_Controller {
   
	public function __construct(){   
      	//$this->load->helper(array('url'));  
	}
	function index(){
		
		
		$stripe_key = "sk_test_y4IzEfbCTF5O6n8YnTTbhoSl";
		\Stripe\Stripe::setApiKey($stripe_key);
		
		try {
			$account = \Stripe\Account::create(
				array(
					"country" => "GB",
					"managed" => true,
					"legal_entity" => array(
						'address' => array(
							'city' => 'London',
							'country' => 'GB',
							"line1" => 'London',
							"line2" => '',
							"postal_code" => 'BB',
						),
						'business_name' => 'test business name1',
						'business_tax_id' => '000000001',
						'dob' => array(
							'day' => '01',
							'month' => '01',
							'year' => '1970'
						),
						'first_name' => 'Test1',
						'last_name' => 'Test1',
						'personal_id_number' => '000000001',
						//'type' => 'sole_prop'
					),
					'tos_acceptance' => array(
						'date' => time(),
						'ip' => $_SERVER['REMOTE_ADDR']
					),
					'external_account' => array(
						"object" => "bank_account",
						"country" => "GB",
						"currency" => "GBP",
						"account_holder_name" => 'Test Test',
						"account_holder_type" => 'individual',
						"iban" => "108800",
						"account_number" => "00012345"
					)
				)
			);
			/*if($account->id != "" && isset($user['is_doc']) && $user['is_doc'] != "")
			{
			  $document = fopen(realpath('./uploads/users/document').'/'.$user['verification_document_file'],'r');
	
			  $this->pregame_user_model->uplodeVerfDocument($document,$account->id);
			}*/
	
		}
		catch (\Stripe\Error\InvalidRequest $a)
		{
			$error = $a->getMessage();
		}
		catch (Stripe\Error\ApiConnection $e)
		{
			$error = $e->getMessage();
		}
		catch (Stripe\Error\Base $b)
		{
			$error = $b->getMessage();
		}
			
		if(isset($account) && $account->id != "")
		{
			$account = \Stripe\Account::retrieve($account->id);
			
			$param = array();
			$param['stripeID'] = $account->id;
			$param['stripe_verification'] = $account->legal_entity->verification->status;
			$param['verification_details_code'] = $account->legal_entity->verification->details_code;
			$param['verification_msg'] = json_encode($account->verification);
			$param['transfers_enabled'] = ($account->transfers_enabled == true)?"1":"0";
			$param['account_status'] = ($account->legal_entity->verification->status == "verified")?"1":"0";

			echo "<pre>";
			print_r($param);
			exit;

		}
    }
}