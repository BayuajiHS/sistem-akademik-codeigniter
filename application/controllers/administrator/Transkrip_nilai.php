<?php
    class Transkrip_nilai extends CI_Controller{

        public function index()
        {
            $data = array(
                'nim'   => set_value('nim')
            );

            $this->load->view('template_administrator/header');
            $this->load->view('template_administrator/sidebar');
            $this->load->view('administrator/masuk_transkrip',$data);
            $this->load->view('template_administrator/footer');
        }
    }
?>