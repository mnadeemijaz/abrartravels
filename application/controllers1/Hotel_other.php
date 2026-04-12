<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : Hotel and Others (UserController)
 * User Class to control all user related operations.
 * @author : Muhammad Nadeem Ijaz
 * @version : 1.1
 * @since : 14 august 2018
 */
class Hotel_other extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->isLoggedIn();   
    }
    
    /**
     * This function used to load the first screen of the user
     */
	public function index()
	{
		//$this->load->view('front');
	}
    public function dashboard()
    {
		$config = $this->config_model->getConfig();
        $this->global['pageTitle'] = $config->name.' : Dashboard';
		
        $data['total_clients'] = $data1= $this->hotel_other_model->total_clients();
        $data['visa_not_approve_clients'] = $data1= $this->hotel_other_model->visa_not_approve_clients();
		$data['pilgrims'] = $this->hotel_other_model->pilgrims();
		$data['total_vouchers'] = $data1= $this->hotel_other_model->total_vouchers();
		$data['approved_vouchers'] = $data1= $this->hotel_other_model->approved_vouchers();
		$data['not_approved'] = $data1= $this->hotel_other_model->not_approved();
		
        $this->loadViews("dashboard", $this->global, $data , NULL);
    }
    
    /**
     * This function is used to load the Hotel list
     */
    function hotel_list()
    {
		check_permission(2);
        if($this->isAdminUser() == TRUE)
        {
            $this->loadThis();
        }
        else
        {        
            $searchText = $this->input->post('searchText');
            $data['searchText'] = $searchText;            
			$config = $this->config_model->getConfig();
			$data['agent_id'] =$agent_id= ($this->input->post('agent_id'))?$this->input->post('agent_id'):'';
            $count = $this->hotel_other_model->hotel_count($searchText,'','','','','',$agent_id);
			$returns = $this->paginationCompress ( "hotel_list/", $count, $config->per_page);            
            $data['hotelRecords'] = $this->hotel_other_model->hotel_list($searchText, $returns["page"], $returns["segment"],'','','',$agent_id);
			$data['agent'] = $this->hotel_other_model->agent_list_users();
            $this->global['pageTitle'] = $config->name.' : Hotel Listing';            
            $this->loadViews("hotel_other/hotel_list", $this->global, $data, NULL);
        }
    }

    /**
     * This function is used to load the add new form
     */
    function add_hotel()
    {
		check_permission(2);
        if($this->isAdminUser() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            if($this->input->post()){
				/*if($this->input->post('room_type') == 'sharing')
					$amount = $this->input->post('rate');
					else if($this->input->post('room_type') == 'single_bed')
					$amount = $this->input->post('rate');
					else if($this->input->post('room_type') == 'double_bed')
					$amount = $this->input->post('rate')/2;
					else if($this->input->post('room_type') == 'triple_bed')
					$amount = $this->input->post('rate')/3;
					else if($this->input->post('room_type') == 'quad_bed')
					$amount = $this->input->post('rate')/4;*/
				$data_to_store = array(
				'name'=>$this->input->post('name'),
				//'address'=>$this->input->post('address'),
				'city_name'=>$this->input->post('city_name'),
				'room_type'=>$this->input->post('room_type'),
				'pkg_type'=>$this->input->post('pkg_type'),
				//'agent_id'=>$this->input->post('agent_id'),
				//'room_amount'=>$amount
				);
				$this->hotel_other_model->add_hotel($data_to_store);
			}
			$data['agentList'] =$this->hotel_other_model->agent_list_users(); 
			$data['packeg'] = $this->hotel_other_model->packeg_list();
            $config = $this->config_model->getConfig();
            $this->global['pageTitle'] = $config->name.' : Add / Edit Hotel List';
            $this->loadViews("hotel_other/add_hotel", $this->global, $data, NULL);
        }
    }
	
	function deleteHotel()
    {
		check_permission(2);
        if($this->isAdminUser() == TRUE)
        {
            echo(json_encode(array('status'=>'access')));
        }
        else
        {
            $id = $this->input->post('id');
            $hotel_info = array('isDeleted'=>1);
            
            $result = $this->hotel_other_model->deleteHotel($id, $hotel_info);
            
            if ($result > 0) { echo(json_encode(array('status'=>TRUE))); }
            else { echo(json_encode(array('status'=>FALSE))); }
        }
    }
	function edit_hotel($hotelId = NULL)
    {
		check_permission(2);
        if($this->isAdminUser() == TRUE )
        {
            $this->loadThis();
        }
        else
        {
            if($hotelId == null)
            {
                redirect('hotel');
            } 
			$config = $this->config_model->getConfig();           
            $data['hotelInfo'] = $this->hotel_other_model->getHotelInfo($hotelId);
            $data['agentList'] =$this->hotel_other_model->agent_list_users(); 
            $this->global['pageTitle'] = $config->name.' : Edit Hotel';
            $data['packeg'] = $this->hotel_other_model->packeg_list();
            $this->loadViews("hotel_other/add_hotel", $this->global, $data, NULL);
        }
    }
	function editHotel()
    {
        if($this->isAdminUser() == TRUE)
        {
            $this->loadThis();
        }
        else
        {   
			$hotelId = $this->input->post('id');
            $this->form_validation->set_rules('name','Hotel Name','trim|required|max_length[128]|xss_clean');
            //$this->form_validation->set_rules('address','Address','trim|required');
            $this->form_validation->set_rules('city_name','City Name','trim|required');
            $this->form_validation->set_rules('room_type','Room Type','trim|required');
			//$this->form_validation->set_rules('agent_id','Agent Name','trim|required');
            //$this->form_validation->set_rules('rate','Room Amount','trim|required|numeric');
            
            if($this->form_validation->run() == FALSE)
            {
                $this->edit_hotel($hotelId);
            }
            else
            {
				/*if($this->input->post('room_type') == 'sharing')
					$amount = $this->input->post('rate');
					else if($this->input->post('room_type') == 'single_bed')
					$amount = $this->input->post('rate');
					else if($this->input->post('room_type') == 'double_bed')
					$amount = $this->input->post('rate')/2;
					else if($this->input->post('room_type') == 'triple_bed')
					$amount = $this->input->post('rate')/3;
					else if($this->input->post('room_type') == 'quad_bed')
					$amount = $this->input->post('rate')/4;
				*/	//echo $amount;die();
					$data_to_store = array(
					'name'=>$this->input->post('name'),
				//	'address'=>$this->input->post('address'),
					'city_name'=>$this->input->post('city_name'),
					'room_type'=>$this->input->post('room_type'),
					'pkg_type'=>$this->input->post('pkg_type'),
				//	'agent_id'=>$this->input->post('agent_id'),
				//	'room_amount'=>$amount
					);
					
                
                $result = $this->hotel_other_model->eidt_hotel($hotelId,$data_to_store);
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', 'Hotel updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Hotel updation failed');
                }
                
                redirect('hotel');
            }
        }
    }
	//////////////////////vhicle management ///////////////////////
	
	/**
     * This function is used to load the vehicle list
     */
    function vehicle($id = null)
    {
		check_permission(2);
        if($this->isAdminUser() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
			//if($id){echo 'kljl';die('lll');}
            $searchText = $this->input->post('searchText');
            $data['searchText'] = $searchText;            
            $config = $this->config_model->getConfig();
            $count = $this->hotel_other_model->vehicle_count($searchText);
			$returns = $this->paginationCompress ( "vehicle/", $count, $config->per_page);            
            $data['vehicleRecords'] = $this->hotel_other_model->vehicle_list($searchText, $returns["page"], $returns["segment"]);
            $this->global['pageTitle'] = $config->name.' : Vehicle Listing';            
            $this->loadViews("hotel_other/vehicle", $this->global, $data, NULL);
        }
    }

    /**
     * This function is used to load the add new form
     */
    function add_vehicle()
    {
		check_permission(2);
        if($this->isAdminUser() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            if($this->input->post()){
				$data_to_store = array(
				'name'=>$this->input->post('name'),
				'sharing'=>$this->input->post('sharing')				
				);
				$this->hotel_other_model->add_vehicle($data_to_store);
			}
            $config = $this->config_model->getConfig();
            $this->global['pageTitle'] = $config->name.' : Add / Edit Vehicle List';
            $this->loadViews("hotel_other/add_vehicle", $this->global, '', NULL);
        }
    }
	
	function delete_vehicle()
    {
        if($this->isAdminUser() == TRUE)
        {
            echo(json_encode(array('status'=>'access')));
        }
        else
        {
            $id = $this->input->post('id');
            $vehicle_info = array('isDeleted'=>1);
            
            $result = $this->hotel_other_model->delete_vehicle($id, $vehicle_info);
            
            if ($result > 0) { echo(json_encode(array('status'=>TRUE))); }
            else { echo(json_encode(array('status'=>FALSE))); }
        }
    }
	function edit_vehicle($vehicleId = NULL)
    {
        if($this->isAdminUser() == TRUE )
        {
            $this->loadThis();
        }
        else
        {
            if($vehicleId == null)
            {
                redirect('vehicle');
            }            
            $data['vehicleInfo'] = $this->hotel_other_model->getVehicleInfo($vehicleId);
            $config = $this->config_model->getConfig();
            $this->global['pageTitle'] = $config->name.' : Edit Vehicle';
            
            $this->loadViews("hotel_other/add_vehicle", $this->global, $data, NULL);
        }
    }
	function editVehicle()
    {
        if($this->isAdminUser() == TRUE)
        {
            $this->loadThis();
        }
        else
        {   
			$vehicleId = $this->input->post('id');
            $this->form_validation->set_rules('name','Vehicle Name','trim|required|max_length[128]|xss_clean');
			$this->form_validation->set_rules('sharing','Sharing','trim|required|max_length[128]|xss_clean');
            
            if($this->form_validation->run() == FALSE)
            {
                $this->edit_vehicle($vehicleId);
            }
            else
            {
					$data_to_store = array(
					'name'=>$this->input->post('name'),
					'sharing'=>$this->input->post('sharing')					
					);
					
                
                $result = $this->hotel_other_model->eidt_vehicle($vehicleId,$data_to_store);
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', 'Vehicle updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Vehicle updation failed');
                }
                
                redirect('vehicle');
            }
        }
    }
	
	////////////////// end vehicle management
	
	//////////////////////vhicle Trip management ///////////////////////
	
	/**
     * This function is used to load the vehicle list
     */
    function trip($id = null)
    {
		check_permission(2);
        if($this->isAdminUser() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
			//if($id){echo 'kljl';die('lll');}
            $searchText = $this->input->post('searchText');
            $data['searchText'] = $searchText;            
            $config = $this->config_model->getConfig();
            $count = $this->hotel_other_model->trip_count($searchText);
			$returns = $this->paginationCompress ( "trip/", $count, '');            
            $data['tripRecords'] = $this->hotel_other_model->trip_list($searchText, $returns["page"], $returns["segment"]);
            $this->global['pageTitle'] = $config->name.' : Vehicle Trip Listing';            
            $this->loadViews("hotel_other/trip", $this->global, $data, NULL);
        }
    }

    /**
     * This function is used to load the add new form 
     */
    function add_trip()
    {
		check_permission(2);
        if($this->isAdminUser() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            if($this->input->post()){
				$data_to_store = array(
				'name'=>$this->input->post('name'),
				'vehicle_id'=>$this->input->post('vehicle_id'),
				'price'=>$this->input->post('price')				
				);
				$this->hotel_other_model->add_trip($data_to_store);
			}
			$config = $this->config_model->getConfig();
            $data['vehicle_data'] = $this->hotel_other_model->vehicle_list();
            $this->global['pageTitle'] = $config->name.' : Add / Edit Vehicle Trip List';
            $this->loadViews("hotel_other/add_trip", $this->global, $data , NULL);
        }
    }
	
	function delete_trip()
    {
        if($this->isAdminUser() == TRUE)
        {
            echo(json_encode(array('status'=>'access')));
        }
        else
        {
            $id = $this->input->post('id');
            $trip_info = array('isDeleted'=>1);
            
            $result = $this->hotel_other_model->delete_trip($id, $trip_info);
            
            if ($result > 0) { echo(json_encode(array('status'=>TRUE))); }
            else { echo(json_encode(array('status'=>FALSE))); }
        }
    }
	function edit_trip($tripId = NULL)
    {
        if($this->isAdminUser() == TRUE )
        {
            $this->loadThis();
        }
        else
        {
            if($tripId == null)
            {
                redirect('vehicle');
            }            
            $data['tripInfo'] = $this->hotel_other_model->getTripInfo($tripId);
            $data['vehicle_data'] = $this->hotel_other_model->vehicle_list();
			$config = $this->config_model->getConfig();
            $this->global['pageTitle'] = $config->name.' : Edit Vehicle Trip';
            
            $this->loadViews("hotel_other/add_trip", $this->global, $data, NULL);
        }
    }
	function editTrip()
    {
        if($this->isAdminUser() == TRUE)
        {
            $this->loadThis();
        }
        else
        {   
			$tripId = $this->input->post('id');
            //$this->form_validation->set_rules('name','Vehicle Trip Name','trim|required|max_length[128]|xss_clean');
			$this->form_validation->set_rules('price','Vehicle Trip Price','trim|required|max_length[128]|numeric');
            
            if($this->form_validation->run() == FALSE)
            {
                $this->edit_trip($tripId);
            }
            else
            {
					$data_to_store = array(
			//		'name'=>$this->input->post('name'),
			//		'vehicle_id'=>$this->input->post('vehicle_id'),
					'price'=>$this->input->post('price')					
					);
					
                
                $result = $this->hotel_other_model->eidt_trip($tripId,$data_to_store);
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', 'Trip updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Trip updation failed');
                }
                
                redirect('trip');
            }
        }
    }
	
	////////////////// end vehicle Trip management
	
	//////////////////////ziarat management ///////////////////////
	
	/**
     * This function is used to load the vehicle list
     */
    function ziarat($id = null)
    {
		check_permission(2);
		
        if($this->isAdminUser() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
			//if($id){echo 'kljl';die('lll');}
            $searchText = $this->input->post('searchText');
            $data['searchText'] = $searchText;            
            $config = $this->config_model->getConfig();
            $count = $this->hotel_other_model->ziarat_count($searchText);
			$returns = $this->paginationCompress ( "ziarat/", $count, $config->per_page);            
            $data['ziaratRecords'] = $this->hotel_other_model->ziarat_list($searchText, $returns["page"], $returns["segment"]);
            $this->global['pageTitle'] = $config->name.' : Ziarat Listing';            
            $this->loadViews("hotel_other/ziarat", $this->global, $data, NULL);
        }
    }

    /**
     * This function is used to load the add new form
     */
    function add_ziarat()
    {
		check_permission(2);
        if($this->isAdminUser() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            if($this->input->post()){
				$data_to_store = array(
				'name'=>$this->input->post('name'),
				'amount'=>$this->input->post('amount')				
				);
				$this->hotel_other_model->add_ziarat($data_to_store);
			}
            $config = $this->config_model->getConfig();
            $this->global['pageTitle'] = $config->name.' : Add / Edit Ziarat List';
            $this->loadViews("hotel_other/add_ziarat", $this->global, '', NULL);
        }
    }
	
	function delete_ziarat()
    {
        if($this->isAdminUser() == TRUE)
        {
            echo(json_encode(array('status'=>'access')));
        }
        else
        {
            $id = $this->input->post('id');
            $ziarat_info = array('isDeleted'=>1);
            
            $result = $this->hotel_other_model->delete_ziarat($id, $ziarat_info);
            
            if ($result > 0) { echo(json_encode(array('status'=>TRUE))); }
            else { echo(json_encode(array('status'=>FALSE))); }
        }
    }
	function edit_ziarat($ziaratId = NULL)
    {
        if($this->isAdminUser() == TRUE )
        {
            $this->loadThis();
        }
        else
        {
            if($ziaratId == null)
            {
                redirect('ziarat');
            }            
            $data['ziaratInfo'] = $this->hotel_other_model->getZiaratInfo($ziaratId);
            $config = $this->config_model->getConfig();
            $this->global['pageTitle'] = $config->name.' : Edit Ziarat';
            
            $this->loadViews("hotel_other/add_ziarat", $this->global, $data, NULL);
        }
    }
	function editZiarat()
    {
        if($this->isAdminUser() == TRUE)
        {
            $this->loadThis();
        }
        else
        {   
			$ziaratId = $this->input->post('id');
            $this->form_validation->set_rules('name','Ziarat Name','trim|required|max_length[128]|xss_clean');
			$this->form_validation->set_rules('amount','Ziarat Amount','trim|required|max_length[128]|numeric');
            
            if($this->form_validation->run() == FALSE)
            {
                $this->edit_ziarat($ziaratId);
            }
            else
            {
					$data_to_store = array(
					'name'=>$this->input->post('name'),
					'amount'=>$this->input->post('amount')					
					);
					
                
                $result = $this->hotel_other_model->eidt_ziarat($ziaratId,$data_to_store);
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', 'Ziarat updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Ziarat updation failed');
                }
                
                redirect('ziarat');
            }
        }
    }
	
	////////////////// end ziarat management
	
	//////////////////////flight management ///////////////////////
	
	/**
     * This function is used to load the vehicle list
     */
    function flight($id = null)
    {
		check_permission(2);
        if($this->isAdminUser() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
			//if($id){echo 'kljl';die('lll');}
            $searchText = $this->input->post('searchText');
            $data['searchText'] = $searchText;            
            $config = $this->config_model->getConfig();
            $count = $this->hotel_other_model->flight_count($searchText);
			$returns = $this->paginationCompress ( "flight/", $count, $config->per_page);            
            $data['flightRecords'] = $this->hotel_other_model->flight_list($searchText, $returns["page"], $returns["segment"]);
            $this->global['pageTitle'] = $config->name.' : Flight Listing';            
            $this->loadViews("hotel_other/flight", $this->global, $data, NULL);
        }
    }

    /**
     * This function is used to load the add new form
     */
    function add_flight()
    {
		check_permission(2);
        if($this->isAdminUser() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            if($this->input->post()){
				$data_to_store = array(
				'name'=>$this->input->post('name'),
				'bsp'=>$this->input->post('bsp')				
				);
				$this->hotel_other_model->add_flight($data_to_store);
			}
            $config = $this->config_model->getConfig();
            $this->global['pageTitle'] = $config->name.' : Add / Edit Flight List';
            $this->loadViews("hotel_other/add_flight", $this->global, '', NULL);
        }
    }
	
	function delete_flight()
    {
        if($this->isAdminUser() == TRUE)
        {
            echo(json_encode(array('status'=>'access')));
        }
        else
        {
            $id = $this->input->post('id');
            $flight_info = array('isDeleted'=>1);
            
            $result = $this->hotel_other_model->delete_flight($id, $flight_info);
            
            if ($result > 0) { echo(json_encode(array('status'=>TRUE))); }
            else { echo(json_encode(array('status'=>FALSE))); }
        }
    }
	function edit_flight($flightId = NULL)
    {
        if($this->isAdminUser() == TRUE )
        {
            $this->loadThis();
        }
        else
        {
            if($flightId == null)
            {
                redirect('flight');
            }            
            $data['flightInfo'] = $this->hotel_other_model->getFlightInfo($flightId);
            $config = $this->config_model->getConfig();
            $this->global['pageTitle'] = $config->name.' : Edit Flight';
            
            $this->loadViews("hotel_other/add_flight", $this->global, $data, NULL);
        }
    }
	function editFlight()
    {
        if($this->isAdminUser() == TRUE)
        {
            $this->loadThis();
        }
        else
        {   
			$flightId = $this->input->post('id');
            $this->form_validation->set_rules('name','Flight Name','trim|required|max_length[128]|xss_clean');
            
            if($this->form_validation->run() == FALSE)
            {
                $this->edit_flight($flightId);
            }
            else
            {
					$data_to_store = array(
					'name'=>$this->input->post('name'),
					'bsp'=>$this->input->post('bsp')					
					);
					
                
                $result = $this->hotel_other_model->eidt_flight($flightId,$data_to_store);
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', 'Flight updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Flight updation failed');
                }
                
                redirect('flight');
            }
        }
    }
	
	////////////////// end flight management
	
	
	//////////////////////packeg management ///////////////////////
	
	/**
     * This function is used to load the vehicle list
     */
    function packeg($id = null)
    {
		check_permission(2);
        if($this->isAdminUser() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
			//if($id){echo 'kljl';die('lll');}
            $searchText = $this->input->post('searchText');
            $data['searchText'] = $searchText;            
            $config = $this->config_model->getConfig();
            $count = $this->hotel_other_model->packeg_count($searchText);
			$returns = $this->paginationCompress ( "flight/", $count, $config->per_page);            
            $data['packegRecords'] = $this->hotel_other_model->packeg_list($searchText, $returns["page"], $returns["segment"]);
            $this->global['pageTitle'] = $config->name.' : Packeg Listing';            
            $this->loadViews("hotel_other/packeg", $this->global, $data, NULL);
        }
    }

    /**
     * This function is used to load the add new form
     */
    function add_packeg()
    {
        if($this->isAdminUser() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            if($this->input->post()){
				$data_to_store = array(
				'name'=>$this->input->post('name')				
				);
				$this->hotel_other_model->add_packeg($data_to_store);
			}
            $config = $this->config_model->getConfig();
            $this->global['pageTitle'] = $config->name.' : Add / Edit Packeg List';
            $this->loadViews("hotel_other/add_packeg", $this->global, '', NULL);
        }
    }
	
	function delete_packeg()
    {
        if($this->isAdminUser() == TRUE)
        {
            echo(json_encode(array('status'=>'access')));
        }
        else
        {
            $id = $this->input->post('id');
            $flight_info = array('isDeleted'=>1);
            
            $result = $this->hotel_other_model->delete_packeg($id, $flight_info);
            
            if ($result > 0) { echo(json_encode(array('status'=>TRUE))); }
            else { echo(json_encode(array('status'=>FALSE))); }
        }
    }
	function edit_packeg($flightId = NULL)
    {
        if($this->isAdminUser() == TRUE )
        {
            $this->loadThis();
        }
        else
        {
            if($flightId == null)
            {
                redirect('packeg');
            }            
            $data['packegInfo'] = $this->hotel_other_model->getPackegInfo($flightId);
            $config = $this->config_model->getConfig();
            $this->global['pageTitle'] = $config->name.' : Edit Packeg';
            
            $this->loadViews("hotel_other/add_packeg", $this->global, $data, NULL);
        }
    }
	function editPackeg()
    {
        if($this->isAdminUser() == TRUE)
        {
            $this->loadThis();
        }
        else
        {   
			$flightId = $this->input->post('id');
            $this->form_validation->set_rules('name','Packeg Name','trim|required|max_length[128]|xss_clean');
            
            if($this->form_validation->run() == FALSE)
            {
                $this->edit_packeg($flightId);
            }
            else
            {
					$data_to_store = array(
					'name'=>$this->input->post('name')					
					);
					
                
                $result = $this->hotel_other_model->eidt_packeg($flightId,$data_to_store);
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', 'Packeg updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Packeg updation failed');
                }
                
                redirect('packeg');
            }
        }
    }
	
	////////////////// end Packeg management
	
	
	
	
	//////////////////////sector management ///////////////////////
	
	/**
     * This function is used to load the vehicle list
     */
    function sector($id = null)
    {
		check_permission(2);
        if($this->isAdminUser() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
			//if($id){echo 'kljl';die('lll');}
            $searchText = $this->input->post('searchText');
            $data['searchText'] = $searchText;            
            $config = $this->config_model->getConfig();
            $count = $this->hotel_other_model->sector_count($searchText);
			$returns = $this->paginationCompress ( "sector/", $count, $config->per_page);            
            $data['sectorRecords'] = $this->hotel_other_model->sector_list($searchText, $returns["page"], $returns["segment"]);
            $this->global['pageTitle'] = $config->name.' : Sector Listing';            
            $this->loadViews("hotel_other/sector", $this->global, $data, NULL);
        }
    }

    /**
     * This function is used to load the add new form
     */
    function add_sector()
    {
		check_permission(2);
        if($this->isAdminUser() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            if($this->input->post()){
				$data_to_store = array(
				'name'=>$this->input->post('name')				
				);
				$this->hotel_other_model->add_sector($data_to_store);
			}
            $config = $this->config_model->getConfig();
            $this->global['pageTitle'] = $config->name.' : Add / Edit Sector List';
            $this->loadViews("hotel_other/add_sector", $this->global, '', NULL);
        }
    }
	
	function delete_sector()
    {
        if($this->isAdminUser() == TRUE)
        {
            echo(json_encode(array('status'=>'access')));
        }
        else
        {
            $id = $this->input->post('id');
            $sector_info = array('isDeleted'=>1);
            
            $result = $this->hotel_other_model->delete_sector($id, $sector_info);
            
            if ($result > 0) { echo(json_encode(array('status'=>TRUE))); }
            else { echo(json_encode(array('status'=>FALSE))); }
        }
    }
	function edit_sector($sectorId = NULL)
    {
        if($this->isAdminUser() == TRUE )
        {
            $this->loadThis();
        }
        else
        {
            if($sectorId == null)
            {
                redirect('sector');
            }            
            $data['sectorInfo'] = $this->hotel_other_model->getSectorInfo($sectorId);
            $config = $this->config_model->getConfig();
            $this->global['pageTitle'] = $config->name.' : Edit Sector';
            
            $this->loadViews("hotel_other/add_sector", $this->global, $data, NULL);
        }
    }
	function editSector()
    {
        if($this->isAdminUser() == TRUE)
        {
            $this->loadThis();
        }
        else
        {   
			$sectorId = $this->input->post('id');
            $this->form_validation->set_rules('name','Sector Name','trim|required|max_length[128]|xss_clean');
            
            if($this->form_validation->run() == FALSE)
            {
                $this->edit_sector($sectorId);
            }
            else
            {
					$data_to_store = array(
					'name'=>$this->input->post('name')					
					);
					
                
                $result = $this->hotel_other_model->eidt_sector($sectorId,$data_to_store);
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', 'Sector updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Sector updation failed');
                }
                
                redirect('sector');
            }
        }
    }
	
	////////////////// end sector management

