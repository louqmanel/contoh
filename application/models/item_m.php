<?php
defined('BASEPATH') or exit('No direct script access allowed');

class item_m extends CI_Model
{
    public function get($id = null)
    {
        $this->db->select('p_item.*, p_category.name as category_name, p_color.color as color_name, p_bahan.nm_bahan as bahan_nama');
        $this->db->from('p_item');
        $this->db->join('p_category', 'p_category.id_category = p_item.category');
        $this->db->join('p_color', 'p_color.id_color = p_item.color');
        $this->db->join('p_bahan', 'p_bahan.id_bahan = p_item.bahan');
        if ($id != null) {
            $this->db->where('id_item', $id);
        }
        $query = $this->db->get();
        return $query;
    }
    function getId($id)
    {
        return $this->db->get_where('p_item', ['id_item' => $id])->row_array();
    }

    public function getIdDel($id = null)
    {
        $this->db->from('p_item');
        if ($id != null) {
            $this->db->where('id_item', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    function editItem($id)
    {
        $data = [
            'barcode' => $this->input->post('barcode', true),
            'name' => $this->input->post('name', true),
            'category' => $this->input->post('category', true),
            'color' => $this->input->post('color', true),
            'bahan' => $this->input->post('bahan', true),
            'size' => $this->input->post('size', true),
            'price' => $this->input->post('price', true),
            'updated' => date('Y-m-d H:i:s')
        ];

        $this->db->where('id_item', $id);
        $this->db->update('p_item', $data);
    }

    function update_stock_in($data)
    {
        $qty = $data['qty'];
        $id = $data['id_item'];
        $sql = "UPDATE p_item SET stock = stock + '$qty' WHERE id_item ='$id'";
        $this->db->query($sql);
    }

    function update_stock_out($data)
    {
        $qty = $data['qty'];
        $id = $data['id_item'];
        $sql = "UPDATE p_item SET stock = stock - '$qty' WHERE id_item ='$id'";
        $this->db->query($sql);
    }

    function jmlData()
    {
        $query = $this->db->query("SELECT * FROM p_item");
        $total = $query->num_rows();
        return $total;
    }

    public function getDashboard($id = null)
    {
        $this->db->select('p_item.*, p_category.name as category_name');
        $this->db->from('p_item');
        $this->db->join('p_category', 'p_category.id_category = p_item.category');
        if ($id != null) {
            $this->db->where('id_item', $id);
        }
        $this->db->limit(2);
        $query = $this->db->get();
        return $query;
    }
}
