<?php
    class Informasi_kampus extends CI_Controller{

        public function index()
        {
            $data['informasi'] = $this->informasi_model->tampil_data()->result();

            $this->load->view('template_administrator/header');
            $this->load->view('template_administrator/sidebar');
            $this->load->view('administrator/informasi_kampus',$data);
            $this->load->view('template_administrator/footer');
        }

        public function tambah_informasi()
        {
            $this->load->view('template_administrator/header');
            $this->load->view('template_administrator/sidebar');
            $this->load->view('administrator/informasi_form');
            $this->load->view('template_administrator/footer');
        }

        public function tambah_informasi_aksi()
        {
            $this->__rules();

            if($this->form_validation->run() == FALSE)
            {
                $this->tambah_informasi();
            }
            else
            {
                $id_informasi       = $this->input->post('id_informasi');
                $icon               = $this->input->post('icon');
                $judul_informasi    = $this->input->post('judul_informasi');
                $isi_informasi      = $this->input->post('isi_informasi');

                $data = array(
                    'id_informasi'      => $id_informasi,
                    'icon'              => $icon,
                    'judul_informasi'   => $judul_informasi,
                    'isi_informasi'     => $isi_informasi,
                );

                $this->informasi_model->insert($data);

                $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
                                                    Data Informasi Berhasil Ditambahkan!
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>');
                redirect('administrator/informasi_kampus');
            }
        }

        public function update($id_informasi)
        {
            $where = array(
                'id_informasi'  => $id_informasi
            );

            $data['informasi'] = $this->informasi_model->edit_data($where)->result();

            $this->load->view('template_administrator/header');
            $this->load->view('template_administrator/sidebar');
            $this->load->view('administrator/informasi_update',$data);
            $this->load->view('template_administrator/footer');
        }

        public function informasi_update_aksi()
        {
            $id_informasi       = $this->input->post('id_informasi');
            $icon               = $this->input->post('icon');
            $judul_informasi    = $this->input->post('judul_informasi');
            $isi_informasi      = $this->input->post('isi_informasi');
    
                $data = array(
                    'id_informasi'      => $id_informasi,
                    'icon'              => $icon,
                    'judul_informasi'   => $judul_informasi,
                    'isi_informasi'     => $isi_informasi,
                );

                $where = array(
                    'id_informasi'    => $id_informasi
                );

                $this->informasi_model->update_data($where, $data);
                $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
                                                    Data Informasi Berhasil Diupdate!
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>');
                redirect('administrator/informasi_kampus');
        }

        public function delete($id_informasi)
        {
            $where = array(
                'id_informasi'  => $id_informasi
            );

            $this->informasi_model->hapus($where);

            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
                                                    Data Informasi Berhasil Dihapus!
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>');
            redirect('administrator/informasi_kampus');
        }

        public function __rules()
        {
            $this->form_validation->set_rules('icon','Icon','required',[
                'required'  => 'Icon wajib diisi!'
            ]);

            $this->form_validation->set_rules('judul_informasi','Judul Informasi','required',[
                'required'  => 'Judul Informasi wajib diisi!'
            ]);

            $this->form_validation->set_rules('isi_informasi','Isi informasi','required',[
                'required'  => 'Isi informasi wajib diisi!'
            ]);
        }
    }
?>