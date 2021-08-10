<?php
require_once 'dompdf/autoload.inc.php';

use Dompdf\Css\Style;
use Dompdf\Frame\FrameList;


use Dompdf\Dompdf;
use Dompdf\Options;
// use Dompdf\JavascriptEmbedder;
// use Dompdf\Sabberworm;
// use Dompdf\Sabberworm;
// use Dompdf\Sabberworm;
// use Dompdf\Sabberworm;
// use Dompdf\Sabberworm;

defined('BASEPATH') OR exit('No direct script access allowed');
class Test extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('test_model');
		$this->load->model('api_model');
		$this->load->helper('url_helper');		
	}        
    public function test_on_corso($id=""){
        $data['view']='test';
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['corso']=$this->test_model->get_corsi();
        $data['table']=$this->test_model->get_test($id);
        $tmp=$this->test_model->singolo_test($id);
        $data['selected']=[];
        foreach($tmp as $i){
            $tmp1=intval($i->id_corsi);
            array_push($data['selected'],$tmp1);
        };
        
        $data['title']='Precobias';
        $this->load->view('components/header_1',$data);
		$this->load->view('components/header_2',$data);
        $this->load->view('pages/add_corso_on_test',$data);
        $this->load->view('components/footer');


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
	public function delete_corsi_on_test($id_test="",$id_corsi=""){
		$this->db->where('id_test', $id_test);
		$this->db->where('id_corsi', $id_corsi);
		$this->db->delete('test_corsi');
		redirect('main/utente_singolo/'.$id_test);
	}    
	public function certificato_corso ($id_test="",$id_corsi=""){
		$this->load->helper('form');
		$data['title']='Precobias';
		$data['certificato_url']='/21/6';

		$data['test']=$this->api_model->test_singolo($id_test);
		$data['corso']=$this->api_model->corso_singolo($id_corsi);
		
		
        $this->load->view('components/header_1',$data);
		$this->load->view('components/certificato_corso_script',$data);
		
		$this->load->view('components/style_certificato');
		$this->load->view('components/header_2',$data);
		$this->load->view('pages/certificato_corso_download',$data);
        $this->load->view('pages/certificato_corso',$data);
        $this->load->view('components/footer');

	}
	public function test_singolo_json() {
		$data['data']=$this->api_model->test_singolo($_GET['id']);
		echo json_encode($data['data']);
	}
	public function certificato_corso_download($id_test='',$id_corsi=''){
		$this->load->helper('form');
		$data['test']=$this->api_model->test_singolo($id_test);
		$data['corso']=$this->api_model->corso_singolo($id_corsi);
		$this->load->view('components/style_certificato');
		$this->load->view('pages/certificato_corso_download',$data);
	}
	public function dompdf($id_test='',$id_corso=''){
		$paragrafo=$this->input-> post('paragrafo');




		$dompdf = new Dompdf();

		$html = file_get_contents('http://localhost/test/prova/'.$id_test.'/'.$id_corso.'/'.$paragrafo);
		// $options = $dompdf->getOptions();
		// $options->setIsHtml5ParserEnabled(true);
		// $dompdf->setOptions($options);

        // $dom = new DOMDocument();
        // $dom->load('http://localhost/test/certificato_corso/'.$id_test.'/'.$id_corso);
		// $dompdf->loadDOM($dom);

		// echo $html;
		$dompdf->loadHtml($html);
		$dompdf->setPaper('A4', 'landscape');
		$dompdf->render();

		$dompdf->stream('Certificato di '.$id_test.' per il corso '.$id_corso,[0,0]);

	}
	public function prova($id_test='',$id_corso='',$paragrafo=''){
		$data['test']=$this->api_model->test_singolo($id_test);
		$data['corso']=$this->api_model->corso_singolo($id_corso);
		$data['paragrafo']=$paragrafo;



		$this->load->view('pages/certificato_corso_download',$data);

	}
}
