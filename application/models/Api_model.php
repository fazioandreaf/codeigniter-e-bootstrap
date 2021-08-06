<?php
class Api_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }
        public function utente_singolo_corsi_api($id_test){
                $query= $this->db->select('*')
                        ->from('test')
                        ->join('test_corsi','test_corsi.id_test=test.id')
                        ->join('corsi','corsi.id=test_corsi.id_corsi')
                        ->where('test.id',$id_test)
                        ->get();
                if(count($query->result())!=0)
                        return $query->result();
                        else                
                        $query=$this->db->select('*')
                                ->from('test')
                                ->where('id',$id_test)
                                ->get();
                        return $query->result();
        }
        public function utente_singolo_exp_api($id_test){
                $query= $this->db->select('*')
                        ->from('test')
                        ->join('job','job.id_test=test.id')
                        ->where('test.id',$id_test)
                        ->get();
                return $query->result();                
        }
        public function corsi_singolo_api($id_corsi){
                $query= $this->db->select('*')
                        ->from('corsi')
                        ->join('test_corsi','test_corsi.id_corsi=corsi.id')
                        ->join('test','test.id=test_corsi.id_test')
                        ->where('corsi.id',$id_corsi)
                        ->get();
                if(count($query->result())!=0)
                        return $query->result();
                        else                
                        $query=$this->db->select('*')
                                ->from('corsi')
                                ->where('id',$id_corsi)
                                ->get();
                        return $query->result();
        }
        
}