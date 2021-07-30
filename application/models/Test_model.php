<?php
class Test_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }
        public function get_test()
        {
                $query = $this->db->get('test');
                return $query->result_array();
        }
        public function get_corsi(){
                $query=$this->db->get_where('corsi');
                return $query->result_array();
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
                ->where('test.id',$id)
                ->get();
                return $query->result();
        }
}