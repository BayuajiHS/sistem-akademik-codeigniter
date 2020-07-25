<?php
    class Krs extends CI_Controller {

        public function index()
        {
            $data = array (
                'nim'           => set_value('nim'),
                'id_thn_akad'   => set_value('id_thn_akad')
            );

            $this->load->view('template_administrator/header');
            $this->load->view('template_administrator/sidebar');
            $this->load->view('administrator/masuk_krs');
            $this->load->view('template_administrator/footer');
        }

        public function krs_aksi()
        {
            $this->__rules();

            if($this->form_validation->run() == FALSE)
            {
                $this->index();
            }
            else
            {
                $nim = $this->input->post('nim', TRUE);
                $id_thn_akad = $this->input->post('id_thn_akad', TRUE);
            }

            if($this->mahasiswa_model->get_by_id($nim) == NULL)
            {
                $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                    NIM Tidak Ditemukan!
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>');
                redirect('administrator/krs');
            }

            $data = array(
                'nim'           => $nim,
                'id_thn_akad'   => $id_thn_akad,
                'nama_lengkap'  => $this->mahasiswa_model->get_by_id($nim)->nama_lengkap
            );

            $dataKrs = array(
                'krs_data'      => $this->baca_krs($nim,$id_thn_akad),
                'nim'           => $nim,
                'id_thn_akad'   => $id_thn_akad,
                'tahun_akademik'=> $this->tahunakademik_model->get_by_id($id_thn_akad)->tahun_akademik,
                'semester'      => $this->tahunakademik_model->get_by_id($id_thn_akad)->semester=='Ganjil'?'Ganjil':'Genap',
                'nama_lengkap'  => $this->mahasiswa_model->get_by_id($nim)->nama_lengkap,
                'prodi'         => $this->mahasiswa_model->get_by_id($nim)->nama_prodi
            );

            $this->load->view('template_administrator/header');
            $this->load->view('template_administrator/sidebar');
            $this->load->view('administrator/krs_list',$dataKrs);
            $this->load->view('template_administrator/footer');
        }

        public function baca_krs($nim,$id_thn_akad)
        {
            $this->db->select('k.id_krs,k.kode_matakuliah,m.nama_matakuliah,m.sks');
            $this->db->from('krs as k');
            $this->db->where('k.nim',$nim);
            $this->db->where('k.id_thn_akad',$id_thn_akad);
            $this->db->join('matakuliah as m','m.kode_matakuliah = k.kode_matakuliah');
            
            $krs = $this->db->get()->result();

            return $krs;
        }

        public function __rules()
        {
            $this->form_validation->set_rules('nim','Nim','required',[
                'required'  => 'Nim wajib diisi!'
            ]);

            $this->form_validation->set_rules('id_thn_akad','id_thn_akad','required',[
                'required'  => 'Id Tahun Akademik wajib diisi!'
            ]);
        }
    }
?>