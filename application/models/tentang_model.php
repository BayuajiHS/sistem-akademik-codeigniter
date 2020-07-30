<?php
    class Tentang_model extends CI_Model{

        public $table = 'tentang_kampus';

        public function tampil_data()
        {
            return $this->db->get($this->table);
        }

        public function edit_data($where)
        {
            $this->db->where($where);
            return $this->db->get($this->table)->result();
        }

        public function update_data($where,$data)
        {
            $this->db->where($where);
            $this->db->update($this->table, $data);
        }
    }
?>