<?php
    class Landing_page extends CI_Controller{

        public function index()
        {
            $data['identitas'] = $this->identitas_model->tampil_data()->result();
            $data['tentang'] = $this->tentang_model->tampil_data()->result();
            
            $this->load->view('template_administrator/header');
            $this->load->view('landing_page', $data);
            $this->load->view('template_administrator/footer');
        }
        
    }
?>