//////////////////////visa company management ///////////////////////
	
	/**
     * This function is used to load the vehicle list
     */
    function visaCompany($id = null)
    {
		check_permission(2);
        if($this->isAdminUser() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
			//if($id){echo 'kljl';die('lll');}
            $searchText = $this->input->post('searchText');
            $data['searchText'] = $searchText;            
            $config = $this->config_model->getConfig();        
            $count = $this->hotel_other_model->visaCompany_count($searchText);
			$returns = $this->paginationCompress ( "visaCompany/", $count, $config->per_page);            
            $data['visaCompanyRecords'] = $this->hotel_other_model->visaCompany_list($searchText, $returns["page"], $returns["segment"]);
            $this->global['pageTitle'] = $config->name.' : Visa Company Listing';            
            $this->loadViews("hotel_other/visaCompany", $this->global, $data, NULL);
        }
    }

    /**
     * This function is used to load the add new form
     */
    function add_visaCompany()
    {
		check_permission(2);
        if($this->isAdminUser() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            if($this->input->post()){
				$data_to_store = array(
				'name'=>$this->input->post('name')				
				);
				$this->hotel_other_model->add_visaCompany($data_to_store);
			}
            $config = $this->config_model->getConfig();
            $this->global['pageTitle'] = $config->name.' : Add / Edit Visa Company List';
            $this->loadViews("hotel_other/add_visaCompany", $this->global, '', NULL);
        }
    }
	
	function delete_visaCompany()
    {
        if($this->isAdminUser() == TRUE)
        {
            echo(json_encode(array('status'=>'access')));
        }
        else
        {
            $id = $this->input->post('id');
            $visaCompany_info = array('isDeleted'=>1);
            
            $result = $this->hotel_other_model->delete_visaCompany($id, $visaCompany_info);
            
            if ($result > 0) { echo(json_encode(array('status'=>TRUE))); }
            else { echo(json_encode(array('status'=>FALSE))); }
        }
    }
	function edit_visaCompany($visaCompanyId = NULL)
    {
        if($this->isAdminUser() == TRUE )
        {
            $this->loadThis();
        }
        else
        {
            if($visaCompanyId == null)
            {
                redirect('visaCompany');
            }            
            $data['visaCompanyInfo'] = $this->hotel_other_model->getVisaCompanyInfo($visaCompanyId);
            $config = $this->config_model->getConfig();
            $this->global['pageTitle'] = $config->name.' : Edit Visa Company';
            
            $this->loadViews("hotel_other/add_visaCompany", $this->global, $data, NULL);
        }
    }
	function editVisaCompany()
    {
        if($this->isAdminUser() == TRUE)
        {
            $this->loadThis();
        }
        else
        {   
			$visaCompanyId = $this->input->post('id');
            $this->form_validation->set_rules('name','Visa Company Name','trim|required|max_length[128]|xss_clean');
            
            if($this->form_validation->run() == FALSE)
            {
                $this->edit_visaCompany($visaCompanyId);
            }
            else
            {
					$data_to_store = array(
					'name'=>$this->input->post('name')					
					);
					
                
                $result = $this->hotel_other_model->eidt_visaCompany($visaCompanyId,$data_to_store);
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', 'Visa Company updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Visa Company updation failed');
                }
                
                redirect('visaCompany');
            }
        }
    }
	
	////////////////// end visa company management
	
	//////////////////////agent management ///////////////////////
	
	/**
     * This function is used to load the agent list
     */
    function agent($id = null)
    {
		check_permission(2);
        if($this->isAdminUser() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
			//if($id){echo 'kljl';die('lll');}
            $searchText = $this->input->post('searchText');
            $data['searchText'] = $searchText;            
            $config = $this->config_model->getConfig();   
            $count = $this->hotel_other_model->agent_count($searchText);
			$returns = $this->paginationCompress ( "agent/", $count, $config->per_page);            
            $data['agentRecords'] = $this->hotel_other_model->agent_list($searchText, $returns["page"], $returns["segment"]);
            $this->global['pageTitle'] = $config->name.' : Agent Listing';            
            $this->loadViews("hotel_other/agent", $this->global, $data, NULL);
        }
    }

    /**
     * This function is used to load the add new form
     */
    function add_agent()
    {
		check_permission(2);
        if($this->isAdminUser() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            if($this->input->post()){
				
						$data_to_store = array(
						'name'=>$this->input->post('name'),
						'address'=>$this->input->post('address'),
						'cnic'=>$this->input->post('cnic'),
						'email_id'=>$this->input->post('email_id'),
						'agrement'=>$this->input->post('agrement')					
						);
						
					//echo '<pre>';
					//print_r($data_to_store);
					
					$result = $this->hotel_other_model->add_agent($data_to_store);
					//die();													
			}
            $config = $this->config_model->getConfig();
            $this->global['pageTitle'] = $config->name.' : Add / Edit Agent List';
            $this->loadViews("hotel_other/add_agent", $this->global, '', NULL);
        }
    }
	
	function delete_agent()
    {
        if($this->isAdminUser() == TRUE)
        {
            echo(json_encode(array('status'=>'access')));
        }
        else
        {
            $id = $this->input->post('id');
            $agent_info = array('isDeleted'=>1);
            
            $result = $this->hotel_other_model->delete_agent($id, $agent_info);
            
            if ($result > 0) { echo(json_encode(array('status'=>TRUE))); }
            else { echo(json_encode(array('status'=>FALSE))); }
        }
    }
	function edit_agent($agentId = NULL)
    {
        if($this->isAdminUser() == TRUE )
        {
            $this->loadThis();
        }
        else
        {
            if($agentId == null)
            {
                redirect('agent');
            }            
            $data['agentInfo'] = $this->hotel_other_model->getAgentInfo($agentId);
            $config = $this->config_model->getConfig();
            $this->global['pageTitle'] = $config->name.' : Edit Agent';
            
            $this->loadViews("hotel_other/add_agent", $this->global, $data, NULL);
        }
    }
	function editAgent()
    {
        if($this->isAdminUser() == TRUE)
        {
            $this->loadThis();
        }
        else
        {   
			$agentId = $this->input->post('id');
            $this->form_validation->set_rules('name','Agent Name','trim|required|max_length[128]|xss_clean');
			$this->form_validation->set_rules('address','Address','trim|required|max_length[128]|xss_clean');
			$this->form_validation->set_rules('cnic','CNIC','trim|required|max_length[128]|xss_clean');
			$this->form_validation->set_rules('email_id','Email-ID','trim|required|valid_email|max_length[128]|xss_clean');
			$this->form_validation->set_rules('agrement','Agrement','trim|required|max_length[128]|xss_clean');
            
            if($this->form_validation->run() == FALSE)
            {
                $this->edit_agent($agentId);
            }
            else
            {
					$data_to_store = array(
					'name'=>$this->input->post('name'),
					'address'=>$this->input->post('address'),
					'cnic'=>$this->input->post('cnic'),
					'email_id'=>$this->input->post('email_id'),
					'agrement'=>$this->input->post('agrement')					
					);
					
                
                $result = $this->hotel_other_model->eidt_agent($agentId,$data_to_store);
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', 'Agent updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Agent updation failed');
                }
                
                redirect('agent');
            }
        }
    }
	
	////////////////// end agent management
	
	
	
	
    /**
     * This function is used to check whether email already exist or not
     */
    function checkEmailExists()
    {
        $email = $this->input->post("email_id");
		$id = $this->input->post("id");

        if(empty($id)){
            $result = $this->hotel_other_model->checkEmailExists($email);
        } else {
            $result = $this->hotel_other_model->checkEmailExists($email,$id);
        }
//print_r($result);
        if(empty($result)){ echo("true"); }
        else { echo("false"); }
    }
	function create_voucher()
	{
		check_permission(10);	
			$config = $this->config_model->getConfig(); 
            if($this->input->post('submit')){
				if($this->session->userdata('client_id')){
					$client1 = $this->session->userdata('client_id');
					$child_wo_bed = $this->input->post('child_wo_bed');
					$ziarat_id = $this->input->post('ziarat_id');
					$ziarat = $this->input->post('ziarat');
					$count_ziarat = 0;
					foreach($ziarat as $zz){
						$count_ziarat++;
					}
					$ziarat_amount = 0;
					if($this->input->post('ziarat_id')!= null){
						foreach($ziarat_id as $k=>$v){
							if($ziarat_id[$k]){
								$ziarat_id[$k];
								$ziaratInfo = $this->hotel_other_model->getZiaratInfo($ziarat_id[$k]);
								$ziarat_amount += $count_ziarat*$ziaratInfo->amount;
							}
						}
					}
					$count_wo_bed = 0;
					foreach($child_wo_bed as $cc1){
							$count_wo_bed++;
					}
					$visa_no = $this->input->post('visa_no');
					$visa_date = $this->input->post('visa_date');
					$child_wo_bed = $this->input->post('child_wo_bed');
					$trip = $this->hotel_other_model->getTripInfo($this->input->post('trip'),$this->input->post('vehicle'));
					$vehicle = $this->hotel_other_model->getVehicleInfo($this->input->post('vehicle'));
					$client = $this->session->userdata('client_id');
					$config = $this->config_model->getConfig(); 
					$ttl_client = $this->hotel_other_model->get_clientInfo($client);			
					$agent_config = $this->user_model->getUserInfo($this->session->userdata('voucher_agent'));
					$counter = 0;$cont = 0;
					foreach($client as $cc){
						$counter++;
						$cont++;
					}
					$counter = $counter-$count_wo_bed;
					if($vehicle->sharing == 'yes'){//echo $this->input->post('trip').'trip';
						$total = $cont*$trip->price;
						$total = $total*$config->sr_rate;
					}
					else{
						$total = $trip->price;
						$total = $total*$config->sr_rate;
					}
					//echo $config->sr_rate;
					//print_r($this->input->post('hotel'));echo 'lllllloooo';
							$city_name=$this->input->post('city_name');
								$city_nights=$this->input->post('city_night');
								$check_in=$this->input->post('check_in');
								$check_out=$this->input->post('check_out');
								$hotel=$this->input->post('hotel');
								//$hotel_name=$hotel1->name;
								$room_type=$this->input->post('room_type');
								$ttl_hotel = 0;
								foreach($city_name as $key=>$val){
									//$hotel_data = $this->hotel_other_model->getHotelInfo($hotel[$key],$room_type[$key],$city_name[$key]);
									$hotel_data = $this->hotel_other_model->getHotelInfo_voucher($hotel[$key],$room_type[$key],$city_name[$key],$this->session->userdata('voucher_agent'));
									$hotel_total = ($hotel_data->price*$counter)*$city_nights[$key];
									$ttl_hotel += $hotel_total; 
								}
								//echo $ttl_hotel;						die();
							$total_bill = ($ttl_hotel*$config->sr_rate)+$total;
							$clnt_amount = ($ttl_client->t_adult*$agent_config[0]->adult_rate)+($ttl_client->t_child*$agent_config[0]->child_rate)+($ttl_client->t_infant*$agent_config[0]->infant_rate);
							$total_bill = ($ttl_hotel*$config->sr_rate)+$total+($ziarat_amount*$config->sr_rate)+$clnt_amount*$config->sr_rate;
							//echo $total_bill;
							//die($total_bill);
								$data_to_store = array(
								'dep_date'=>date_change_db(get_date($this->input->post('dep'))),
								'dep_time'=>date("H:i", strtotime(get_time($this->input->post('dep')))),
								'arv_date'=>date_change_db(get_date($this->input->post('arv'))),
								'arv_time'=>date("H:i", strtotime(get_time($this->input->post('arv')))),
								'dep_sector'=>$this->input->post('sector'),
								'dep_sector2'=>$this->input->post('sector2'),
								'dep_flight'=>$this->input->post('dep_flight'),
								'dep_flight_no'=>$this->input->post('dep_flight_no'),
								'dep_pnr_no'=>$this->input->post('dep_pnr_no'),
								'ret_sector'=>$this->input->post('ret_sector'),
								'ret_sector2'=>$this->input->post('ret_sector2'),
								'ret_flight'=>$this->input->post('ret_flight'),
								'ret_flight_no'=>$this->input->post('ret_flight_no'),
								'ret_pnr_no'=>$this->input->post('ret_pnr_no'),
								'ret_date'=>date_change_db(get_date($this->input->post('ret'))),
								'ret_time'=>date("H:i", strtotime(get_time($this->input->post('ret')))),
								'nights'=>$this->input->post('nights'),
								'vehicle_id'=>$this->input->post('vehicle'),
								'vehicle_name'=>$vehicle->name,
								'trip_id'=>$this->input->post('trip'),
								'trip_name'=>$trip->name,
								'trip_amount'=>$total,						
								'total_amount'=>$total_bill,
								'approve'=>'no',
								'isDeleted'=>'0',
								'date'=>date('Y-m-d'),
								'adult_rate'=>$agent_config[0]->adult_rate,
								'child_rate'=>$agent_config[0]->child_rate,
								'infant_rate'=>$agent_config[0]->infant_rate,
								'agent_id' => $this->session->userdata('voucher_agent'),
								'sr_rate' => $config->sr_rate,
								'remarks'=>$this->input->post('remarks'),
								'pkg_type'=>($this->input->post('pkg_type') == 'all')?0:$this->input->post('pkg_type'),
								'gp_hd_no'=>$this->input->post('gp_hd_no'),
								'nziarat'=>($this->input->post('nziarat'))?'1':'0',
								'contact'=>$this->input->post('contact'),
								//'ziarat_rate'=>$ziaratInfo->amount,
								//'ziarat_amount'=>$ziarat_amount,
								);
							
							$result = $this->hotel_other_model->add_voucher($data_to_store);
							foreach($city_name as $key=>$val){
								if($city_name[$key]){
									//$hotel_data = $this->hotel_other_model->getHotelInfo($hotel[$key],$room_type[$key],$city_name[$key]);
							$hotel_data = $this->hotel_other_model->getHotelInfo_voucher($hotel[$key],$room_type[$key],$city_name[$key],$this->session->userdata('voucher_agent'));
							//$hotel_amounnt = $this->hotel_other_model->get_agent_hotel_data($hotel[$key]);
							$hotel_amounnt = $this->hotel_other_model->get_agent_hotel_data_voucher($hotel[$key],$this->session->userdata('voucher_agent'));
									$data_voucher_hotel = array(
									'city_name'=>$city_name[$key],
									'city_nights'=>$city_nights[$key],
									'check_in'=>date_change_db($check_in[$key]),
									'check_out'=>date_change_db($check_out[$key]),
									'hotel_id'=>$hotel[$key],
									'room_type'=>$room_type[$key],							
									'hotel_name'=>$hotel_data->name,
									'hotel_amount'=>$hotel_amounnt->price,
									'voucher_id'=>$result);
									$this->hotel_other_model->inter_hotel_voucher($data_voucher_hotel);
								}
							}
							if($this->input->post('ziarat_id')!= null){
								foreach($ziarat_id as $k=>$v){
									if($ziarat_id[$k]){
										$ziaratInfo = $this->hotel_other_model->getZiaratInfo($ziarat_id[$k]);
										$voucher_ziarat = array(
										'voucher_id'=>$result,
										'ziarat_id'=>$ziarat_id[$k],
										'ziarat_rate'=>$ziaratInfo->amount,
										'ziarat_amount'=>$count_ziarat*$ziaratInfo->amount,
										);
										$this->hotel_other_model->inter_voucher_ziarat($voucher_ziarat);
									}
								}
							}
							$ttl_doc_fee = 0;
							foreach($client as $cc){
								if($ziarat[$cc])
									$zzz = 'yes';
								else
									$zzz = 'no';
									
									$clienttt = $this->hotel_other_model->get_client($cc);
									if($clienttt->document == 'yes'){
										$document = 'yes';
										$document_fee = $agent_config[0]->document_fee;
									}
									else{
										$document = 'no';
										$document_fee = 0;
									}
									$ttl_doc_fee +=$document_fee;
								$data_client = array(
										'voucher_id'=>$result,
										'client_id'=>$cc,
										'document'=> $document,
										'document_fee'=>$document_fee
										);
								$data_to_update = array(
								'voucher_issue'=>'yes',
								'visa_no'=>$visa_no[$cc],
								'visa_date'=>date_change_db($visa_date[$cc]),
								'child_wo_bed'=>$child_wo_bed[$cc],
								'ziarat'=>$zzz,
								);
								$this->client_model->deleteClient($cc,$data_to_update);
								$this->hotel_other_model->add_client_voucher($data_client);
							}
							$ttl_doc_fee=$ttl_doc_fee*$config->sr_rate;
							$total_bill = $total_bill+$ttl_doc_fee;
							$payment = array(
							'account_id'=>$this->session->userdata('voucher_agent'),
							'account_type'=>'agent',
							'payment_type'=>'dr',
							'date'=>date('Y-m-d'),
							'detail'=>'Voucher Amount',
							'voucher_id'=>$result,
							'amount'=>$total_bill
							);
							$this->hotel_other_model->add_payment($payment);
							$this->session->unset_userdata('client_id');
							$this->session->unset_userdata('voucher_agent');
							redirect('voucherView/'.$result);
				}
				else{
					$this->session->set_flashdata('error', 'Please Select Pax First');
					redirect('createVoucher');
				}
			}//end submit
			$data['agent'] = $this->hotel_other_model->agent_list_users();
            $data['sectors'] = $this->hotel_other_model->sector_list();
			$data['flights'] = $this->hotel_other_model->flight_list();
			$data['vehicles'] = $this->hotel_other_model->vehicle_list();
			$data['trip'] = $this->hotel_other_model->trip_list();
			$data['hotels'] = $this->hotel_other_model->hotel_list();
			$data['packeg'] = $this->hotel_other_model->packeg_list();
			$data['ziarat'] = $this->hotel_other_model->ziarat_list();			
            $this->global['pageTitle'] = $config->name.' : Add / Edit Voucher';
            $this->loadViews("voucher/create_voucher", $this->global, $data, NULL);
		
	}
	function select_clients()
	{
		if($this->input->post()){
			$ids = $this->input->post('id');
			$this->session->set_userdata('client_id',$ids);
			$this->load->view('voucher/pax_detail');
			
			//$this->create_voucher();
		}
		//else
		//$this->create_voucher();
	}
	function voucher()
	{
		check_permission(10);
		
		$searchText = $this->input->post('searchText');
		$data['searchText'] = $searchText;            
		$data['agent_id'] =$agent_id= ($this->input->post('agent_id'))?$this->input->post('agent_id'):'';
		$data['v_status'] =$v_status= ($this->input->post('v_status'))?$this->input->post('v_status'):'';
		$data['date'] =$date= ($this->input->post('datefilter'))?$this->input->post('datefilter'):'';
		$config = $this->config_model->getConfig();        
		$count = $this->hotel_other_model->voucher_count($searchText,$agent_id,$v_status,$date);
		$returns = $this->paginationCompress ( "voucher/", $count, $config->per_page);            
		$data['voucherRecords'] = $voucher = $this->hotel_other_model->voucher_list($searchText, $returns["page"], $returns["segment"],$agent_id,$v_status,$date);
		$this->session->unset_userdata('voucher_agent');
		$this->session->unset_userdata('client_id');
		$data['agent'] = $this->hotel_other_model->agent_list_users();
		
		$data['hotels'] = $this->hotel_other_model->hotel_list();
		$this->global['pageTitle'] = $config->name.' : Voucher Listing';            
		$this->loadViews("voucher/voucher", $this->global, $data, NULL);
	}
	function voucher_invoice($voucher_id)
	{
		check_permission(10);
		$data['config'] = $this->config_model->getConfig();		
		$data['voucher'] =$voucher= $this->hotel_other_model->voucher_view($voucher_id);
		$data['agent_config'] = $this->config_model->agentConfig($voucher->agent_id); 
		$data['voucher_clients'] = $this->hotel_other_model->view_voucher_clients($voucher_id);
		$data['voucher_hotels'] = $this->hotel_other_model->view_voucher_hotels($voucher_id);
		$data['voucher_ziarat'] = $this->hotel_other_model->view_voucher_ziarat($voucher_id);
		$config = $this->config_model->getConfig();
		$this->global['pageTitle'] = $config->name.' : Voucher Listing';            
		$this->loadViews("voucher/voucherInvoice", $this->global, $data, NULL);
	}
	function voucher_view($voucher_id)
	{
		check_permission(10);
		$data['config'] = $this->config_model->getConfig(); 
		$data['voucher'] =$voucher= $this->hotel_other_model->voucher_view($voucher_id);
		$data['voucher_clients'] = $this->hotel_other_model->view_voucher_clients($voucher_id);
		$data['voucher_hotels'] = $this->hotel_other_model->view_voucher_hotels($voucher_id);
		$data['voucher_ziarat'] = $this->hotel_other_model->view_voucher_ziarat($voucher_id);
		$data['agent_config'] = $this->config_model->agentConfig($voucher->agent_id); 
		$config = $this->config_model->getConfig();
		$this->global['pageTitle'] = $config->name.' : Voucher Listing';
		if($voucher->approve == 'no'){            
			$this->loadViews("voucher/voucherViewN", $this->global, $data, NULL);
		}
		else{
			$this->loadViews("voucher/voucherView", $this->global, $data, NULL);
		}
	}
	public function get_hotels_room_type($id,$room_type)
	{
		$room_type = $this->hotel_other_model->get_member('','','',$room_type);
		echo '<option value="">Select</option>';
		foreach($room_type as $row){
			echo $selected = ($id == $row->id)?"Selected = 'Selected'":"";
			echo '<option value="' . $row->id . '" '.$selected.'>' . $row->name . '</option>';
			}
	}
	public function get_hotels_city_name($city_name,$room_type,$pkg_type)
	{
		//echo $city_name;
		//echo $room_type;
		$agent_id = $this->session->userdata('voucher_agent');
		$hotel = $this->hotel_other_model->hotel_list('','','',$room_type,$city_name,$pkg_type,$agent_id);
		echo '<option value="">Select</option>';
		foreach($hotel as $row){
			//echo $selected = ($id == $row->id)?"Selected = 'Selected'":"";
			echo '<option value="' . $row->id . '">' . $row->name . '</option>';
			}
	}
	public function select_trip($vehicle_id)
	{
		$trips = $this->hotel_other_model->trip_list('','','',$vehicle_id);
		//echo '<option value="">Select</option>';
		foreach($trips as $row){
			//echo '<input type="radio" name="trip" id="trip" value="'.$row->id.'">'.$row->name;
			//echo '<option value="' . $row->id . '">' . $row->name . '</option>';
			echo '<div class="col-md-3" id="trips">';
            echo '<input type="radio" name="trip" id="trip" value="'.$row->id.'">'.$row->name;
            echo '</div>';
			}
	}
	
	public function select_trip1($vehicle_id,$trip_id)
	{
		$trips = $this->hotel_other_model->trip_list('','','',$vehicle_id);
		//echo '<option value="">Select</option>';
		foreach($trips as $row){
			//echo '<input type="radio" name="trip" id="trip" value="'.$row->id.'">'.$row->name;
			//echo '<option value="' . $row->id . '">' . $row->name . '</option>';
			$selected = ($row->id == $trip_id)?'checked="checked"':'';
			echo '<div class="col-md-3" id="trips">';
            echo '<input type="radio" name="trip" id="trip" value="'.$row->id.'" '.$selected.'>'.$row->name;
            echo '</div>';
			}
	}
	
	function edit_voucher($id)
	{
		check_permission(12);
		$data['agent'] = $this->hotel_other_model->agent_list_users();
		$data['sectors'] = $this->hotel_other_model->sector_list();
		$data['flights'] = $this->hotel_other_model->flight_list();
		$data['vehicles'] = $this->hotel_other_model->vehicle_list();
		$data['trip'] = $this->hotel_other_model->trip_list();
		$data['hotels'] = $this->hotel_other_model->hotel_list();
		$data['packeg'] = $this->hotel_other_model->packeg_list();
		$data['voucherInfo'] = $voucherInfo = $this->hotel_other_model->getVoucherInfo($id);
		//$data['ziarat'] = $this->hotel_other_model->ziarat_list();
		$this->session->set_userdata('voucher_agent',$voucherInfo->agent_id);
		$data['voucher_clients'] =$cc= $this->hotel_other_model->view_voucher_clients($id);
		$data['voucher_hotels'] = $this->hotel_other_model->view_voucher_hotels($id);
		$data['ziarat'] = $this->hotel_other_model->view_voucher_ziarat($id);
		$config = $this->config_model->getConfig();
		foreach($cc as $c){
			$ccc[] = $c->id;
		}
		$this->session->set_userdata('client_id',$ccc);
		//print_r($ccc);die();
		$this->global['pageTitle'] = $config->name.' : Add / Edit Voucher';
		$this->loadViews("voucher/edit_voucher", $this->global, $data, NULL);
	}
	
	function editVoucher()
	{
        $adult_rate = $this->input->post('adult_rate');
        $child_rate = $this->input->post('child_rate');
        $infant_rate = $this->input->post('infant_rate');
        $sr_rate = $this->input->post('sr_rate');
		$client1 = $this->session->userdata('client_id');
		$child_wo_bed = $this->input->post('child_wo_bed');
		$count_wo_bed = 0;
		foreach($child_wo_bed as $cc1){			
				$count_wo_bed++;
		}
		$ziarat_id = $this->input->post('ziarat_id');
		$ziarat = $this->input->post('ziarat');
		$count_ziarat = 0;
		if($ziarat){
			foreach($ziarat as $zz){
				$count_ziarat++;
			}
		}
		$ziarat_amount = 0;
		if($this->input->post('ziarat_id')!= null){
			foreach($ziarat_id as $k=>$v){
				if($ziarat_id[$k]){
					//echo $ziarat_id[$k];
					$ziaratInfo = $this->hotel_other_model->getZiaratInfo($ziarat_id[$k]);
					$ziarat_amount += $count_ziarat*$ziaratInfo->amount;
				}
			}
		}
		
		
		
		
		$v_id = $this->input->post('id');		
            if($this->input->post('submit')){	
			$visa_no = $this->input->post('visa_no');
			$visa_date = $this->input->post('visa_date');
			$child_wo_bed = $this->input->post('child_wo_bed');
			$trip = $this->hotel_other_model->getTripInfo($this->input->post('trip'),$this->input->post('vehicle'));
			$vehicle = $this->hotel_other_model->getVehicleInfo($this->input->post('vehicle'));
			$client = $this->session->userdata('client_id');
			$ttl_client = $this->hotel_other_model->get_clientInfo($client);
			$agent_config = $this->user_model->getUserInfo($this->session->userdata('voucher_agent'));
			//echo $agent_config[0]->adult_rate;
			//print_r($agent_config);die();
			$config = $this->config_model->getConfig(); 
			$counter = 0;$cont = 0;
			foreach($client as $cc){
				$counter++;
				$cont++;
			}
			$counter = $counter-$count_wo_bed;
			if($vehicle->sharing == 'yes'){
				$total = $cont*$trip->price;
				$total = $total*$sr_rate;
			}
			else{
				$total = $trip->price;
				$total = $total*$sr_rate;
			}
						$city_name=$this->input->post('city_name');
						$city_nights=$this->input->post('city_night');
						$check_in=$this->input->post('check_in');
						$check_out=$this->input->post('check_out');
						$hotel=$this->input->post('hotel');
						$htl_rate=$this->input->post('htl_rate');
						//$hotel_name=$hotel1->name;
						$room_type=$this->input->post('room_type');
						$ttl_hotel = 0;
						foreach($city_name as $key=>$val){
							//$hotel_data = $this->hotel_other_model->getHotelInfo($hotel[$key],$room_type[$key],$city_name[$key]);														
							//$hotel_data = $this->hotel_other_model->getHotelInfo_voucher($hotel[$key],$room_type[$key],$city_name[$key],$this->session->userdata('voucher_agent'));
							
                            $hotel_total = ($htl_rate[$key]*$counter)*$city_nights[$key];
							$ttl_hotel += $hotel_total; 
						}						
					//$total_bill = ($ttl_hotel*$config->sr_rate)+$total;
					
					$clnt_amount = ($ttl_client->t_adult*$adult_rate)+($ttl_client->t_child*$child_rate)+($ttl_client->t_infant*$infant_rate);
					$total_bill = ($ttl_hotel*$sr_rate)+$total+($ziarat_amount*$sr_rate)+$clnt_amount*$sr_rate;
					//echo $total_bill;
				//die();
						$data_to_store = array(
						'dep_date'=>date_change_db(get_date($this->input->post('dep'))),
						'dep_time'=>date("H:i", strtotime(get_time($this->input->post('dep')))),
						'arv_date'=>date_change_db(get_date($this->input->post('arv'))),
						'arv_time'=>date("H:i", strtotime(get_time($this->input->post('arv')))),
						'dep_sector'=>$this->input->post('sector'),
						'dep_sector2'=>$this->input->post('sector2'),
						'dep_flight'=>$this->input->post('dep_flight'),
						'dep_flight_no'=>$this->input->post('dep_flight_no'),
						'dep_pnr_no'=>$this->input->post('dep_pnr_no'),
						'ret_sector'=>$this->input->post('ret_sector'),
						'ret_sector2'=>$this->input->post('ret_sector2'),
						'ret_flight'=>$this->input->post('ret_flight'),
						'ret_flight_no'=>$this->input->post('ret_flight_no'),
						'ret_pnr_no'=>$this->input->post('ret_pnr_no'),
						'ret_date'=>date_change_db(get_date($this->input->post('ret'))),
						'ret_time'=>date("H:i", strtotime(get_time($this->input->post('ret')))),
						'nights'=>$this->input->post('nights'),
						'vehicle_id'=>$this->input->post('vehicle'),
						'vehicle_name'=>$vehicle->name,
						'trip_id'=>$this->input->post('trip'),
						'trip_name'=>$trip->name,
						'trip_amount'=>$total,						
						'total_amount'=>$total_bill,
						'approve'=>'no',
						'isDeleted'=>'0',
						'date'=>date('Y-m-d'),
						'adult_rate'=>$adult_rate,
						'child_rate'=>$child_rate,
						'infant_rate'=>$infant_rate,
						'agent_id' => $this->session->userdata('voucher_agent'),
						'sr_rate' => $sr_rate,
						'remarks'=>$this->input->post('remarks'),
						'pkg_type'=>($this->input->post('pkg_type') == 'all')?0:$this->input->post('pkg_type'),
						'gp_hd_no'=>$this->input->post('gp_hd_no'),
						'nziarat'=>($this->input->post('nziarat'))?'1':'0',
						'contact'=>$this->input->post('contact'),
						);
					$this->db->trans_start();
					$voucher_clients= $this->hotel_other_model->view_voucher_clients($v_id);
					foreach($voucher_clients as $vc){
						$dd_update = array('voucher_issue'=>'no');
						$this->client_model->deleteClient($vc->id,$dd_update);//echo $vc->client_id;die();
						
					}
					$this->db->where('voucher_id',$v_id);
						$this->db->delete('voucher_client');
					$result = $this->hotel_other_model->voucherApprove($v_id,$data_to_store);
					$this->db->where('voucher_id',$v_id);
					$this->db->delete('voucher_ziarat');
					$this->db->where('voucher_id',$v_id);
					$this->db->delete('voucher_hotel');
					foreach($city_name as $key=>$val){
						if($city_name[$key]){
							//$hotel_data = $this->hotel_other_model->getHotelInfo($hotel[$key],$room_type[$key],$city_name[$key]);
							$hotel_data = $this->hotel_other_model->getHotelInfo_voucher($hotel[$key],$room_type[$key],$city_name[$key],$this->session->userdata('voucher_agent'));
							//$hotel_amounnt = $this->hotel_other_model->get_agent_hotel_data($hotel[$key]);
							$hotel_amounnt = $this->hotel_other_model->get_agent_hotel_data_voucher($hotel[$key],$this->session->userdata('voucher_agent'));
							$data_voucher_hotel = array(
							'city_name'=>$city_name[$key],
							'city_nights'=>$city_nights[$key],
							'check_in'=>date_change_db($check_in[$key]),
							'check_out'=>date_change_db($check_out[$key]),
							'hotel_id'=>$hotel[$key],
							'room_type'=>$room_type[$key],							
							'hotel_name'=>$hotel_data->name,
							'hotel_amount'=>$htl_rate[$key],
							'voucher_id'=>$v_id);
							$this->hotel_other_model->inter_hotel_voucher($data_voucher_hotel);
						}
					}
					if($this->input->post('ziarat_id')!= null){
						foreach($ziarat_id as $k=>$v){
							if($ziarat_id[$k]){
								$ziaratInfo = $this->hotel_other_model->getZiaratInfo($ziarat_id[$k]);
								$voucher_ziarat = array(
								'voucher_id'=>$v_id,
								'ziarat_id'=>$ziarat_id[$k],
								'ziarat_rate'=>$ziaratInfo->amount,
								'ziarat_amount'=>$count_ziarat*$ziaratInfo->amount,
								);
								$this->hotel_other_model->inter_voucher_ziarat($voucher_ziarat);
							}
						}
					}
					
					
					
					$ttl_doc_fee = 0;
					foreach($client as $cc){
						if($ziarat[$cc])
							$zzz = 'yes';
						else
							$zzz = 'no';
							
							$clienttt = $this->hotel_other_model->get_client($cc);
							if($clienttt->document == 'yes'){
								$document = 'yes';
								$document_fee = $agent_config[0]->document_fee;
							}
							else{
								$document = 'no';
								$document_fee = 0;
							}
							$ttl_doc_fee +=$document_fee;
						$data_client = array(
								'voucher_id'=>$v_id,
								'client_id'=>$cc,
								'document'=>$document,
								'document_fee'=>$document_fee,
								);
						$data_to_update = array(
						'voucher_issue'=>'yes',
						'visa_no'=>$visa_no[$cc],
						'visa_date'=>date_change_db($visa_date[$cc]),
						'child_wo_bed'=>$child_wo_bed[$cc],
						'ziarat'=>$zzz
						);
						$this->client_model->deleteClient($cc,$data_to_update);
						$this->hotel_other_model->add_client_voucher($data_client);
					}
					$ttl_doc_fee=$ttl_doc_fee*$sr_rate;
					$total_bill = $total_bill+$ttl_doc_fee;
					$payment = array(
					'account_id'=>$this->session->userdata('voucher_agent'),
					'account_type'=>'agent',
					'payment_type'=>'dr',
					'amount'=>$total_bill
					);
					$this->hotel_other_model->update_payment($v_id,$payment);
					$this->session->unset_userdata('client_id');
					$this->session->unset_userdata('voucher_agent');
					$this->db->trans_complete();
					redirect('voucherView/'.$v_id);
					//die();													
			}			
        //} end else
	
	
	}
	
	
	
	public function voucherApprove()
	{
		check_permission(13);
        /*if($this->isAdminUser() == TRUE)
        {
            echo(json_encode(array('status'=>'access')));
        }
        else
        {*/
            $id = $this->input->post('id');
            $voucher_info = array('approve'=>'yes');
            
            $result = $this->hotel_other_model->voucherApprove($id, $voucher_info);
            
            if ($result > 0) { echo(json_encode(array('status'=>TRUE))); }
            else { echo(json_encode(array('status'=>FALSE))); }
        //}
	}
	public function voucherNApprove()
	{
		check_permission(13);
		
        /*if($this->isAdminUser() == TRUE)
        {
            echo(json_encode(array('status'=>'access')));
        }
        else
        {*/
            $id = $this->input->post('id');
            $voucher_info = array('approve'=>'no');
            
            $result = $this->hotel_other_model->voucherApprove($id, $voucher_info);
            
            if ($result > 0) { echo(json_encode(array('status'=>TRUE))); }
            else { echo(json_encode(array('status'=>FALSE))); }
        //}
	}
	public function voucher_cancel()
	{
		/*if($this->isAdminUser() == TRUE)
        {
            echo(json_encode(array('status'=>'access')));
        }
        else
        {*/
            $id = $this->input->post('id');
            $client_info = array('isDeleted'=>'1');			
            $this->hotel_other_model->updateVoucher($id,$client_info);
			$this->hotel_other_model->update_payment($id,array('isDeleted'=>'1'));
            $resultt = $this->hotel_other_model->get_voucher_clients($id);
			//print_r($resultt);die('asd');
            foreach($resultt as $re){
				//echo $re;die();
				$client_id = array('voucher_issue'=>'no');
				$result = $this->client_model->deleteClient($re->client_id,$client_id);
			}
			$this->hotel_other_model->delete_voucher_client($id);
			$this->hotel_other_model->delete_voucher_hotel($id);
			$this->hotel_other_model->delete_voucher_ziarat($id);
            if ($result > 0) { echo(json_encode(array('status'=>TRUE))); }
            else { echo(json_encode(array('status'=>FALSE))); }
        //}
	}
	function selectAgent($id)
	{
		$this->session->set_userdata('voucher_agent',$id);
		echo $this->session->userdata('voucher_agent');
	}
    

