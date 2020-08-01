<?php
    class Landing_page extends CI_Controller{

        public function index()
        {
            $data['identitas']  = $this->identitas_model->tampil_data()->result();
            $data['tentang']    = $this->tentang_model->tampil_data()->result();
            $data['informasi']  = $this->informasi_model->tampil_data()->result();
            $data['hubungi']  = $this->hubungi_model->tampil_data();

            $this->load->view('template_administrator/header');
            $this->load->view('landing_page', $data);
            $this->load->view('template_administrator/footer');
        }

        public function kirim_pesan_aksi()
        {
            $this->__rules();

            if($this->form_validation->run() == FALSE)
            {
                $this->index();
            }
            else
            {
                $nama       = $this->input->post('nama');
                $email      = $this->input->post('email');
                $pesan      = $this->input->post('pesan');

                $data = array(
                    'nama'      => $nama,
                    'email'     => $email,
                    'pesan'     => $pesan,
                );

                $this->hubungi_model->insert($data);

                $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
                                                    Pesan Berhasil Dikirim!
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>');
                redirect('landing_page');
            }
        }

        public function __rules()
        {
            $this->form_validation->set_rules('nama','Nama','required',[
                'required'  => 'Nama wajib diisi!'
            ]);

            $this->form_validation->set_rules('email','Email','required',[
                'required'  => 'Email wajib diisi!'
            ]);

            $this->form_validation->set_rules('pesan','Isi Pesan','required',[
                'required'  => 'Isi Pesan wajib diisi!'
            ]);
        }
    }
?>