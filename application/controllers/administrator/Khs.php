<?php
    class Khs extends CI_Controller {

        public function index()
        {
            $data = array(
                'nim'           => set_value('nim'),
                'id_thn_akad'   => set_value('id_thn_akad'),
            );

            $this->load->view('template_administrator/header');
            $this->load->view('template_administrator/sidebar');
            $this->load->view('administrator/masuk_khs',$data);
            $this->load->view('template_administrator/footer');
        }

        public function khs_aksi()
        {
            $this->__rules();

            if($this->form_validation->run() == FALSE)
            {
                $this->index();
            }
            else
            {
                $nim            = $this->input->post('nim');
                $id_thn_akad    = $this->input->post('id_thn_akad');

                $query = "SELECT krs.id_thn_akad, krs.kode_matakuliah, matakuliah.nama_matakuliah, matakuliah.sks,      matakuliah.sks, krs.nilai FROM krs INNER JOIN matakuliah ON krs.kode_matakuliah = matakuliah.kode_matakuliah WHERE krs.nim=$nim AND krs.id_thn_akad=$id_thn_akad";
                
                $sql = $this->db->query($query)->result();

                $smt = $this->db->select('tahun_akademik,semester')->from('tahun_akademik')->where(array('id_thn_akad' => $id_thn_akad))->get()->row();

                $query_str = "SELECT mahasiswa.nim, mahasiswa.nama_lengkap, prodi.nama_prodi FROM mahasiswa INNER JOIN prodi ON mahasiswa.nama_prodi = prodi.nama_prodi WHERE mahasiswa.nim=$nim";

                $mhs = $this->db->query($query_str)->row();

                if($smt == '1')
                {
                    $tampilSemester = 'Ganjil';
                }
                else
                {
                    $tampilSemester = 'Genap';
                }
            }

            $data = array(
                'mhs_data'  => $sql,
                'mhs_nim'   => $nim,
                'mhs_nama'  => $mhs->nama_lengkap,
                'mhs_prodi' => $mhs->nama_prodi,
                'thn_akad'  => $smt->tahun_akademik."(".$tampilSemester.")"
            );

            $this->load->view('template_administrator/header');
            $this->load->view('template_administrator/sidebar');
            $this->load->view('administrator/khs',$data);
            $this->load->view('template_administrator/footer');
        }

        public function __rules()
        {
            $this->form_validation->set_rules('nim','nim','required',[
                'required'  => 'Nim wajib diisi!'
            ]);

            $this->form_validation->set_rules('id_thn_akad','id_thn_akad','required',[
                'required'  => 'Tahun Akademik wajib diisi!'
            ]);
        }
    }
?>