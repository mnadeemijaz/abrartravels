<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : Hotel and Others (UserController)
 * User Class to control all user related operations.
 * @author : Muhammad Nadeem Ijaz
 * @version : 1.1
 * @since : 14 august 2018
 */
class Front extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
//        $this->isLoggedIn();   
    }
    
    /**
     * This function used to load the first screen of the user
     */
	public function index()
	{
		$result['config'] = $config = $this->config_model->getConfig();
		/*$this->db->select('*');
        $this->db->from('configration');        
        $query = $this->db->get();        
        $result['config'] = $query->row();*/
		//echo $this->db->last_query();die(); 
        $result['images'] = $res = $this->config_model->getImages('gallery');
        $result['packages'] = $res = $this->config_model->getImages('packages');
		$this->load->view('front/front',$result);
	}
  
    function pageNotFound()
    {
        $this->global['pageTitle'] = ' 404 - Page Not Found';
        
        $this->loadViews("404", $this->global, NULL, NULL);
    }
}

?>