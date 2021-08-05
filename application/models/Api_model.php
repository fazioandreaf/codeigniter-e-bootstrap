<?php
class Api_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }
        public function utente_singolo_api($id){
                $query= $this->db->select('*')
                        ->from('test')
                        ->join('test_corsi','test_corsi.id_test=test.id')
                        ->join('corsi','corsi.id=test_corsi.id_corsi')
                        ->where('test.id',$id)
                        ->get();
                if(count($query->result())!=0)
                        return $query->result();
                        else                
                        $query=$this->db->select('*')
                                ->from('test')
                                ->where('id',$id)
                                ->get();
                        return $query->result();
                        
                // return $query->result();
        }
        
}