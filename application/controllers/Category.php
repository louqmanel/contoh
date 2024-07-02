<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('category_m');
    }

    public function index()
    {
        $data['title'] = 'Category';
        $data['data_category'] = $this->db->get('p_category')->result_array();

        $this->template->load('templates/index', 'product/category/index', $data);
    }

    function tambah()
    {
        $this->db->insert(
            'p_category',
            [
                'name' => $this->input->post('name')
            ]
        );
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Category berhasil ditambah</div>');
        redirect('category/index');
    }

    function edit($id)
    {
        $data['edit_category'] = $this->category_m->getId($id);

        $this->form_validation->set_rules('name', 'Name', 'required');

        if ($this->form_validation->run() == false) {
            $this->template->load('templates/index', 'product/category/editCategory', $data);
        } else {
            $this->category_m->editCategory($id);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    Edit Succes</div>');
            redirect('category/index');
        }
    }

    function hapus($id)
    {
        $this->db->where('id_category', $id);
        $this->db->delete('p_category');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Category berhasil diHapus</div>');
        redirect('category/index');
    }
}