//ticket sale management 
	function ticket_sale_excel()
	{		
		$data['ticket_sale'] = $this->hotel_other_model->get_ticket_sale();
		$this->load->view("transection/ticket_sale_excel",$data);
	}
	function ticket_sale_word()
	{		
		$data['ticket_sale'] = $this->hotel_other_model->get_ticket_sale();
		$this->load->view("transection/ticket_sale_word",$data);
	}
	function ticket_sale()
	{
		check_permission(5);
		$config = $this->config_model->getConfig();
		$data['agentRecords'] = $this->hotel_other_model->agent_list_users();
		$data['flights'] = $this->hotel_other_model->flight_list();
		$data['date'] =$date= ($this->input->post('date'))?date_change_db($this->input->post('date')):'';
		$data['bsp'] =$bsp= ($this->input->post('bsp'))?$this->input->post('bsp'):'';
		$data['agent_id'] =$agent_id= ($this->input->post('agent_id'))?$this->input->post('agent_id'):'';
		$data['flight_id'] =$flight_id= ($this->input->post('flight_id'))?$this->input->post('flight_id'):'';
		$datefilter= ($this->input->post('date_range'))?$this->input->post('date_range'):'';
		if($datefilter){
			$date = explode(' - ',$datefilter);
			$data['start_date'] = $start_date = $date[0];
			$data['end_date'] = $end_date = $date[1];
		}
		else{
			$data['start_date'] = $start_date = '';
			$data['end_date'] = $end_date = '';
		}
		$count = $this->hotel_other_model->ticket_sale_count($agent_id,$flight_id,$bsp,$start_date,$end_date);
		$returns = $this->paginationCompress ( "ticket_sale/", $count, $config->per_page);            
		$data['ticket_sale'] = $this->hotel_other_model->get_ticket_sale($returns["page"], $returns["segment"],$agent_id,$flight_id,$bsp,$start_date,$end_date);
        $data['config'] = $this->config_model->getConfig();
		$this->global['pageTitle'] = $config->name.' : Add / Edit Ticket Sale';
		$this->loadViews("transection/ticket_sale", $this->global, $data, NULL);
	}
	function add_ticket_sale()
	{
        
		check_permission(5);
		$config = $this->config_model->getConfig();
		$data['agentRecords'] = $this->hotel_other_model->agent_list_users();
		$data['flights'] = $this->hotel_other_model->flight_list();
		if($this->input->post()){
			$data_to_store = array(
			'date'=>date_change_db($this->input->post('date')),
			'name'=>$this->input->post('name'),
			'flight_id'=>$this->input->post('flight_id'),
			'agent_id'=>$this->input->post('agent_id'),
			'pnr'=>$this->input->post('pnr'),
			'ticket_no'=>$this->input->post('ticket_no'),
			'ticket_from_to'=>$this->input->post('ticket_from_to'),
			'category'=>$this->input->post('category'),
			'purchase'=>$this->input->post('purchase'),
			'sale'=>$this->input->post('sale'),	
            'phone'=>$this->input->post('phone'),	
			'paid_amount'=>$this->input->post('paid_amount'),
			'ticket_visa'=>$this->input->post('ticket_visa')			
			);
			$ticket_sale_id = $this->hotel_other_model->add_ticket_sale($data_to_store);            
			$tsdata_to_store = array(
					'date'=>date_change_db($this->input->post('date')),					
					'flight_id'=>$this->input->post('flight_id'),
					'payment_type'=>'dr',					
					'amount'=>$this->input->post('paid_amount'),
					'ts_id'=>$ticket_sale_id,
					'detail'=>'Ticket Sale Payment'
					);
			$result = $this->hotel_other_model->add_flight_amount($tsdata_to_store);
			$tsadata_to_store = array(
					'date'=>date_change_db($this->input->post('date')),					
					'amount'=>$this->input->post('paid_amount'),
					'ticket_sale_id'=>$ticket_sale_id,					
					);
			$result = $this->hotel_other_model->add_ticket_sale_amount($tsadata_to_store);
            if($this->input->post('phone'))
            {
                $mobile = $this->input->post('phone');
                $message = $config->ticket_sms_format;
                $message = str_replace('{amount}',$this->input->post('paid_amount'),$message);
                $message = str_replace('{ticket/visa}',$this->input->post('ticket_visa'),$message);
                send_sms($mobile,$message);
                
            }
            if($config->sms_yes_no == "Yes"){
                $message = $config->ticket_sms_format_admin;
                $mobile_for_sms = $config->mobile_for_sms;
                $name = explode('-',$this->input->post('name'));
                $message = str_replace('{amount}',$this->input->post('paid_amount'),$message);
                $message = str_replace('{name}',$name[0],$message);
                $message = str_replace('{ticket/visa}',$this->input->post('ticket_visa'),$message);
                $message = str_replace('{mobile}',$this->input->post('phone'),$message);
                send_sms($mobile_for_sms,$message);
            }
		}
		$this->global['pageTitle'] = $config->name.' : Add / Edit Ticket Sale';
		$this->loadViews("transection/add_ticket_sale", $this->global, $data, NULL);
	}
	
	function edit_ticket_sale($id = NULL)
    {
        if($this->isAdminUser() == TRUE )
        {
            $this->loadThis();
        }
        else
        {
            if($id == null)
            {
                redirect('ticket_sale');
            }            
            $data['agentRecords'] = $this->hotel_other_model->agent_list_users();
			$data['flights'] = $this->hotel_other_model->flight_list();
			$data['ticket_sale_info'] = $this->hotel_other_model->get_ticket_sale_info($id);
            $config = $this->config_model->getConfig();
            $this->global['pageTitle'] = $config->name.' : Edit Ticket Sale';
            
            $this->loadViews("transection/add_ticket_sale", $this->global, $data, NULL);
        }
    }
    function print_ticket_sale($id)
    {
        $data['amount'] = $this->hotel_other_model->get_ticket_sale_amount($id);
        $data['ticket_sale_info'] = $this->hotel_other_model->get_ticket_sale_info($id);
        $data['config'] = $config = $this->config_model->getConfig();
        $this->global['pageTitle'] = $config->name.' : Print Ticket Sale';
        $this->loadViews("transection/ticket_sale_print", $this->global, $data, NULL);
    }
	function edit_ticketSale()
    {
        if($this->isAdminUser() == TRUE)
        {
            $this->loadThis();
        }
        else
        {   
			$id = $this->input->post('id');
            $this->form_validation->set_rules('name','Name','trim|required|max_length[520]|xss_clean');
			$this->form_validation->set_rules('agent_id','Agent Name','trim|required|max_length[520]|xss_clean');
			$this->form_validation->set_rules('flight_id','Flight Name','trim|required|max_length[520]|xss_clean');
			$this->form_validation->set_rules('purchase','purchase','required');
			$this->form_validation->set_rules('ticket_no','Ticket No','trim|required|max_length[520]|xss_clean');
            
            if($this->form_validation->run() == FALSE)
            {
                $this->edit_ticket_sale($id);
            }
            else
            {
				$data_to_store = array(
					'date'=>date_change_db($this->input->post('date')),
					'name'=>$this->input->post('name'),
					'flight_id'=>$this->input->post('flight_id'),
					'agent_id'=>$this->input->post('agent_id'),
					'pnr'=>$this->input->post('pnr'),
					'ticket_no'=>$this->input->post('ticket_no'),
					'ticket_from_to'=>$this->input->post('ticket_from_to'),
					'category'=>$this->input->post('category'),
					'purchase'=>$this->input->post('purchase'),
					'sale'=>$this->input->post('sale'),
					'bps_sale'=>$this->input->post('bps_sale'),
                    'phone'=>$this->input->post('phone'),	
			        'paid_amount'=>$this->input->post('paid_amount'),
			        'ticket_visa'=>$this->input->post('ticket_visa')
					);
			$result = $this->hotel_other_model->update_ticket_sale($id,$data_to_store);
			$tsdata_to_store = array(
					'date'=>date_change_db($this->input->post('date')),					
					'flight_id'=>$this->input->post('flight_id'),
					'payment_type'=>'dr',					
					'amount'=>$this->input->post('paid_amount'),					
					);
			$result = $this->hotel_other_model->update_ts_flight_amount($id,$tsdata_to_store);
			$tsadata_to_store = array(
                'date'=>date_change_db($this->input->post('date')),					
                'amount'=>$this->input->post('paid_amount'),				
                );
            $result = $this->hotel_other_model->update_ticket_sale_amount($id,$tsadata_to_store);		
            $config = $this->config_model->getConfig();
            $message = 'Ticket #'.$id.' Edited ';
            $message .= $config->ticket_sms_format_admin;
            $mobile_for_sms = $config->mobile_for_sms;
            $name = explode('-',$this->input->post('name'));
            $message = str_replace('{amount}',$this->input->post('paid_amount'),$message);
            $message = str_replace('{name}',$name[0],$message);
            $message = str_replace('{ticket/visa}',$this->input->post('ticket_visa'),$message);
            $message = str_replace('{mobile}',$this->input->post('phone'),$message);
            send_sms($mobile_for_sms,$message);
            
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', 'Ticket Sale updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Ticket Sale updation failed');
                }
                
                redirect('ticket_sale');
            }
        }
    }
	function delete_ticket()
    {
        if($this->isAdminUser() == TRUE)
        {
            echo(json_encode(array('status'=>'access')));
        }
        else
        {
            $id = $this->input->post('id');
            $hotel_info = array('isDeleted'=>1);
            
			$result = $this->hotel_other_model->update_ts_flight_amount($id, $hotel_info);
            $result = $this->hotel_other_model->update_ticket_sale($id, $hotel_info);
            
            if ($result > 0) { echo(json_encode(array('status'=>TRUE))); }
            else { echo(json_encode(array('status'=>FALSE))); }
        }
    }
    function receive_payment()
    {
        if($this->input->post()){
            $idd = $this->input->post('ticket_sale_id');
            $res = $this->db->query('select phone, paid_amount from ticket_sale where id='.$idd)->result_array();
            $mobile = $res[0]['phone'];
            $new_amount = $res[0]['paid_amount'] + $this->input->post('amount');
            $data_to_store = array(	
                'paid_amount'=>$new_amount
                );
        $result = $this->hotel_other_model->update_ticket_sale($idd,$data_to_store);
            $tsadata_to_store = array(
                'date'=>date('Y-m-d'),					
                'amount'=>$this->input->post('amount'),              
                'ticket_sale_id'=>$idd,
                );
            $result = $this->hotel_other_model->receive_ticket_sale_amount($tsadata_to_store);		
            $config = $this->config_model->getConfig();
            if($mobile)
            {
                
                $message = $config->ticket_sms_format;
                $message = str_replace('{amount}',$this->input->post('amount'),$message);
                $message = str_replace('{ticket/visa}',$this->input->post('ticket_visa'),$message);
                //$mobile_for_sms = $config->mobile_for_sms;
                //$message2 = "Amount Rs. ".$this->input->post('amount')."/- is received against Mobile No.: ".$mobile;
                //send_sms($mobile_for_sms,$message2);
                send_sms($mobile,$message);
            }
            if($config->sms_yes_no == "Yes"){
                $message = $config->ticket_sms_format_admin;
                $mobile_for_sms = $config->mobile_for_sms;
                $name = explode('-',$this->input->post('name'));
                $message = str_replace('{amount}',$this->input->post('amount'),$message);
                $message = str_replace('{name}',$name[0],$message);
                $message = str_replace('{ticket/visa}',$this->input->post('ticket_visa'),$message);
                $message = str_replace('{mobile}',$this->input->post('phone'),$message);
                send_sms($mobile_for_sms,$message);
            }
        }
        redirect('ticket_sale');
    }
	
	//flight transection Management
	function flight_transection_excel()
	{
		$data['ftransectionRecords'] = $this->hotel_other_model->get_flight_transection($flight_id);
		$this->load->view("transection/flight_transection_excel",$data);
	}
	function flight_transection_word()
	{
		$data['ftransectionRecords'] = $this->hotel_other_model->get_flight_transection($flight_id);
		$this->load->view("transection/flight_transection_word",$data);
	}
	function flight_transection()
	{
		check_permission(6);
		$config = $this->config_model->getConfig();
		$data['flights'] = $this->hotel_other_model->flight_list();
		$data['date'] =$date= ($this->input->post('date'))?date_change_db($this->input->post('date')):'';
		$data['flight_id'] =$flight_id= ($this->input->post('flight_id'))?$this->input->post('flight_id'):'';
		$data['ftransectionRecords'] = $this->hotel_other_model->get_flight_transection($flight_id);

		$this->global['pageTitle'] = $config->name.' : Add / Edit Flight Transection';
		$this->loadViews("transection/flight_transection", $this->global, $data, NULL);
	}
	function add_ftransection()
	{
		check_permission(6);
		$config = $this->config_model->getConfig();
		$data['flights'] = $this->hotel_other_model->flight_list();
		$data['banks'] = $this->hotel_other_model->bank_list();
		if($this->input->post()){
			$tsdata_to_store = array(
					'date'=>date_change_db($this->input->post('date')),		
					'flight_id'=>$this->input->post('flight_id'),
					'bank_id'=>$this->input->post('bank_id'),
					'payment_type'=>$this->input->post('payment_type'),
					'amount'=>$this->input->post('amount'),
					'ts_id'=>'0',
					'detail'=>$this->input->post('detail')
					);
			$result = $this->hotel_other_model->add_flight_amount($tsdata_to_store);
			$bdata_to_store = array(
					'date'=>date_change_db($this->input->post('date')),		
					'bank_id'=>$this->input->post('bank_id'),
					'payment_type'=>'dr',
					'amount'=>$this->input->post('amount'),
					'ft_id'=>$result,
					'detail'=>$this->input->post('detail')
					);
			if($this->input->post('bank_id')){
				$result = $this->hotel_other_model->add_bank_amount($bdata_to_store);}
		}
		$this->global['pageTitle'] = $config->name.' : Add / Edit Flight Transection';
		$this->loadViews("transection/add_flight_transection", $this->global, $data, NULL);
	}
	
	function edit_ftransection($id = NULL)
    {
        if($this->isAdminUser() == TRUE )
        {
            $this->loadThis();
        }
        else
        {
            if($id == null)
            {
                redirect('ticket_sale');
            }
			$data['flights'] = $this->hotel_other_model->flight_list();
			$data['banks'] = $this->hotel_other_model->bank_list();
			$data['ftransectionInfo'] = $this->hotel_other_model->ftransectionInfo($id);
            $config = $this->config_model->getConfig();
            $this->global['pageTitle'] = $config->name.' : Edit Flight Transection';
            
            $this->loadViews("transection/add_flight_transection", $this->global, $data, NULL);
        }
    }
	function editFTransection()
    {
        if($this->isAdminUser() == TRUE)
        {
            $this->loadThis();
        }
        else
        {   
			$id = $this->input->post('id');
			$this->form_validation->set_rules('flight_id','Flight Name','trim|required|max_length[128]|xss_clean');
			$this->form_validation->set_rules('amount','amount','required');
			$this->form_validation->set_rules('payment_type','Payment Type','trim|required|max_length[128]|xss_clean');
            
            if($this->form_validation->run() == FALSE)
            {
                $this->edit_ftransection($id);
            }
            else
            {
				$data_to_store = array(
					'date'=>date_change_db($this->input->post('date')),		
					'flight_id'=>$this->input->post('flight_id'),
					'bank_id'=>$this->input->post('bank_id'),
					'payment_type'=>$this->input->post('payment_type'),
					'amount'=>$this->input->post('amount'),
					'ts_id'=>'0',
					'detail'=>$this->input->post('detail')
					);
			$result = $this->hotel_other_model->update_flight_amount($id,$data_to_store);
			$bdata_to_store = array(
					'date'=>date_change_db($this->input->post('date')),		
					'bank_id'=>$this->input->post('bank_id'),
					'payment_type'=>'dr',
					'amount'=>$this->input->post('amount'),
					'detail'=>$this->input->post('detail')
					);
			if($this->input->post('bank_id')){
				$result = $this->hotel_other_model->update_ft_bank_amount($id,$bdata_to_store);
			}
                
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', 'Flight Transection  updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Flight Transection  updation failed');
                }
                
                redirect('flight_transection');
            }
        }
    }
	function delete_ftransection()
    {
        if($this->isAdminUser() == TRUE)
        {
            echo(json_encode(array('status'=>'access')));
        }
        else
        {
            $id = $this->input->post('id');
            $hotel_info = array('isDeleted'=>1);
            
			$result = $this->hotel_other_model->update_flight_amount($id, $hotel_info);
            $result = $this->hotel_other_model->update_ft_bank_amount($id, $hotel_info);
            if ($result > 0) { echo(json_encode(array('status'=>TRUE))); }
            else { echo(json_encode(array('status'=>FALSE))); }
        }
    }
	

//////// Bank Management ///////////////////
	function bank($id = null)
    {
		check_permission(2);
        if($this->isAdminUser() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
			//if($id){echo 'kljl';die('lll');}
            $searchText = $this->input->post('searchText');
            $data['searchText'] = $searchText;            
            $config = $this->config_model->getConfig();
            $count = $this->hotel_other_model->bank_count($searchText);
			$returns = $this->paginationCompress ( "bank/", $count, $config->per_page);            
            $data['bankRecords'] = $this->hotel_other_model->bank_list($searchText, $returns["page"], $returns["segment"]);
            $this->global['pageTitle'] = $config->name.' : Bank Listing';            
            $this->loadViews("hotel_other/bank", $this->global, $data, NULL);
        }
    }

    /**
     * This function is used to load the add new form
     */
    function add_bank()
    {
		check_permission(2);
        if($this->isAdminUser() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            if($this->input->post()){
				$data_to_store = array(
				'name'=>$this->input->post('name')				
				);
				$this->hotel_other_model->add_bank($data_to_store);
			}
            $config = $this->config_model->getConfig();
            $this->global['pageTitle'] = $config->name.' : Add / Edit Bank List';
            $this->loadViews("hotel_other/add_bank", $this->global, '', NULL);
        }
    }
	
	function delete_bank()
    {
        if($this->isAdminUser() == TRUE)
        {
            echo(json_encode(array('status'=>'access')));
        }
        else
        {
            $id = $this->input->post('id');
            $sector_info = array('isDeleted'=>1);
            
            $result = $this->hotel_other_model->delete_bank($id, $sector_info);
            
            if ($result > 0) { echo(json_encode(array('status'=>TRUE))); }
            else { echo(json_encode(array('status'=>FALSE))); }
        }
    }
	function edit_bank($sectorId = NULL)
    {
        if($this->isAdminUser() == TRUE )
        {
            $this->loadThis();
        }
        else
        {
            if($sectorId == null)
            {
                redirect('bank');
            }            
            $data['bankInfo'] = $this->hotel_other_model->getBankInfo($sectorId);
            $config = $this->config_model->getConfig();
            $this->global['pageTitle'] = $config->name.' : Edit Sector';
            
            $this->loadViews("hotel_other/add_bank", $this->global, $data, NULL);
        }
    }
	function editBank()
    {
        if($this->isAdminUser() == TRUE)
        {
            $this->loadThis();
        }
        else
        {   
			$sectorId = $this->input->post('id');
            $this->form_validation->set_rules('name','Sector Name','trim|required|max_length[128]|xss_clean');
            
            if($this->form_validation->run() == FALSE)
            {
                $this->edit_bank($sectorId);
            }
            else
            {
					$data_to_store = array(
					'name'=>$this->input->post('name')					
					);
					
                
                $result = $this->hotel_other_model->eidt_bank($sectorId,$data_to_store);
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', 'Sector updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Sector updation failed');
                }
                
                redirect('bank');
            }
        }
    }
	

/////// end Bank Management ///////////////

	//bank transection ////////////////
	function bank_transection_excel($id = null)
	{		
		$data['btransectionRecords'] = $this->hotel_other_model->get_bank_transection($bank_id);
		$this->load->view("transection/bank_transection_excel",$data);
	}
	function bank_transection_word($id = null)
	{		
		$data['btransectionRecords'] = $this->hotel_other_model->get_bank_transection($bank_id);
		$this->load->view("transection/bank_transection_word",$data);
	}
	function bank_transection($id = null)
	{
		check_permission(7);
		$data['bank_id'] =$bank_id= ($this->input->post('bank_id'))?$this->input->post('bank_id'):'';
		if($this->input->post('bank_id')){
			$bank_id = $this->input->post('bank_id');
		}
		else{
			if($id){
				$bank_id = $id;
			}
		}
		$config = $this->config_model->getConfig();
		$data['banks'] = $this->hotel_other_model->bank_list();
		//$data['date'] =$date= ($this->input->post('date'))?date_change_db($this->input->post('date')):'';
		$datefilter= ($this->input->post('date_range'))?$this->input->post('date_range'):'';
		if($datefilter){
			$date = explode(' - ',$datefilter);
			$data['start_date'] = $start_date = $date[0];
			$data['end_date'] = $end_date = $date[1];
		}
		else{
			$data['start_date'] = $start_date = '';
			$data['end_date'] = $end_date = '';
		}
		
		$data['btransectionRecords'] = $this->hotel_other_model->get_bank_transection($bank_id,'',$start_date,$end_date);

		$this->global['pageTitle'] = $config->name.' : Add / Edit Bank Transection';
		$this->loadViews("transection/bank_transection", $this->global, $data, NULL);
	}
	function add_btransection()
	{
		check_permission(7);
		$data['agent_id'] =$agent_id= ($this->input->post('agent_id'))?$this->input->post('agent_id'):'';
		$data['agentRecords'] = $this->hotel_other_model->agent_list_users();
		$config = $this->config_model->getConfig();
		$data['banks'] = $this->hotel_other_model->bank_list();
		if($this->input->post()){
			$tsdata_to_store = array(
					'date'=>date_change_db($this->input->post('date')),		
					'bank_id'=>$this->input->post('bank_id'),
					'payment_type'=>$this->input->post('payment_type'),
					'amount'=>$this->input->post('amount'),
					'agent_id'=>$this->input->post('agent_id')?$this->input->post('agent_id'):'',
					'detail'=>$this->input->post('detail'),
					'ft_id'=>0,
					);
			$result = $this->hotel_other_model->add_bank_amount($tsdata_to_store);
			if($this->input->post('agent_id')){
					$tata_to_store = array(
						'account_id'=>$this->input->post('agent_id'),
						'payment_type'=>$this->input->post('payment_type'),
						'account_type'=>'agent',
						'date'=>date_change_db($this->input->post('date')),
						'detail'=>$this->input->post('detail'),
						'amount'=>$this->input->post('amount'),
						'bt_id' => $result	
						);
				$result = $this->transection_model->add_transection($tata_to_store);
			}
		}
		$this->global['pageTitle'] = $config->name.' : Add / Edit Bank Transection';
		$this->loadViews("transection/add_bank_transection", $this->global, $data, NULL);
	}
	
	function edit_btransection($id = NULL)
    {
        if($this->isAdminUser() == TRUE )
        {
            $this->loadThis();
        }
        else
        {
            if($id == null)
            {
                redirect('bank_transection');
            }            
			$data['banks'] = $this->hotel_other_model->bank_list();
			$data['btransectionInfo'] = $this->hotel_other_model->btransectionInfo($id);
            $config = $this->config_model->getConfig();
            $this->global['pageTitle'] = $config->name.' : Edit Bank Transection';
            $data['agentRecords'] = $this->hotel_other_model->agent_list_users();
            $this->loadViews("transection/add_bank_transection", $this->global, $data, NULL);
        }
    }
	function editBTransection()
    {
        if($this->isAdminUser() == TRUE)
        {
            $this->loadThis();
        }
        else
        {   
			$id = $this->input->post('id');
			$this->form_validation->set_rules('bank_id','Bank Name','trim|required|max_length[128]|xss_clean');
			$this->form_validation->set_rules('amount','amount','required');
			$this->form_validation->set_rules('payment_type','Payment Type','trim|required|max_length[128]|xss_clean');
            
            if($this->form_validation->run() == FALSE)
            {
                $this->edit_btransection($id);
            }
            else
            {
				$data_to_store = array(
					'date'=>date_change_db($this->input->post('date')),		
					'bank_id'=>$this->input->post('bank_id'),
					'payment_type'=>$this->input->post('payment_type'),
					'amount'=>$this->input->post('amount'),
					'detail'=>$this->input->post('detail')
					);
				$result = $this->hotel_other_model->update_bank_amount($id,$data_to_store);
				
				$tata_to_store = array(
						'account_id'=>$this->input->post('agent_id'),
						'payment_type'=>$this->input->post('payment_type'),
						'account_type'=>'agent',
						'date'=>date_change_db($this->input->post('date')),
						'detail'=>$this->input->post('detail'),
						'amount'=>$this->input->post('amount')
						);
				$result = $this->transection_model->update_b_transection($id,$tata_to_store);	
                
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', 'Bank Transection  updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Bank Transection  updation failed');
                }
                
                redirect('bank_transection');
            }
        }
    }
	function delete_btransection()
    {
        if($this->isAdminUser() == TRUE)
        {
            echo(json_encode(array('status'=>'access')));
        }
        else
        {
            $id = $this->input->post('id');
            $hotel_info = array('isDeleted'=>1);
			$this->db->trans_start();
            $this->db->where('bt_id',$id);
			$this->db->update('transection',$hotel_info);
			$result = $this->hotel_other_model->update_bank_amount($id, $hotel_info);
            $this->db->trans_complete();
			
            if ($result > 0) { echo(json_encode(array('status'=>TRUE))); }
            else { echo(json_encode(array('status'=>FALSE))); }
        }
    }
	////////// end bank transection /////////////
	
	//////// agent Hotel ////////////////////
	function agent_hotel()
	{
		
	}
	function add_hotel_agent()
	{
		check_permission(2);
		$data['agent_id'] =$agent_id= ($this->input->post('agent_id'))?$this->input->post('agent_id'):'';
		$data['agent'] = $this->hotel_other_model->agent_list_users();		
		$config = $this->config_model->getConfig();
		if($this->input->post('submit_agent')){
			//echo '<pre>';
			//print_r($this->input->post());
			$price = $this->input->post('price');
			$id = $this->input->post('id');
			$this->hotel_other_model->delete_agent_hotel($this->input->post('agent_id'));
			foreach($price as $key=>$val){
				$data_to_store = array(
				'agent_id'=>$this->input->post('agent_id'),
				'hotel_id'=>$key,
				'price'=>$val
				);
				$this->hotel_other_model->add_hotel_agent($data_to_store);
			}
		}
		if($this->input->post('agent_id')){
			$data['result'] = $this->hotel_other_model->get_agent_hotel($agent_id);
		}
		else{
			$data['result'] = '';
		}
		$this->global['pageTitle'] = $config->name.' : Edit Bank Transection';		
		$this->loadViews("hotel_other/set_agent_hotel", $this->global, $data, NULL);
	}
	/////// end agent hotel ////////////////
	function c_in_out($voucher_id)
	{
		$config = $this->config_model->getConfig();
		$data['voucher_hotels'] = $this->hotel_other_model->view_voucher_hotels($voucher_id);
		$this->global['pageTitle'] = $config->name.' : Edit Bank Transection';		
		$this->loadViews("voucher/c_in_out", $this->global, $data, NULL);
	}
	public function check_in_yes()
	{
            $id = $this->input->post('id');
            $voucher_info = array('c_in'=>'yes');            
            $result = $this->hotel_other_model->check_in_yes($id, $voucher_info);            
            if ($result > 0) { echo(json_encode(array('status'=>TRUE))); }
            else { echo(json_encode(array('status'=>FALSE))); }
	}
	public function check_in_no()
	{
            $id = $this->input->post('id');
            $voucher_info = array('c_in'=>'no');            
            $result = $this->hotel_other_model->check_in_yes($id, $voucher_info);            
            if ($result > 0) { echo(json_encode(array('status'=>TRUE))); }
            else { echo(json_encode(array('status'=>FALSE))); }
	}
	public function check_out_yes()
	{
            $id = $this->input->post('id');
            $voucher_info = array('c_out'=>'yes');            
            $result = $this->hotel_other_model->check_in_yes($id, $voucher_info);            
            if ($result > 0) { echo(json_encode(array('status'=>TRUE))); }
            else { echo(json_encode(array('status'=>FALSE))); }
	}
	public function check_out_no()
	{
            $id = $this->input->post('id');
            $voucher_info = array('c_out'=>'no');            
            $result = $this->hotel_other_model->check_in_yes($id, $voucher_info);            
            if ($result > 0) { echo(json_encode(array('status'=>TRUE))); }
            else { echo(json_encode(array('status'=>FALSE))); }
	}

    function pageNotFound()
    {
        $this->global['pageTitle'] = ' 404 - Page Not Found';
        
        $this->loadViews("404", $this->global, NULL, NULL);
    }
	public function voucherPDF($id)
	{
		$voucher_id = $id;
        $filename = time()."_filename.pdf";
		$data['config'] = $this->config_model->getConfig(); 
		$data['voucher'] =$voucher= $this->hotel_other_model->voucher_view($voucher_id);
		$data['voucher_clients'] = $this->hotel_other_model->view_voucher_clients($voucher_id);
		$data['voucher_hotels'] = $this->hotel_other_model->view_voucher_hotels($voucher_id);
		$data['voucher_ziarat'] = $this->hotel_other_model->view_voucher_ziarat($voucher_id);
		$data['agent_config'] = $this->config_model->agentConfig($voucher->agent_id); 
		$config = $this->config_model->getConfig();     
        $html = $this->load->view('voucher/voucherViewPDF', $data, true);		
		$pdfFilePath = "voucher_view.pdf";
		$this->load->library('m_pdf');
		$this->m_pdf->pdf->WriteHTML($html);
		$this->m_pdf->pdf->Output($pdfFilePath, "D");
		//$this->load->view('voucher/voucherViewPDF', $data);
    }
	public function voucherInvPDF($id)
	{
		$voucher_id = $id;
        $filename = time()."_filename.pdf";
		$data['config'] = $this->config_model->getConfig(); 
		$data['voucher'] =$voucher= $this->hotel_other_model->voucher_view($voucher_id);
		$data['voucher_clients'] = $this->hotel_other_model->view_voucher_clients($voucher_id);
		$data['voucher_hotels'] = $this->hotel_other_model->view_voucher_hotels($voucher_id);
		$data['voucher_ziarat'] = $this->hotel_other_model->view_voucher_ziarat($voucher_id);
		$data['agent_config'] = $this->config_model->agentConfig($voucher->agent_id); 
		$config = $this->config_model->getConfig();     
        $html = $this->load->view('voucher/voucherInvoicePDF', $data, true);		
		$pdfFilePath = "voucher_Invoice.pdf";
		$this->load->library('m_pdf');
		$this->m_pdf->pdf->WriteHTML($html);
		$this->m_pdf->pdf->Output($pdfFilePath, "D");
		//$this->load->view('voucher/voucherInvoicePDF', $data);
	}
    
//////// Permotion Numbers Management ///////////////////
	function permotion_number($id = null)
    {
		//check_permission(2);
        if($this->isAdminUser() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
			//if($id){echo 'kljl';die('lll');}
          //  $searchText = $this->input->post('searchText');
           // $data['searchText'] = $searchText;            
            //$config = $this->config_model->getConfig();
            $count = $this->hotel_other_model->permotion_number_count($searchText);
			$returns = $this->paginationCompress ( "permotion_number/", $count, $config->per_page);            
            $data['permotion_numberRecords'] = $this->hotel_other_model->permotion_number_list($searchText, $returns["page"], $returns["segment"]);
            $this->global['pageTitle'] = $config->name.' : Permotion Number Listing';            
            $this->loadViews("hotel_other/permotion_number", $this->global, $data, NULL);
        }
    }

    /**
     * This function is used to load the add new form
     */
    function add_permotion_number()
    {
		//check_permission(2);
        if($this->isAdminUser() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            if($this->input->post()){
				$data_to_store = array(
				'name'=>$this->input->post('name'),			
				'phone'=>$this->input->post('phone'),				
				'address'=>$this->input->post('address')				
				);
				$this->hotel_other_model->add_permotion_number($data_to_store);
			}
            $config = $this->config_model->getConfig();
            $this->global['pageTitle'] = $config->name.' : Add / Edit Permotion Number List';
            $this->loadViews("hotel_other/add_permotion_number", $this->global, '', NULL);
        }
    }
	
	function delete_permotion_number()
    {
        if($this->isAdminUser() == TRUE)
        {
            echo(json_encode(array('status'=>'access')));
        }
        else
        {
            $id = $this->input->post('id');
            $sector_info = array('isDeleted'=>1);
            
            $result = $this->hotel_other_model->delete_permotion_number($id, $sector_info);
            
            if ($result > 0) { echo(json_encode(array('status'=>TRUE))); }
            else { echo(json_encode(array('status'=>FALSE))); }
        }
    }
	function edit_permotion_number($sectorId = NULL)
    {
        if($this->isAdminUser() == TRUE )
        {
            $this->loadThis();
        }
        else
        {
            if($sectorId == null)
            {
                redirect('permotion_number');
            }            
            $data['permotion_numberInfo'] = $this->hotel_other_model->getpermotion_numberInfo($sectorId);
            $config = $this->config_model->getConfig();
            $this->global['pageTitle'] = $config->name.' : Edit Permotion Number';
            
            $this->loadViews("hotel_other/add_permotion_number", $this->global, $data, NULL);
        }
    }
	function editpermotion_number()
    {
        if($this->isAdminUser() == TRUE)
        {
            $this->loadThis();
        }
        else
        {   
			$sectorId = $this->input->post('id');
            $this->form_validation->set_rules('name','Sector Name','trim|required|max_length[128]|xss_clean');
            
            if($this->form_validation->run() == FALSE)
            {
                $this->edit_permotion_number($sectorId);
            }
            else
            {
					$data_to_store = array(
					'name'=>$this->input->post('name'),				
					'phone'=>$this->input->post('phone'),				
					'address'=>$this->input->post('address')					
					);
					
                
                $result = $this->hotel_other_model->eidt_permotion_number($sectorId,$data_to_store);
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', 'Permotion Number updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Permotion Number updation failed');
                }
                
                redirect('permotion_number');
            }
        }
    }
	
    Public function permotion_sms()
    {
        $ids = $this->input->post('id');
        $config = $this->config_model->getConfig();
        foreach($ids as $rr){
            $info = $this->hotel_other_model->getpermotion_numberInfo($rr);
            $mobile = $info->phone;
            $message = $config->permotion_sms;
            $message = str_replace('{name}',$info->name,$message);
            send_sms($mobile,$message);
        }
        redirect('permotion_number');
    }

/////// end Permotion Number ///////////////
	
}

?>