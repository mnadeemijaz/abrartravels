<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Report_model extends CI_Model
{
    /**
     * This function is used to get the user listing count
     * @param string $searchText : This is optional search text
     * @return number $count : This is row count
     */
    function pilgrim_count($agent_id=null ,$age_group = null,$searchText = null)
    {
        $this->db->select(array('c.*','vc.voucher_id','a.name as agent_name'));
        $this->db->from('voucher_client vc');
		$this->db->join('client c','c.id = vc.client_id');
		$this->db->join('tbl_users a','a.userId = c.agent_id');
		if(!empty($searchText)) {
            $likeCriteria = "(c.name  LIKE '%".$searchText."%'
							OR  c.last_name LIKE '%".$searchText."%'
                            OR  c.address LIKE '%".$searchText."%'
                            OR  c.cnic  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('c.isDeleted', 0);
		if($agent_id)
			$this->db->where('c.agent_id',$agent_id);
		if($age_group)
			$this->db->where('c.age_group',$age_group);
		if($this->session->userdata('role') == '3')
			$this->db->where('c.agent_id',$this->session->userdata('userId'));
			
		$this->db->group_by('c.id');
        $query = $this->db->get();        
        return count($query->result());
    }
    
    function pilgrim_report($page=null, $segment=null,$agent_id = null,$age_group = null,$searchText = null)
    {
        $this->db->select(array('c.*','vc.voucher_id','a.name as agent_name'));
        $this->db->from('voucher_client vc');
		$this->db->join('client c','c.id = vc.client_id');
		$this->db->join('tbl_users a','a.userId = c.agent_id');
		if(!empty($searchText)) {
            $likeCriteria = "(c.name  LIKE '%".$searchText."%'
							OR  c.last_name LIKE '%".$searchText."%'
                            OR  c.address LIKE '%".$searchText."%'
                            OR  c.cnic  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('c.isDeleted', 0);
		if($this->session->userdata('role') == '3')
			$this->db->where('c.agent_id',$this->session->userdata('userId'));
		if($agent_id)
			$this->db->where('c.agent_id',$agent_id);
		if($age_group)
			$this->db->where('c.age_group',$age_group);
		if($page){
        	$this->db->limit($page, $segment);}
		$this->db->group_by('c.id');
        $query = $this->db->get();        
        $result = $query->result();
		//echo $this->db->last_query();        
        return $result;
    }
	function arrival_count($city=null,$company_id=null,$start_date=null,$end_date=null)
    {
        $this->db->select(array('v.*','f.name as flight_name','com.name as com_name','a.name as agent_name', "COUNT(CASE WHEN c.age_group = 'Adult' THEN c.id END) AS t_adult", "COUNT(CASE WHEN c.age_group = 'Child' THEN c.id END) AS t_child", "COUNT(CASE WHEN c.age_group = 'Infant' THEN c.id END) AS t_infant"," COUNT(DISTINCT c.id) as total"));
        $this->db->from('voucher v');
		$this->db->join('voucher_client vc','vc.voucher_id=v.id');
		$this->db->join('client c','vc.client_id=c.id');
		$this->db->join('visa_company com','com.id=c.visa_company_id');
		$this->db->join('tbl_users a','a.userId=v.agent_id');
		$this->db->join('flights f','f.id = v.dep_flight');
		if($city){
			$this->db->where('v.dep_sector2', $city);
		}
		if($company_id){
			$this->db->where('c.visa_company_id', $company_id);
		}
		if($start_date){
			$this->db->where("v.date between '".date_change_db($start_date)."' and '".date_change_db($end_date)."'");
		}
        $this->db->where('v.isDeleted', 0);
		if($this->session->userdata('role') == 3)
			$this->db->where('v.agent_id', $this->session->userdata('userId'));		
		$this->db->group_by('v.id');
		$this->db->order_by('v.dep_date','asc');
        $query = $this->db->get();        
        return count($query->result());
    }
    
    function arrival_report($page=null, $segment=null,$city = null, $company_id =null,$start_date=null,$end_date=null)
    {
        $this->db->select(array('v.*','f.name as flight_name','com.name as com_name','a.name as agent_name', "COUNT(CASE WHEN c.age_group = 'Adult' THEN c.id END) AS t_adult", "COUNT(CASE WHEN c.age_group = 'Child' THEN c.id END) AS t_child", "COUNT(CASE WHEN c.age_group = 'Infant' THEN c.id END) AS t_infant"," COUNT(DISTINCT c.id) as total"));
        $this->db->from('voucher v');
		$this->db->join('voucher_client vc','vc.voucher_id=v.id');
		$this->db->join('client c','vc.client_id=c.id');
		$this->db->join('visa_company com','com.id=c.visa_company_id');
		$this->db->join('tbl_users a','a.userId=v.agent_id');
		$this->db->join('flights f','f.id = v.dep_flight');
		if($city){
			$this->db->where('v.dep_sector2', $city);
		}
		if($company_id){
			$this->db->where('c.visa_company_id', $company_id);
		}
		if($start_date){
			$this->db->where("v.dep_date between '".date_change_db($start_date)."' and '".date_change_db($end_date)."'");
		}
        $this->db->where('v.isDeleted', 0);
		if($this->session->userdata('role') == 3)
			$this->db->where('v.agent_id', $this->session->userdata('userId'));
		if($page){
        	$this->db->limit($page, $segment);}
		$this->db->group_by('v.id');
		$this->db->order_by('v.dep_date','asc');
        $query = $this->db->get();        
        $result = $query->result();  
		//echo $this->db->last_query();
        return $result;
    }
	
	function departure_count($city=null,$company_id=null,$start_date=null,$end_date=null)
    {
        $this->db->select(array('v.*','f.name as flight_name','com.name as com_name','a.name as agent_name', "COUNT(CASE WHEN c.age_group = 'Adult' THEN c.id END) AS t_adult", "COUNT(CASE WHEN c.age_group = 'Child' THEN c.id END) AS t_child", "COUNT(CASE WHEN c.age_group = 'Infant' THEN c.id END) AS t_infant"," COUNT(DISTINCT c.id) as total"));
        $this->db->from('voucher v');
		$this->db->join('voucher_client vc','vc.voucher_id=v.id');
		$this->db->join('client c','vc.client_id=c.id');
		$this->db->join('visa_company com','com.id=c.visa_company_id');
		$this->db->join('tbl_users a','a.userId=v.agent_id');
		$this->db->join('flights f','f.id = v.ret_flight');
		if($city){
			$this->db->where('v.dep_sector2', $city);
		}
		if($company_id){
			$this->db->where('c.visa_company_id', $company_id);
		}
		if($start_date){
			$this->db->where("v.ret_date between '".date_change_db($start_date)."' and '".date_change_db($end_date)."'");
		}
        $this->db->where('v.isDeleted', 0);
		if($this->session->userdata('role') == 3)
			$this->db->where('v.agent_id', $this->session->userdata('userId'));		
		$this->db->group_by('v.id');
		$this->db->order_by('v.ret_date','asc');
        $query = $this->db->get();        
        return count($query->result());
    }
    
    function departure_report($page=null, $segment=null,$city = null, $company_id =null,$start_date=null,$end_date=null)
    {
        $this->db->select(array('v.*','f.name as flight_name','com.name as com_name','a.name as agent_name', "COUNT(CASE WHEN c.age_group = 'Adult' THEN c.id END) AS t_adult", "COUNT(CASE WHEN c.age_group = 'Child' THEN c.id END) AS t_child", "COUNT(CASE WHEN c.age_group = 'Infant' THEN c.id END) AS t_infant"," COUNT(DISTINCT c.id) as total"));
        $this->db->from('voucher v');
		$this->db->join('voucher_client vc','vc.voucher_id=v.id');
		$this->db->join('client c','vc.client_id=c.id');
		$this->db->join('visa_company com','com.id=c.visa_company_id');
		$this->db->join('tbl_users a','a.userId=v.agent_id');
		$this->db->join('flights f','f.id = v.ret_flight');
		if($city){
			$this->db->where('v.dep_sector2', $city);
		}
		if($company_id){
			$this->db->where('c.visa_company_id', $company_id);
		}
		if($start_date){
			$this->db->where("v.ret_date between '".date_change_db($start_date)."' and '".date_change_db($end_date)."'");
		}
        $this->db->where('v.isDeleted', 0);
		if($this->session->userdata('role') == 3)
			$this->db->where('v.agent_id', $this->session->userdata('userId'));
		if($page){
        	$this->db->limit($page, $segment);}
		$this->db->group_by('v.id');
		$this->db->order_by('v.ret_date','asc');
        $query = $this->db->get();        
        $result = $query->result();  
		//echo $this->db->last_query();
        return $result;
    }
        function visa_count($company_id = null,$status = null,$searchText = null)
    {
         $this->db->select(array('c.id','c.name','vc.name as com_name','c.address','c.cnic','c.passport_issue_date','c.passport_exp_date','c.dob','c.ppno','c.age_group','c.visa_id','c.agent_id','c.account_pkg','c.iata','a.name as agent_name','c.visa_approve'));
        $this->db->from('client c');
		$this->db->join('tbl_users a','a.userId = c.agent_id');
		$this->db->join('visa_company vc','vc.id = c.visa_company_id');
		if(!empty($searchText)) {
            $likeCriteria = "(c.name  LIKE '%".$searchText."%'
							OR  c.last_name LIKE '%".$searchText."%'
                            OR  c.address LIKE '%".$searchText."%'
                            OR  c.cnic  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
		if($company_id){
			$this->db->where('c.visa_company_id', $company_id);
		}
		if($this->session->userdata('role') == '3'){
			$this->db->where('c.agent_id',$this->session->userdata('userId'));
		}		
		if($status){
			$this->db->where('c.visa_approve', $status);
		}
        $this->db->where('c.isDeleted', 0);
		$this->db->where('c.voucher_issue', 'yes');
        $query = $this->db->get();        
        return count($query->result());
    }
    
    function visa_report($page, $segment,$company_id='',$status = '',$searchText = '')
    {
        $this->db->select(array('c.id','c.name','c.last_name','c.visa_no','c.visa_date','vc.name as com_name','c.address','c.cnic','c.passport_issue_date','c.passport_exp_date','c.dob','c.ppno','c.age_group','c.visa_id','c.agent_id','c.account_pkg','c.iata','a.name as agent_name','c.visa_approve'));
        $this->db->from('client c');
		$this->db->join('tbl_users a','a.userId = c.agent_id');
		$this->db->join('visa_company vc','vc.id = c.visa_company_id');
		if(!empty($searchText)) {
            $likeCriteria = "(c.name  LIKE '%".$searchText."%'
							OR  c.last_name LIKE '%".$searchText."%'
                            OR  c.address LIKE '%".$searchText."%'
                            OR  c.cnic  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
		if($company_id){
			$this->db->where('c.visa_company_id', $company_id);
		}
		if($status){
			$this->db->where('c.visa_approve', $status);
		}
		if($this->session->userdata('role') == '3'){
			$this->db->where('c.agent_id',$this->session->userdata('userId'));
		}
        $this->db->where('c.isDeleted', 0);
		//$this->db->where('c.voucher_issue', 'yes');
        $this->db->limit($page, $segment);
        $query = $this->db->get();        
        $result = $query->result();   
		//echo $this->db->last_query();
        return $result;
    }
	function pilgrim_wise_count($agent_id = null,$searchText = null)
	{
		$qry = "SELECT vz.ziarat_rate, vc.client_id,vc.voucher_id,vc.document_fee,v.adult_rate,v.child_rate,v.infant_rate,v.sr_rate,c.*, ch.nights,ch.hotel_amount , ch.ttl_htl from voucher_client vc join client c on c.id=vc.client_id join voucher v on v.id = vc.voucher_id left join (select sum(city_nights) as nights,sum(hotel_amount) as hotel_amount ,sum(hotel_amount*city_nights) as ttl_htl, voucher_id from voucher_hotel where isDeleted = 0 group by voucher_id) as ch on ch.voucher_id = vc.voucher_id left join (select voucher_id,ziarat_id ,sum(ziarat_rate) as ziarat_rate from voucher_ziarat where isDeleted=0 group by voucher_id) as vz on vz.voucher_id=vc.voucher_id ";
		if(!empty($searchText)) {
            $likeCriteria = " where (c.name  LIKE '%".$searchText."%'
							OR  c.last_name LIKE '%".$searchText."%'
                            OR  c.ppno LIKE '%".$searchText."%')";
            $qry.=$likeCriteria;
        }
		else{
			$qry.="where 1";
		}
		if($this->session->userdata('role') == '3'){
			$qry.=" and c.agent_id = '".$this->session->userdata('userId')."'";
		}
		if($agent_id){
			$qry.=" and c.agent_id = '".$agent_id."'";
		}
		$query = $this->db->query($qry);
		//echo $this->db->last_query();die();     
        return count($query->result());
	}
	function pilgrim_wise_report($page= null,$seg=null,$agent_id = null,$searchText=null)
	{
		$qry = "SELECT vz.ziarat_rate, vc.client_id,vc.voucher_id,vc.document_fee,v.adult_rate,v.child_rate,v.infant_rate,v.sr_rate,c.*, ch.nights,ch.hotel_amount , ch.ttl_htl from voucher_client vc join client c on c.id=vc.client_id join voucher v on v.id = vc.voucher_id left join (select sum(city_nights) as nights,sum(hotel_amount) as hotel_amount ,sum(hotel_amount*city_nights) as ttl_htl, voucher_id from voucher_hotel where isDeleted = 0 group by voucher_id) as ch on ch.voucher_id = vc.voucher_id left join (select voucher_id,ziarat_id ,sum(ziarat_rate) as ziarat_rate from voucher_ziarat where isDeleted=0 group by voucher_id) as vz on vz.voucher_id=vc.voucher_id ";
		if(!empty($searchText)) {
            $likeCriteria = " where (c.name  LIKE '%".$searchText."%'
							OR  c.last_name LIKE '%".$searchText."%'
                            OR  c.ppno LIKE '%".$searchText."%')";
            $qry.=$likeCriteria;
        }
		else{
			$qry.="where 1";
		}
		if($this->session->userdata('role') == '3'){
			$qry.=" and c.agent_id = '".$this->session->userdata('userId')."'";
		}
		if($agent_id){
			$qry.=" and c.agent_id = '".$agent_id."'";
		}
		if($page){
			$qry.=" Limit $page";
		}
		if($seg){
			$qry.=" , $seg";
		}
		$query = $this->db->query($qry);
		$result = $query->result();   
		//echo $this->db->last_query();die();     
        return $result;		
	}
		
}

  