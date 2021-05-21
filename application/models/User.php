<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User extends CI_Model
{	
	public function checkUser($data = array())
	{
		$this->db->select('ID');
		$this->db->from('users');
		$this->db->where(array('fbID'=>$data['fbID']));
		$prevQuery = $this->db->get();
		$prevCheck = $prevQuery->num_rows();
		
		if($prevCheck > 0)
		{
			$prevResult = $prevQuery->row_array();
			$userID = $prevResult['id'];
		}
		else
		{
			$insert = $this->db->insert('users',$data);
			$userID = $this->db->insert_id();
		}

		return $userID?$userID:FALSE;
    }
	public function checkGoogleUser($data = array()){
		$this->db->select('ID');
		$this->db->from('users');
		$this->db->where(array('gID'=>$data['gID']));
		$prevQuery = $this->db->get();
		$prevCheck = $prevQuery->num_rows();
		
		if($prevCheck > 0){
			$prevResult = $prevQuery->row_array();
			$userID = $prevResult['ID'];
		}else{
			$insert = $this->db->insert('users',$data);
			$userID = $this->db->insert_id();
		}

		return $userID?$userID:FALSE;
    }
}
