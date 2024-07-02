<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bahan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Bahan';
        $data['data_bahan'] = $this->db->get('p_bahan')->result_array();

        $this->template->load('templates/index', 'product/bahan/index', $data);
    }

    function tambah()
    {
        $this->db->insert(
            'p_bahan',
            [
                'nm_bahan' => $this->input->post('name')
            ]
        );
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Bahan berhasil ditambah</div>');
        redirect('bahan/index');
    }

    function hapus($id)
    {
        $this->db->where('id_bahan', $id);
        $this->db->delete('p_bahan');

        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
        Bahan berhasil diHapus</div>');
        redirect('bahan/index');
    }
}
