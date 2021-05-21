<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Booking_model extends CI_Model{
    function getRows($params = array()){
        
		$this->db->select('b.*, u.FirstName, u.LastName, u.Contact, p.CompanyName, p.ContactNumber');
		$this->db->from('booking b');
		$this->db->join('user u', 'b.UserID = u.ID', 'left');
		$this->db->join('provider p', 'b.ProviderID = p.ID', 'left');
		
		if(array_key_exists("searchKey",$params)){
			$this->db->like('CompanyName',$params['searchKey'],'both');
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
	
	function get_booking($ID)
    {
        return $this->db->get_where('booking',array('ID'=>$ID))->row_array();
    }
    function get_booking_details($ID)
    {
        return $this->db->select('b.*, u.FirstName, u.LastName, u.Contact, p.CompanyName, p.ContactNumber')
						 ->from('booking b')
						 ->join('user u', 'b.UserID = u.ID', 'left')
						 ->join('provider p', 'b.ProviderID = p.ID', 'left')
						 ->where(array('b.ID'=>$ID))->get()->row_array();
    }
    /*
     * Get all booking
     */
    function get_all_booking()
    {
        return $this->db->get('booking')->result_array();
    }
    
    /*
     * function to add new booking
     */
    function add_booking($params)
    {
        $this->db->insert('booking',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update booking
     */
    function update_booking($ID,$params)
    {
        $this->db->where('ID',$ID);
        $response = $this->db->update('booking',$params);
        if($response)
        {
            return "booking updated successfully";
        }
        else
        {
            return "Error occuring while updating booking";
        }
    }
    
    /*
     * function to delete booking
     */
    function delete_booking($ID)
    {
        $response = $this->db->delete('booking',array('ID'=>$ID));
        if($response)
        {
            return "booking deleted successfully";
        }
        else
        {
            return "Error occuring while deleting booking";
        }
    }
}