<?php
    class Transkrip_nilai extends CI_Controller{

        public function index()
        {
            $data = array(
                'nim'   => set_value('nim')
            );

            $this->load->view('template_administrator/header');
            $this->load->view('template_administrator/sidebar');
            $this->load->view('administrator/masuk_transkrip',$data);
            $this->load->view('template_administrator/footer');
        }

        public function masuk_krs_aksi()
        {
            $this->__rules();

            if($this->form_validation->run() == FALSE)
            {
                $this->index();
            }
            else
            {
                $nim = $this->input->post('nim');
                
                $this->db->select("*");
                $this->db->from("krs");
                $this->db->where("nim", $nim);

                $query = $this->db->get()->result();

                foreach($query as $q)
                {
                    cekNilai($q->nim,$q->kode_matakuliah,$q->nilai);
                }

                $this->db->select('t.kode_matakuliah,m.nama_matakuliah,m.sks,t.nilai');
                $this->db->from('transkrip_nilai as t');
                $this->db->where('nim',$nim);
                $this->db->join('matakuliah as m','m.kode_matakuliah=t.kode_matakuliah');

                $transkrip = $this->db->get()->result();

                $mhs = $this->db->select('nama_lengkap, nama_prodi')
                                ->from("mahasiswa")
                                ->where(array("nim" => $nim))
                                ->get()->row();
                
                $prodi = $this->db->select("nama_prodi")
                                ->from("prodi")
                                ->where(array("nama_prodi" => $mhs->nama_prodi))
                                ->get()->row()->nama_prodi;

                $data = array(
                    'transkrip' => $transkrip,
                    'nim'       => $nim,
                    'nama'      => $mhs->nama_lengkap,
                    'prodi'     => $prodi  
                );

                $this->load->view('template_administrator/header');
                $this->load->view('template_administrator/sidebar');
                $this->load->view('administrator/data_transkrip',$data);
                $this->load->view('template_administrator/footer');

            }
        }

        public function __rules()
        {
            $this->form_validation->set_rules('nim','Nim','required',[
                'required'  => 'Nim wajib diisi!'
            ]);
        }
    }
?>