<?php
require_once  'vendor/autoload.php';
require_once 'dompdf/autoload.inc.php';

// use DOMNode;
use Dompdf\Css\Style;
use Dompdf\Frame\FrameList;
use Dompdf\FrameDecorator\Image;


use Dompdf\Dompdf;
use Dompdf\Frame;
use Dompdf\Options;
use Dompdf\Css\Stylesheet;

defined('BASEPATH') OR exit('No direct script access allowed');
class Test extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('test_model');
		$this->load->model('api_model');
		$this->load->helper('url_helper');	
		$this->load->helper('form', 'url');
	
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
		$data['certificato_url']='/'.$id_test.'/'.$id_corsi;

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
	public function appendpdf($id_test='',$id_corso=''){
		$this->load->helper('form');
		$config['upload_path']= './upload/';
		$config['allowed_types']= 'gif|jpg|pdf';
		$config['overwrite']=true;
		$config['file_name']= $id_test.'-'.$id_corso;
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('pdf')){
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('upload_form', $error);
			}else{
			$data = array('upload_data' => $this->upload->data());
			}
		$paragrafo=$this->input-> post('paragrafo');
		        redirect('/test/certificato_corso_mpdf/'.$id_test.'/'.$id_corso);


	}
	public function dompdf($id_test='',$id_corso=''){
		$options = new Options();
		$options->set('isRemoteEnabled',true);  
		$dompdf = new Dompdf($options);
		$html = file_get_contents('http://localhost/test/stampa/'.$id_test.'/'.$id_corso,true);
		$dompdf->loadHtml($html);


		// $frame= new Frame(#document);
		// echo '<pre>';
		// var_dump($dompdf);
		// die();
		// file_put_contents('filename.pdf', $output);
		$dompdf->setPaper('A4', 'landscape');
		
		$dompdf->render();
		$dompdf->stream('Certificato di '.$id_test.' per il corso '.$id_corso,[0,0]);
	}
	public function stampa($id_test='',$id_corso=''){
		$data['test']=$this->api_model->test_singolo($id_test);
		$data['corso']=$this->api_model->corso_singolo($id_corso);
		$this->load->view('components/style_certificato',$data);
		$this->load->view('pages/certificato_corso_download',$data);

	}
	public function certificato_corso_mpdf($id_test="",$id_corsi=""){
		$this->load->helper('form');
		$data['title']='Precobias';
		$data['certificato_url']='/'.$id_test.'/'.$id_corsi;

		$data['test']=$this->api_model->test_singolo($id_test);
		$data['corso']=$this->api_model->corso_singolo($id_corsi);
		
		$data['stampa']=false;
        $this->load->view('components/header_1',$data);
		$this->load->view('components/certificato_corso_mpdf_script',$data);
		$this->load->view('components/style_certificato',$data);

		$this->load->view('components/header_2',$data);
		
		$this->load->view('pages/certificato_corso_download',$data);
		$this->load->view('pages/certificato_corso_mpdf',$data);
        $this->load->view('components/footer');
	}
	public function certificato_corso_mpdf_download($id_test='',$id_corso=''){
		$option=['orientation' => 'L'];
			// $header='
			// 	<!DOCTYPE html>
			// 	<html lang="en">
			// 	<head>
			// 		<meta charset="UTF-8">
			// 		<meta http-equiv="X-UA-Compatible" content="IE=edge">
			// 		<meta name="viewport" content="width=device-width, initial-scale=1.0">
			// 		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
			// 		<link rel="shortcut icon" href="https://thumbs.dreamstime.com/b/yin-yang-symbol-vector-icon-harmony-balance-yinyang-sign-isolated-transparent-background-eps-186322218.jpg" type="image/x-icon"> ';

		$file='./upload/'.$id_test.'-'.$id_corso.'.pdf';
		$html =file_get_contents('http://localhost/test/stampa_mpdf/'.$id_test.'/'.$id_corso).'</body></html>';
		$mpdf = new \Mpdf\Mpdf($option);
		$mpdf->WriteHTML($html);
		$mpdf->WriteHTML('<pagebreak />');
		$pagecount = $mpdf->SetSourceFile($file);		
		for($i=1;$i<=$pagecount;$i++){
			$tplId = $mpdf->importPage($i);
			$mpdf->UseTemplate($tplId);
			$mpdf->WriteHTML('<pagebreak />');
		}
		$mpdf->Output();

	}
	public function stampa_mpdf($id_test='',$id_corso=''){
		$data['test']=$this->api_model->test_singolo($id_test);
		$data['corso']=$this->api_model->corso_singolo($id_corso);
		$data['titolo']=$data['test'][0]->nome.' '.$data['test'][0]->cognome.' - Certificato del corso: '.$data['corso'][0]->titolo;
		if(file_exists('upload/'.$data['test'][0]->id.'-'.$data['corso'][0]->id.'.pdf'))
			$data['stampa']=true;
			else
				$data['stampa']=false;
		$this->load->view('components/header_mpdf',$data);
		$this->load->view('components/style_certificato',$data);
		$this->load->view('pages/certificato_corso_download',$data);
	}
}

