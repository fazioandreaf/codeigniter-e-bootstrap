<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Job extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('test_model');
		$this->load->helper('url_helper');		
	}    
    public function add($id=""){
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['test']=$this->test_model->get_test($id);        
        $data['title']='Precobias';
        $this->load->view('components/header',$data);
        $this->load->view('pages/esperienza',$data);
        $this->load->view('components/footer');
    }
    public function add_function($id=''){
        $data[ 'title']="Precobias";
        $this->load->library('form_validation');
        $this->form_validation->set_rules('job_title', 'Titolo', 'required',
        array('required'=>"Devi inserire il nome dell'esperienza lavorativa"));      
        $this->form_validation->set_rules('job_description', 'descrizione', 'required|min_length[50]',
        array(
            'required'=>'Devi inserire un minimo di 50 caratteri',
            'min_length'=>'Devi inserire un minimo di 50 caratteri'
        ));  
        if ($this->form_validation->run() === FALSE){
            $this->add($id);
        }
        else
        {
            $this->set_job($id);
        }                          
    }
    public function set_job($id=''){
        $this->load->helper('url');
        $data= array(
            'job_title'=> $this->input-> post('job_title'),
            'job_description'=> $this->input-> post('job_description'),
            'id_test'=>$id,
        );
        $this->db->insert('job',$data);
        redirect('/main/utente_singolo/'.$id);
    }
    public function delete($id="",$id_test=""){
        
        $this->db->where('id', $id);
        $this->db->delete('job');
        
        redirect('/main/utente_singolo/'.$id_test);

        // var_dump($id_test);
        // die();
    }    
}
