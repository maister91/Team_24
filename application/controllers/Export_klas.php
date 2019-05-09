<?php

/**
 * @class Export_klas
 * @brief Controller-klasse voor Export_klas
 *
 * Controller-klasse met alle methodes voor het exporteren van klasgegevens
 */

/**
 * @property Template $template
 * @property  Authex $authex
 * @property Gebruiker_model $gebruiker_model
 * @property Export_klas_model $export_klas_model
 * @property Gebruiker_lesmoment_model Gebruiker_lesmoment_model
 * @property Klas_model $Klas_model
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
        $this->load->model('Gebruiker_lesmoment_model');
        $this->load->model('Klas_model');
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
    function index()
    {
        $aantal = 20;
        $ingelogd = $this->authex->getGebruikerInfo();
        if ($ingelogd == null) {
            redirect('gebruiker/index');
        } else {
            switch ($ingelogd->gebruikertypeId) {
                case 3 || 4:
                    $klassen = [];
                    foreach ($this->Klas_model->get_all_klas('naam') as $klas) {
                        $klasGebruiker = [];
                        foreach ($this->Klas_model->get_klas_studenten($klas->id) as $lesmomentGebruiker) {
                            if (!array_key_exists($lesmomentGebruiker->gebruikerId, $klasGebruiker)) {
                                $gebruiker = $this->gebruiker_model->get($lesmomentGebruiker->gebruikerId);
                                $klasGebruiker[$lesmomentGebruiker->gebruikerId] = $gebruiker->email;
                            }
                        }
                        $klassen[] = [
                            'naam' => $klas->naam,
                            'maxAantal' => $klas->maxAantal,
                            'huidigAantal' => count($klasGebruiker),
                            'gebruikers' => implode(', ', $klasGebruiker),
                        ];
                    }
                    $data['titel'] = '';
                    $data['ontwikkelaar'] = 'War Op de Beeck';
                    $data['tester'] = 'Melih Doksanbir';
                    $data['klassen'] = $klassen;
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
        $alphabet = array('D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');
        // load excel library
        $this->load->library('excel');
        $klassen = [];
        foreach ($this->Klas_model->get_all_klas('naam') as $klas) {
            $klasGebruiker = [];
            foreach ($this->Klas_model->get_klas_studenten($klas->id) as $lesmomentGebruiker) {
                if (!array_key_exists($lesmomentGebruiker->gebruikerId, $klasGebruiker)) {
                    $gebruiker = $this->gebruiker_model->get($lesmomentGebruiker->gebruikerId);
                    $klasGebruiker[$lesmomentGebruiker->gebruikerId] = $gebruiker->email;
                }
            }
            $klassen[] = [
                'naam' => $klas->naam,
                'maxAantal' => $klas->maxAantal,
                'huidigAantal' => count($klasGebruiker),
                'gebruikers' => implode(', ', $klasGebruiker),
            ];
        }
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        // set Header
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Klas');
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'huidig aantal studenten');
        $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Max aantal studenten');
        $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Studenten');
        // set Row
        $rowCount = 3;
        foreach ($klassen as $k) {
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $k['naam']);
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $k['huidigAantal']);
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $k['maxAantal']);
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $k['gebruikers']);
            $rowCount++;
        }

        header('Content-type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Klasgegevens.xlsx"');
        header('Cache-Control: max-age=0');
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
    }
}
