<?php

class Export_klas extends CI_Controller
{

    /* @var Export_klas_model */
    public $export_klas_model;
    function __construct()
    {
        parent::__construct();
        $this->load->model('export_klas_model');
        $this->load->library('excel');
    }

    /*
     * Listing of klas
     */
    function index()
    {
        $data['titel'] = '';
        $data['ontwikkelaar'] = 'War Op de Beeck';
        $data['tester'] = 'Melih Doksanbir';
        $data['lesmomenten'] = $this->export_klas_model->get_all_lesmoment();

        $partials = ['hoofding' => 'main_header',
            'inhoud'   => 'klas/export',
            'voetnoot' => 'main_footer'];
        $this->template->load('main_master', $partials, $data);
    }

    public function createXLS() {
        // load excel library
        $this->load->library('excel');
        $empInfo = $this->export_klas_model->get_all_lesmoment();
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        // set Header
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Richting');
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Klas');
        $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Vak');
        $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Weekdag');
        $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Lesblok');
        // set Row
        $rowCount = 3;
        foreach ($empInfo as $k) {
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $k->richting->naam);
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $k->klas->naam);
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $k->vak->naam);
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $k->weekdag);
            $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $k->lesblok);
            $rowCount++;
        }
        header('Content-type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Klasgegevens.xlsx"');
        header('Cache-Control: max-age=0');

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
    }
}
