<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Item extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(['item_m', 'category_m', 'color_m', 'bahan_m']);
    }


    public function index()
    {
        $data['title'] = 'item';
        $data['row2']  = $this->item_m->get();
        $data['category'] = $this->category_m->get();
        $data['color'] = $this->color_m->get();
        $data['bahan'] = $this->bahan_m->get();


        $this->template->load('templates/index', 'product/item/index', $data);
    }

    public function tambah()
    {
        $this->db->insert(
            'p_item',
            [
                'barcode' => $this->input->post('barcode'),
                'name' => $this->input->post('name'),
                'category' => $this->input->post('category'),
                'color' => $this->input->post('color'),
                'bahan' => $this->input->post('bahan'),
                'size' => $this->input->post('size'),
                'price' => $this->input->post('price')
            ]
        );
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Item berhasil ditambah</div>');
        redirect('Item/index');
    }

    function edit($id)
    {
        $query = $this->item_m->get($id);
        $data['edit_item'] = $query->row();
        $data['query_category'] = $this->category_m->get();
        $data['query_color'] = $this->color_m->get();
        $data['query_bahan'] = $this->bahan_m->get();

        $this->form_validation->set_rules('name', 'Name', 'required');

        if ($this->form_validation->run() == false) {
            $this->template->load('templates/index', 'product/item/editItem', $data);
        } else {
            $this->item_m->editItem($id);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    Edit Succes</div>');
            redirect('item/index');
        }
    }

    function hapus($id)
    {
        $this->db->where('id_item', $id);
        $this->db->delete('p_item');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            item berhasil diHapus</div>');
        redirect('item/index');
    }

    public function excel()
    {
        $data['row']  = $this->item_m->get()->result();
        $data['category'] = $this->category_m->get()->result();

        require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel.php');
        require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

        $object = new PHPExcel();
        $object->getProperties()->setCreator("AMProduction");
        $object->getProperties()->setLastModifiedBy("AMProduction");
        $object->getProperties()->setTitle("Data Item");

        $object->setActiveSheetIndex(0);

        $object->getActiveSheet()->setCellValue('A1', 'No');
        $object->getActiveSheet()->setCellValue('B1', 'Barcode');
        $object->getActiveSheet()->setCellValue('C1', 'Product Name');
        $object->getActiveSheet()->setCellValue('D1', 'Category');
        $object->getActiveSheet()->setCellValue('E1', 'Color');
        $object->getActiveSheet()->setCellValue('F1', 'Bahan');
        $object->getActiveSheet()->setCellValue('G1', 'Size');
        $object->getActiveSheet()->setCellValue('H1', 'Harga');
        $object->getActiveSheet()->setCellValue('I1', 'Stock');

        $baris = 2;
        $no = 1;

        foreach ($data['row'] as $oItem) {
            $object->getActiveSheet()->setCellValue('A' . $baris, $no++);
            $object->getActiveSheet()->setCellValue('B' . $baris, $oItem->barcode);
            $object->getActiveSheet()->setCellValue('C' . $baris, $oItem->name);
            $object->getActiveSheet()->setCellValue('D' . $baris, $oItem->category_name);
            $object->getActiveSheet()->setCellValue('E' . $baris, $oItem->color_name);
            $object->getActiveSheet()->setCellValue('F' . $baris, $oItem->bahan_nama);
            $object->getActiveSheet()->setCellValue('G' . $baris, $oItem->size);
            $object->getActiveSheet()->setCellValue('H' . $baris, $oItem->price);
            $object->getActiveSheet()->setCellValue('I' . $baris, $oItem->stock);

            $baris++;
        }

        $filename = "Data_Item" . '.xlsx';

        $object->getActiveSheet()->setTitle("Data Item");
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Context-Disposition: attachment; filename"' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer = PHPExcel_IOFactory::createwriter($object, 'Excel2007');
        $writer->save('php://output');

        exit;
    }

    public function pdf()
    {
        $pdf = new \TCPDF();
        $pdf->AddPage('L', 'mm', 'A4');
        $pdf->SetFont('', 'B', 14);
        $pdf->Cell(277, 10, "LAPORAN DAFTAR ITEM", 0, 1, 'C');
        $pdf->SetAutoPageBreak(true, 0);

        // Add Header
        $pdf->Ln(10);
        $pdf->SetFont('', 'B', 12);
        $pdf->Cell(10, 8, "No", 1, 0, 'C');
        $pdf->Cell(20, 8, "Barcode", 1, 0, 'C');
        $pdf->Cell(40, 8, "Product Name", 1, 0, 'C');
        $pdf->Cell(40, 8, "Category", 1, 0, 'C');
        $pdf->Cell(40, 8, "Warna", 1, 0, 'C');
        $pdf->Cell(37, 8, "Bahan", 1, 0, 'C');
        $pdf->Cell(20, 8, "Ukuran", 1, 0, 'C');
        $pdf->Cell(37, 8, "Harga", 1, 0, 'C');
        $pdf->Cell(20, 8, "Stock", 1, 1, 'C');

        $pdf->SetFont('', '', 12);
        $data['row']  = $this->item_m->get()->result();
        $data['category'] = $this->category_m->get()->result();
        $no = 0;
        foreach ($data['row'] as $lapItem) {
            $no++;
            $pdf->Cell(10, 8, $no, 1, 0, 'C');
            $pdf->Cell(20, 8, $lapItem->barcode, 1, 0);
            $pdf->Cell(40, 8, $lapItem->name, 1, 0);
            $pdf->Cell(40, 8, $lapItem->category_name, 1, 0);
            $pdf->Cell(40, 8, $lapItem->color_name, 1, 0);
            $pdf->Cell(37, 8, $lapItem->bahan_nama, 1, 0);
            $pdf->Cell(20, 8, $lapItem->size, 1, 0);
            $pdf->Cell(37, 8, $lapItem->price, 1, 0);
            $pdf->Cell(20, 8, $lapItem->stock, 1, 1);
        }

        $pdf->SetFont('', 'B', 10);
        $pdf->Cell(277, 10, "Laporan Daftar Item Masuk Gudang Sepatu", 0, 1, 'L');

        $pdf->Output('Laporan-Daftar-Item.pdf');
    }
}
