<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @class Gebruiker
 * @brief Controller-klasse voor Gebruiker
 *
 * Controller-klasse met alle methodes voor de gebruikers
 */

/**
 * @property Template $template
 * @property  Authex $authex
 * @property Gebruiker_model $gebruiker_model
 */
class Gebruiker extends CI_Controller
{
    /**
     * Gebruiker constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->model('gebruiker_model');
        $this->load->library('excel');
    }

    /**
     * Toont de login pagina van de gebruiker
     *
     * @see authex::getGebruikerInfo()
     *
     * @see gebruiker/index.php
     * @see Traject::index
     * @see Gebruikertype::docent
     * @see Gebruikertype::isp
     * @see Gebruikertype::opleidingmanager
     */
    function index()
    {
        $inhoud = null;
        $ingelogd = $this->authex->getGebruikerInfo();
        if ($ingelogd == null) {
            $inhoud = "gebruiker/index";
        } else {
            switch ($ingelogd->gebruikertypeId) {
                case 1: // gewone geregistreerde gebruiker
                    redirect('traject/index');
                    break;
                case 2: // administrator
                    redirect('gebruikertype/docent');
                    break;
                case 3:
                    redirect('gebruikertype/isp');
                    break;
                case 4:
                    redirect('gebruikertype/opleidingmanager');
                    break;
            }
        };
        $data['titel'] = '';
        $data['ontwikkelaar'] = 'War Op de Beeck';
        $data['tester'] = 'Simon Smedts';
        $data['gebruiker'] = $this->authex->getGebruikerInfo();

        $partials = ['hoofding' => 'main_header',
            'inhoud' => $inhoud,
            'voetnoot' => 'main_footer'];

        $this->template->load('main_master', $partials, $data);
    }

    /**
     * Toont de index pagina van de simulatie
     *
     * @see gebruiker/simulatie.php
     */
    function index_simulatie()
    {
        $data['ontwikkelaar'] = 'War Op de Beeck';
        $data['tester'] = 'Simon Smedts';
        $data['titel'] = 'Studietraject simuleren';
        $partials = ['hoofding' => 'main_header',
            'inhoud' => 'gebruiker/simulatie',
            'voetnoot' => 'main_footer'];

        $this->template->load('main_master', $partials, $data);
    }

    /**
     * Toont de index pagina van de klaskeuze
     *
     * @see gebruiker/klaskeuze.php
     */
    function index_klaskeuze()
    {
        $data['ontwikkelaar'] = 'War Op de Beeck';
        $data['tester'] = 'Simon Smedts';
        $data['titel'] = 'Klaskeuze';
        $partials = ['hoofding' => 'main_header',
            'inhoud' => 'gebruiker/klaskeuze',
            'voetnoot' => 'main_footer'];

        $this->template->load('main_master', $partials, $data);
    }

    /**
     * Controleert of het paswoord overeenkomt met de email
     *
     * @see authex::meldAan()
     * @see Gebruiker::index()
     * @see Gebruiker::toonFout
     */
    public
    function controleerAanmelden()
    {
        $email = $this->input->post('email');
        $paswoord = $this->input->post('paswoord');

        if ($this->authex->meldAan($email, $paswoord)) {
            redirect('gebruiker/index');
        } else {
            redirect('gebruiker/toonFout');
        }
    }

    /**
     * Meldt de gebruiker af
     *
     * @see authex::meldAf()
     * @see Gebruiker::index
     */
    public
    function meldAf()
    {
        $this->authex->meldAf();
        redirect('gebruiker/index');
    }

    /**
     * Toont een fout als er iets misloopt bij het aanmelden
     *
     * @see authex::getGebruikerInfo()
     * @see gebruiker/fout_aanmelden.php
     */
    public
    function toonFout()
    {
        $data['ontwikkelaar'] = 'War Op de Beeck';
        $data['tester'] = 'Simon Smedts';
        $data['titel'] = 'Fout';
        $data['gebruiker'] = $this->authex->getGebruikerInfo();

        $partials = ['hoofding' => 'main_header',
            'menu' => 'main_menu',
            'inhoud' => 'gebruiker/fout_aanmelden',
            'voetnoot' => 'main_footer'];

        $this->template->load('main_master', $partials, $data);
    }

    public function export()
    {
        $ingelogd = $this->authex->getGebruikerInfo();
        if ($ingelogd == null) {
            redirect('gebruiker/index');
        } else {
            switch ($ingelogd->gebruikertypeId) {
                case 3 || 4:
                    $data['titel'] = '';
                    $data['ontwikkelaar'] = 'War Op de Beeck';
                    $data['tester'] = 'Thomas Dergent';
                    $data['gebruikers'] = $this->gebruiker_model->get_all_gebruikers();
                    $partials = ['hoofding' => 'main_header',
                        'inhoud' => 'gebruiker/export',
                        'voetnoot' => 'main_footer'];
                    $this->template->load('main_master', $partials, $data);
                    break;
                case 1 || 2: // gewone geregistreerde gebruiker
                    redirect('gebruiker/meldAf');
                    break;
            }
        };
    }

    public function createXLS()
    {
        // load excel library
        $this->load->library('excel');
        $empInfo = $this->gebruiker_model->get_all_gebruikers();
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        // set Header
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Student');
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Klas');
        $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'R-nummer');
        $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Email');
        // set Row
        $rowCount = 3;
        foreach ($empInfo as $k) {
            $naam = $k->voornaam . ' ' . $k->achternaam;
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $naam);
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $k->klas->naam);
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, substr($k->email, 0, -22));
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $k->email);
            $rowCount++;
        }
        header('Content-type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Studenteninformatie.xlsx"');
        header('Cache-Control: max-age=0');
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
    }

    /**
     * Haalt de gegevens van de klas op met opgegeven id
     *
     * @param $klasid de id van de klas die opgehaald wordt
     * @see klas/index.php
     */
    public
    function haalKlasIdOp($klasid)
    {
        $watDoen = $this->input->get('watDoen');
        if ($watDoen == 'klasid') {
            $data['klasid'] = $klasid;
        }

        $this->load->view("klas/index");
    }
}


