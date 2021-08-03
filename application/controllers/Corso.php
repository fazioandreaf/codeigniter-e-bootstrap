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
        redirect('/main/corsi');
    }
    public function add($id=''){
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['corso']=$this->test_model->get_corsi($id);
        $data['table']=$this->test_model->get_test();
        $tmp=$this->test_model->singolo_corso($id);
        $data['selected']=[];
        foreach($tmp as $i){
            $tmp1=intval($i->id_test);
            array_push($data['selected'],$tmp1);
        };
        
        $data['title']='precobias';
        $this->load->view('components/header',$data);
        $this->load->view('pages/add_corso',$data);
        $this->load->view('components/footer');
    }
    public function add_function($id=''){
            $this->set_test_corsi($id);
            redirect('/main/corso_singolo/'.$id);
    }
    public function set_test_corsi($id=''){
        $get=$this->test_model->singolo_corso($id);
        if(count($get)==0)
        $get=$this->test_model->get_corsi($id);
        $id_on_foreign_table=[];
        foreach($get as $i)
        array_push($id_on_foreign_table,$i->id_test);
        $id_test=$this->input->post('id_test');
        
        foreach($id_test as $i){
            if(!in_array($i,$id_on_foreign_table)){
                $data= array(
                    'id_test'=> $i,
                    'id_corsi'=> $id,
                );
                $this->db->insert('test_corsi',$data);
            }
        }         
    }
}
