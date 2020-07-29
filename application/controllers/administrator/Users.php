<?php 
    class Users extends CI_Controller{

        public function index()
        {
            $data['users'] = $this->user_model->tampil_data()->result();
            $this->load->view('template_administrator/header');
            $this->load->view('template_administrator/sidebar');
            $this->load->view('administrator/user',$data);
            $this->load->view('template_administrator/footer');
        }

        public function tambah_user()
        {
            $this->load->view('template_administrator/header');
            $this->load->view('template_administrator/sidebar');
            $this->load->view('administrator/user_form');
            $this->load->view('template_administrator/footer');
        }

        public function tambah_user_aksi()
        {
            $this->__rules();

            if($this->form_validation->run() == FALSE)
            {
                $this->tambah_user();
            }
            else
            {
                $username   = $this->input->post('username');
                $password   = $this->input->post('password');
                $email      = $this->input->post('email');
                $level      = $this->input->post('level');
                $blokir     = $this->input->post('blokir');

                $pass = MD5($password);

                $data = array(
                    'username'  => $username,
                    'password'  => $pass,
                    'email'     => $email,
                    'level'     => $level,
                    'blokir'    => $blokir,
                );

                $this->user_model->insert($data);

                $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
                                                    Data User Berhasil Ditambahkan!
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>');
                redirect('administrator/users');
            }
        }

        public function update($id)
        {
            $where = array(
                'id'    => $id
            );
            
            $data['users'] = $this->user_model->edit_data($where);

            $this->load->view('template_administrator/header');
            $this->load->view('template_administrator/sidebar');
            $this->load->view('administrator/user_update',$data);
            $this->load->view('template_administrator/footer');
        }

        public function update_aksi()
        {
            $id         = $this->input->post('id');
            $username   = $this->input->post('username');
            $password   = $this->input->post('password');
            $email      = $this->input->post('email');
            $level      = $this->input->post('level');
            $blokir     = $this->input->post('blokir');

            $pass = MD5($password);

            $data = array(
                'username'  => $username,
                'password'  => $pass,
                'email'     => $email,
                'level'     => $level,
                'blokir'    => $blokir,
            );

            $where = array(
                'id'   => $id
            );

            $this->user_model->update_data($where,$data);

            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
                                                    Data User Berhasil Diupdate!
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>');
            redirect('administrator/users');
            
        }

        public function delete($id)
        {
            $where = array(
                'id'    => $id
            );

            $this->user_model->hapus_data($where);

            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
                                                    Data User Berhasil Dihapus!
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>');
            redirect('administrator/users');
        }

        public function __rules()
        {
            $this->form_validation->set_rules('username','Username','required',[
                'required'  => 'Username wajib diisi!'
            ]);

            $this->form_validation->set_rules('password','Password','required',[
                'required'  => 'Password wajib diisi!'
            ]);

            $this->form_validation->set_rules('email','Email','required',[
                'required'  => 'Email wajib diisi!'
            ]);

            $this->form_validation->set_rules('level','Level','required',[
                'required'  => 'Level wajib diisi!'
            ]);

            $this->form_validation->set_rules('blokir','Blokir','required',[
                'required'  => 'Blokir wajib diisi!'
            ]);
        }
    }
?>