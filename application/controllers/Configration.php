<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : Configration (ConfigrationController)
 * 
 * @author : Muhammad Nadeem Ijaz
 * @version : 1.1
 * @since : 14 August 2018
 */
class Configration extends BaseController
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
		if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {  
		        
        $data['config'] = $res = $this->config_model->getConfig();
		$this->global['pageTitle'] = $res->name.' : Configration';
		//print_r($this->input->post());
		//echo $res->name;die();
		if($this->input->post()){
			$data_to_update = array(
			'name'=>$this->input->post('name'),
			'address'=>$this->input->post('address'),
			'phone'=>$this->input->post('phone'),
			'phone2'=>$this->input->post('phone2'),
			'adult_rate'=>$this->input->post('adult_rate'),
			'child_rate'=>$this->input->post('child_rate'),
			'infant_rate'=>$this->input->post('infant_rate'),
			'per_page'=>$this->input->post('per_page'),
			'sr_rate'=>$this->input->post('sr_rate'),
			'no_vo_visa_rate'=>$this->input->post('no_vo_visa_rate'),
			'mad_name'=>$this->input->post('mad_name'),
			'mad_cont'=>$this->input->post('mad_cont'),
			'mad_name1'=>$this->input->post('mad_name1'),
			'mad_cont1'=>$this->input->post('mad_cont1'),
			'mak_name'=>$this->input->post('mak_name'),
			'mak_cont'=>$this->input->post('mak_cont'),
			'mak_name1'=>$this->input->post('mak_name1'),
			'mak_cont1'=>$this->input->post('mak_cont1'),
			'email'=>$this->input->post('email'),
			'member_one'=>$this->input->post('member_one'),
			'dis_one'=>$this->input->post('dis_one'),
			'member_two'=>$this->input->post('member_two'),
			'dis_two'=>$this->input->post('dis_two'),
			'ticket_sms_format'=>$this->input->post('ticket_sms_format'),
			'permotion_sms'=>$this->input->post('permotion_sms'),
			'mobile_for_sms'=>$this->input->post('mobile_for_sms'),
			'sms_yes_no'=>($this->input->post('sms_yes_no') == 'on')?'Yes':'No',
			'ticket_sms_format_admin'=>$this->input->post('ticket_sms_format_admin'),
			//'package_with_hotel'=>$this->input->post('package_with_hotel'),
			'only_transport'=>$this->input->post('only_transport'),
			//'package_with_hotel_name'=>$this->input->post('package_with_hotel_name'),
			'only_transport_name'=>$this->input->post('only_transport_name'),
			//'package_with_hotel_mad'=>$this->input->post('package_with_hotel_mad'),
			'only_transport_mad'=>$this->input->post('only_transport_mad'),
			//'package_with_hotel_name_mad'=>$this->input->post('package_with_hotel_name_mad'),
			'only_transport_name_mad'=>$this->input->post('only_transport_name_mad'),
			
			);
			
			
			if($_FILES["userfile"]["name"]){	
				$pic = $_FILES["userfile"]["tmp_name"];
				$p = explode('\\',$pic);
				$pic_name = substr($p[count($p)-1],5,-4).$_FILES["userfile"]["name"];
				$data_to_update['packeg1'] = $pic_name;
				
				move_uploaded_file($_FILES['userfile']['tmp_name'], 'assets/images/' . $pic_name);
				//echo $pic_name;die();
			}
			
			if($_FILES["userfile1"]["name"]){	
				$pic1 = $_FILES["userfile1"]["tmp_name"];
				$p1 = explode('\\',$pic1);
				$pic_name1 = substr($p[count($p1)-1],5,-4).$_FILES["userfile1"]["name"];
				$data_to_update['packeg2'] = $pic_name1;
				
				move_uploaded_file($_FILES['userfile1']['tmp_name'], 'assets/images/' . $pic_name1);
				//echo $pic_name;die();
			}
			
			
			$this->config_model->update($data_to_update);
			$data['config'] = $config = $this->config_model->getConfig();
		}
        $this->loadViews("configration", $this->global, $data , NULL);
		}
    }
	function agent_config()
	{
		if($this->isAgent() == TRUE)
        {
            $this->loadThis();
        }
        else
        {  
		$config = $this->config_model->getConfig();
        $this->global['pageTitle'] = $config->name.' : Account Setting';
        $data['config'] = $res = $this->config_model->agentConfig($this->session->userdata('userId'));
		//echo $res->name;die();
		if($this->input->post()){
						$data_to_update = array(
			'name'=>$this->input->post('name'),
			'c_name'=>$this->input->post('c_name'),
			'mobile'=>$this->input->post('mobile'),
			'address'=>$this->input->post('address'),
			);
			/*echo "<pre>";
			print_r($this->input->post());
			die();*/
			
			if($_FILES["userfile"]["name"]){	
				$pic = $_FILES["userfile"]["tmp_name"];
				$p = explode('\\',$pic);
				$pic_name = substr($p[count($p)-1],5,-4).$_FILES["userfile"]["name"];
				$data_to_update['logo'] = $pic_name;
				
				move_uploaded_file($_FILES['userfile']['tmp_name'], 'assets/images/' . $pic_name);
				//echo $pic_name;die();
			}
			$this->config_model->update_agent_config($data_to_update);
			$data['config'] = $res = $this->config_model->agentConfig($this->session->userdata('userId'));
		}
		
        $this->loadViews("agent_config", $this->global, $data , NULL);
		}
	}
	function backup_db()
    {
    		$this->load->dbutil();
    		$prefs = array(
				'format'      => 'zip',
				'filename'    => 'ams.sql'
    		);
    		 
    		$backup =& $this->dbutil->backup($prefs);
    		 
			$file_name = 'AlAbrarTravels-' . date("Y-m-d-H-i-s") .'.zip';
    		$save = 'uploads/'.$file_name;
    		$this->load->helper('download');
    		while (ob_get_level()) {
    			ob_end_clean();
    		}
    		force_download($file_name, $backup);
    }
	function images_manager()
	{
		// die('asdf');
		if($this->isAdmin() == TRUE)
		{
			$this->loadThis();
		}
		else
		{  
		$config = $this->config_model->getConfig();
		$this->global['pageTitle'] = $config->name.' : Images Manager';
		$data['images'] = $res = $this->config_model->getImages('gallery');
		$data['packages'] = $res = $this->config_model->getImages('packages');
		// $data['images'] = 'asfd';
		
		$this->loadViews("images_manager", $this->global, $data , NULL);
		}
	}
	function store_images()
	{
		// die('asdf');
		if($this->isAdmin() == TRUE)
		{
			$this->loadThis();
		}
		else
		{  
			if($_FILES["image"]["name"]){	
				$pic = $_FILES["image"]["tmp_name"];
				$p = explode('\\',$pic);
				$pic_name = substr($p[count($p)-1],5,-4).$_FILES["image"]["name"];
				
				move_uploaded_file($_FILES['image']['tmp_name'], 'assets/images/' . $pic_name);
				
				$data_to_insert = array(
					'filename' => $pic_name,
					'type' => $this->input->post('type'),
					'uploaded_at' => date('Y-m-d H:i:s')
				);
				$this->db->insert('images', $data_to_insert);
			}
			redirect('image_manager');
		}
	}
		// Edit image (show edit form and handle update)
	public function edit_image($id)
	{
		$this->load->model('config_model');
		$image = $this->config_model->getImageById($id);
		if (!$image) {
			show_404();
		}
		$this->global['pageTitle'] = 'Edit Image';
		$data['image'] = $image;
		if ($this->input->post()) {
			$title = $this->input->post('title');
			$this->config_model->updateImage($id, ['title' => $title]);
			$this->session->set_flashdata('success', 'Image updated successfully.');
			redirect('image_manager');
		}
		$this->loadViews('images_manager', $this->global, $data, NULL);
	}

	// Delete image
	public function delete_image($id)
	{
		$this->load->model('config_model');
		$image = $this->config_model->getImageById($id);
		if ($image) {
			// Delete file from filesystem
			$file = FCPATH . 'assets/images/' . $image->filename;
			if (file_exists($file)) {
				@unlink($file);
			}
			// Delete from database
			$this->config_model->deleteImage($id);
			$this->session->set_flashdata('success', 'Image deleted successfully.');
		}
		redirect('image_manager');
	}
    
    
}

?>