<?php 

    class Matakuliah_model extends CI_Model {

        public function tampil_data($table)
        {
            return $this->db->get($table);
        }

        public function insert($data,$table)
        {
            $this->db->insert($table,$data);
        }
    }
?>