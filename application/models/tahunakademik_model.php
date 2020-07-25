<?php
    class Tahunakademik_model extends CI_Model{

        public function tampil_data($table)
        {
            return $this->db->get($table);
        }

        public function insert($data,$table)
        {
            $this->db->insert($table,$data);
        }

        public function edit_data($where,$table)
        {
            return $this->db->get_where($table,$where);
        }

        public function update($where,$data,$table)
        {
            $this->db->where($where);
            $this->db->update($table,$data);
        }

        public function delete($where,$table)
        {
            $this->db->where($where);
            $this->db->delete($table);
        }

        public $id_thn_akad         = 'id_thn_akad';
        public $table               = 'tahun_akademik';

        public function get_by_id($id)
        {
            $this->db->where($this->id_thn_akad, $id);
            return $this->db->get($this->table)->row();
        }
    }
?>