<?php
    class User_model extends CI_Model {

        public $table = 'user';

        public function ambil_data($id)
        {
            $this->db->where('username', $id);
            return $this->db->get('user')->row();
        }

        public function tampil_data()
        {
            return $this->db->get('user');
        }

        public function insert($data)
        {
            $this->db->insert($this->table,$data);
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

        public function hapus_data($where)
        {
            $this->db->where($where);
            $this->db->delete($this->table);
        }
    }
?>