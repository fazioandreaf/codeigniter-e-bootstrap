<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Form extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('test_model');
		$this->load->helper('url_helper');		
	}        
    public function create(){
        $data['view']='test';
        $data['title']= "Precobias";
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nome', 'Nome', 'required',
            array('required'=>'Devi inserire il Nome/nome'));        
        $this->form_validation->set_rules('cognome', 'Cognome', 'required',
            array('required'=>'Devi inserire il Cognome/surname'));

        $this->form_validation->set_rules('eta', 'Eta', 'required|greater_than[0]',array(
            'required'=>"Devi inserire l'etá",
            'greater_than'=>"Devi inserire un'etá maggiore di 0"
        ));
        $this->form_validation->set_rules('genere', 'Genere', 'required',
            array('required'=>'Devi inserire il genere'));
        if ($this->form_validation->run() === FALSE)
        {         
            $this->load->view('components/header_1', $data);
            $this->load->view('components/header_2', $data);
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
        redirect('/main/index/');

    }
    public function edit($id=''){
        $this->load->library('session');
        $data['get']=$id;
        $data['title']= "Precobias";

        $this->load->library('form_validation');
        $this->form_validation->set_rules('nome', 'Nome', 'required',array('required'=>'Devi inserire il Nome / Name')); 

        $this->form_validation->set_rules('cognome', 'Cognome', 'required',array('required'=>'Devi inserire il Cognome / Surname'));

        $this->form_validation->set_rules('eta', 'Eta', 'required|greater_than[0]',array('required'=>"Devi inserire l'etá",
        'greater_than'=>"Devi inserire un'etá maggiore di 0"
        ));

        $this->form_validation->set_rules('genere', 'Genere', 'required',array('required'=>'Devi inserire il genere'));
        // $check=$this->test_model->id_job_test($id);

        // if(!empty($check)){

        //     $this->form_validation->set_rules('job_title[]', 'job_title', 'required',
        //         array('required'=>"Devi inserire il nome dell'esperienza lavorativa"));      
        //     $this->form_validation->set_rules('job_description[]', 'job_description', 'required|min_length[50]',
        //         array(
        //             'required'=>'Devi inserire una descrizione con un minimo di 50 caratteri',
        //             'min_length'=>'Devi inserire un minimo di 50 caratteri'
        //         ));  
        //     }



        if ($this->form_validation->run() === FALSE){
            $item=validation_errors();
            $tmp=$this->session->set_flashdata('item', $item);
            redirect('/main/edit/'.$id );
        }else{
            $this->edit_user($id);
        }                          
    } 
    public function edit_user($id=''){
        $this->load->helper('url');
        // $check=$this->input-> post('job_title[]');
        $data= array(
            'nome'=> $this->input-> post('nome'),
            'cognome'=> $this->input-> post('cognome'),
            'eta'=> $this->input-> post('eta'),
            'genere'=> $this->input-> post('genere'),
        );
        // if(!empty($check)){
        //     foreach($check as $k=>$v){
        //         $data_job= array(
        //             'id_test'=>$id,
        //             'job_title'=> $v,
        //             'job_description'=> ($this->input-> post('job_description[]')[$k]),
        //         );
        //         $this->db->where('id',$k)
        //                 ->update('job',$data_job);                    
        //     }
        // }
        if($id!=''){
            $this->db->where('id',$id)
                    ->update('test',$data);
            $data['title']= "Precobias";
            redirect('/main/index/');
        }else show_404();
    }

}
