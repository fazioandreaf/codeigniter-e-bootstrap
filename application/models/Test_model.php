<?php
class Test_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }
        public function get_test($id=''){       
                if($id==''){
                        $query = $this->db->get('test');
                        return $query->result();
                }else{
                        $query=$this->db->select('*')
                                ->from('test')
                                ->where('id',$id)
                                ->get();
                        return $query->result();
                }
        }
        public function get_corsi($id=''){
                if($id==''){
                        $query = $this->db->get('corsi');
                        return $query->result();
                }else{
                        $query=$this->db->select('*')
                                ->from('corsi')
                                ->where('id',$id)
                                ->get();
                        return $query->result();
                }
        }
        public function create_table($name_table){
                $this->load->dbforge();
                $fields = array(
                        'titolo' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'unique' => TRUE,
                        ),
                        'description' => array(
                                'type' => 'TEXT',
                                'null' => TRUE,
                        ),
                );                
               
                $this->dbforge->add_field($fields);
                $this->dbforge->create_table($name_table);

        }
        public function singolo_ut($id){
                $query= $this->db->select('*')
                ->from('test')
                ->join('test_corsi','test_corsi.id_test=test.id')
                ->join('corsi','corsi.id=test_corsi.id_corsi')
                ->where('test.id',$id)
                ->get();
                return $query->result();
        }
        public function singolo_corso($id){
                $query= $this->db->select('*')
                ->from('corsi')
                ->join('test_corsi','test_corsi.id_corsi=corsi.id')
                ->join('test','test.id=test_corsi.id_test')
                ->where('corsi.id',$id)
                ->get();
                return $query->result();
        }
        public function singolo_ut_exp($id){
                $query= $this->db->select('*')
                ->from('test')
                ->join('job','job.id_test=test.id')
                ->where('test.id',$id)
                ->get();
                return $query->result();
        }
        public function singolo_test($id){
                $query= $this->db->select('*')
                ->from('test')
                ->join('test_corsi','test_corsi.id_test=test.id')
                ->join('corsi','corsi.id=test_corsi.id_corsi')
                ->where('test.id',$id)
                ->get();
                return $query->result();
        }
        public function id_job_test($id){
                $query= $this->db->select('job.id')
                        ->from('job')
                        ->join('test','test.id=job.id_test')
                        ->where('job.id_test',$id)
                        ->get();
                        return $query->result();
        }
        public function test_job($id_test,$id){
                $query= $this->db->select('job.id,job.job_title,job.job_description,job.id_test')
                        ->from('job')
                        ->join('test','test.id=job.id_test')
                        ->where('job.id',$id)
                        ->where('job.id_test',$id_test)
                        ->get();
                        return $query->result();                
        }

        
}