<?php
    class Dashboard extends CI_Controller {
        
        public function index(){
            $this->load->view('template_administrator/header.php');
            $this->load->view('template_administrator/sidebar.php');
            $this->load->view('administrator/dashboard.php');
            $this->load->view('template_administrator/footer.php');
        }
    }
?>