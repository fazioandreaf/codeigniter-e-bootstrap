<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Form extends CI_Controller {
    
    public function create(){
        $data['title']= "header";

        $this->load->library('form_validation');
        $this->form_validation->set_rules('title', 'nome', 'required');
        $this->form_validation->set_rules('title', 'cognome', 'required');
        $this->form_validation->set_rules('title', 'eta', 'required');
        $this->form_validation->set_rules('title', 'genere', 'required');
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
        $data['title']= "header";
        $this->load->view('components/header',$data);
        $this->load->view('pages/form_succes',);
        $this->load->view('components/footer',$data);
    }
}
