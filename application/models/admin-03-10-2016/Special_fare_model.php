<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Special_fare_model extends CI_Model{
    function getRows($params = array()){
		
		$this->db->from('global_setting');
		
		if(array_key_exists("searchKey",$params)){
			if($params['searchKey'] != ''){
				$this->db->like('CompanyName',$params['searchKey'],'both');
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
	
	function get_special_fare($ID)
    {
        return $this->db->get_where('global_setting', array('ID' => $ID))->row_array();
    }
    
    /*
     * Get all special_fare
     */
    function get_all_special_fare()
    {
        return $this->db->get('global_setting')->result_array();
    }
    
    /*
     * function to add new special_fare
     */
    function add_special_fare($params)
    {
        $this->db->insert('global_setting',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update special_fare
     */
    function update_special_fare($ID,$params)
    {
        $this->db->where('ID',$ID);
        $response = $this->db->update('global_setting',$params);
        if($response)
        {
            return "special_fare updated successfully";
        }
        else
        {
            return "Error occuring while updating special_fare";
        }
    }
    
    /*
     * function to delete special_fare
     */
    function delete_special_fare($ID)
    {
        $response = $this->db->delete('global_setting',array('ID'=>$ID));
        if($response)
        {
            return "special_fare deleted successfully";
        }
        else
        {
            return "Error occuring while deleting special_fare";
        }
    }
}