<?php
defined('BASEPATH') or exit('No direct script access allowed');

class stock_m extends CI_Model
{

    public function getId($id = null)
    {
        $this->db->from('t_stock');
        if ($id != null) {
            $this->db->where('id_stock', $id);
        }
        $query = $this->db->get();
        return $query;
    }
    public function get()
    {
        $this->db->select('t_stock.id_stock, p_item.barcode,p_item.name as item_name, qty, date, detail, supplier.name as supplier_name, p_item.id_item');
        $this->db->from('t_stock');
        $this->db->join('p_item', 'p_item.id_item = t_stock.item');
        $this->db->join('supplier', 'supplier.id_supplier = t_stock.supplier', 'left');
        $this->db->where('type', 'in');

        $query = $this->db->get();
        return $query;
    }
    public function getOut()
    {
        $this->db->select('t_stock.id_stock, p_item.barcode,p_item.name as item_name, qty, date, detail, p_item.id_item');
        $this->db->from('t_stock');
        $this->db->join('p_item', 'p_item.id_item = t_stock.item');
        $this->db->where('type', 'out');

        $query = $this->db->get();
        return $query;
    }
    public function add($post)
    {
        $params = [
            'item' => $post['id_item'],
            'type' => 'in',
            'detail' => $post['detail'],
            'supplier' => $post['supplier'] == '' ? null : $post['supplier'],
            'qty' => $post['qty'],
            'date' => $post['date'],
        ];
        $this->db->insert('t_stock', $params);
    }
    public function addOut($post)
    {
        $params = [
            'item' => $post['id_item'],
            'type' => 'out',
            'detail' => $post['detail'],
            'qty' => $post['qty'],
            'date' => $post['date'],
        ];
        $this->db->insert('t_stock', $params);
    }

    function del($id)
    {
        $this->db->where('id_stock', $id);
        $this->db->delete('t_stock');
    }

    function jmlDataIN()
    {
        $this->db->like('type', 'in');
        $this->db->from('t_stock');
        return $this->db->count_all_results();
    }

    function jmlDataOUT()
    {
        $this->db->like('type', 'out');
        $this->db->from('t_stock');
        return $this->db->count_all_results();
    }
}
