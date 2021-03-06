<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class statistics extends CI_Controller {

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
	 
	public function __construct() {
		parent::__construct();
		
		if(!$this->session->userdata('logged_in')) {
			if(!$this->session->userdata('admin_rights') < 2) {
				redirect('/');
			}
			redirect('/');
		}
	}
	 
	public function index()
	{
		//$this->output->enable_profiler(TRUE);
		
		$this->load->model('statistics_model');
		
		$query = $this->statistics_model->get_numOfStudentsPerCourse($this->session->userdata('unid'));
		
		$data['numofusersforcourse'] = $query->result();
		
		$data['num_numofusersforcourse'] = $query->num_rows();
		
		$data['topnumofusersforcourse'] = $this->statistics_model->get_topnumOfStudentsPerCourse($this->session->userdata('unid'))->result();
		
		$data['bottomnumofusersforcourse'] = $this->statistics_model->get_bottomnumOfStudentsPerCourse($this->session->userdata('unid'))->result();
		
		$data['toppercofattenpermodule'] = $this->statistics_model->get_toppercOfAttenPerModule($this->session->userdata('unid'))->result();
		
		$data['bottompercofattenpermodule'] = $this->statistics_model->get_bottompercOfAttenPerModule($this->session->userdata('unid'))->result();
		
		
		
		$this->load->view('admin_statistics', $data);
	}
}
