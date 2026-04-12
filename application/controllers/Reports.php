<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Muhammad Nadeem Ijaz
 * @version : 1.1
 * @since : 14 august 2018
 */
class Reports extends BaseController
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
		/*$config = $this->config_model->getConfig();
        $this->global['pageTitle'] = $config->name.' : Dashboard';
		
        $data['total_clients'] = $data1= $this->hotel_other_model->total_clients();
		$data['pilgrims'] = $this->hotel_other_model->pilgrims();
		$data['total_vouchers'] = $data1= $this->hotel_other_model->total_vouchers();
		$data['approved_vouchers'] = $data1= $this->hotel_other_model->approved_vouchers();
		$data['not_approved'] = $data1= $this->hotel_other_model->not_approved();
		
        $this->loadViews("dashboard", $this->global, $data , NULL);*/
    }
	public function pilgrim_report()
	{
		check_permission(11);
		$searchText = $this->input->post('searchText');
            $data['searchText'] = $searchText; 
		$age_group = ($this->input->post('age_group'))?$this->input->post('age_group'):'';
		$config = $this->config_model->getConfig();
		$data['agent_id'] =$agent_id= ($this->input->post('agent_id'))?$this->input->post('agent_id'):'';
		$count = $this->report_model->pilgrim_count($agent_id,$age_group,$searchText);
		$returns = $this->paginationCompress ( "pilgrim_report/", $count, $config->per_page);            
		$data['pilgrim_report'] = $this->report_model->pilgrim_report($returns["page"], $returns["segment"],$agent_id,$age_group,$searchText);
		$data['agent'] = $this->hotel_other_model->agent_list_users();
		$this->global['pageTitle'] = $config->name.' : Hotel Listing';            
        $this->loadViews("reports/pilgrim_report", $this->global, $data, NULL);
	}
	public function arrival_report()
	{
		check_permission(11);
		$config = $this->config_model->getConfig();
		$data['company_id'] =$company_id= ($this->input->post('company_id'))?$this->input->post('company_id'):'';
		$data['city'] =$city= ($this->input->post('city'))?$this->input->post('city'):'';
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
		
		$count = $this->report_model->arrival_count($city,$company_id,$start_date,$end_date);
		$returns = $this->paginationCompress ( "pilgrim_report/", $count, $config->per_page);            
		$data['arrival_report'] = $this->report_model->arrival_report($returns["page"], $returns["segment"],$city,$company_id,$start_date,$end_date);
		$data['visaCompany'] = $this->hotel_other_model->visaCompany_list();
		$this->global['pageTitle'] = $config->name.' : Arrival Report';            
        $this->loadViews("reports/arrival_report", $this->global, $data, NULL);
	}
	public function departure_report()
	{
		check_permission(11);
		$config = $this->config_model->getConfig();
		$data['company_id'] =$company_id= ($this->input->post('company_id'))?$this->input->post('company_id'):'';
		$data['city'] =$city= ($this->input->post('city'))?$this->input->post('city'):'';
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
		
		$count = $this->report_model->departure_count($city,$company_id,$start_date,$end_date);
		$returns = $this->paginationCompress ( "pilgrim_report/", $count, $config->per_page);            
		$data['arrival_report'] = $this->report_model->departure_report($returns["page"], $returns["segment"],$city,$company_id,$start_date,$end_date);
		$data['visaCompany'] = $this->hotel_other_model->visaCompany_list();
		$this->global['pageTitle'] = $config->name.' : Departure Report';            
        $this->loadViews("reports/departure_report", $this->global, $data, NULL);
	}
	public function visa_report()
	{
		check_permission(11);
		$searchText = $this->input->post('searchText');
            $data['searchText'] = $searchText; 
		$config = $this->config_model->getConfig();
		$data['company_id'] =$company_id= ($this->input->post('company_id'))?$this->input->post('company_id'):'';
		$data['status'] = $status = ($this->input->post('status'))?$this->input->post('status'):'';
		$count = $this->report_model->visa_count($company_id,$status,$searchText);
		$returns = $this->paginationCompress ( "pilgrim_report/", $count, $config->per_page);            
		$data['visa_report'] = $this->report_model->visa_report($returns["page"], $returns["segment"],$company_id,$status,$searchText);
		$data['visaCompany'] = $this->hotel_other_model->visaCompany_list();
		$this->global['pageTitle'] = $config->name.' : Visa Report';            
        $this->loadViews("reports/visa_report", $this->global, $data, NULL);
	}
	public function pilgrim_wise_report()
	{
		//check_permission(11);
		$searchText = $this->input->post('searchText');
            $data['searchText'] = $searchText; 
		$config = $this->config_model->getConfig();
		$data['agent_id'] =$agent_id= ($this->input->post('agent_id'))?$this->input->post('agent_id'):'';
		$count = $this->report_model->pilgrim_wise_count($agent_id,$searchText);
		//echo $config->per_page;die();
		$returns = $this->paginationCompress ( "pilgrim_wise_report/", $count, $config->per_page);            
		$data['pilgrim_wise_report'] = $this->report_model->pilgrim_wise_report($returns["page"], $returns["segment"],$agent_id,$searchText);
		$data['agent'] = $this->hotel_other_model->agent_list_users();
		$this->global['pageTitle'] = $config->name.' : Pilgrim Wise Report';            
        $this->loadViews("reports/pilgrim_wise_report", $this->global, $data, NULL);
	}
    	
	
	////////// end Reports /////////////
	public function arrival_report_excel()
	{          
		$data['arrival_report'] = $this->report_model->arrival_report('', '',$city,$company_id,$start_date,$end_date);
		$this->global['pageTitle'] = $config->name.' : Arrival Report';            
        $this->load->view("reports/arrival_report_excel", $data);
	}
	public function arrival_report_word()
	{          
		$data['arrival_report'] = $this->report_model->arrival_report('', '',$city,$company_id,$start_date,$end_date);
		$this->global['pageTitle'] = $config->name.' : Arrival Report';            
        $this->load->view("reports/arrival_report_word", $data);
	}
	public function pilgrim_report_word()
	{           
		$data['pilgrim_report'] = $this->report_model->pilgrim_report('', '',$agent_id,$age_group,$searchText);		      
        $this->load->view("reports/pilgrim_report_word", $data);
	}
	public function pilgrim_report_excel()
	{           
		$data['pilgrim_report'] = $this->report_model->pilgrim_report('', '',$agent_id,$age_group,$searchText);		      
        $this->load->view("reports/pilgrim_report_excel", $data);
	}
	public function departure_report_excel()
	{            
		$data['arrival_report'] = $this->report_model->departure_report('','',$city,$company_id,$start_date,$end_date);
		$data['visaCompany'] = $this->hotel_other_model->visaCompany_list();
        $this->load->view("reports/departure_report_excel", $data);
	}
	public function departure_report_word()
	{            
		$data['arrival_report'] = $this->report_model->departure_report('','',$city,$company_id,$start_date,$end_date);
		$data['visaCompany'] = $this->hotel_other_model->visaCompany_list();
        $this->load->view("reports/departure_report_word", $data);
	}
	public function visa_report_excel()
	{          
		$data['visa_report'] = $this->report_model->visa_report('','',$company_id,$status,$searchText);
		$data['visaCompany'] = $this->hotel_other_model->visaCompany_list();
        $this->load->view("reports/visa_report_excel",$data);
	}
	public function visa_report_word()
	{          
		$data['visa_report'] = $this->report_model->visa_report('','',$company_id,$status,$searchText);
		$data['visaCompany'] = $this->hotel_other_model->visaCompany_list();
        $this->load->view("reports/visa_report_word",$data);
	}
	public function pilgrim_wise_word()
	{           
		$data['pilgrim_wise_report'] = $this->report_model->pilgrim_wise_report('', '',$agent_id,$age_group,$searchText);		      
        $this->load->view("reports/pilgrim_wise_word", $data);
	}
	public function pilgrim_wise_excel()
	{           
		$data['pilgrim_wise_report'] = $this->report_model->pilgrim_wise_report('', '',$agent_id,$age_group,$searchText);		      
        $this->load->view("reports/pilgrim_wise_excel", $data);
	}


    function pageNotFound()
    {
        $this->global['pageTitle'] = ' 404 - Page Not Found';
        
        $this->loadViews("404", $this->global, NULL, NULL);
    }
}

?>