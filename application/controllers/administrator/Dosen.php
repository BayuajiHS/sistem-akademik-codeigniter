<?php
    class Dosen extends CI_Controller{

        public function index()
        {
            $data['dosen'] = $this->dosen_model->tampil_data()->result();

            $this->load->view('template_administrator/header');
            $this->load->view('template_administrator/sidebar');
            $this->load->view('administrator/dosen',$data);
            $this->load->view('template_administrator/footer');
        }

        public function detail($id_dosen)
        {
            $where = array(
                'id_dosen'  => $id_dosen
            );

            $data['dosen'] = $this->dosen_model->detail_data($where)->result();

            $this->load->view('template_administrator/header');
            $this->load->view('template_administrator/sidebar');
            $this->load->view('administrator/dosen_detail',$data);
            $this->load->view('template_administrator/footer');
        }

        public function tambah_dosen()
        {
            $this->load->view('template_administrator/header');
            $this->load->view('template_administrator/sidebar');
            $this->load->view('administrator/dosen_form');
            $this->load->view('template_administrator/footer');
        }

        public function tambah_dosen_aksi()
        {
            $this->__rules();

            if($this->form_validation->run() == FALSE)
            {
                $this->tambah_dosen();
            }
            else
            {
                $nidn           = $this->input->post('nidn');
                $nama_dosen     = $this->input->post('nama_dosen');
                $alamat         = $this->input->post('alamat');
                $email          = $this->input->post('email');
                $telepon        = $this->input->post('telepon');
                $jenis_kelamin  = $this->input->post('jenis_kelamin');
                $foto           = $_FILES['foto']['name'];

                if($foto == '')
                {

                }
                else
                {
                    $config['upload_path']      = './assets/uploads';
                    $config['allowed_types']    = 'jpeg|jpg|png';

                    $this->load->library('upload',$config);

                    if(!$this->upload->do_upload('foto'))
                    {
                        echo "Gagal Upload Foto"; die();
                    }
                    else
                    {
                        $foto = $this->upload->data('file_name');
                    }
                }

                $data = array(
                    'nidn'          => $nidn,
                    'nama_dosen'    => $nama_dosen,
                    'alamat'        => $alamat,
                    'email'         => $email,
                    'telepon'       => $telepon,
                    'jenis_kelamin' => $jenis_kelamin,
                    'foto'          => $foto,
                );

                $this->dosen_model->insert($data);

                $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
                                                    Data Dosen Berhasil Ditambahkan!
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>');
                redirect('administrator/dosen');
            }
        }

        public function update($id_dosen)
        {
            $where = array(
                'id_dosen'  => $id_dosen
            );

            $data['dosen'] = $this->dosen_model->edit_data($where)->result();
            $data['detail'] = $this->dosen_model->detail_data($where)->result();

            $this->load->view('template_administrator/header');
            $this->load->view('template_administrator/sidebar');
            $this->load->view('administrator/dosen_update',$data);
            $this->load->view('template_administrator/footer');
        }

        public function dosen_update_aksi()
        {
            $id_dosen       = $this->input->post('id_dosen');
            $nidn           = $this->input->post('nidn');
            $nama_dosen     = $this->input->post('nama_dosen');
            $alamat         = $this->input->post('alamat');
            $email          = $this->input->post('email');
            $telepon        = $this->input->post('telepon');
            $jenis_kelamin  = $this->input->post('jenis_kelamin');
            $foto           = $_FILES['userfile']['name'];

                if($foto) 
                {
                    $config['upload_path']      = './assets/uploads';
                    $config['allowed_types']    = 'jpg|jpeg|png';
                    
                    $this->load->library('upload', $config);

                    if($this->upload->do_upload('userfile'))
                    {
                        $userfile = $this->upload->data('file_name');
                        $this->db->set('foto', $userfile);
                    }
                    else
                    {
                        echo "Gagal Upload";
                    }
                }

                $data = array(
                    'nidn'          => $nidn,
                    'nama_dosen'    => $nama_dosen,
                    'alamat'        => $alamat,
                    'email'         => $email,
                    'telepon'       => $telepon,
                    'jenis_kelamin' => $jenis_kelamin,
                );

                $where = array(
                    'id_dosen'    => $id_dosen
                );

                $this->dosen_model->update_data($where, $data);
                $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
                                                    Data Dosen Berhasil Diupdate!
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>');
                redirect('administrator/dosen');
        }

        public function delete($id_dosen)
        {
            $where = array(
                'id_dosen'  => $id_dosen
            );

            $this->dosen_model->hapus($where);

            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
                                                    Data Dosen Berhasil Dihapus!
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>');
            redirect('administrator/dosen');
        }

        public function __rules()
        {
            $this->form_validation->set_rules('nidn','Nidn','required',[
                'required'  => 'NIDN wajib diisi!'
            ]);

            $this->form_validation->set_rules('nama_dosen','Nama Dosen','required',[
                'required'  => 'Nama Dosen wajib diisi!'
            ]);

            $this->form_validation->set_rules('alamat','Alamat','required',[
                'required'  => 'Alamat wajib diisi!'
            ]);

            $this->form_validation->set_rules('email','Email','required',[
                'required'  => 'Email wajib diisi!'
            ]);

            $this->form_validation->set_rules('telepon','Telepon','required',[
                'required'  => 'Telepon wajib diisi!'
            ]);

            $this->form_validation->set_rules('jenis_kelamin','Jenis Kelamin','required',[
                'required'  => 'Jenis Kelamin wajib diisi!'
            ]);

            if (empty($_FILES['foto']['name']))
            {
                $this->form_validation->set_rules('foto', 'foto', 'required',[
                    'required'  => 'Foto wajib diisi!'
                ]);
            }
        }
    }
?>