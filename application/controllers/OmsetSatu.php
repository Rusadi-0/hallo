<?php
defined('BASEPATH') or exit('No direct script access allowed');

class OmsetSatu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Omset Hari Ini';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['user_sub_menu'] = $this->db->get_where('user_sub_menu')->row_array();
        $this->load->model('Omset_model', 'omset');

        $data['omset'] = $this->omset->getData('omset');
        $data['omsetBulan'] = $this->omset->getBulan('omset');
        $data['getAkhir'] = $this->omset->getDataAkhir('omset');
        $data['getAll'] = $this->omset->getAll('omset');
        $data['getAss'] = $this->omset->getAss('omset');

            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('OmsetSatu/index', $data);
            $this->load->view('templates/footer');
    }
    public function omset()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        
        $this->form_validation->set_rules('nama_penyetor', 'nama_penyetor', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('OmsetSatu/index', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama_penyetor' => $this->input->post('nama_penyetor'),
                'nilai_omset' => ($this->input->post('1k')*1000)+($this->input->post('2k')*2000)+($this->input->post('5k')*5000)+($this->input->post('10k')*10000)+($this->input->post('20k')*20000)+($this->input->post('50k')*50000)+($this->input->post('100k')*100000),
                'jumlah_kembalian' => $this->input->post('kembalian'),
                'tanggal_stor' => date('Y-m-d'),
                'bulan' => date('mY'),
                'tahun' => date('Y'),
                'waktu_stor' => time()
            ];
            $this->db->insert('omset', $data);
            $this->db->set('bulan', (date("m") + 1).date("Y"));
            $this->db->where('id', 1);
            $this->db->update('omset');
            $this->session->set_flashdata('message', '<div class="alert fade show notifikasi alert-success" data-dismiss="alert" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="mdi mdi-close"></i></button>Data berhasil <strong> Tertambah..!!</strong></div>');
            redirect('OmsetSatu');
        }
    }
}