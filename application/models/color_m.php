<?php
defined('BASEPATH') or exit('No direct script access allowed');

class color_m extends CI_Model
{
    public function get()
    {
        $this->db->from('p_color');
        return $this->db->get();
    }
}
