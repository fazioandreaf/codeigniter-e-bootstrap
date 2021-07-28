<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('test_model');
		$this->load->helper('url_helper');		
	}

	public function index($page='home')
	{
		$data['arr']=($this->test_model->get_test());
		//pagenotfound
		if ( ! file_exists(APPPATH.'views/'.$page.'.php'))
        {
			show_404();
        }
		$data['title'] = ucfirst($page);
		$this->load->view('components/header',$data);
		$this->load->view('home',$data);
		$this->load->view('components/footer');

	}
}
