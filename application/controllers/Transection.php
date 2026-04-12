<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Transection extends BaseController
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
    public function index($id = null)
    {
		check_permission(8);
        /*if($this->isAdminUser() == TRUE)
        {
            $this->loadThis();
        }
        else
        {   */     
            $searchText = $this->input->post('searchText');
            $data['searchText'] = $searchText;
			//$agent_id = ($this->input->post('agent_id'))?$this->input->post('agent_id'):'';
			if($this->session->userdata('role') == 3){
				$agent_id = $this->session->userdata('userId');}
			else{
				$agent_id = ($id)?$id:'';
			}
            $data['agent_id'] = $agent_id; 
			//echo $agent_id;           
			$data['config'] = $config = $this->config_model->getConfig();
            $count = $this->transection_model->transection_count($searchText,$agent_id);
			//$returns = $this->paginationCompress ( "transection/", $count, $config->per_page);
			$returns = $this->paginationCompress ( "transection/", $count, -1);
			// print_r($returs);
            $data['transectionRecords'] = $this->transection_model->transection($searchText, $returns["page"], $returns["segment"],$agent_id);
			$data['transectionRecords1'] = $this->transection_model->transection1($searchText, $returns["page"], $returns["segment"],$agent_id);
			$data['charges_wo_voucher'] = $this->transection_model->charges_wo_voucher($agent_id);
			$data['agent_config'] = $this->config_model->agentConfig($agent_id); 
			$data['ticket_record'] = $this->hotel_other_model->get_ticket_sale('','',$agent_id);
			
			$data['agentList'] =$this->hotel_other_model->agent_list_users(); 
            $this->global['pageTitle'] = $config->name.' : Account Transections';            
            $this->loadViews("transection/transection", $this->global, $data, NULL);
       // }
    }
        

    /**
     * This function is used to load the add new form
     */
    function add_transection()
    {
		check_permission(9);
        if($this->isAdminUser() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            if($this->input->post()){
				//die('asdfaf');
				$data_to_store = array(
				'account_id'=>$this->input->post('agent_id'),
				'payment_type'=>$this->input->post('payment_type'),
				'account_type'=>'agent',
				'date'=>date_change_db($this->input->post('date')),
				'detail'=>$this->input->post('detail'),
				'amount'=>$this->input->post('amount'),				
				);
				$this->transection_model->add_transection($data_to_store);
			}
			$config = $this->config_model->getConfig();
            $data['agentRecords'] = $this->hotel_other_model->agent_list_users();
            $this->global['pageTitle'] = $config->name.' : Add / Edit Transection';
            $this->loadViews("transection/add_transection", $this->global, $data, NULL);
        }
    }
	
	function deleteClient()
    {
        if($this->isAdminUser() == TRUE)
        {
            echo(json_encode(array('status'=>'access')));
        }
        else
        {
            $id = $this->input->post('id');
            $client_info = array('isDeleted'=>1);
            
            $result = $this->client_model->deleteClient($id, $client_info);
            
            if ($result > 0) { echo(json_encode(array('status'=>TRUE))); }
            else { echo(json_encode(array('status'=>FALSE))); }
        }
    }
	function edit_transection($clientId = NULL)
    {
        if($this->isAdminUser() == TRUE )
        {
            $this->loadThis();
        }
        else
        {
            if($clientId == null)
            {
                redirect('transection');
            }            
            $data['transectionInfo'] = $this->transection_model->getTransectionInfo($clientId);
            $config = $this->config_model->getConfig();
            $this->global['pageTitle'] = $config->name.' : Edit Transection';
            $data['agentRecords'] = $this->hotel_other_model->agent_list_users();
            $this->loadViews("transection/add_transection", $this->global, $data, NULL);
        }
    }
	function editTransection()
    {
        if($this->isAdminUser() == TRUE)
        {
            $this->loadThis();
        }
        else
        {   
			$clientId = $this->input->post('id');
            $this->form_validation->set_rules('agent_id','Agent Name','trim|required|max_length[128]|xss_clean');
            $this->form_validation->set_rules('payment_type','Address','trim|required');
            $this->form_validation->set_rules('amount','Amount','trim|required');
            
            if($this->form_validation->run() == FALSE)
            {
                $this->edit_transection($clientId);
            }
            else
            {
					$data_to_store = array(
					'account_id'=>$this->input->post('agent_id'),
					'payment_type'=>$this->input->post('payment_type'),
					'account_type'=>'agent',
					'date'=>date_change_db($this->input->post('date')),
					'detail'=>$this->input->post('detail'),
					'amount'=>$this->input->post('amount'),
					);
					
                
                $result = $this->transection_model->eidt_transection($clientId,$data_to_store);
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', 'Transection  updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Transection updation failed');
                }
                
                redirect('transection/'.$this->input->post('agent_id'));
            }
        }
    }
	//////////////////////end client management ///////////////////////
	
	
	
	
	
	
	
	
    /**
     * This function is used to check whether email already exist or not
     */
    function checkPassportNo()
    {
        $ppno = $this->input->post("ppno");
		$id = $this->input->post("id");

        if(empty($id)){
            $result = $this->client_model->checkPassportNo($ppno);
        } else {
            $result = $this->client_model->checkPassportNo($ppno,$id);
        }
        if(empty($result)){ echo("true"); }
        else { echo("false"); }
    }
    
	function balance()
	{
		check_permission(8);
		$data['balance'] = $this->transection_model->balance();
		$data['bank_balance'] = $this->transection_model->bank_balance();
		$data['config'] = $config = $this->config_model->getConfig();
		$this->global['pageTitle'] = $config->name.' : Edit Transection';
		//$data['agentRecords'] = $this->hotel_other_model->agent_list_users();
		$this->loadViews("transection/agent_balance", $this->global, $data, NULL);
	}
    /**
     * 
     */
    

    function pageNotFound()
    {
        $this->global['pageTitle'] = 'CodeInsect : 404 - Page Not Found';
        
        $this->loadViews("404", $this->global, NULL, NULL);
    }
}

?>