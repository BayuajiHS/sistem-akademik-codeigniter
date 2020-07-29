<?php
    class Identitas extends CI_Controller{

        public function index()
        {
            $data['identitas'] = $this->identitas_model->tampil_data()->result();
            $this->load->view('template_administrator/header');
            $this->load->view('template_administrator/sidebar');
            $this->load->view('administrator/identitas',$data);
            $this->load->view('template_administrator/footer');
        }

        public function update($id_identitas)
        {
            $where = array(
                'id_identitas'    => $id_identitas
            );
            
            $data['identitas'] = $this->identitas_model->edit_data($where);

            $this->load->view('template_administrator/header');
            $this->load->view('template_administrator/sidebar');
            $this->load->view('administrator/identitas_update',$data);
            $this->load->view('template_administrator/footer');
        }

        public function update_aksi()
        {
            $id_identitas   = $this->input->post('id_identitas');
            $nama_website   = $this->input->post('nama_website');
            $alamat         = $this->input->post('alamat');
            $email          = $this->input->post('email');
            $telepon        = $this->input->post('telepon');

            $data = array(
                'nama_website'  => $nama_website,
                'alamat'        => $alamat,
                'email'         => $email,
                'telepon'       => $telepon,
            );

            $where = array(
                'id_identitas'  => $id_identitas
            );

            $this->identitas_model->update_data($where,$data);

            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
                                                    Data Identitas Berhasil Diupdate!
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>');
            redirect('administrator/identitas');
            
        }

    }
?>