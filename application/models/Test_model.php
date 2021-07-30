<?php
class Test_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }
        public function get_test($slug = FALSE)
        {
                if ($slug === FALSE)
                {
                        $query = $this->db->get('test');
                        return $query->result_array();
                }
        
                $query = $this->db->get_where('test', array('slug' => $slug));
                return $query->row_array();
        }
        public function get_corsi(){
                $query=$this->db->get_where('corsi');
                return $query->row_array();
        }
}