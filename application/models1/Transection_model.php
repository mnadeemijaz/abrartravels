<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Transection_model extends CI_Model
{
    /**
     * This function is used to get the user listing count
     * @param string $searchText : This is optional search text
     * @return number $count : This is row count
     */
    function transection_count($searchText = '',$agent_id = null)
    {
        $this->db->select("t.*,a.name");
        $this->db->from('transection t');
		$this->db->join('tbl_users a','a.userId = t.account_id');
        if(!empty($searchText)) {
            $likeCriteria = "(name  LIKE '%".$searchText."%'
                            OR  address LIKE '%".$searchText."%'
                            OR  cnic  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
		if($agent_id){
			$this->db->where('t.account_id', $agent_id);
		}
		if($this->session->userdata('role') == 3)
			$this->db->where('t.account_id', $this->session->userdata('userId'));
        $this->db->where('t.isDeleted', 0);
        $query = $this->db->get();        
        return count($query->result());
    }
    
    function transection($searchText = '', $page, $segment,$agent_id = null)
    {
        $this->db->select("t.*,a.name,SUM(CASE WHEN age_group = 'Adult' THEN 1 ELSE 0 END) as t_adult,SUM(CASE WHEN age_group = 'Child' THEN 1 ELSE 0 END) as t_child, SUM(CASE WHEN age_group = 'Infant' THEN 1 ELSE 0 END) as t_infant");
        $this->db->from('transection t');
		$this->db->join('voucher v','v.id = t.voucher_id','left');
		$this->db->join('voucher_client vc','vc.voucher_id=v.id','left');
		$this->db->join('client c','vc.client_id=c.id','left');
		$this->db->join('tbl_users a','a.userId = t.account_id');				
        if(!empty($searchText)) {
            $likeCriteria = "(a.name  LIKE '%".$searchText."%'
                            OR  t.amount LIKE '%".$searchText."%'
                            OR  t.voucher_id LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
		if($agent_id){
			$this->db->where('t.account_id', $agent_id);
		}
		if($this->session->userdata('role') == 3)
			$this->db->where('t.account_id', $this->session->userdata('userId'));
        $this->db->where('t.isDeleted', 0);
		$this->db->where('t.payment_type', 'dr');
        //$this->db->limit($page, $segment);
		$this->db->group_by('t.id');
        $query = $this->db->get();        
        $result = $query->result();   
		
		//echo $this->db->last_query();die();     
        return $result;
    }
	function transection1($searchText = '', $page, $segment,$agent_id = null)
    {
        $this->db->select("t.*,a.name");
        $this->db->from('transection t');
		$this->db->join('tbl_users a','a.userId = t.account_id');
        if(!empty($searchText)) {
            $likeCriteria = "(a.name  LIKE '%".$searchText."%'
                            OR  t.amount LIKE '%".$searchText."%'
                            OR  t.voucher_id LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
		if($agent_id){
			$this->db->where('t.account_id', $agent_id);
		}
		if($this->session->userdata('role') == 3)
			$this->db->where('t.account_id', $this->session->userdata('userId'));
        $this->db->where('t.isDeleted', 0);
		$this->db->where('t.payment_type', 'cr');
        //$this->db->limit($page, $segment);
        $query = $this->db->get();        
        $result = $query->result();   
		//echo $this->db->last_query();die();     
        return $result;
    }
        
    function add_transection($data)
    {
        $this->db->trans_start();
        $this->db->insert('transection', $data);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    
    function update_b_transection($id,$data)
    {
        $this->db->trans_start();
		$this->db->where('bt_id',$id);
        $this->db->update('transection', $data);
        
        $this->db->trans_complete();
        
        //return $insert_id;
    }
	
	function deleteTransection($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('transection', $data);
        //echo $this->db->last_query();die();
        return $this->db->affected_rows();
    }
	function getTransectionInfo($id)
    {
        $this->db->select("t.*,a.name");
        $this->db->from('transection t');
		$this->db->join('tbl_users a','a.userId = t.account_id');       
        $this->db->where('t.isDeleted', 0);
		$this->db->where('t.id', $id);
        $query = $this->db->get();        
        return $query->row();
    }
    
    function eidt_transection($id, $hotelInfo)
    {
        $this->db->where('id', $id);
        $this->db->update('transection', $hotelInfo);
        
        return TRUE;
    }
	
	
	function checkPassportNo($ppno,$id = 0)
    {
        $this->db->select("ppno");
        $this->db->from("client");
        $this->db->where("ppno", $ppno);   
        $this->db->where("voucher_issue", 'no'); 
		if($id != 0){
            $this->db->where("id !=", $id);
        }       
        $query = $this->db->get();
        return $query->result();
    }
	
	function balance()
	{
		$qry = "select vv.sr_rate,res.* from voucher vv right join (SELECT t.voucher_id, nv.t_adult,nv.t_child,nv.t_infant,a.name,a.userId, SUM(CASE WHEN payment_type = 'cr' THEN amount ELSE 0 END) AS credit_total, SUM(CASE WHEN payment_type = 'dr' THEN amount ELSE 0 END) AS debit_total , ts.sale_amount as sale_amountt FROM `transection` t right join tbl_users a on a.userId = t.account_id and t.isDeleted = 0  LEFT JOIN (select ts.agent_id, sum(sale) as sale_amount from ticket_sale ts where ts.isDeleted =0 group by ts.agent_id ) ts ON ts.agent_id = a.userId left join (SELECT c.agent_id, SUM(CASE WHEN age_group = 'Adult' THEN 1 ELSE 0 END) as t_adult, SUM(CASE WHEN age_group = 'Child' THEN 1 ELSE 0 END) as t_child, SUM(CASE WHEN age_group = 'Infant' THEN 1 ELSE 0 END) as t_infant FROM `client` `c` WHERE `c`.`isDeleted` =0 AND `c`.`visa_approve` = 'yes' AND `c`.`voucher_issue` = 'no' GROUP BY `c`.`agent_id` ) as nv on nv.agent_id = a.userId WHERE a.isDeleted=0 and a.roleId = 3 group by a.userId) as res on res.voucher_id = vv.id";
		//$qry = "SELECT voucher.sr_rate, nv.t_adult,nv.t_child,nv.t_infant,a.name,a.userId, SUM(CASE WHEN payment_type = 'cr' THEN amount ELSE 0 END) AS credit_total, SUM(CASE WHEN payment_type = 'dr' THEN amount ELSE 0 END) AS debit_total , ts.sale_amount as sale_amountt FROM `transection` t  right join tbl_users a on a.userId = t.account_id and t.isDeleted = 0 right join voucher on voucher.agent_id = a.userId LEFT JOIN (select ts.agent_id, sum(sale) as sale_amount from ticket_sale ts where ts.isDeleted =0 group by ts.agent_id ) ts ON ts.agent_id = a.userId left join (SELECT c.agent_id, SUM(CASE WHEN age_group = 'Adult' THEN 1 ELSE 0 END) as t_adult, SUM(CASE WHEN age_group = 'Child' THEN 1 ELSE 0 END) as t_child, SUM(CASE WHEN age_group = 'Infant' THEN 1 ELSE 0 END) as t_infant FROM `client` `c` WHERE `c`.`isDeleted` =0 AND `c`.`visa_approve` = 'yes' AND `c`.`voucher_issue` = 'no' GROUP BY `c`.`agent_id` ) as nv on nv.agent_id = a.userId  WHERE a.isDeleted=0 and a.roleId = 3 group by a.userId ";
		$query = $this->db->query($qry);	
		//echo $this->db->last_query();	
        return $query->result();
	}
	function bank_balance()
	{
		$qry = "SELECT bt.*, b.name,b.id, SUM(CASE WHEN payment_type = 'cr' THEN amount ELSE 0 END) AS credit_total, SUM(CASE WHEN payment_type = 'dr' THEN amount ELSE 0 END) AS debit_total FROM `bank_transection` bt JOIN bank b ON bt.bank_id = b.id WHERE 1 and bt.isDeleted = 0 group by b.id ";
		$query = $this->db->query($qry);		
        return $query->result();
	}
	
	function charges_wo_voucher($agent_id)
	{
		$this->db->select("v.sr_rate,a.name,SUM(CASE WHEN age_group = 'Adult' THEN 1 ELSE 0 END) as t_adult,SUM(CASE WHEN age_group = 'Child' THEN 1 ELSE 0 END) as t_child, SUM(CASE WHEN age_group = 'Infant' THEN 1 ELSE 0 END) as t_infant");
        $this->db->from('client c');		
		$this->db->join('tbl_users a','a.userId = c.agent_id');
		$this->db->join('voucher v','a.userId = v.agent_id');
		if($agent_id){
			$this->db->where('c.agent_id', $agent_id);
		}
		if($this->session->userdata('role') == 3)
			$this->db->where('c.agent_id', $this->session->userdata('userId'));
        $this->db->where('c.isDeleted', 0);
		$this->db->where('c.visa_approve', 'yes');
		$this->db->where('c.voucher_issue', 'no');
		$this->db->group_by('c.agent_id');
        $query = $this->db->get();
        $result = $query->result();
		//echo $this->db->last_query();     
        return $result;
	}
	
}

  