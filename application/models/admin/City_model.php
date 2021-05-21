<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class City_model extends CI_Model{
    
	function getRows($params = array()){
        $this->db->select('a.*, b.countryName');
        $this->db->from('city a');
		$this->db->join('countries b', 'a.CountryID = b.id', 'left');
		
		if(array_key_exists("searchKey",$params)){
			$this->db->like('CityName',$params['searchKey'],'both');
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
	
	function get_city($ID)
    {
        return $this->db->get_where('city',array('ID'=>$ID))->row_array();
    }
    
    /*
     * Get all city
     */
    function get_all_city()
    {
        return $this->db->get('city')->result_array();
    }
    
    /*
     * function to add new city
     */
    function add_city($params)
    {
        $this->db->insert('city',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update city
     */
    function update_city($ID,$params)
    {
        $this->db->where('ID',$ID);
        $response = $this->db->update('city',$params);
        if($response)
        {
            return "city updated successfully";
        }
        else
        {
            return "Error occuring while updating city";
        }
    }
    
    /*
     * function to delete city
     */
    function delete_city($ID)
    {
        $response = $this->db->delete('city',array('ID'=>$ID));
        if($response)
        {
            return "city deleted successfully";
        }
        else
        {
            return "Error occuring while deleting city";
        }
    }
}