<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User_model extends CI_Model{
    function getRows($params = array()){
        
		$this->db->from('user');
		
		if(array_key_exists("searchKey",$params)){
			if($params['searchKey'] != ''){
				$this->db->like('FirstName',$params['searchKey'],'both');
				$this->db->or_like('LastName',$params['searchKey'],'both');
				$this->db->or_like('Email',$params['searchKey'],'both');
				$this->db->or_like('Contact',$params['searchKey'],'both');
				$this->db->or_where('Status',$params['searchKey']);
			}
		}
        $this->db->order_by('ID','desc');
        
        if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
            $this->db->limit($params['limit'],$params['start']);
        }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
            $this->db->limit($params['limit']);
        }
        
        $query = $this->db->get();
        
        return ($query->num_rows() > 0)?$query->result_array():FALSE;
    }
	
	function get_user($ID)
    {
        return $this->db->get_where('user',array('ID'=>$ID))->row_array();
    }
    
    /*
     * Get all user
     */
    function get_all_user()
    {
        return $this->db->get('user')->result_array();
    }
    
    /*
     * function to add new user
     */
    function add_user($params)
    {
        $this->db->insert('user',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update user
     */
    function update_user($ID,$params)
    {
        $this->db->where('ID',$ID);
        $response = $this->db->update('user',$params);
        if($response)
        {
            return "user updated successfully";
        }
        else
        {
            return "Error occuring while updating user";
        }
    }
    
    /*
     * function to delete user
     */
    function delete_user($ID)
    {
        $response = $this->db->delete('user',array('ID'=>$ID));
        if($response)
        {
            return "user deleted successfully";
        }
        else
        {
            return "Error occuring while deleting user";
        }
    }
}