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
                var_dump( $this->db->last_query());
        }
        public function get_corsi(){
                // $this->create_table('corsi');
                $query=$this->db->get_where('corsi');
                // var_dump($query);
                echo $this->db->last_query();

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
}