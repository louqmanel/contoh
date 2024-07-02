<?php
defined('BASEPATH') or exit('No direct script access allowed');

class bahan_m extends CI_Model
{
    public function get()
    {
        $this->db->from('p_bahan');
        return $this->db->get();
    }
}
