<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cms extends CI_Controller { 

function __construct()
    {
	   parent::__construct();
    }

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
	
		$data=array();			
		$page_name=$this->uri->segment('1');
		$data["pageinfo"]=$this->Cms_model->showdata($page_name);		
		$this->load->view('user_header');
		$this->load->view('breadcrumbs');
		$this->load->view('cms',$data);
		$this->load->view('latest_news');
		$this->load->view('newsletter');		
		$this->load->view('user_footer');
		
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */