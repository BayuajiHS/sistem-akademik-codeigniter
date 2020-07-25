<?php
    class Tahun_Akademik extends CI_Controller{

        public function index()
        {
            $data['tahun_akademik'] = $this->tahunakademik_model->tampil_data('tahun_akademik')->result();

            $this->load->view('template_administrator/header');
            $this->load->view('template_administrator/sidebar');
            $this->load->view('administrator/tahun_akademik',$data);
            $this->load->view('template_administrator/footer');
        }

        public function tambah_tahunakademik()
        {
            $this->load->view('template_administrator/header');
            $this->load->view('template_administrator/sidebar');
            $this->load->view('administrator/tahun_akademik_form');
            $this->load->view('template_administrator/footer');
        }

        public function tambah_tahunakademik_aksi()
        {

            $this->__rules();

            if($this->form_validation->run() == FALSE)
            {
                $this->tambah_tahunakademik();
            }
            else
            {
                $tahun_akademik = $this->input->post('tahun_akademik');
                $semester       = $this->input->post('semester');
                $status         = $this->input->post('status');

                $data = array(
                    'tahun_akademik'    => $tahun_akademik,
                    'semester'          => $semester,
                    'status'            => $status
                );

                $this->tahunakademik_model->insert($data,'tahun_akademik');
                $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
                                                    Data Tahun Akademik Berhasil Ditambahkan!
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>');
                redirect('administrator/tahun_akademik');
            }
        }

        public function update($id)
        {
            $where = array(
                'id_thn_akad'    => $id
            );

            $data['tahun_akademik'] = $this->tahunakademik_model->edit_data($where,'tahun_akademik')->result();

            $this->load->view('template_administrator/header');
            $this->load->view('template_administrator/sidebar');
            $this->load->view('administrator/tahun_akademik_update',$data);
            $this->load->view('template_administrator/footer');
        }

        public function tahun_akademik_update_aksi()
        {
            $id             = $this->input->post('id_thn_akad');
            $tahun_akademik = $this->input->post('tahun_akademik');
            $semester       = $this->input->post('semester');
            $status         = $this->input->post('status');

            $data = array(
                'tahun_akademik'    => $tahun_akademik,
                'semester'          => $semester,
                'status'            => $status
            );

            $where = array(
                'id_thn_akad'    => $id
            );

            $this->tahunakademik_model->update($where,$data,'tahun_akademik');
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
                                                Data Tahun Akademik Berhasil Diupdate!
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>');
            redirect('administrator/tahun_akademik');

        }

        public function delete($id)
        {
            $where = array(
                'id_thn_akad'    => $id
            );

            $this->tahunakademik_model->delete($where,'tahun_akademik');

            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
                                                Data Tahun Akademik Berhasil Dihapus!
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>');
            redirect('administrator/tahun_akademik');
        }

        public function __rules()
        {
            $this->form_validation->set_rules('tahun_akademik','Tahun akademik','required',[
                'required'  => 'Tahun akademik wajib diisi!'
            ]);

            $this->form_validation->set_rules('semester','Semester','required',[
                'required'  => 'Semester wajib diisi!'
            ]);

            $this->form_validation->set_rules('status','Status','required',[
                'required'  => 'Status wajib diisi!'
            ]);
        }
    }
?>