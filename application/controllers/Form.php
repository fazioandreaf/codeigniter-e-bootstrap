<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Form extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('test_model');
		$this->load->helper('url_helper');		
	}    
    
    public function create(){
        $data['title']= "Precobias";

        $this->load->library('form_validation');
        $this->form_validation->set_rules('nome', 'Nome', 'required');
        $this->form_validation->set_rules('cognome', 'Cognome', 'required');
        $this->form_validation->set_rules('eta', 'Eta', 'required');
        $this->form_validation->set_rules('genere', 'Genere', 'required');
        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('components/header', $data);
            $this->load->view('pages/form_unsucces');
            $this->load->view('components/footer');
    
        }
        else
        {
            $this->set_user();
        }        
                   
    }
    public function set_user(){
        $this->load->helper('url');
        $data= array(
            'nome'=> $this->input-> post('nome'),
            'cognome'=> $this->input-> post('cognome'),
            'eta'=> $this->input-> post('eta'),
            'genere'=> $this->input-> post('genere'),
        );
        $this->db->insert('test',$data);
        $data['title']= "Precobias";
        $this->load->view('components/header',$data);
        $this->load->view('pages/form_succes',);
        $this->load->view('components/footer',$data);
    }
}
