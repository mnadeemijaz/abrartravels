<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Config_model extends CI_Model
{
    
    
    function getConfig()
    {
        $this->db->select('*');
        $this->db->from('configration');        
        $query = $this->db->get();        
        $result = $query->row();        
        return $result;
    }
	function update($data)
	{
		$this->db->update('configration',$data);
	}
	
	function agentConfig($id = null)
    {
        $this->db->select('*');
        $this->db->from('tbl_users'); 
		$this->db->where('userId',$id);   
        $query = $this->db->get();        
        $result = $query->row(); 
		  //echo $this->db->last_query();die();     
        return $result;
    }
	function update_agent_config($data)
	{
		$this->db->where('userId',$this->session->userdata('userId'));   
		$this->db->update('tbl_users',$data);
		//echo $this->db->last_query();die();
	}
    function getImages($type = null)
    {
        // die('asdfff');
        $this->db->select('*');
        $this->db->from('images');        
        if ($type !== null) {
            $this->db->where('type', $type);
        }
        $query = $this->db->get();        
        $result = $query->result();        
        return $result;
    }
    function getImageById()
    {
        $id = $this->uri->segment(3);
        $this->db->select('*');
        $this->db->from('images'); 
        $this->db->where('id', $id);       
        $query = $this->db->get();        
        $result = $query->row();        
        return $result;
    }
    function updateImage($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('images', $data);
    }
    function deleteImage($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('images');
    }
    
}

  