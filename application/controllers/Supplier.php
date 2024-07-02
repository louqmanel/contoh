<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Supplier extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('supplier_m');
    }


    public function index()
    {
        $data['row'] = $this->supplier_m->get();
        $this->template->load('templates/index', 'supplier/index', $data);
    }

    function tambah()
    {
        $this->db->insert(
            'supplier',
            [
                'name' => $this->input->post('name'),
                'phone' => $this->input->post('phone'),
                'address' => $this->input->post('address'),
                'description' => $this->input->post('description'),
            ]
        );
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Supplier berhasil ditambah</div>');
        redirect('supplier/index');
    }

    function edit($id)
    {
        $data['edit_supplier'] = $this->supplier_m->getId($id);

        $this->form_validation->set_rules('name', 'Name', 'required');

        if ($this->form_validation->run() == false) {
            $this->template->load('templates/index', 'supplier/editSupplier', $data);
        } else {
            $this->supplier_m->editSupplier($id);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    Edit Succes</div>');
            redirect('supplier/index');
        }
    }

    function hapus($id)
    {
        $this->supplier_m->hapus($id);
        $error = $this->db->error();
        if ($error['code'] != 0) {

            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Data supplier tidak dapat diHapus</div>');
            redirect('supplier/index');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Supplier berhasil diHapus</div>');
            redirect('supplier/index');
        }
    }

    public function excel()
    {
        $data['row'] = $this->supplier_m->get()->result();

        require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel.php');
        require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

        $object = new PHPExcel();
        $object->getProperties()->setCreator("AMProduction");
        $object->getProperties()->setLastModifiedBy("AMProduction");
        $object->getProperties()->setTitle("Data Supplier");

        $object->setActiveSheetIndex(0);

        $object->getActiveSheet()->setCellValue('A1', 'No');
        $object->getActiveSheet()->setCellValue('B1', 'Name');
        $object->getActiveSheet()->setCellValue('C1', 'Phone');
        $object->getActiveSheet()->setCellValue('D1', 'Address');
        $object->getActiveSheet()->setCellValue('E1', 'Description');

        $baris = 2;
        $no = 1;

        foreach ($data['row'] as $oSupplier) {
            $object->getActiveSheet()->setCellValue('A' . $baris, $no++);
            $object->getActiveSheet()->setCellValue('B' . $baris, $oSupplier->name);
            $object->getActiveSheet()->setCellValue('C' . $baris, $oSupplier->phone);
            $object->getActiveSheet()->setCellValue('D' . $baris, $oSupplier->address);
            $object->getActiveSheet()->setCellValue('E' . $baris, $oSupplier->description);

            $baris++;
        }

        $filename = "Data_Supplier" . '.xlsx';

        $object->getActiveSheet()->setTitle("Data Supplier");
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
        $pdf->Cell(20, 8, "No", 1, 0, 'C');
        $pdf->Cell(50, 8, "Name", 1, 0, 'C');
        $pdf->Cell(30, 8, "Phone", 1, 0, 'C');
        $pdf->Cell(100, 8, "Address", 1, 0, 'C');
        $pdf->Cell(70, 8, "Description", 1, 1, 'C');



        $pdf->SetFont('', '', 12);
        $data['row'] = $this->supplier_m->get()->result();
        $no = 0;
        foreach ($data['row'] as $lapItem) {
            $no++;
            $pdf->Cell(20, 8, $no, 1, 0, 'C');
            $pdf->Cell(50, 8, $lapItem->name, 1, 0);
            $pdf->Cell(30, 8, $lapItem->phone, 1, 0);
            $pdf->Cell(100, 8, $lapItem->address, 1, 0);
            $pdf->Cell(70, 8, $lapItem->description, 1, 1);
        }

        $pdf->SetFont('', 'B', 10);
        $pdf->Cell(277, 10, "Laporan Daftar Item Masuk CV. AMProduction", 0, 1, 'L');

        $pdf->Output('Laporan-Stok-Masuk.pdf');
    }
}
