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
		if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
        {
			show_404();
        }
		$data['title'] = 'Precobias';
		$this->load->view('components/header',$data);
		$this->load->view('pages/home',$data);
		$this->load->view('components/footer');
	}
	public function form(){
		$this->load->helper('form');
        $this->load->library('form_validation');
		$data['title'] = '';
		$this->load->view('components/header',$data);
		$this->load->view('pages/form');
		$this->load->view('components/footer');
	}
}
