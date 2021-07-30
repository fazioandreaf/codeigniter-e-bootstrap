<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Corso extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('test_model');
		$this->load->helper('url_helper');		
	}    
    
    public function create(){
        $data['title']= "Precobias";

        $this->load->library('form_validation');
        $this->form_validation->set_rules('titolo', 'Titolo', 'required');
        $this->form_validation->set_rules('descrizione', 'Descrizione', 'required');
        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('components/header', $data);
            $this->load->view('pages/corso_unsucces');
            $this->load->view('components/footer');
    
        }
        else
        {
            $this->set_corso();
        }        
                   
    }
    public function set_corso(){
        $this->load->helper('url');
        $data= array(
            'titolo'=> $this->input-> post('titolo'),
            'descrizione'=> $this->input-> post('descrizione'),
        );
        $this->db->insert('corsi',$data);
        $data['title']= "Precobias";
        $this->load->view('components/header',$data);
        $this->load->view('pages/form_succes',);
        $this->load->view('components/footer',$data);
    }
}
