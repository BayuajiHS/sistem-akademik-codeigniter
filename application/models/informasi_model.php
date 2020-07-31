<?php
    class Informasi_model extends CI_Model{

        public $table = 'informasi';
        
        public function tampil_data()
        {
           return $this->db->get($this->table);
        }

        public function detail_data($where)
        {
            $result = $this->db->where($where)
                               ->get($this->table);

            if($result->num_rows() > 0)
            {
                return $result;
            }
            else
            {
                return false;
            }
        }

        public function insert($data)
        {
            $this->db->insert($this->table, $data);
        }

        public function edit_data($where)
        {
            $this->db->where($where);
            return $this->db->get($this->table);
        }

        public function update_data($where,$data)
        {
            $this->db->where($where);
            $this->db->update($this->table,$data);
        }

        public function hapus($where)
        {
            $this->db->where($where);
            $this->db->delete($this->table);
        }
    }
?>