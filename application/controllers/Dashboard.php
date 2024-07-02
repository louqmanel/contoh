<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('supplier_m');
        $this->load->model('item_m');
        $this->load->model('stock_m');
        $this->load->model('category_m');
    }

    public function index()
    {
        $data['jmlItem'] = $this->item_m->jmlData();
        $data['jmlSupplier'] = $this->supplier_m->jmlData();
        $data['jmlStokIn'] = $this->stock_m->jmlDataIN();
        $data['jmlStokOut'] = $this->stock_m->jmlDataOUT();
        $data['rowSup'] = $this->supplier_m->getDashboard();

        $data['rowItem'] = $this->item_m->getDashboard();

        $this->template->load('templates/index', 'dashboard/index', $data);
    }
}
