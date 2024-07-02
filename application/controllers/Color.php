<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Color extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Color';
        $data['data_color'] = $this->db->get('p_color')->result_array();

        $this->template->load('templates/index', 'product/color/index', $data);
    }

    function tambah()
    {
        $this->db->insert(
            'p_color',
            [
                'color' => $this->input->post('name')
            ]
        );
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Warna berhasil ditambah</div>');
        redirect('color/index');
    }

    function hapus($id)
    {
        $this->db->where('id_color', $id);
        $this->db->delete('p_color');

        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
        Warna berhasil diHapus</div>');
        redirect('color/index');
    }
}
