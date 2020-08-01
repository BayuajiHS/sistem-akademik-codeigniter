<?php
    class Hubungi_kami extends CI_Controller{

        public function index()
        {
            $data['hubungi'] = $this->hubungi_model->tampil_data();

            $this->load->view('template_administrator/header');
            $this->load->view('template_administrator/sidebar');
            $this->load->view('administrator/hubungi_kami',$data);
            $this->load->view('template_administrator/footer');
        }
    }
?>