<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Main extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->model('test_model');
		$this->load->model('api_model');
		$this->load->helper('url_helper');	
		$this->load->library('javascript');	
		$this->load->library('javascript/jquery');	
	}
	public function index($page='home'){
		$data['view']='test';
		if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
        {
			show_404();
        }
		$data['title'] = 'Precobias';
		$this->load->view('components/header_1',$data);
		$this->load->view('components/home_script',$data);
		$this->load->view('components/header_2',$data);
		$this->load->view('pages/home');
		$this->load->view('components/footer');
	}
	public function index_json(){
		$data['arr']=$this->test_model->get_test();
		echo json_encode($data['arr']);
	}
	public function form(){
		$data['view']='test';
		$this->load->helper('form');
        $this->load->library('form_validation');
		$data['title'] = '';
		$this->load->view('components/header_1',$data);
		$this->load->view('components/test_new_script');
		$this->load->view('components/header_2',$data);
		$this->load->view('pages/form');
		$this->load->view('components/footer');
	}
	public function corsi($page='corsi'){
		$data['view']='corso';
		if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
        {
			show_404();
        }
		$data['title'] = 'Precobias';
		$this->load->view('components/header_1',$data);
		$this->load->view('components/corsi_script',$data);
		$this->load->view('components/header_2',$data);
		$this->load->view('pages/corsi',$data);
		$this->load->view('components/footer');
	}
	public function corsi_json(){
		$data['arr']=($this->test_model->get_corsi());
		echo json_encode($data['arr']);
	}
	public function corso_new(){
		$data['view']='corso';
		$this->load->helper('form');
        $this->load->library('form_validation');
		$data['title'] = 'Precobias';
		$this->load->view('components/header_1',$data);
		$this->load->view('components/header_2',$data);
		$this->load->view('pages/corso_new');
		$this->load->view('components/footer');
	}
	public function utente_singolo($get=''){
		$data['get']=$this->test_model->singolo_ut($get);
		if(count($data['get'])==0)
			$data['get']=$this->test_model->get_test($get);
		
		$data['get_exp']=$this->test_model->singolo_ut_exp($get);
		if(count($data['get_exp'])==0)
			$data['get_exp']=$this->test_model->get_test($get);		
		$data['view']='test';
		$data['title'] = 'Precobias';
		$this->load->view('components/header_1',$data);
		$this->load->view('components/utente_singolo_script',$data);
		$this->load->view('components/header_2',$data);
		$this->load->view('pages/utente_singolo');
		$this->load->view('components/footer');		
	}
	public function utente_singolo_corsi_json(){
		$data['data']=$this->api_model->utente_singolo_corsi_api($_GET['id']);
		echo json_encode($data['data']);
	}
	public function utente_singolo_exp_json(){
		$data['data']=$this->api_model->utente_singolo_exp_api($_GET['id']);
		echo json_encode($data['data']);
	}
	public function corso_singolo($get=''){
		$data['view']='corso';
		$data['title'] = 'Precobias';
		$this->load->view('components/header_1',$data);
		$this->load->view('components/corso_singolo_script',$data);
		$this->load->view('components/header_2',$data);
		$this->load->view('pages/corso_singolo',$data);
		$this->load->view('components/footer');		
	}
	public function corso_singolo_json(){
		$data['data']=$this->api_model->corsi_singolo_api($_GET['id_corsi']);
		echo json_encode($data['data']);		
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
			$this->load->view('components/header_1',$data);
			// $this->load->view('components/test_new_script');
			$this->load->view('components/header_2',$data);
			$this->load->view('pages/form',$data);
			$this->load->view('components/footer');	
		}
	}
	public function delete_test($id=""){
		$this->db->where('id', $id);
		$this->db->delete('test');
		redirect('main/index');
	}
	public function delete_axios(){
		$this->db->where('id', $_GET['id']);
		$this->db->delete('test');
		echo json_encode($_GET['id']);
	}
}
