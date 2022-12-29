<?php
defined('BASEPATH') or exit('No direct script access allowed');

date_default_timezone_set('Asia/Kuala_Lumpur');

class Anggaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
     $data['title'] = 'Anggaran';
     $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

     $data['user_sub_menu'] = $this->db->get_where('user_sub_menu')->row_array();

     $this->load->view('templates/header', $data);
     $this->load->view('templates/topbar', $data);
     $this->load->view('templates/sidebar', $data);
     $this->load->view('anggaran/index', $data);
     $this->load->view('templates/footer');
    }
}