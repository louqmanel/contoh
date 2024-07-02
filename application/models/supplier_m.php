<?php
defined('BASEPATH') or exit('No direct script access allowed');

class supplier_m extends CI_Model
{
    public function get($id = null)
    {
        $this->db->from('supplier');
        if ($id != null) {
            $this->db->where('id_supplier', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    function getId($id)
    {
        return $this->db->get_where('supplier', ['id_supplier' => $id])->row_array();
    }
    function editSupplier($id)
    {
        $data = [
            'name' => $this->input->post('name', true),
            'phone' => $this->input->post('phone', true),
            'address' => $this->input->post('address', true),
            'description' => $this->input->post('description', true),
            'updated' => date('Y-m-d H:i:s')
        ];

        $this->db->where('id_supplier', $id);
        $this->db->update('supplier', $data);
    }

    function hapus($id)
    {

        $this->db->where('id_supplier', $id);
        $this->db->delete('supplier');
    }

    function jmlData()
    {
        $query = $this->db->query("SELECT * FROM supplier");
        $total = $query->num_rows();
        return $total;
    }

    public function getDashboard($id = null)
    {
        $this->db->from('supplier');
        if ($id != null) {
            $this->db->where('id_supplier', $id);
        }
        $this->db->limit(4);
        $query = $this->db->get();
        return $query;
    }
}
