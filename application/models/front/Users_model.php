<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Users_model extends CI_Model{
    
	function add_user($params)
    {
        $this->db->insert('user',$params);
		return $this->db->insert_id();
    }
	function update_user($params, $ID)
    {
        $this->db->where('ID', $ID);
		$this->db->update('user', $params); 
    }
	function user_exist($Email, $ID = '', $Contact = '')
    {		
        if($ID != ''){
			$this->db->where('ID !=', $ID);	
		}
		
		$where = "(`Email` = '$Email' ";
		
		if($Contact != ''){
			$where .= "OR `Contact` =  '$Contact'";
		}
		
		$where .= ")";
 		
		$this->db->where($where);
		return $this->db->get('user')->num_rows();
    }
	function get_user($Email)
    {		
        $user = $this->db->select('ID')->where('Email', $Email)->get('user')->row_array();
		return $user['ID'];
    }
	function get_user_data($ID)
    {		
        return $this->db->where('ID', $ID)->get('user')->row_array();		
    }
	function get_user_identity($ID)
    {		
        return $this->db->select('FirstName,LastName,Email,Contact')->where('ID', $ID)->get('user')->row_array();		
    }
	function get_booking_history($ID)
    {		
        return $this->db->select('b.ID,b.ProviderID,b.FromLoc,b.ToLoc,b.via,b.IsRound,b.StartDateTime,b.EndDateTime,b.TotalFare')
						->select('p.CompanyName,p.StreetAddress,p.ContactNumber')	
						->from('booking b')
						->join('provider p','p.ID=b.ProviderID', 'left')
						->where('UserID', $ID)
						->order_by('b.ID', 'DESC')
						->get()->result_array();		
    }
	function validate($email, $password){		
		$this->db->where('Email', $email);
		$this->db->where('Password', $password);		
		$query = $this->db->get('user')->num_rows();
		
		if($query > 0){
			return true;
		}else{
			return false;			
		} 
	}
	function add_booking($params)
    {
        $this->db->insert('booking',$params);
		return $this->db->insert_id();
    }
	function add_payment($params)
    {
        $this->db->insert('payment',$params);
		return $this->db->insert_id();
    }
	function get_booking_details($ID)
    {
		return $this->db->where('ID', $ID)->get('booking')->row_array();
    }
	function get_provider_details($ID)
    {
		return $this->db->select('CompanyName,StreetAddress,ContactNumber')->where('ID', $ID)->get('provider')->row_array();
    }
	function get_provider_2($ID)
    {
						
		return $this->db->select('p.CompanyName,p.StreetAddress,p.ContactNumber')
						->from('payment pay')
						->join('provider p','pay.ProviderID=p.ID','left')
						->where('pay.BookingID ', $ID)
						->order_by('pay.ID', 'DESC')
						->limit('1')
						->get()->row_array();						
    }
	function add_rating($params)
    {
        $this->db->insert('rating',$params);
		return $this->db->insert_id();
    }
	function get_pending_review()
    {
        return $this->db->select('b.ID,b.UserID,b.ProviderID')
						->select('u.Email,u.FirstName')	
						->from('booking b')
						->join('user u','u.ID=b.UserID', 'left')
						->where('`StartDateTime` < "'.date('Y-m-d H:i:s').'"')
						->where('`StartDateTime` >= DATE_SUB("'.date('Y-m-d H:i:s').'", INTERVAL 2 HOUR)')
						->get()->result_array();
    }
	function check_user($data = array())
	{
		$this->db->select('ID');
		$this->db->from('user');
		$this->db->where('fbID', $data['fbID']);
		$prevQuery = $this->db->get();
		$prevCheck = $prevQuery->num_rows();
		
		if($prevCheck > 0)
		{
			$prevResult = $prevQuery->row_array();
			$userID = $prevResult['ID'];
		}
		else
		{
			$insert = $this->db->insert('user',$data);
			$userID = $this->db->insert_id();
		}

		return $userID?$userID:FALSE;
    }	
	public function checkGoogleUser($data = array()){
		$this->db->select('ID');
		$this->db->from('user');
		$this->db->where(array('gID'=>$data['gID']));
		$prevQuery = $this->db->get();
		$prevCheck = $prevQuery->num_rows();
		
		if($prevCheck > 0){
			$prevResult = $prevQuery->row_array();
			$userID = $prevResult['ID'];
		}else{
			$insert = $this->db->insert('user',$data);
			$userID = $this->db->insert_id();
		}

		return $userID?$userID:FALSE;
    }
}