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
        $data[ 'title']="precobias";
        $this->load->library('form_validation');
        $this->form_validation->set_rules('job_title', 'Titolo', 'required',
        array('required'=>"Devi inserire il nome dell'esperienza lavorativa"));      
        $this->form_validation->set_rules('job_description', 'descrizione', 'required',
        array('required'=>'Devi inserire un minimo di 120 caratteri'));  
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
    public function add_corsi_on_test($id=""){
        $this->set_corsi_test($id);
        redirect('/main/utente_singolo/'.$id);
    }
    public function set_corsi_test($id=""){
        $get=$this->test_model->singolo_ut($id);
        if(count($get)==0)
            $get=$this->test_model->get_test($id);
        $id_on_foreign_table=[];
        foreach($get as $i)
            array_push($id_on_foreign_table,$i->id_corsi);
        $id_corsi=$this->input->post('id_corsi');
        if(empty($id_corsi)){
            $this->db->where('id_test', $id);
            $this->db->delete('test_corsi');
            return;
        }
        foreach($id_corsi as $i){
            if(!in_array($i,$id_on_foreign_table)){
                $data= array(
                    'id_test'=> $id,
                    'id_corsi'=> $i,
                );
                $this->db->insert('test_corsi',$data);
            }else{
                foreach($id_on_foreign_table as $j){
                    if(!in_array($j,$id_corsi)){
                        $this->db->where('id_corsi', $j);
                        $this->db->delete('test_corsi');
                    }
                }
            }
        
        }         

    }    
    
}
