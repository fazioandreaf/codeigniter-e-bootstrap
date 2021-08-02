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
        $this->form_validation->set_rules('nome', 'Nome', 'required',
        array('required'=>'Devi inserire il nome'));        
        $this->form_validation->set_rules('cognome', 'Cognome', 'required',
        array('required'=>'Devi inserire il cognome'));
            $this->form_validation->set_rules('eta', 'Eta', 'required',
        array('required'=>"Devi inserire l'etá"));
            $this->form_validation->set_rules('genere', 'Genere', 'required',
        array('required'=>'Devi inserire il genere'));
        if ($this->form_validation->run() === FALSE)
        {
            
            $this->load->view('components/header', $data);
            $this->load->view('pages/form');
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
    public function edit($id=''){
        $data['get']=$id;
        $data['title']= "Precobias";
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nome', 'Nome', 'required',
        array('required'=>'Devi inserire il nome'));        
        $this->form_validation->set_rules('cognome', 'Cognome', 'required',
        array('required'=>'Devi inserire il cognome'));
            $this->form_validation->set_rules('eta', 'Eta', 'required',
        array('required'=>"Devi inserire l'etá"));
            $this->form_validation->set_rules('genere', 'Genere', 'required',
        array('required'=>'Devi inserire il genere'));
        if ($this->form_validation->run() === FALSE)
        {
            
            $this->load->view('components/header', $data);
            $this->load->view('main/edit/'.$id,$data);
            $this->load->view('components/footer');
    
        }
        else
        {
            $this->edit_user($id);
        }                          
    }
    public function edit_user($id=''){
        $this->load->helper('url');
        $data= array(
            'nome'=> $this->input-> post('nome'),
            'cognome'=> $this->input-> post('cognome'),
            'eta'=> $this->input-> post('eta'),
            'genere'=> $this->input-> post('genere'),
        );
        if($id!=''){
            $this->db->where('id',$id)
                    ->update('test',$data);
            $data['title']= "Precobias";
            $this->load->view('components/header',$data);
            $this->load->view('pages/form_succes',);
            $this->load->view('components/footer',$data);
        }else show_404();
    }

}
