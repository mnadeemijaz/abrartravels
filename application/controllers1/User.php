<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Muhammad Nadeem Ijaz
 * @version : 1.1
 * @since : 14 August 2018
 */
class User extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->isLoggedIn();   
    }
    
    /**
     * This function used to load the first screen of the user
     */
    public function index()
    {
		$config = $this->config_model->getConfig();
        $this->global['pageTitle'] = $config->name.' : Dashboard';
        //$data['total_clients'] = $this->hotel_other_model->total_clients();
        $this->loadViews("dashboard", $this->global, NULL , NULL);
    }
    
    /**
     * This function is used to load the user list
     */
    function userListing()
    {
		check_permission(3);
        if($this->isAdminUser() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->model('user_model');
        
            $searchText = $this->input->post('searchText');
            $data['searchText'] = $searchText;
            
            $this->load->library('pagination');
            $config = $this->config_model->getConfig();
            $count = $this->user_model->userListingCount($searchText);

			$returns = $this->paginationCompress ( "userListing/", $count, $config->per_page);
            
            $data['userRecords'] = $this->user_model->userListing($searchText, $returns["page"], $returns["segment"]);
            
            $this->global['pageTitle'] = $config->name.' : User Listing';
            
            $this->loadViews("users", $this->global, $data, NULL);
        }
    }

    /**
     * This function is used to load the add new form
     */
    function addNew()
    {
		check_permission(3);
        if($this->isAdminUser() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->model('user_model');
            $data['roles'] = $this->user_model->getUserRoles();
            $config = $this->config_model->getConfig();
            $this->global['pageTitle'] = $config->name.' : Add New User';

            $this->loadViews("addNew", $this->global, $data, NULL);
        }
    }

    /**
     * This function is used to check whether email already exist or not
     */
    function checkEmailExists()
    {
        $userId = $this->input->post("userId");
        $email = $this->input->post("email");

        if(empty($userId)){
            $result = $this->user_model->checkEmailExists($email);
        } else {
            $result = $this->user_model->checkEmailExists($email, $userId);
        }

        if(empty($result)){ echo("true"); }
        else { echo("false"); }
    }
    
    /**
     * This function is used to add new user to the system
     */
    function addNewUser()
    {
		check_permission(3);
        if($this->isAdminUser() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('fname','Full Name','trim|required|max_length[128]|xss_clean');
            $this->form_validation->set_rules('email','Email','trim|required|valid_email|xss_clean|max_length[128]');
            $this->form_validation->set_rules('password','Password','required|max_length[20]');
            $this->form_validation->set_rules('cpassword','Confirm Password','trim|required|matches[password]|max_length[20]');
            $this->form_validation->set_rules('role','Role','trim|required|numeric');
            $this->form_validation->set_rules('mobile','Mobile Number','required|min_length[10]|xss_clean');
            
            if($this->form_validation->run() == FALSE)
            {
                $this->addNew();
            }
            else
            {
				$config = $this->config_model->getConfig();
                $name = ucwords(strtolower($this->input->post('fname')));
                $email = $this->input->post('email');
                $password = $this->input->post('password');
                $roleId = $this->input->post('role');
                $mobile = $this->input->post('mobile');
				$c_name = ($this->input->post('c_name'))?$this->input->post('c_name'):'';
				$address = ($this->input->post('address'))?$this->input->post('address'):'';
                
                $userInfo = array(
				'email'=>$email, 
				'password'=>getHashedPassword($password), 
				'roleId'=>$roleId, 
				'name'=> $name,				
				'mobile'=>$mobile, 
				'createdBy'=>$this->vendorId, 
				'createdDtm'=>date('Y-m-d H:i:s'),
				'c_name'=>$c_name,
				'address'=>$address);
                if($roleId == 3){
					$userInfo['adult_rate']=$config->adult_rate;
					$userInfo['child_rate']=$config->child_rate;
					$userInfo['infant_rate']=$config->infant_rate;
				}
				
                $this->load->model('user_model');
                $result = $this->user_model->addNewUser($userInfo);
                
                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'New User created successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'User creation failed');
                }
                
                redirect('addNew');
            }
        }
    }

    
    /**
     * This function is used load user edit information
     * @param number $userId : Optional : This is user id
     */
    function editOld($userId = NULL)
    {
		check_permission(3);
        if($this->isAdminUser() == TRUE || $userId == 1)
        {
            $this->loadThis();
        }
        else
        {
            if($userId == null)
            {
                redirect('userListing');
            }
            
            $data['roles'] = $this->user_model->getUserRoles();
            $data['userInfo'] = $this->user_model->getUserInfo($userId);
			$config = $this->config_model->getConfig();
            $this->global['pageTitle'] = $config->name.' : Edit User';
            
            $this->loadViews("editOld", $this->global, $data, NULL);
        }
    }
    
    
    /**
     * This function is used to edit the user information
     */
    function editUser()
    {
        if($this->isAdminUser() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $userId = $this->input->post('userId');
            
            $this->form_validation->set_rules('fname','Full Name','trim|required|max_length[128]|xss_clean');
            $this->form_validation->set_rules('email','Email','trim|required|valid_email|xss_clean|max_length[128]');
            $this->form_validation->set_rules('password','Password','matches[cpassword]|max_length[20]');
            $this->form_validation->set_rules('cpassword','Confirm Password','matches[password]|max_length[20]');
            //$this->form_validation->set_rules('role','Role','trim|required|numeric');
            $this->form_validation->set_rules('mobile','Mobile Number','required');
            
            if($this->form_validation->run() == FALSE)
            {
                $this->editOld($userId);
            }
            else
            {
                $name = ucwords(strtolower($this->input->post('fname')));
                $email = $this->input->post('email');
                $password = $this->input->post('password');
                $document_fee = $this->input->post('document_fee');
                $mobile = $this->input->post('mobile');
                $c_name = ($this->input->post('c_name'))?$this->input->post('c_name'):'';
				$address = ($this->input->post('address'))?$this->input->post('address'):'';
				$infant_rate = ($this->input->post('infant_rate'))?$this->input->post('infant_rate'):'';
				$child_rate = ($this->input->post('child_rate'))?$this->input->post('child_rate'):'';
				$adult_rate = ($this->input->post('adult_rate'))?$this->input->post('adult_rate'):'';
                $userInfo = array();
                
                if(empty($password))
                {
                    $userInfo = array('email'=>$email,
									 'name'=>$name,
                                    'mobile'=>$mobile,
									'document_fee'=>$document_fee,
									'c_name'=>$c_name,
									'address'=>$address, 
									'infant_rate'=>$infant_rate, 
									'child_rate'=>$child_rate, 
									'adult_rate'=>$adult_rate, 
									'updatedBy'=>$this->vendorId, 
									'updatedDtm'=>date('Y-m-d H:i:s'));
                }
                else
                {
                    $userInfo = array('email'=>$email, 
										'password'=>getHashedPassword($password),
                        				'name'=>ucwords($name), 
										'mobile'=>$mobile, 
										'document_fee'=>$document_fee,
										'c_name'=>$c_name,
										'address'=>$address, 
										'infant_rate'=>$infant_rate, 
										'child_rate'=>$child_rate, 
										'adult_rate'=>$adult_rate,
										'updatedBy'=>$this->vendorId, 
                        				'updatedDtm'=>date('Y-m-d H:i:s'));
                }
                
                $result = $this->user_model->editUser($userInfo, $userId);
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', 'User updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'User updation failed');
                }
                
                redirect('userListing');
            }
        }
    }


    /**
     * This function is used to delete the user using userId
     * @return boolean $result : TRUE / FALSE
     */
    function deleteUser()
    {
		check_permission(3);
        if($this->isAdminUser() == TRUE)
        {
            echo(json_encode(array('status'=>'access')));
        }
        else
        {
            $userId = $this->input->post('userId');
            $userInfo = array('isDeleted'=>1,'updatedBy'=>$this->vendorId, 'updatedDtm'=>date('Y-m-d H:i:s'));
            
            $result = $this->user_model->deleteUser($userId, $userInfo);
            
            if ($result > 0) { echo(json_encode(array('status'=>TRUE))); }
            else { echo(json_encode(array('status'=>FALSE))); }
        }
    }
    
    /**
     * This function is used to load the change password screen
     */
    function loadChangePass()
    {
        $this->global['pageTitle'] = 'CodeInsect : Change Password';
        
        $this->loadViews("changePassword", $this->global, NULL, NULL);
    }
    
    
    /**
     * This function is used to change the password of the user
     */
    function changePassword()
    {
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('oldPassword','Old password','required|max_length[20]');
        $this->form_validation->set_rules('newPassword','New password','required|max_length[20]');
        $this->form_validation->set_rules('cNewPassword','Confirm new password','required|matches[newPassword]|max_length[20]');
        
        if($this->form_validation->run() == FALSE)
        {
            $this->loadChangePass();
        }
        else
        {
            $oldPassword = $this->input->post('oldPassword');
            $newPassword = $this->input->post('newPassword');
            
            $resultPas = $this->user_model->matchOldPassword($this->vendorId, $oldPassword);
            
            if(empty($resultPas))
            {
                $this->session->set_flashdata('nomatch', 'Your old password not correct');
                redirect('loadChangePass');
            }
            else
            {
                $usersData = array('password'=>getHashedPassword($newPassword), 'updatedBy'=>$this->vendorId,
                                'updatedDtm'=>date('Y-m-d H:i:s'));
                
                $result = $this->user_model->changePassword($this->vendorId, $usersData);
                
                if($result > 0) { $this->session->set_flashdata('success', 'Password updation successful'); }
                else { $this->session->set_flashdata('error', 'Password updation failed'); }
                
                redirect('loadChangePass');
            }
        }
    }

    function pageNotFound()
    {
        $this->global['pageTitle'] = 'CodeInsect : 404 - Page Not Found';
        
        $this->loadViews("404", $this->global, NULL, NULL);
    }
	function user_rights($id)
	{
		
		if($this->isAdminUser() == TRUE || $userId == 1)
        {
            $this->loadThis();
        }
        else
        {
			if($this->input->post()){
				//print_r($this->input->post('right'));
				$rights = $this->input->post('right');
				$this->db->where('user_id',$id);
				$this->db->delete('user_rights');
				foreach($rights as $key=>$val){
					$data_to_store = array(
					'right_id' => $key,
					'user_id' =>$id
					);
					$this->db->insert('user_rights',$data_to_store);
				}
			}
			$data['id'] = $id;
            $data['user_rights'] = $this->user_model->get_user_rights($id);
            //$data['userInfo'] = $this->user_model->getUserInfo($userId);
			$config = $this->config_model->getConfig();
            $this->global['pageTitle'] = $config->name.' : User Rights';
            
            $this->loadViews("user_rights", $this->global, $data, NULL);
        }
	}
}

?>