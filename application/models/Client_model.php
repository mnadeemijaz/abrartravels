<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Client_model extends CI_Model
{
    /**
     * This function is used to get the user listing count
     * @param string $searchText : This is optional search text
     * @return number $count : This is row count
     */
    function client_count($searchText = '',$age_group='',$visa_approve='',$agent_id='',$voucher_issue='',$documentation = '')
    {
         $this->db->select(array('c.id','c.name','c.address','c.cnic','c.passport_issue_date','c.passport_exp_date','c.dob','c.ppno','c.age_group','c.visa_id','c.agent_id','c.account_pkg','c.iata','a.name as agent_name','c.visa_approve'));
        $this->db->from('client c');
		$this->db->join('tbl_users a','a.userId = c.agent_id');
        if(!empty($searchText)) {
            $likeCriteria = "(c.name  LIKE '%".$searchText."%'
							OR  c.last_name LIKE '%".$searchText."%'
							OR  c.ppno LIKE '%".$searchText."%'
                            OR  c.address LIKE '%".$searchText."%'
                            OR  c.cnic  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
		if($age_group){
			$this->db->where('c.age_group', $age_group);
		}
		if($visa_approve){
			$this->db->where('c.visa_approve', $visa_approve);
		}
		if($this->session->userdata('role') == '3'){
			$this->db->where('c.agent_id',$this->session->userdata('userId'));
		}
		if($agent_id){
			$this->db->where('c.agent_id', $agent_id);
		}
		if($voucher_issue){
			$this->db->where('c.voucher_issue', $voucher_issue);
		}
		if($documentation){
			$this->db->where('c.document', $documentation);
		}
        $this->db->where('c.isDeleted', 0);
		$this->db->where('a.isDeleted', 0);
        $query = $this->db->get();        
        return count($query->result());
    }
    
    function client_list($searchText = '', $page, $segment,$age_group='',$visa_approve='',$agent_id='',$voucher_issue,$documentation)
    {
        $this->db->select(array('c.id','c.sr_name','c.name','c.last_name','c.document','c.address','c.cnic','c.passport_issue_date','c.passport_exp_date','c.dob','c.ppno','c.age_group','c.visa_id','c.agent_id','c.account_pkg','c.iata','a.name as agent_name','c.visa_approve','c.voucher_issue'));
        $this->db->from('client c');
		$this->db->join('tbl_users a','a.userId = c.agent_id');
        if(!empty($searchText)) {
            $likeCriteria = "(c.name  LIKE '%".$searchText."%'
							OR  c.last_name LIKE '%".$searchText."%'
							OR  c.ppno LIKE '%".$searchText."%'
                            OR  c.address LIKE '%".$searchText."%'
                            OR  c.cnic  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
		if($age_group){
			$this->db->where('c.age_group', $age_group);
		}
		if($visa_approve){
			$this->db->where('c.visa_approve', $visa_approve);
		}
		if($this->session->userdata('role') == '3'){
			$this->db->where('c.agent_id',$this->session->userdata('userId'));
		}
		if($agent_id){
			$this->db->where('c.agent_id', $agent_id);
		}
		if($voucher_issue){
			$this->db->where('c.voucher_issue', $voucher_issue);
		}
		if($documentation){
			$this->db->where('c.document', $documentation);
		}
        $this->db->where('c.isDeleted', 0);
		$this->db->where('a.isDeleted', 0);
        $this->db->limit($page, $segment);
        $query = $this->db->get();        
        $result = $query->result();   
		//echo $this->db->last_query();die();     
        return $result;
    }
        
    function add_client($hotel_info)
    {
        $this->db->trans_start();
        $this->db->insert('client', $hotel_info);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
	
	function deleteClient($id, $hotelInfo)
    {
        $this->db->where('id', $id);
        $this->db->update('client', $hotelInfo);
        //echo $this->db->last_query();die();
        return $this->db->affected_rows();
    }
	function getClientInfo($id)
    {
         $this->db->select(array('c.id','c.sr_name','c.name','c.last_name','c.document','c.address','c.cnic','c.passport_issue_date','c.passport_exp_date','c.dob','c.ppno','c.age_group','c.visa_id','c.agent_id','c.account_pkg','c.iata','a.name as agent_name','vc.name as v_name','c.visa_company_id','c.group_code','c.group_name'));
        $this->db->from('client c');
		$this->db->join('tbl_users a','a.userId = c.agent_id');
		$this->db->join('visa_company vc','vc.id = c.visa_company_id');
        $this->db->where('c.isDeleted', 0);
        $this->db->where('c.id', $id);
        $query = $this->db->get(); 
//	echo $this->db->last_query();       
        return $query->row();
    }
    
    function eidt_client($id, $hotelInfo)
    {
        $this->db->where('id', $id);
        $this->db->update('client', $hotelInfo);
        
        return TRUE;
    }
	
	
	function checkPassportNo($ppno,$id = 0)
    {
        $this->db->select("ppno");
        $this->db->from("client");
        $this->db->where("ppno", $ppno);   
        $this->db->where("voucher_issue", 'no');
		$this->db->where("isDeleted", '0'); 
		if($id != 0){
            $this->db->where("id !=", $id);
        }       
        $query = $this->db->get();
        return $query->result();
    }
	
	function visaApprove($id,$data)
	{
		$this->db->where('id',$id);
		$this->db->update('client',$data);
		return $this->db->affected_rows();
	}
	function add_client1($data)
    {
        $res = $this->db->insert_batch('client',$data);
            if($res){
                return TRUE;
            }else{
                return FALSE;
            }
    }
	
}

  