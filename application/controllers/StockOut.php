<?php
defined('BASEPATH') or exit('No direct script access allowed');

class StockOut extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(['item_m', 'stock_m']);
    }

    function index()
    {
        $data['stock'] = $this->stock_m->getOut()->result();
        $data['item'] = $this->item_m->get()->result();

        $this->template->load('templates/index', 'transaction/stock_out/index', $data);
    }

    function tambahOut()
    {
        $post = $this->input->post(null, TRUE);

        $outStok = $this->input->post('stock');
        $outQty = $this->input->post('qty');
        if ($outStok < $outQty) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Stock Out Gagal ditambah, Karena STOK Pada Barang Tidak Cukup</div>');
            redirect('stockOut/index');
        } else {
            $this->item_m->update_stock_out($post);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Stock Out berhasil ditambah</div>');
            $this->stock_m->addOut($post);
            redirect('stockOut/index');
        }
    }

    function hapusOut()
    {
        $id_stock = $this->uri->segment(3);
        $id_item = $this->uri->segment(4);
        $qty = $this->stock_m->getId($id_stock)->row()->qty;
        $data = ['qty' => $qty, 'id_item' => $id_item];

        $this->item_m->update_stock_in($data);
        $this->stock_m->del($id_stock);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Stock Out berhasil diHapus, Jumlah Stok Barang Di Telah Kembalikan!</div>');
        redirect('stockOut/index');
    }

    public function excel()
    {
        $data['stock'] = $this->stock_m->getOut()->result();
        $data['item'] = $this->item_m->get()->result();

        require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel.php');
        require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

        $object = new PHPExcel();
        $object->getProperties()->setCreator("AMProduction");
        $object->getProperties()->setLastModifiedBy("AMProduction");
        $object->getProperties()->setTitle("Data Stok Keluar");

        $object->setActiveSheetIndex(0);

        $object->getActiveSheet()->setCellValue('A1', 'No');
        $object->getActiveSheet()->setCellValue('B1', 'Barcode');
        $object->getActiveSheet()->setCellValue('C1', 'Product Item');
        $object->getActiveSheet()->setCellValue('D1', 'Qty');
        $object->getActiveSheet()->setCellValue('E1', 'Detail');
        $object->getActiveSheet()->setCellValue('F1', 'Date');

        $baris = 2;
        $no = 1;

        foreach ($data['stock'] as $oStock) {
            $object->getActiveSheet()->setCellValue('A' . $baris, $no++);
            $object->getActiveSheet()->setCellValue('B' . $baris, $oStock->barcode);
            $object->getActiveSheet()->setCellValue('C' . $baris, $oStock->item_name);
            $object->getActiveSheet()->setCellValue('D' . $baris, $oStock->qty);
            $object->getActiveSheet()->setCellValue('E' . $baris, $oStock->detail);
            $object->getActiveSheet()->setCellValue('F' . $baris, $oStock->date);

            $baris++;
        }

        $filename = "Data_Stok_Keluar" . '.xlsx';

        $object->getActiveSheet()->setTitle("Data Stok Keluar");
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
        $pdf->Cell(277, 10, "LAPORAN STOK KELUAR", 0, 1, 'C');
        $pdf->SetAutoPageBreak(true, 0);

        // Add Header
        $pdf->Ln(10);
        $pdf->SetFont('', 'B', 12);
        $pdf->Cell(20, 8, "No", 1, 0, 'C');
        $pdf->Cell(20, 8, "Barcode", 1, 0, 'C');
        $pdf->Cell(70, 8, "Product Item", 1, 0, 'C');
        $pdf->Cell(20, 8, "Qty", 1, 0, 'C');
        $pdf->Cell(70, 8, "Detail", 1, 0, 'C');
        $pdf->Cell(37, 8, "Date", 1, 1, 'C');


        $pdf->SetFont('', '', 12);
        $data['stock'] = $this->stock_m->getOut()->result();
        $no = 0;
        foreach ($data['stock'] as $lapData) {
            $no++;
            $pdf->Cell(20, 8, $no, 1, 0, 'C');
            $pdf->Cell(20, 8, $lapData->barcode, 1, 0);
            $pdf->Cell(70, 8, $lapData->item_name, 1, 0);
            $pdf->Cell(20, 8, $lapData->qty, 1, 0);
            $pdf->Cell(70, 8, $lapData->detail, 1, 0);
            $pdf->Cell(37, 8, $lapData->date, 1, 1);
        }

        $pdf->SetFont('', 'B', 10);
        $pdf->Cell(277, 10, "Laporan Stok Keluar CV. AMProduction", 0, 1, 'L');

        $pdf->Output('Laporan-Stok-Keluar.pdf');
    }
}
