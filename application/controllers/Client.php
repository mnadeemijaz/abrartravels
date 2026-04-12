<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : client (ClientController)
 * User Class to control all user related operations.
 * @author : Muhammad Nadeem Ijaz
 * @version : 1.1
 * @Phone : 923467547186, 923017893497
 */
class Client extends BaseController
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
		check_permission(4);
        /*if($this->isAdminUser() == TRUE)
        {
            $this->loadThis();
        }
        else
        {*/        
            $searchText = $this->input->post('searchText');
            $data['searchText'] = $searchText; 
			$data['age_group'] = $age_group = ($this->input->post('age_group'))?$this->input->post('age_group'):'';
			$data['visa_approve'] = $visa_approve = ($this->input->post('visa_approve'))?$this->input->post('visa_approve'):'';
			$data['agentRecords'] = $this->hotel_other_model->agent_list_users();
			$data['agent_id'] = $agent_id = ($this->input->post('agent_id'))?$this->input->post('agent_id'):'';
			$data['documentation'] = $documentation = ($this->input->post('documentation'))?$this->input->post('documentation'):'';
			$config = $this->config_model->getConfig();
			$voucher_issue = 'no';
            $count = $this->client_model->client_count($searchText,$age_group,$visa_approve,$agent_id,$voucher_issue,$documentation);
			$returns = $this->paginationCompress ( "client/", $count, $config->per_page);            
            $data['clientRecords'] = $this->client_model->client_list($searchText, $returns["page"], $returns["segment"],$age_group,$visa_approve,$agent_id,$voucher_issue,$documentation);
            $this->global['pageTitle'] = $config->name.' : Client Listing';            
            $this->loadViews("client/client_list", $this->global, $data, NULL);
        //}
    }
	public function client_excel()
    {		
			$voucher_issue = 'no';                   
            $data['clientRecords'] = $this->client_model->client_list('','', '','','','',$voucher_issue);           
            $this->load->view("client/client_excel",$data);
    }
	public function client_word()
    {		
			$voucher_issue = 'no';                   
            $data['clientRecords'] = $this->client_model->client_list('','', '','','','',$voucher_issue);           
            $this->load->view("client/client_word",$data);
    }
	
        

    /**
     * This function is used to load the add new form
     */
    function add_client()
    {
		check_permission(4);
        /*if($this->isAdminUser() == TRUE)
        {
            $this->loadThis();
        }
        else
        {*/
            if($this->input->post()){
				//die('asdfaf');
				$data_to_store = array(
				'name'=>$this->input->post('name'),
				'last_name'=>$this->input->post('last_name'),
				'cnic'=>$this->input->post('cnic'),
				'sr_name'=>$this->input->post('sr_name'),
				//'passport_issue_date'=>'',
				//'passport_exp_date'=>'',
                'group_code'=>'',
				'group_name'=>'',
                //'document'=>'',
                'account_pkg'=>'',
                'address'=>'',
				/*'passport_issue_date'=>date_change_db($this->input->post('passport_issue_date')),
				'passport_exp_date'=>date_change_db($this->input->post('passport_exp_date')),
                'group_code'=>$this->input->post('group_code'),
				'group_name'=>$this->input->post('group_name'),
                'document'=>($this->input->post('document'))?'yes':'no',
                'account_pkg'=>$this->input->post('account_pkg'),*/
				'dob'=>date_change_db($this->input->post('date')),
				'ppno'=>$this->input->post('ppno'),
				'age_group'=>$this->input->post('age_group'),
				'visa_id'=>$this->input->post('visa_id'),
				'agent_id'=>$this->input->post('agent_id'),
				'visa_company_id'=>$this->input->post('visa_company_id'),
				);
				$this->client_model->add_client($data_to_store);
			}
			$config = $this->config_model->getConfig();
            $data['agentRecords'] = $this->hotel_other_model->agent_list_users();
			$data['visaCompanyRecords'] = $this->hotel_other_model->visaCompany_list();
            $this->global['pageTitle'] = $config->name.' : Add / Edit Client List';
            $this->loadViews("client/add_client", $this->global, $data, NULL);
        //}
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
	function edit_client($clientId = NULL)
    {
		check_permission(4);
        if($this->isAdminUser() == TRUE )
        {
            $this->loadThis();
        }
        else
        {
            if($clientId == null)
            {
                redirect('client');
            }            
            $data['clientInfo'] = $this->client_model->getClientInfo($clientId);
            $config = $this->config_model->getConfig();
            $this->global['pageTitle'] = $config->name.' : Edit Client';
            $data['agentRecords'] = $this->hotel_other_model->agent_list_users();
			$data['visaCompanyRecords'] = $this->hotel_other_model->visaCompany_list();
			//echo $clientId;
			//print_r($data['clientInfo']);die();
            $this->loadViews("client/add_client", $this->global, $data, NULL);
        }
    }
	function editClient()
    {
        if($this->isAdminUser() == TRUE)
        {
            $this->loadThis();
        }
        else
        {   
			$clientId = $this->input->post('id');
            $this->form_validation->set_rules('name','Client Name','trim|required|max_length[128]|xss_clean');
            //$this->form_validation->set_rules('address','Address','trim|required');
            //$this->form_validation->set_rules('cnic','CNIC','trim|required');            
            
            if($this->form_validation->run() == FALSE)
            {
                $this->edit_client($clientId);
            }
            else
            {
					$data_to_store = array(
					'name'=>$this->input->post('name'),
					'last_name'=>$this->input->post('last_name'),
					'cnic'=>$this->input->post('cnic'),
					'sr_name'=>$this->input->post('sr_name'),
					'passport_issue_date'=>date_change_db($this->input->post('passport_issue_date')),
					'passport_exp_date'=>date_change_db($this->input->post('passport_exp_date')),
					'dob'=>date_change_db($this->input->post('date')),
					'ppno'=>$this->input->post('ppno'),
					'age_group'=>$this->input->post('age_group'),
					'visa_id'=>$this->input->post('visa_id'),
					'agent_id'=>$this->input->post('agent_id'),
					'account_pkg'=>$this->input->post('account_pkg'),
					'visa_company_id'=>$this->input->post('visa_company_id'),
					'group_code'=>$this->input->post('group_code'),
					'group_name'=>$this->input->post('group_name'),
					'document'=>($this->input->post('document'))?'yes':'no',
					);
					
                
                $result = $this->client_model->eidt_client($clientId,$data_to_store);
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', 'Client updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Client updation failed');
                }
                
                redirect('client');
            }
        }
    }
	
	function visaApprove(){
		$id = $this->input->post('id');
		$visa_info = array('visa_approve'=>'yes');
		$result = $this->client_model->visaApprove($id, $visa_info);            
		if ($result > 0) { echo(json_encode(array('status'=>TRUE))); }
		else { echo(json_encode(array('status'=>FALSE))); }
	}
	function visaNApprove(){
		$id = $this->input->post('id');
		$visa_info = array('visa_approve'=>'no');
		$result = $this->client_model->visaApprove($id, $visa_info);            
		if ($result > 0) { echo(json_encode(array('status'=>TRUE))); }
		else { echo(json_encode(array('status'=>FALSE))); }
	}
	
	function update_visa(){
		$id = $this->input->post('id');
		$visa_no = $this->input->post('visa_no');
		$visa_date = date_change_db($this->input->post('visa_date'));
		$visa_info = array('visa_no'=>$visa_no,'visa_date'=>$visa_date);
		$result = $this->client_model->visaApprove($id, $visa_info);            
		if ($result > 0) { echo(json_encode(array('status'=>TRUE))); }
		else { echo(json_encode(array('status'=>FALSE))); }
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
    
    /**
     * This function is used to add new user to the system
     */
    function import_client()
	{
		if ($this->input->post('submit')) {
                 
                $path = 'uploads/';
                require_once APPPATH . "/third_party/PHPExcel.php";
                $config['upload_path'] = $path;
                $config['allowed_types'] = 'xlsx|xls|csv';
                $config['remove_spaces'] = TRUE;
                $this->load->library('upload', $config);
                $this->upload->initialize($config);            
                if (!$this->upload->do_upload('uploadFile')) {
                    $error = array('error' => $this->upload->display_errors());
                } else {
                    $data = array('upload_data' => $this->upload->data());
                }
                if(empty($error)){
                  if (!empty($data['upload_data']['file_name'])) {
                    $import_xls_file = $data['upload_data']['file_name'];
                } else {
                    $import_xls_file = 0;
                }
                $inputFileName = $path . $import_xls_file;
                 
                try {
                    $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
                    $objReader = PHPExcel_IOFactory::createReader($inputFileType);
                    $objPHPExcel = $objReader->load($inputFileName);
                    $allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
                    $flag = true;
                    $i=0;
					//print_r($allDataInSheet);
                    foreach ($allDataInSheet as $value) {
                      if($flag){
                        $flag =false;
                        continue;
                      }
					  if($value['B'] == ''){
						  continue;
						}
					else{
                      $inserdata[$i]['sr_name'] = $value['A'];
					  $inserdata[$i]['name'] = $value['B'];
					  $inserdata[$i]['passport_exp_date'] = $value['C'];
					  $inserdata[$i]['ppno'] = $value['D'];
					  $inserdata[$i]['dob'] = $value['E'];
					  $inserdata[$i]['age_group'] = $value['F'];
					  $inserdata[$i]['agent_id'] = $value['G'];
                      $inserdata[$i]['visa_company_id'] = $value['H'];
					  $inserdata[$i]['document'] = $value['I'];
					}
                      $i++;
					  
                    }
					//print_r($inserdata);die('asfd');
					$result = $this->client_model->add_client1($inserdata);   
                    // = $this->import->insert($inserdata);   
                    if($result){
                      redirect('client');
                    }else{
                      echo "ERROR !";
                    }             
      
              } catch (Exception $e) {
                   die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME)
                            . '": ' .$e->getMessage());
                }
              }else{
                  echo $error['error'];
                }
                 
                 
        }
		
		$this->loadViews("client/import_client", $this->global, $data, NULL);
	}
     
	////////////////////////// end of import file

    function pageNotFound()
    {
        $this->global['pageTitle'] = 'CodeInsect : 404 - Page Not Found';
        
        $this->loadViews("404", $this->global, NULL, NULL);
    }
}

?>