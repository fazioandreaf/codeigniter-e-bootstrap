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
	public function corsi($page='corsi'){
		$data['arr']=$this->test_model->get_corsi();
		if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
        {
			show_404();
        }
		$data['title'] = 'Precobias';
		$this->load->view('components/header',$data);
		$this->load->view('pages/corsi',$data);
		$this->load->view('components/footer');
	}
	public function corso_new(){
		$this->load->helper('form');
        $this->load->library('form_validation');
		$data['title'] = 'Precobias';
		$this->load->view('components/header',$data);
		$this->load->view('pages/corso_new');
		$this->load->view('components/footer');
	}
	public function utente_singolo($get=''){
		$data['get']=$this->test_model->singolo_ut($get);
		if(count($data['get'])==0)
		$data['get']=$this->test_model->get_test($get);
		$data['title'] = 'Precobias';
		$this->load->view('components/header',$data);
		$this->load->view('pages/utente_singolo');
		$this->load->view('components/footer');		
	}
	public function corso_singolo($get=''){
		$data['get']=$this->test_model->singolo_corso($get);
		// var_dump($data['get']);
		if(count($data['get'])==0)
		$data['get']=$this->test_model->get_corsi($get);
		$data['title'] = 'Precobias';
		$this->load->view('components/header',$data);
		$this->load->view('pages/corso_singolo');
		$this->load->view('components/footer');		
	}
	public function edit($get=''){
        $this->load->library('session');

		$data['get']=$this->test_model->get_test($get);
		if(count($data['get'])==0){
			show_404();
		}else{
			$this->load->helper('form');
			$this->load->library('form_validation');	
			$data['title'] = 'Precobias';
			$this->load->view('components/header',$data);
			$this->load->view('pages/form',$data);
			$this->load->view('components/footer');	
		}


	}

}
