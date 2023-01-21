<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Barang extends CI_Controller {

	public function index()
	{

        $data['barang'] = $this->db->get('barang')->result_array();

        $this->load->view('barang/index', $data);
	}
    public function hapus($id)
    {
        $this->db->delete('barang', ['id' => $id]);
        redirect('barang'); 
    }

    public function edit($id)
    {
        $ids = htmlspecialchars($this->input->post('id'));
        $nama = htmlspecialchars($this->input->post('nama'));
        $harga_beli = htmlspecialchars($this->input->post('harga_beli'));
        $harga_jual = $this->input->post('harga_beli') + ($this->input->post('harga_beli')*10/100);
        $stok = htmlspecialchars($this->input->post('stok'));

        $this->db->set('id', $ids);
        $this->db->set('nama', $nama);
        $this->db->set('harga_beli', $harga_beli);
        $this->db->set('harga_jual', $harga_jual);
        $this->db->set('stok', $stok);
        $this->db->where('id', $id);
        $this->db->update('barang');
        redirect('barang'); 
    }
    public function tambah()
    {
        $data = [
            'tgl' => time(),
            'id' => strtoupper(htmlspecialchars($this->input->post('id'))),
            'nama' => strtoupper(htmlspecialchars($this->input->post('nama'))),
            'harga_beli' => strtoupper(htmlspecialchars($this->input->post('harga_beli'))),
            'harga_jual' => $this->input->post('harga_beli')/((100-10)/100),
            'stok' => strtoupper(htmlspecialchars($this->input->post('stok')))
        ];
        
        $this->db->insert('barang', $data);
        redirect('barang'); 
    }
    public function tbhCpt()
    {
        $data = [
            'tgl' => time(),
            'id' => strtoupper(htmlspecialchars($this->input->post('id'))),
            'nama' => strtoupper(htmlspecialchars($this->input->post('nama'))),
            'harga_beli' => strtoupper(htmlspecialchars($this->input->post('harga_beli'))),
            'harga_jual' => strtoupper(htmlspecialchars($this->input->post('harga_jual'))),
            'stok' => strtoupper(htmlspecialchars($this->input->post('stok')))
        ];
        
        $this->db->insert('barang', $data);
        redirect('barang/tambahCepat/'); 
    }
    public function tambahCepat()
    {
        $this->load->view('barang/tambahCepat');
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */