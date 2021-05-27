<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

function __construct()
    {
	   parent::__construct();
	   $this->load->helper('text');
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
	$page_name="In_Memoriam";
	
	$data["memoriam"]=$this->Home_model->memoriam();
	$data["mission"]=$this->Home_model->mission();
	$data["vision"]=$this->Home_model->vision();
	$data["objecive"]=$this->Home_model->objecive();
	$data["gallery"]=$this->Home_model->gallery();
	$data["news"]=$this->Home_model->news();
	
		$this->load->view('user_header');
		$this->load->view('home_slider');
		$this->load->view('home',$data);
		$this->load->view('user_footer');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */