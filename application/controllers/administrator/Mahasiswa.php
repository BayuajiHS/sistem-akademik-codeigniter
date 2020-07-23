<?php
    class Mahasiswa extends CI_Controller{

        public function index()
        {
            $data['mahasiswa']  = $this->mahasiswa_model->tampil_data('mahasiswa')->result();

            $this->load->view('template_administrator/header');
            $this->load->view('template_administrator/sidebar');
            $this->load->view('administrator/mahasiswa', $data);
            $this->load->view('template_administrator/footer');
        }

        public function detail($id)
        {
            $data['mahasiswa']  = $this->mahasiswa_model->ambil_data_mahasiswa($id);

            $this->load->view('template_administrator/header');
            $this->load->view('template_administrator/sidebar');
            $this->load->view('administrator/mahasiswa_detail', $data);
            $this->load->view('template_administrator/footer');
        }

        public function tambah_mahasiswa()
        {
            $data['prodi']  = $this->mahasiswa_model->tampil_data('prodi')->result();

            $this->load->view('template_administrator/header');
            $this->load->view('template_administrator/sidebar');
            $this->load->view('administrator/mahasiswa_form', $data);
            $this->load->view('template_administrator/footer');
        }

        public function tambah_mahasiswa_aksi()
        {
            $this->__rules();

            if($this->form_validation->run() == FALSE)
            {
                $this->tambah_mahasiswa();
            }
            else
            {
                $nim               = $this->input->post('nim');
                $nama_lengkap      = $this->input->post('nama_lengkap');
                $alamat            = $this->input->post('alamat');
                $email             = $this->input->post('email');
                $telepon           = $this->input->post('telepon');
                $tempat_lahir      = $this->input->post('tempat_lahir');
                $tanggal_lahir     = $this->input->post('tanggal_lahir');
                $jenis_kelamin     = $this->input->post('jenis_kelamin');
                $nama_prodi        = $this->input->post('nama_prodi');
                $photo             = $_FILES['photo']['name'];

                if($photo == ''){
                    
                }
                else
                {
                    $config['upload_path']      = './assets/uploads';
                    $config['allowed_types']    = 'jpg|jpeg|png';
                    
                    $this->load->library('upload', $config);

                    if(!$this->upload->do_upload('photo'))
                    {
                        echo "Gagal Upload Foto"; die();
                    }
                    else
                    {
                        $photo  = $this->upload->data('file_name');
                    }
                }

                $data = array(
                    'nim'           => $nim,
                    'nama_lengkap'  => $nama_lengkap,
                    'alamat'        => $alamat,
                    'email'         => $email,
                    'telepon'       => $telepon,
                    'tempat_lahir'  => $tempat_lahir,
                    'tanggal_lahir' => $tanggal_lahir,
                    'jenis_kelamin' => $jenis_kelamin,
                    'nama_prodi'    => $nama_prodi,
                    'photo'         => $photo

                );

                $this->mahasiswa_model->insert($data,'mahasiswa');
                $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
                                                    Data Mahasiswa Berhasil Ditambahkan!
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>');
                redirect('administrator/mahasiswa');

            }
        }

        public function __rules()
        {
            $this->form_validation->set_rules('nim','nim','required',[
                'required'  => 'Nim wajib diisi!'
            ]);

            $this->form_validation->set_rules('nama_lengkap','nama_lengkap','required',[
                'required'  => 'Nama Lengkap wajib diisi!'
            ]);

            $this->form_validation->set_rules('alamat','alamat','required',[
                'required'  => 'Alamat wajib diisi!'
            ]);

            $this->form_validation->set_rules('email','email','required',[
                'required'  => 'Email wajib diisi!'
            ]);

            $this->form_validation->set_rules('telepon','telepon','required',[
                'required'  => 'Telepon wajib diisi!'
            ]);

            $this->form_validation->set_rules('tempat_lahir','tempat_lahir','required',[
                'required'  => 'Tempat Lahir wajib diisi!'
            ]);

            $this->form_validation->set_rules('tanggal_lahir','tanggal_lahir','required',[
                'required'  => 'Tanggal Lahir wajib diisi!'
            ]);

            $this->form_validation->set_rules('jenis_kelamin','jenis_kelamin','required',[
                'required'  => 'Jenis Kelamin wajib diisi!'
            ]);

            $this->form_validation->set_rules('nama_prodi','nama_prodi','required',[
                'required'  => 'Nama Prodi wajib diisi!'
            ]);

            if (empty($_FILES['photo']['name']))
            {
                $this->form_validation->set_rules('photo', 'photo', 'required',[
                    'required'  => 'Foto wajib diisi!'
                ]);
            }
        }
    }
?>