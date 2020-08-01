<?php
    class Hubungi_model extends CI_Model{

        public $table = 'hubungi';

        public function tampil_data()
        {
            return $this->db->get($this->table)->result();
        }

        public function insert($data)
        {
            $this->db->insert($this->table,$data);
        }
    }
?>