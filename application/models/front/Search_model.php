<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Search_model extends CI_Model{
    
	function search($data, $type = 'pickup')
    {
   		
		
		$this->db->select('p.ID,p.AvgRating,p.BaseCost,p.RatePerMin,p.RatePerMile,p.MileRange,p.OpenHour,p.CloseHour,p.TotalVehicle,c.CityName');
		
		$this->db->select("(5200 * acos( cos( radians( ".$data['from_lat']." ) ) * cos( radians( `lat` ) ) * cos(radians( `lng` ) - radians( ".$data['from_lng']." )) + sin(radians(".$data['from_lat'].")) * sin(radians(`lat`)))) `Distance`");
		
		$this->db->select("(5200 * acos( cos( radians( ".$data['to_lat']." ) ) * cos( radians( `lat` ) ) * cos(radians( `lng` ) - radians( ".$data['to_lng']." )) + sin(radians(".$data['to_lat'].")) * sin(radians(`lat`)))) `toDistance`");
		
		$this->db->from('provider p');
		$this->db->join('city c', 'p.City = c.ID', 'left');

		// Passanger & laugage wise select NeededCar from available cars
		//$this->db->where('p.AvailableVehicle >=', $data['NeededCar']);
		
		// check if date is in between contract date or not
		if($type == 'pickup')
		{	
			$this->db->where('p.ContractStartDate <=', date("Y-m-d", strtotime($data['pickup'])));
			$this->db->where('p.ContractEndDate >=', date("Y-m-d", strtotime($data['pickup'])));	
		}
		else
		{
			$this->db->where('p.ContractStartDate <=', date("Y-m-d", strtotime($data['drop'])));
			$this->db->where('p.ContractEndDate >=', date("Y-m-d", strtotime($data['drop'])));
		}
		
		// check trip is single or round
		if($data['trip'] != 'round')
		{
			// check for holiday closed day
			$this->db->where("`p`.`ID` NOT IN (SELECT `ProviderID` FROM `holiday_list` WHERE `Date` = '".date("Y-m-d", strtotime($data['pickup']))."')");
		}
		else
		{
			if($type == 'pickup')
			{
				// check for holiday closed day
				$this->db->where("`p`.`ID` NOT IN (SELECT `ProviderID` FROM `holiday_list` WHERE `Date` = '".date("Y-m-d", strtotime($data['pickup']))."')");	
			}
			else
			{
				// check for holiday closed day
				$this->db->where("`p`.`ID` NOT IN (SELECT `ProviderID` FROM `holiday_list` WHERE `Date` = '".date("Y-m-d", strtotime($data['drop']))."')");
			}
		} 
		
		//default conditions
		$this->db->where('p.Lat !=', '');
		$this->db->where('p.StripeVerification', 'verified');
		$this->db->where('p.Status', 'Active');
		//$this->db->having('Distance <', '`MileRange`');
		
		return $this->db->get()->result_array();	
    }   
	function get_commission()
    {
		$data = $this->db->get('commission')->row_array();	
		return $data['Commission'];
	}
	function get_extra_commission($date)
    {
		$data = $this->db->where('Date', $date)->get('global_setting')->row_array();	
		if(!empty($data)){
			return $data['Extra'];	
		}
		else{
			return 0;	
		}
	}
}