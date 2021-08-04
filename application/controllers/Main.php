<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Main extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('test_model');
		$this->load->helper('url_helper');	
		$this->load->library('javascript');	
		$this->load->library('javascript/jquery');	
	}
	public function index($page='home'){
		$data['view']='test';
		$data['arr']=($this->test_model->get_test());
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
		$data['view']='test';
		$this->load->helper('form');
        $this->load->library('form_validation');
		$data['title'] = '';
		$this->load->view('components/header',$data);
		$this->load->view('pages/form');
		$this->load->view('components/footer');
	}
	public function corsi($page='corsi'){
		$data['view']='corso';
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
		$data['view']='corso';
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
		
		$data['get_exp']=$this->test_model->singolo_ut_exp($get);
		$data['view']='test';
		if(count($data['get_exp'])==0)
			$data['get_exp']=$this->test_model->get_test($get);		
		$data['title'] = 'Precobias';
		$this->load->view('components/header',$data);
		$this->load->view('pages/utente_singolo');
		$this->load->view('components/footer');		
	}
	public function corso_singolo($get=''){
		$data['view']='corso';
		$data['get']=$this->test_model->singolo_corso($get);
		if(count($data['get'])==0)
		$data['get']=$this->test_model->get_corsi($get);
		$data['title'] = 'Precobias';
		$this->load->view('components/header',$data);
		$this->load->view('pages/corso_singolo',$data);
		$this->load->view('components/footer');		
	}
	public function edit($id=''){
		$data['view']='test';
        $this->load->library('session');
		session_destroy();
		$data['get']=$this->test_model->get_test($id);
		$data['exp']=$this->test_model->singolo_ut_exp($id);
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
	public function delete_test($id=""){
		$this->db->where('id', $id);
		$this->db->delete('test');
		redirect('main/index');
	}

}
