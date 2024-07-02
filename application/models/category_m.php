<?php
defined('BASEPATH') or exit('No direct script access allowed');

class category_m extends CI_Model
{
    public function get($id = null)
    {
        $this->db->from('p_category');
        if ($id != null) {
            $this->db->where('id_category', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    function getId($id)
    {
        return $this->db->get_where('p_category', ['id_category' => $id])->row_array();
    }

    function editCategory($id)
    {
        $data = [
            'name' => $this->input->post('name', true),
            'updated' => date('Y-m-d H:i:s')
        ];

        $this->db->where('id_category', $id);
        $this->db->update('p_category', $data);
    }
}
