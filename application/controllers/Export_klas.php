<?php

/**
 * @class Export_klas
 * @brief Controller-klasse voor Export_klas
 *
 * Controller-klasse met alle methodes voor het exporteren van klasgegevens
 */

class Export_klas extends CI_Controller
{

    /* @var Export_klas_model */
    public $export_klas_model;

    /**
     * Export_klas constructor.
     */
    function __construct()
    {
        parent::__construct();
        $this->load->model('export_klas_model');
        $this->load->library('excel');
    }

    /**
     * Toont de pagina voor de export van de klassen
     *
     * @see authex::getGebruikerInfo()
     * @see export_klas_model::get_all_lesmoment()
     * @see Gebruiker::meldAf
     * @see Gebruiker::index.php
     * @see klas/export.php
     */
    function index()
    {
        $ingelogd = $this->authex->getGebruikerInfo();
        if ($ingelogd == null) {
            redirect('gebruiker/index');
        } else {
            switch ($ingelogd->gebruikertypeId) {
                case 3 || 4:
                    $data['titel'] = '';
                    $data['ontwikkelaar'] = 'War Op de Beeck';
                    $data['tester'] = 'Melih Doksanbir';
                    $data['lesmomenten'] = $this->export_klas_model->get_all_lesmoment();

                    $partials = ['hoofding' => 'main_header',
                        'inhoud' => 'klas/export',
                        'voetnoot' => 'main_footer'];
                    $this->template->load('main_master', $partials, $data);
                    break;
                case 1 || 2: // gewone geregistreerde gebruiker
                    redirect('gebruiker/meldAf');
                    break;

            }
        };
    }


    /**
     * Maakt een excel document aan van alle gegevens van een kalas
     *
     * @see export_klas_model::get_all_lesmoment()
     */

    public function createXLS()
    {
        // load excel library
        $this->load->library('excel');
        $empInfo = $this->export_klas_model->get_all_lesmoment();
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        // set Header
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Klas');
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Vak');
        $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Weekdag');
        $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Lesblok');
        $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Semester');
        // set Row
        $rowCount = 3;
        foreach ($empInfo as $k) {
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $k->klas->naam);
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $k->vak->naam);
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $k->weekdag);
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $k->lesblok);
            $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $k->semester);
            $rowCount++;
        }
        header('Content-type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Klasgegevens.xlsx"');
        header('Cache-Control: max-age=0');

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
    }
}
