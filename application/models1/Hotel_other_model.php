<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Hotel_other_model extends CI_Model
{
    /**
     * This function is used to get the user listing count
     * @param string $searchText : This is optional search text
     * @return number $count : This is row count
     */
    function hotel_count($searchText = '', $page=null, $segment=null,$room_type= null,$city_name = null,$pkg_type = null,$agent_id = null)
    {
        $this->db->select(array('h.*'));
        $this->db->from('hotel h');
		$this->db->join('agent_hotel ah','ah.hotel_id = h.id','left');
		$this->db->join('tbl_users a','a.userId = ah.agent_id','left');
        if(!empty($searchText)) {
            $likeCriteria = "(h.name  LIKE '%".$searchText."%'
                            OR  h.address LIKE '%".$searchText."%'
                            OR  a.name  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('h.isDeleted', 0);
		if($room_type){
			$this->db->where('h.room_type', $room_type);			
		}
		/*if($this->session->userdata('role') == '3')
			$this->db->where('ah.agent_id',$this->session->userdata('userId'));*/
		if($city_name)
			$this->db->where('h.city_name', $city_name);
		if($agent_id)
			$this->db->where('ah.agent_id', $agent_id);
		if($pkg_type != 'all' && $pkg_type != null)
			$this->db->where('h.pkg_type', $pkg_type);
		if($page){
        	$this->db->limit($page, $segment);}
		$this->db->group_by('h.id');
        $query = $this->db->get();        
        return count($query->result());
    }
    
    function hotel_list($searchText = '', $page=null, $segment=null,$room_type= null,$city_name = null,$pkg_type = null,$agent_id = null)
    {
        $this->db->select(array('h.*'));
        $this->db->from('hotel h');
		$this->db->join('agent_hotel ah','ah.hotel_id = h.id','left');
		$this->db->join('tbl_users a','a.userId = ah.agent_id','left');
        if(!empty($searchText)) {
            $likeCriteria = "(h.name  LIKE '%".$searchText."%'
                            OR  h.address LIKE '%".$searchText."%'
                            OR  a.name  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('h.isDeleted', 0);
		if($room_type){
			$this->db->where('h.room_type', $room_type);			
		}
/*		if($this->session->userdata('role') == '3')
			$this->db->where('ah.agent_id',$this->session->userdata('userId'));*/
		if($city_name)
			$this->db->where('h.city_name', $city_name);
		if($agent_id)
			$this->db->where('ah.agent_id', $agent_id);
		if($pkg_type != 'all' && $pkg_type != null)
			$this->db->where('h.pkg_type', $pkg_type);
		if($page){
        	$this->db->limit($page, $segment);}
		$this->db->group_by('h.id');
        $query = $this->db->get(); 
		//echo $this->db->last_query();
        $result = $query->result();        
        return $result;
    }
        
    function add_hotel($hotel_info)
    {
        $this->db->trans_start();
        $this->db->insert('hotel', $hotel_info);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
	
	function deleteHotel($id, $hotelInfo)
    {
        $this->db->where('id', $id);
        $this->db->update('hotel', $hotelInfo);
        
        return $this->db->affected_rows();
    }
	function getHotelInfo($id,$room_type = null,$city_name = null)
    {
        $this->db->select(array('h.*','ah.price'));
        $this->db->from('hotel h');
		$this->db->join('agent_hotel ah','ah.hotel_id = h.id');
		$this->db->join('tbl_users a','a.userId = ah.agent_id');
        $this->db->where('h.isDeleted', 0);
        $this->db->where('h.id', $id);
		if($room_type){
			$this->db->where('h.room_type', $room_type);			
		}
		if($city_name)
			$this->db->where('h.city_name', $city_name);
        $query = $this->db->get();  
		//echo $this->db->last_query();      
        return $query->row();
    }
    
    function getHotelInfo_voucher($id,$room_type = null,$city_name = null,$agent_id = null)
    {
        $this->db->select(array('h.*','ah.price'));
        $this->db->from('hotel h');
		$this->db->join('agent_hotel ah','ah.hotel_id = h.id');
		$this->db->join('tbl_users a','a.userId = ah.agent_id');
        $this->db->where('h.isDeleted', 0);
        $this->db->where('h.id', $id);
		$this->db->where('ah.agent_id', $agent_id);
		if($room_type){
			$this->db->where('h.room_type', $room_type);			
		}
		if($city_name)
			$this->db->where('h.city_name', $city_name);
        $query = $this->db->get();  
		//echo $this->db->last_query();      
        return $query->row();
    }
    
    function eidt_hotel($id, $hotelInfo)
    {
        $this->db->where('id', $id);
        $this->db->update('hotel', $hotelInfo);
        
        return TRUE;
    }
	
	////////////// Vehicla Management ///////////////////////
	function vehicle_count($searchText = '')
    {
        $this->db->select(array('id','name'));
        $this->db->from('vehicle');
        if(!empty($searchText)) {
            $likeCriteria = "(name  LIKE '%".$searchText."%'";
            $this->db->where($likeCriteria);
        }
        $this->db->where('isDeleted', 0);
        $query = $this->db->get();        
        return count($query->result());
    }
    
    function vehicle_list($searchText = '', $page = null, $segment = null)
    {
        $this->db->select(array('id','name','sharing'));
        $this->db->from('vehicle');
        if(!empty($searchText)) {
            $likeCriteria = "(name  LIKE '%".$searchText."%'";
            $this->db->where($likeCriteria);
        }
        $this->db->where('isDeleted', 0);
		if($page){
        	$this->db->limit($page, $segment);}
        $query = $this->db->get();        
        $result = $query->result();  
		//echo $this->db->last_query();die();      
        return $result;
    }
        
    function add_vehicle($vehicle_info)
    {
        $this->db->trans_start();
        $this->db->insert('vehicle', $vehicle_info);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
	
	function delete_vehicle($id, $vehicleInfo)
    {
        $this->db->where('id', $id);
        $this->db->update('vehicle', $vehicleInfo);
        
        return $this->db->affected_rows();
    }
	function getVehicleInfo($id)
    {
        $this->db->select(array('id','name','sharing'));
        $this->db->from('vehicle');
        $this->db->where('isDeleted', 0);
        $this->db->where('id', $id);
        $query = $this->db->get();        
        return $query->row();
    }
    
    function eidt_vehicle($id, $vehivleInfo)
    {
        $this->db->where('id', $id);
        $this->db->update('vehicle', $vehivleInfo);

        return TRUE;
    }
	///////////// end vehicle management////////////////////
	
	////////////// Vehicla Trip Management ///////////////////////
	function trip_count($searchText = '')
    {
        $this->db->select(array('trip.id','trip.name','vehicle_id','price','v.name as vehicle_name'));
        $this->db->from('trip');
		$this->db->join('vehicle v','v.id = trip.vehicle_id');
        if(!empty($searchText)) {
            $likeCriteria = "(trip.name  LIKE '%".$searchText."%'";
            $this->db->where($likeCriteria);
        }
        $this->db->where('trip.isDeleted', 0);
        $query = $this->db->get();        
        return count($query->result());
    }
    
    function trip_list($searchText = '', $page=null, $segment = null,$vehicle_id = null)
    {
        $this->db->select(array('trip.id','trip.name','vehicle_id','price','v.name as vehicle_name'));
        $this->db->from('trip');
		$this->db->join('vehicle v','v.id = trip.vehicle_id');
        if(!empty($searchText)) {
            $likeCriteria = "(trip.name  LIKE '%".$searchText."%'";
            $this->db->where($likeCriteria);
        }
        $this->db->where('trip.isDeleted', 0);
		if($vehicle_id){
			$this->db->where('trip.vehicle_id', $vehicle_id);
		}
		//if($page){
        //$this->db->limit($page, $segment);}
        $query = $this->db->get();        
        $result = $query->result();  
		//echo $this->db->last_query();die();      
        return $result;
    }
        
    function add_trip($trip_info)
    {
        $this->db->trans_start();
        $this->db->insert('trip', $trip_info);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
	
	function delete_trip($id, $trip_info)
    {
        $this->db->where('id', $id);
        $this->db->update('trip', $trip_info);
        
        return $this->db->affected_rows();
    }
	function getTripInfo($id,$vehicle_id = null)
    {
        $this->db->select(array('trip.id','trip.name','vehicle_id','price','v.name as vehicle_name'));
        $this->db->from('trip');
		$this->db->join('vehicle v','v.id = trip.vehicle_id');
        $this->db->where('trip.isDeleted', 0);
        $this->db->where('trip.id', $id);
		if($vehicle_id)
			$this->db->where('trip.vehicle_id', $vehicle_id);
        $query = $this->db->get();  
		//echo $this->db->last_query();      
        return $query->row();
    }
    
    function eidt_trip($id, $vehivleInfo)
    {
        $this->db->where('id', $id);
        $this->db->update('trip', $vehivleInfo);

        return TRUE;
    }
	///////////// end vehicle Trip management////////////////////
    
	////////////// ziarat Management ///////////////////////
	function ziarat_count($searchText = '')
    {
        $this->db->select(array('id','name'));
        $this->db->from('ziarat');
        if(!empty($searchText)) {
            $likeCriteria = "(name  LIKE '%".$searchText."%'
							 OR  amount  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('isDeleted', 0);
        $query = $this->db->get();        
        return count($query->result());
    }
    
    function ziarat_list($searchText = '', $page = null, $segment = null)
    {
        $this->db->select(array('id','name','amount'));
        $this->db->from('ziarat');
        if(!empty($searchText)) {
            $likeCriteria = "(name  LIKE '%".$searchText."%'
			                            OR  rate  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('isDeleted', 0);
		if($page){
        	$this->db->limit($page, $segment);}
        $query = $this->db->get();        
        $result = $query->result();  
		//echo $this->db->last_query();die();      
        return $result;
    }
        
    function add_ziarat($ziaratInfo)
    {
        $this->db->trans_start();
        $this->db->insert('ziarat', $ziaratInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
	
	function delete_ziarat($id, $ziaratInfo)
    {
        $this->db->where('id', $id);
        $this->db->update('ziarat', $ziaratInfo);
        
        return $this->db->affected_rows();
    }
	function getZiaratInfo($id)
    {
        $this->db->select(array('id','name','amount'));
        $this->db->from('ziarat');
        $this->db->where('isDeleted', 0);
        $this->db->where('id', $id);
        $query = $this->db->get();        
        return $query->row();
    }
    
    function eidt_ziarat($id, $ziaratInfo)
    {
        $this->db->where('id', $id);
        $this->db->update('ziarat', $ziaratInfo);

        return TRUE;
    }
	///////////// end ziarat management////////////////////
	
	////////////// flight Management ///////////////////////
	function flight_count($searchText = '')
    {
        $this->db->select(array('id','name'));
        $this->db->from('flights');
        if(!empty($searchText)) {
            $likeCriteria = "(name  LIKE '%".$searchText."%'";
            $this->db->where($likeCriteria);
        }
        $this->db->where('isDeleted', 0);
        $query = $this->db->get();        
        return count($query->result());
    }
    
    function flight_list($searchText = '', $page = null, $segment = null)
    {
        $this->db->select(array('id','name','bsp'));
        $this->db->from('flights');
        if(!empty($searchText)) {
            $likeCriteria = "(name  LIKE '%".$searchText."%'";
            $this->db->where($likeCriteria);
        }
        $this->db->where('isDeleted', 0);
		if($page){
        	$this->db->limit($page, $segment);}
        $query = $this->db->get();        
        $result = $query->result();  
		//echo $this->db->last_query();die();      
        return $result;
    }
        
    function add_flight($flightInfo)
    {
        $this->db->trans_start();
        $this->db->insert('flights', $flightInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
	
	function delete_flight($id, $flightInfo)
    {
        $this->db->where('id', $id);
        $this->db->update('flights', $flightInfo);
        
        return $this->db->affected_rows();
    }
	function getFlightInfo($id)
    {
        $this->db->select(array('id','name','bsp'));
        $this->db->from('flights');
        $this->db->where('isDeleted', 0);
        $this->db->where('id', $id);
        $query = $this->db->get();        
        return $query->row();
    }
    
    function eidt_flight($id, $flightInfo)
    {
        $this->db->where('id', $id);
        $this->db->update('flights', $flightInfo);

        return TRUE;
    }
	///////////// end flight management////////////////////
	
	
	////////////// packeg Management ///////////////////////
	function packeg_count($searchText = '')
    {
        $this->db->select(array('id','name'));
        $this->db->from('packeg');
        if(!empty($searchText)) {
            $likeCriteria = "(name  LIKE '%".$searchText."%'";
            $this->db->where($likeCriteria);
        }
        $this->db->where('isDeleted', 0);
        $query = $this->db->get();        
        return count($query->result());
    }
    
    function packeg_list($searchText = '', $page = null, $segment = null)
    {
        $this->db->select(array('id','name'));
        $this->db->from('packeg');
        if(!empty($searchText)) {
            $likeCriteria = "(name  LIKE '%".$searchText."%'";
            $this->db->where($likeCriteria);
        }
        $this->db->where('isDeleted', 0);
		if($page){
        	$this->db->limit($page, $segment);}
        $query = $this->db->get();        
        $result = $query->result();  
		//echo $this->db->last_query();die();      
        return $result;
    }
        
    function add_packeg($flightInfo)
    {
        $this->db->trans_start();
        $this->db->insert('packeg', $flightInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
	
	function delete_packeg($id, $flightInfo)
    {
        $this->db->where('id', $id);
        $this->db->update('packeg', $flightInfo);
        
        return $this->db->affected_rows();
    }
	function getPackegInfo($id)
    {
        $this->db->select(array('id','name'));
        $this->db->from('packeg');
        $this->db->where('isDeleted', 0);
        $this->db->where('id', $id);
        $query = $this->db->get();        
        return $query->row();
    }
    
    function eidt_packeg($id, $flightInfo)
    {
        $this->db->where('id', $id);
        $this->db->update('packeg', $flightInfo);

        return TRUE;
    }
	///////////// end packeg management////////////////////
	
	
	////////////// Sector Management ///////////////////////
	function sector_count($searchText = '')
    {
        $this->db->select(array('id','name'));
        $this->db->from('sector');
        if(!empty($searchText)) {
            $likeCriteria = "(name  LIKE '%".$searchText."%'";
            $this->db->where($likeCriteria);
        }
        $this->db->where('isDeleted', 0);
        $query = $this->db->get();        
        return count($query->result());
    }
    
    function sector_list($searchText = '', $page = null, $segment = null)
    {
        $this->db->select(array('id','name'));
        $this->db->from('sector');
        if(!empty($searchText)) {
            $likeCriteria = "(name  LIKE '%".$searchText."%'";
            $this->db->where($likeCriteria);
        }
        $this->db->where('isDeleted', 0);
		if($page){
        	$this->db->limit($page, $segment);}
        $query = $this->db->get();        
        $result = $query->result();  
		//echo $this->db->last_query();die();      
        return $result;
    }
        
    function add_sector($flightInfo)
    {
        $this->db->trans_start();
        $this->db->insert('sector', $flightInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
	
	function delete_sector($id, $flightInfo)
    {
        $this->db->where('id', $id);
        $this->db->update('sector', $flightInfo);
        
        return $this->db->affected_rows();
    }
	function getSectorInfo($id)
    {
        $this->db->select(array('id','name'));
        $this->db->from('sector');
        $this->db->where('isDeleted', 0);
        $this->db->where('id', $id);
        $query = $this->db->get();        
        return $query->row();
    }
    
    function eidt_sector($id, $flightInfo)
    {
        $this->db->where('id', $id);
        $this->db->update('sector', $flightInfo);

        return TRUE;
    }
	///////////// end flight management////////////////////
	
	////////////// visa company Management ///////////////////////
	function visaCompany_count($searchText = '')
    {
        $this->db->select(array('id','name'));
        $this->db->from('visa_company');
        if(!empty($searchText)) {
            $likeCriteria = "(name  LIKE '%".$searchText."%'";
            $this->db->where($likeCriteria);
        }
        $this->db->where('isDeleted', 0);
        $query = $this->db->get();        
        return count($query->result());
    }
    
    function visaCompany_list($searchText = '', $page = null, $segment = null)
    {
        $this->db->select(array('id','name'));
        $this->db->from('visa_company');
        if(!empty($searchText)) {
            $likeCriteria = "(name  LIKE '%".$searchText."%'";
            $this->db->where($likeCriteria);
        }
        $this->db->where('isDeleted', 0);
		if($page){
        	$this->db->limit($page, $segment);}
        $query = $this->db->get();        
        $result = $query->result();  
		//echo $this->db->last_query();die();      
        return $result;
    }
        
    function add_visaCompany($flightInfo)
    {
        $this->db->trans_start();
        $this->db->insert('visa_company', $flightInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
	
	function delete_visaCompany($id, $flightInfo)
    {
        $this->db->where('id', $id);
        $this->db->update('visa_company', $flightInfo);
        
        return $this->db->affected_rows();
    }
	function getVisaCompanyInfo($id)
    {
        $this->db->select(array('id','name'));
        $this->db->from('visa_company');
        $this->db->where('isDeleted', 0);
        $this->db->where('id', $id);
        $query = $this->db->get();        
        return $query->row();
    }
    
    function eidt_visaCompany($id, $flightInfo)
    {
        $this->db->where('id', $id);
        $this->db->update('visa_company', $flightInfo);

        return TRUE;
    }
	///////////// end visa company management////////////////////
	
	////////////// agent Management ///////////////////////
	function agent_count($searchText = '')
    {
        $this->db->select(array('id','name'));
        $this->db->from('agent');
        if(!empty($searchText)) {
            $likeCriteria = "(name  LIKE '%".$searchText."%'
								OR  address LIKE '%".$searchText."%'
								OR  cnic LIKE '%".$searchText."%'
								OR  email_id LIKE '%".$searchText."%'
								OR  agrement LIKE '%".$searchText."%'";
            $this->db->where($likeCriteria);
        }
        $this->db->where('isDeleted', 0);
        $query = $this->db->get();        
        return count($query->result());
    }
    
    function agent_list($searchText = '', $page = null, $segment = null)
    {
        $this->db->select(array('id','name','address','cnic','email_id','agrement'));
        $this->db->from('agent');
        if(!empty($searchText)) {
            $likeCriteria = "(name  LIKE '%".$searchText."%'
								OR  address LIKE '%".$searchText."%'
								OR  cnic LIKE '%".$searchText."%'
								OR  email_id LIKE '%".$searchText."%'
								OR  agrement LIKE '%".$searchText."%'";
            $this->db->where($likeCriteria);
        }
        $this->db->where('isDeleted', 0);
		if($page){
        	$this->db->limit($page, $segment);}
        $query = $this->db->get();        
        $result = $query->result();  
		//echo $this->db->last_query();die();      
        return $result;
    }
	function agent_list_users($searchText = '', $page = null, $segment = null)
    {
        $this->db->select(array('userId','name'));
        $this->db->from('tbl_users');
        $this->db->where('isDeleted', 0);
		$this->db->where('roleId',3);
		if($page){
        	$this->db->limit($page, $segment);}
        $query = $this->db->get();        
        $result = $query->result();  
		//echo $this->db->last_query();die();      
        return $result;
    }
        
    function add_agent($agentInfo)
    {
        $this->db->trans_start();
        $this->db->insert('agent', $agentInfo);
        //echo $this->db->last_query();
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
	
	function delete_agent($id, $agentInfo)
    {
        $this->db->where('id', $id);
        $this->db->update('agent', $agentInfo);
        
        return $this->db->affected_rows();
    }
	function getAgentInfo($id)
    {
        $this->db->select(array('id','name','address','cnic','email_id','agrement'));
        $this->db->from('agent');
        $this->db->where('isDeleted', 0);
        $this->db->where('id', $id);
        $query = $this->db->get();        
        return $query->row();
    }
    
    function eidt_agent($id, $agentInfo)
    {
        $this->db->where('id', $id);
        $this->db->update('agent', $agentInfo);

        return TRUE;
    }
	function checkEmailExists($email,$id = 0)
    {
        $this->db->select("email_id");
        $this->db->from("agent");
        $this->db->where("email_id", $email);   
        $this->db->where("isDeleted", 0); 
		if($id != 0){
            $this->db->where("id !=", $id);
        }       
        $query = $this->db->get();
//echo $this->db->last_query();die('fddf');
        return $query->result();
    }
	
	function add_voucher($data)
	{
		$this->db->insert('voucher',$data);
		return $this->db->insert_id();
	}
	function inter_hotel_voucher($data)
	{
		$this->db->insert('voucher_hotel',$data);
		return $this->db->insert_id();
	}
	function inter_voucher_ziarat($data){
		$this->db->insert('voucher_ziarat',$data);
		return $this->db->insert_id();
	}
	function add_client_voucher($data)
	{
		$this->db->insert('voucher_client',$data);
		return $this->db->insert_id();
	}
	function add_payment($data)
	{
		$this->db->insert('transection',$data);
		return $this->db->insert_id();
	}
	function update_payment($id,$data)
	{
		$this->db->where('voucher_id',$id);
		$this->db->update('transection',$data);
		return $this->db->affected_rows();
	}
	function voucher_count($searchText = '',$agent_id = null,$v_status=null,$date = null)
    {
        $this->db->select(array('v.*','a.name as agent_name', "COUNT(CASE WHEN c.age_group = 'Adult' THEN c.id END) AS t_adult", "COUNT(CASE WHEN c.age_group = 'Child' THEN c.id END) AS t_child", "COUNT(CASE WHEN c.age_group = 'Infant' THEN c.id END) AS t_infant"," COUNT(DISTINCT c.id) as total"));
        $this->db->from('voucher v');
		$this->db->join('voucher_client vc','vc.voucher_id=v.id');
		$this->db->join('client c','vc.client_id=c.id');
		$this->db->join('tbl_users a','a.userId=v.agent_id');
		$this->db->join('voucher_hotel vh','vh.voucher_id=v.id','left');
        if(!empty($searchText)) {
            $likeCriteria = "(a.name  LIKE '%".$searchText."%'							
                            OR  v.id  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
		if($agent_id){
			$this->db->where('v.agent_id', $agent_id);
		}
		if($v_status){
			$this->db->where('v.approve', $v_status);
		}
		if($date){
			$this->db->where('v.date', date_change_db($date));
		}
        $this->db->where('v.isDeleted', 0);
		if($this->session->userdata('role') == 3)
			$this->db->where('v.agent_id', $this->session->userdata('userId'));
		$this->db->group_by('v.id');
		$this->db->order_by('v.id','desc');
        $query = $this->db->get(); 
		//echo $this->db->last_query();
        return count($query->result());
    }
    
    function voucher_list($searchText = '', $page = null, $segment = null,$agent_id = null,$v_status=null,$date = null)
    {
        $this->db->select(array('v.*','a.name as agent_name', "COUNT(DISTINCT(CASE WHEN c.age_group = 'Adult' THEN c.id END)) AS t_adult", "COUNT(DISTINCT(CASE WHEN c.age_group = 'Child' THEN c.id END)) AS t_child", "COUNT(DISTINCT(CASE WHEN c.age_group = 'Infant' THEN c.id END)) AS t_infant"," COUNT(DISTINCT c.id) as total"));
        $this->db->from('voucher v');
		$this->db->join('voucher_client vc','vc.voucher_id=v.id');
		$this->db->join('client c','vc.client_id=c.id');
		$this->db->join('tbl_users a','a.userId=v.agent_id');
		$this->db->join('voucher_hotel vh','vh.voucher_id=v.id','left');
        if(!empty($searchText)) {
            $likeCriteria = "(a.name  LIKE '%".$searchText."%'							
                            OR  v.id  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
		if($agent_id){
			$this->db->where('v.agent_id', $agent_id);
		}
		if($v_status){
			$this->db->where('v.approve', $v_status);
		}
		if($date){
			$this->db->where('v.date', date_change_db($date));
		}
        $this->db->where('v.isDeleted', 0);
		if($this->session->userdata('role') == 3)
			$this->db->where('v.agent_id', $this->session->userdata('userId'));
		$this->db->group_by('v.id');
		$this->db->order_by('v.id','desc');
		if($page){
			$this->db->limit($page, $segment);
		}
        $query = $this->db->get();        
        $result = $query->result();  
		//echo $this->db->last_query();
        return $result;
    }
	function voucher_view($id)
    {
        $this->db->select(array('v.*','df.name as dep_flight_name','rf.name as ret_flight_name','vcc.name as shirka','s.name as s_name','rs2.name as rsname','a.name as agent_name',"SUM(CASE WHEN age_group = 'Adult' THEN 1 ELSE 0 END) as t_adult","SUM(CASE WHEN age_group = 'Child' THEN 1 ELSE 0 END) as t_child","SUM(CASE WHEN age_group = 'Infant' THEN 1 ELSE 0 END) as t_infant","count(age_group) as total"));
        $this->db->from('voucher v');
		$this->db->join('voucher_client vc','vc.voucher_id=v.id');
		$this->db->join('client c','vc.client_id=c.id');
		$this->db->join('tbl_users a','a.userId=c.agent_id');
		$this->db->join('sector s','s.id=v.dep_sector');
		//$this->db->join('sector s1','s1.id=v.dep_sector2');
		//$this->db->join('sector rs','rs.id=v.ret_sector');
		$this->db->join('sector rs2','rs2.id=v.ret_sector2');
		$this->db->join('visa_company vcc','vcc.id=c.visa_company_id');
		$this->db->join('flights df','df.id=v.dep_flight');
		$this->db->join('flights rf','rf.id=v.ret_flight');
		
        $this->db->where('v.id',$id);
        $this->db->where('v.isDeleted', 0);
        $query = $this->db->get();        
        $result = $query->row();  
		//echo $this->db->last_query();die();      
        return $result;
    }
	function getVoucherInfo($id)
    {
        $this->db->select(array('v.*','vcc.name as shirka','s.name as s_name','rs2.name as rsname','a.name as agent_name',"SUM(CASE WHEN age_group = 'Adult' THEN 1 ELSE 0 END) as t_adult","SUM(CASE WHEN age_group = 'Child' THEN 1 ELSE 0 END) as t_child","SUM(CASE WHEN age_group = 'Infant' THEN 1 ELSE 0 END) as t_infant","count(age_group) as total"));
        $this->db->from('voucher v');
		$this->db->join('voucher_client vc','vc.voucher_id=v.id');
		$this->db->join('client c','vc.client_id=c.id');
		$this->db->join('tbl_users a','a.userId=c.agent_id');
		$this->db->join('sector s','s.id=v.dep_sector');
		//$this->db->join('sector s1','s1.id=v.dep_sector2');
		//$this->db->join('sector rs','rs.id=v.ret_sector');
		$this->db->join('sector rs2','rs2.id=v.ret_sector2');
		$this->db->join('visa_company vcc','vcc.id=c.visa_company_id');
		
        $this->db->where('v.id',$id);
        $this->db->where('v.isDeleted', 0);
        $query = $this->db->get();        
        $result = $query->row();  
		//echo $this->db->last_query();die();      
        return $result;
    }
	function get_clientInfo($id)
    {
        $this->db->select(array("SUM(CASE WHEN age_group = 'Adult' THEN 1 ELSE 0 END) as t_adult","SUM(CASE WHEN age_group = 'Child' THEN 1 ELSE 0 END) as t_child","SUM(CASE WHEN age_group = 'Infant' THEN 1 ELSE 0 END) as t_infant","count(age_group) as total"));
        $this->db->from('client');				
        $this->db->where_in('id',$id);
        $this->db->where('isDeleted', 0);
        $query = $this->db->get();        
        $result = $query->row();  
		//echo $this->db->last_query();die();      
        return $result;
    }
	function get_client($id)
	{
		$this->db->select(array("*"));
        $this->db->from('client');				
        $this->db->where('id',$id);
        $this->db->where('isDeleted', 0);
        $query = $this->db->get();        
        $result = $query->row();  
        return $result;
	}
	
	function view_voucher_clients($id)
	{
		$this->db->select(array('c.*','vc.document','vc.document_fee'));
        $this->db->from('voucher_client vc');
		$this->db->join('client c','vc.client_id=c.id');
        $this->db->where('vc.voucher_id',$id);
        $query = $this->db->get();        
        $result = $query->result();     
        return $result;
	}
	function view_voucher_hotels($id)
	{
		$this->db->select(array('vh.*'));
        $this->db->from('voucher_hotel vh');
		//$this->db->join('client c','vc.client_id=c.id');
        $this->db->where('vh.voucher_id',$id);
        $query = $this->db->get();        
        $result = $query->result();
		//echo $this->db->last_query();     
        return $result;
	}
	
	function view_voucher_ziarat($id)
	{
		$this->db->select(array('*'));
        $this->db->from('voucher_ziarat vz');
		$this->db->join("ziarat z","vz.ziarat_id=z.id and vz.voucher_id = $id","right");
        //$this->db->where('vz.voucher_id',$id);
		$this->db->order_by('z.id','asc');
        $query = $this->db->get();        
        $result = $query->result();  
		//echo $this->db->last_query();die();   
        return $result;
	}
	function voucherApprove($id,$data)
	{
		$this->db->where('id',$id);
		$this->db->update('voucher',$data);
		return $this->db->affected_rows();
	}
	function total_clients()
	{
		$this->db->select("SUM(CASE WHEN voucher_issue = 'yes' THEN 1 ELSE 0 END) as v_total,SUM(CASE WHEN voucher_issue = 'no' THEN 1 ELSE 0 END) as n_total");
		$this->db->from('client');
		if($this->session->userdata('role') == 3){
			$this->db->where('agent_id',$this->session->userdata('userId'));
		}
		$this->db->where('isDeleted',0);
		$this->db->where('visa_approve','yes');
		$query = $this->db->get();
		return $query->row();
	}
	function visa_not_approve_clients()
	{
		$this->db->select("SUM(CASE WHEN voucher_issue = 'no' THEN 1 ELSE 0 END) as n_total");
		$this->db->from('client');
		$this->db->join("tbl_users a","a.userId= client.agent_id");
		if($this->session->userdata('role') == 3){
			$this->db->where('agent_id',$this->session->userdata('userId'));
		}
		$this->db->where('client.isDeleted',0);
		$this->db->where('a.isDeleted',0);
		$this->db->where('visa_approve','no');
		$query = $this->db->get();
		//echo $this->db->last_query();//die(); 
		return $query->row();
	}
	function pilgrims()
	{
		$this->db->select(array("SUM(CASE WHEN age_group = 'Adult' THEN 1 ELSE 0 END) as t_adult","SUM(CASE WHEN age_group = 'Child' THEN 1 ELSE 0 END) as t_child","SUM(CASE WHEN age_group = 'Infant' THEN 1 ELSE 0 END) as t_infant"));
		$this->db->from('client');
		if($this->session->userdata('role') == 3){
			$this->db->where('agent_id',$this->session->userdata('userId'));
		}
		$this->db->where('isDeleted',0);
		$this->db->where('voucher_issue','yes');
		$query = $this->db->get();
		return $query->row();
	}
	
	function total_vouchers()
	{
		$this->db->select('v.id');
		$this->db->from('voucher v');
		$this->db->join('voucher_client vc','vc.voucher_id=v.id');
		if($this->session->userdata('role') == 3){
			$this->db->where('agent_id',$this->session->userdata('userId'));
		}
		$this->db->where('v.isDeleted',0);
		$this->db->group_by('v.id');
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->num_rows();
	}
	function approved_vouchers()
	{
		$this->db->select('v.id');
		$this->db->from('voucher v');
		$this->db->join('voucher_client vc','vc.voucher_id=v.id');
		if($this->session->userdata('role') == 3){
			$this->db->where('agent_id',$this->session->userdata('userId'));
		}
		$this->db->where('isDeleted',0);
		$this->db->where('approve','yes');
		$this->db->group_by('v.id');
		$query = $this->db->get();
		return $query->num_rows();
	}
	function not_approved()
	{
		$this->db->select('v.id');
		$this->db->from('voucher v');
		$this->db->join('voucher_client vc','vc.voucher_id=v.id');
		if($this->session->userdata('role') == 3){
			$this->db->where('agent_id',$this->session->userdata('userId'));
		}
		$this->db->where('isDeleted',0);
		$this->db->where('approve','no');
		$this->db->group_by('v.id');
		$query = $this->db->get();
		return $query->num_rows();
	}
	function get_voucher_clients($id)
	{
		$this->db->select('client_id');
		$this->db->from('voucher_client');
		//$this->db->where('isDeleted',0);
		$this->db->where('voucher_id',$id);
		$query = $this->db->get();
		return $query->result();
	}
	function updateVoucher($id, $hotelInfo)
    {
        $this->db->where('id', $id);
        $this->db->update('voucher', $hotelInfo);
        
        return $this->db->affected_rows();
    }
	
	///////////// end  voucher management ////////////////////
	
	
	////////////ticket Managent //////////////////
	function add_ticket_sale($data){
		$this->db->insert('ticket_sale',$data);
		return $this->db->insert_id();
	}
	function update_ticket_sale($id,$data)
	{
		$this->db->where('id',$id);
		$this->db->update('ticket_sale',$data);
	}
	function ticket_sale_count($agent_id=null,$flight_id = null,$bsp=null,$start_date = null,$end_date = null)
	{
		$this->db->select("ts.*,a.name as agent_name,f.name as flight_name");
		$this->db->from('ticket_sale ts');
		$this->db->join('flights f ','f.id = ts.flight_id');
		$this->db->join('tbl_users a ','a.userId = ts.agent_id');
		$this->db->where('ts.isDeleted',0);
		if($this->session->userdata('role') == 3){
			$this->db->where('ts.agent_id',$this->session->userdata('userId'));
		}
		if($agent_id){
			$this->db->where('ts.agent_id',$agent_id);
		}
		if($flight_id){
			$this->db->where('ts.flight_id',$flight_id);
		}
		if($bsp){
			$this->db->where('f.bsp',$bsp);
		}
		if($start_date){
			$this->db->where("ts.date between '".date_change_db($start_date)."' and '".date_change_db($end_date)."'");
		}
		$query = $this->db->get();
		return count($query->result());
	}
	function get_ticket_sale($page=null, $segment=null,$agent_id=null,$flight_id = null,$bsp=null,$start_date = null,$end_date = null)
	{
		$this->db->select("ts.*,a.name as agent_name,f.name as flight_name");
		$this->db->from('ticket_sale ts');
		$this->db->join('flights f ','f.id = ts.flight_id');
		$this->db->join('tbl_users a ','a.userId = ts.agent_id');
		$this->db->where('ts.isDeleted',0);
		if($this->session->userdata('role') == 3){
			$this->db->where('ts.agent_id',$this->session->userdata('userId'));
		}
		if($agent_id){
			$this->db->where('ts.agent_id',$agent_id);
		}
		if($flight_id){
			$this->db->where('ts.flight_id',$flight_id);
		}
		if($bsp){
			$this->db->where('f.bsp',$bsp);
		}
		if($start_date){
			$this->db->where("ts.date between '".date_change_db($start_date)."' and '".date_change_db($end_date)."'");
		}
		if($page){
        	$this->db->limit($page, $segment);}
		$this->db->order_by('ts.id','desc');
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}
	function get_ticket_sale_info($id)
	{
		$this->db->select("ts.*,a.name as agent_name,f.name as flight_name");
		$this->db->from('ticket_sale ts');
		$this->db->join('flights f ','f.id = ts.flight_id');
		$this->db->join('tbl_users a ','a.userId = ts.agent_id');		
		$this->db->where('ts.isDeleted',0);
		$this->db->where('ts.id',$id);
		$query = $this->db->get();
		return $query->row();
	}
    function add_ticket_sale_amount($data){
		$this->db->insert('ticket_sale_payment',$data);
		return $this->db->insert_id();
	}
    function get_ticket_sale_amount($id){
		$this->db->select("ts.*");
		$this->db->from('ticket_sale_payment ts');
		$this->db->where('ts.ticket_sale_id',$id);
		$query = $this->db->get();
		return $query->result();
	}
	/////////////end ticket management//////////////
	function add_flight_amount($data){
		$this->db->insert('flight_transection',$data);
		return $this->db->insert_id();
	}
	function update_flight_amount($id,$data)
	{
		$this->db->where('id',$id);
		$this->db->update('flight_transection',$data);
	}
	function update_ts_flight_amount($id,$data)
	{
		$this->db->where('ts_id',$id);
		$this->db->update('flight_transection',$data);
	}
	function update_ticket_sale_amount($id,$data)
	{
		$this->db->where('ticket_sale_id',$id);
		$this->db->update('ticket_sale_payment',$data);
	}
	function receive_ticket_sale_amount($data)
	{
		$this->db->insert('ticket_sale_payment',$data);
	}
	function get_flight_transection($flight_id = null,$date=null)
	{
		$this->db->select("ft.*,f.name as flight_name");
		$this->db->from('flight_transection ft');
		$this->db->join('flights f ','f.id = ft.flight_id');
		$this->db->where('ft.isDeleted',0);
		if($flight_id){
			$this->db->where('ft.flight_id',$flight_id);
		}
		if($date){
			$this->db->where('ft.date',$date);
		}
		$this->db->order_by('ft.date','desc');
		$query = $this->db->get();
		return $query->result();
	}
	function ftransectionInfo($id)
	{
		$this->db->select("ft.*,f.name as flight_name");
		$this->db->from('flight_transection ft');
		$this->db->join('flights f ','f.id = ft.flight_id');		
		$this->db->where('ft.isDeleted',0);
		$this->db->where('ft.id',$id);
		$query = $this->db->get();
		return $query->row();
	}
	
	
	
	
	
	
	////////// bank management ////////
	function bank_count($searchText = '')
    {
        $this->db->select(array('id','name'));
        $this->db->from('bank');
        if(!empty($searchText)) {
            $likeCriteria = "(name  LIKE '%".$searchText."%'";
            $this->db->where($likeCriteria);
        }
        $this->db->where('isDeleted', 0);
        $query = $this->db->get();        
        return count($query->result());
    }
    
    function bank_list($searchText = '', $page = null, $segment = null)
    {
        $this->db->select(array('id','name'));
        $this->db->from('bank');
        if(!empty($searchText)) {
            $likeCriteria = "(name  LIKE '%".$searchText."%'";
            $this->db->where($likeCriteria);
        }
        $this->db->where('isDeleted', 0);
		if($page){
        	$this->db->limit($page, $segment);}
        $query = $this->db->get();        
        $result = $query->result();  
		//echo $this->db->last_query();die();      
        return $result;
    }
        
    function add_bank($flightInfo)
    {
        $this->db->trans_start();
        $this->db->insert('bank', $flightInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
	
	function delete_bank($id, $flightInfo)
    {
        $this->db->where('id', $id);
        $this->db->update('bank', $flightInfo);
        
        return $this->db->affected_rows();
    }
	function getBankInfo($id)
    {
        $this->db->select(array('id','name'));
        $this->db->from('bank');
        $this->db->where('isDeleted', 0);
        $this->db->where('id', $id);
        $query = $this->db->get();        
        return $query->row();
    }
    
    function eidt_bank($id, $flightInfo)
    {
        $this->db->where('id', $id);
        $this->db->update('bank', $flightInfo);

        return TRUE;
    }
	///////// end bank management/////
	
	//////bank transection //////////
	function add_bank_amount($data){
		$this->db->insert('bank_transection',$data);
		return $this->db->insert_id();
	}
	function update_bank_amount($id,$data)
	{
		$this->db->where('id',$id);
		$this->db->update('bank_transection',$data);
	}
	function update_ft_bank_amount($id,$data)
	{
		$this->db->where('ft_id',$id);
		$this->db->update('bank_transection',$data);
	}
	
	function get_bank_transection($bank_id = null,$date = null,$start_date=null,$end_date=null)
	{
		$this->db->select("bt.*,b.name as bank_name");
		$this->db->from('bank_transection bt');
		$this->db->join('bank b','b.id = bt.bank_id');
		$this->db->where('bt.isDeleted',0);
		if($bank_id){
			$this->db->where('bt.bank_id',$bank_id);
		}
		if($date){
			$this->db->where('bt.date',$date);
		}
		if($start_date){
			$this->db->where("bt.date between '".date_change_db($start_date)."' and '".date_change_db($end_date)."'");
		}
		$this->db->order_by('bt.date','desc');
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}
	function btransectionInfo($id)
	{
		$this->db->select("bt.*,b.name as bank_name");
		$this->db->from('bank_transection bt');
		$this->db->join('bank b ','b.id = bt.bank_id');		
		$this->db->where('bt.isDeleted',0);
		$this->db->where('bt.id',$id);
		$query = $this->db->get();
		return $query->row();
	}
	function get_agent_hotel($agent_id)
	{
		/*$this->db->select("h.*,ah.agent_id as agent,ah.price");
		$this->db->from('hotel h');
		$this->db->join('agent_hotel ah ','ah.hotel_id=h.id','left','and ah.agent_id = 11');		
		$this->db->where('h.isDeleted',0);
		//$this->db->where('h.id',$id);
		$query = $this->db->get();
		echo $this->db->last_query();*/
		$query = $this->db->query("SELECT `h`.*, `ah`.`agent_id` as agent, `ah`.`price` FROM `hotel` `h` LEFT JOIN `agent_hotel` `ah` ON `ah`.`hotel_id`=`h`.`id` and ah.agent_id = '$agent_id' WHERE `h`.`isDeleted` =0 order by h.id");
		return $query->result();
	}
	function get_agent_hotel_data_voucher($hotel_id,$agent_id)
	{
		$this->db->select("*");
		$this->db->from('agent_hotel ah');
		//$this->db->join('agent_hotel ah ','ah.hotel_id=h.id','left','and ah.agent_id = 11');		
		$this->db->where('ah.hotel_id',$hotel_id);
		$this->db->where('ah.agent_id',$agent_id);
		$query = $this->db->get();
		return $query->row();
	}
	function delete_agent_hotel($id){
		$this->db->where('agent_id',$id);
		$this->db->delete('agent_hotel');
	}
	
	function add_hotel_agent($data)
	{
		$this->db->insert('agent_hotel',$data);
	}
	function get_agent_hotel_data($hotel_id)
	{
		$this->db->select("*");
		$this->db->from('agent_hotel ah');
		//$this->db->join('agent_hotel ah ','ah.hotel_id=h.id','left','and ah.agent_id = 11');		
		$this->db->where('ah.hotel_id',$hotel_id);
		$query = $this->db->get();
		return $query->row();
	}
	function delete_voucher_client($id)
	{
		$this->db->where('voucher_id',$id);
		$this->db->delete('voucher_client');
	}
	function delete_voucher_hotel($id)
	{
		$this->db->where('voucher_id',$id);
		$this->db->delete('voucher_hotel');
	}
	function delete_voucher_ziarat($id)
	{
		$this->db->where('voucher_id',$id);
		$this->db->delete('voucher_ziarat');
	}
	function check_in_yes($id,$data)
	{
		$this->db->where('id',$id);
		$this->db->update('voucher_hotel',$data);
	}
    ////////// permotion management ////////
	function permotion_number_count($searchText = '')
    {
        $this->db->select(array('id','name','phone','address'));
        $this->db->from('permotion_number');
        if(!empty($searchText)) {
            $likeCriteria = "(name  LIKE '%".$searchText."%'";
            $this->db->where($likeCriteria);
        }
        $this->db->where('isDeleted', 0);
        $query = $this->db->get();        
        return count($query->result());
    }
    
    function permotion_number_list($searchText = '', $page = null, $segment = null)
    {
        $this->db->select(array('id','name','phone','address'));
        $this->db->from('permotion_number');
        if(!empty($searchText)) {
            $likeCriteria = "(name  LIKE '%".$searchText."%'";
            $this->db->where($likeCriteria);
        }
        $this->db->where('isDeleted', 0);
		if($page){
        	$this->db->limit($page, $segment);}
        $query = $this->db->get();        
        $result = $query->result();  
		//echo $this->db->last_query();die();      
        return $result;
    }
        
    function add_permotion_number($flightInfo)
    {
        $this->db->trans_start();
        $this->db->insert('permotion_number', $flightInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
	
	function delete_permotion_number($id, $flightInfo)
    {
        $this->db->where('id', $id);
        $this->db->update('permotion_number', $flightInfo);
        
        return $this->db->affected_rows();
    }
	function getpermotion_numberInfo($id)
    {
        $this->db->select(array('id','name','phone','address'));
        $this->db->from('permotion_number');
        $this->db->where('isDeleted', 0);
        $this->db->where('id', $id);
        $query = $this->db->get();        
        return $query->row();
    }
    
    function eidt_permotion_number($id, $flightInfo)
    {
        $this->db->where('id', $id);
        $this->db->update('permotion_number', $flightInfo);

        return TRUE;
    }
	///////// end bank management/////
	
}

  