<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @class Export_klas
 * @brief Controller-klasse voor Export_klas
 *
 * Controller-klasse met alle methodes voor de export van een klas
 */

/**
 * @property Template $template
 * @property  Authex $authex
 * @property Gebruiker_model $gebruiker_model
 * @property Export_klas_model $export_klas_model
 */
class Export_klas extends CI_Controller
{
    /**
     * Export_klas constructor.
     */
    function __construct()
    {
        parent::__construct();
        $this->load->model('export_klas_model');
        $this->load->model('gebruiker_model');
        $this->load->library('excel');
        $this->load->library('pagination');
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
    function index($startrij = 0)
    {
        $aantal = 20;
        $ingelogd = $this->authex->getGebruikerInfo();
        if ($ingelogd == null) {
            redirect('gebruiker/index');
        } else {
            switch ($ingelogd->gebruikertypeId) {
                case 3 || 4:
                    $config['base_url'] = site_url('/Export_klas/index');
                    $config['total_rows'] = $this->export_klas_model->getCountAll();
                    $config['per_page'] = $aantal;

                    $this->pagination->initialize($config);
                    $data['titel'] = '';
                    $data['ontwikkelaar'] = 'War Op de Beeck';
                    $data['tester'] = 'Melih Doksanbir';
                    $data['lesmomenten'] = $this->export_klas_model->get_all_lesmoment($aantal, $startrij);
                    $data['gebruikers'] = $this->gebruiker_model->get_gebruikers();
                    $data['links'] = $this->pagination->create_links();
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
        $alphabet = array('F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');
        // load excel library
        $this->load->library('excel');
        $empInfo = $this->export_klas_model->get_all_lesmoment_for_export();
        $data = $this->gebruiker_model->get_gebruikers();
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        // set Header
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Klas');
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Vak');
        $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Weekdag');
        $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Lesblok');
        $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Semester');
        $objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Studenten');
        // set Row
        $rowCount = 3;
        foreach ($empInfo as $k) {
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $k->klas->naam);
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $k->vak->naam);
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $k->weekdag);
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $k->lesblok);
            $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $k->semester);
            $row = $alphabet[0];
            foreach ($data as $d) {
                if ($d->klasId == $k->klas->id) {
                    $objPHPExcel->getActiveSheet()->SetCellValue($row . $rowCount, $d->voornaam);
                    $row ++;
                    $objPHPExcel->getActiveSheet()->SetCellValue($row . $rowCount, $d->achternaam);
                    $row++;
                    $row++;
                }
            }
            $rowCount++;
        }
        header('Content-type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Klasgegevens.xlsx"');
        header('Cache-Control: max-age=0');
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
    }
}