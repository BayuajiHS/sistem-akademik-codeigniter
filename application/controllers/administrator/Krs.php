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
            $this->load->view('administrator/masuk_krs',$data);
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

        public function tambah_krs($nim,$id_thn_akad)
        {
            $data = array(
                'id_krs'            => set_value('id_krs'),
                'id_thn_akad'       => $id_thn_akad,
                'nim'               => $nim,
                'thn_akad_smt'      => $this->tahunakademik_model->get_by_id($id_thn_akad)->tahun_akademik,
                'semester'          => $this->tahunakademik_model->get_by_id($id_thn_akad)->semester=='Ganjil'?'Ganjil':'Genap',
                'nama_lengkap'      => $this->mahasiswa_model->get_by_id($nim)->nama_lengkap,
                'prodi'             => $this->mahasiswa_model->get_by_id($nim)->nama_prodi,
                'kode_matakuliah'   => set_value('kode_matakuliah')
            );

            $this->load->view('template_administrator/header');
            $this->load->view('template_administrator/sidebar');
            $this->load->view('administrator/krs_form',$data);
            $this->load->view('template_administrator/footer');
        }

        public function tambah_krs_aksi()
        {
            $this->__rulesKrs();

            if($this->form_validation->run() == FALSE)
            {
                $this->tambah_krs($this->input->post('nim', TRUE),$this->input->post('id_thn_akad', TRUE));
            }
            else
            {
                $nim                = $this->input->post('nim', TRUE);
                $id_thn_akad        = $this->input->post('id_thn_akad', TRUE);
                $kode_matakuliah    = $this->input->post('kode_matakuliah', TRUE);

                $data = array(
                    'id_thn_akad'       => $id_thn_akad,
                    'nim'               => $nim,
                    'kode_matakuliah'   => $kode_matakuliah,
                );

                $this->krs_model->insert($data);

                $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
                                                    Data KRS Berhasil Ditambahkan!
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>');
                redirect('administrator/krs/index');

            }
        }

        public function update($id)
        {
            $row = $this->krs_model->get_by_id($id);
            $th = $row->id_thn_akad;

            if($row)
            {
                $data = array(
                    'id_krs'            => set_value('id_krs', $row->id_krs),
                    'id_thn_akad'       => set_value('id_thn_akad', $row->id_thn_akad),
                    'nim'               => set_value('nim', $row->nim),
                    'kode_matakuliah'   => set_value('kode_matakuliah', $row->kode_matakuliah),
                    'thn_akad_smt'      => $this->tahunakademik_model->get_by_id($th)->tahun_akademik,
                    'semester'          => $this->tahunakademik_model->get_by_id($th)->semester=='Ganjil'?'Ganjil':'Genap',
                );

                $this->load->view('template_administrator/header');
                $this->load->view('template_administrator/sidebar');
                $this->load->view('administrator/krs_update',$data);
                $this->load->view('template_administrator/footer');
            }
            else
            {
                echo "Data Tidak Ada!";
            }
        }

        public function krs_update_aksi()
        {
            $id_krs             = $this->input->post('id_krs');
            $nim                = $this->input->post('nim');
            $id_thn_akad        = $this->input->post('id_thn_akad');
            $kode_matakuliah    = $this->input->post('kode_matakuliah');

            $data = array(
                'id_krs'                => $id_krs,
                'nim'                   => $nim,
                'id_thn_akad'           => $id_thn_akad,
                'kode_matakuliah'       => $kode_matakuliah,
            );

            $this->krs_model->update_data($id_krs,$data);

            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
                                                    Data KRS Berhasil Diupdate!
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>');
            redirect('administrator/krs/index');
        }

        public function delete($id)
        {
            $this->krs_model->delete($id);
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
                                                    Data KRS Berhasil Dihapus!
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>');
            redirect('administrator/krs/index');
        }

        public function __rulesKrs()
        {
            $this->form_validation->set_rules('nim','Nim','required',[
                'required'  => 'Nim wajib diisi!'
            ]);

            $this->form_validation->set_rules('id_thn_akad','id_thn_akad','required',[
                'required'  => 'Id Tahun Akademik wajib diisi!'
            ]);

            $this->form_validation->set_rules('kode_matakuliah','kode_matakuliah','required',[
                'required'  => 'Kode Matakuliah wajib diisi!'
            ]);

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