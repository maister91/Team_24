<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @class Gebruiker
 * @brief Controller-klasse voor Gebruiker
 *
 * Controller-klasse waar de methodes inzitten voor:
 * -Inloggen
 * -Uitloggen
 * -Foutmelding foute inloggegevens
 * -Exporteren van studenteninformatie
 */

/**
 * @property Template $template
 * @property  Authex $authex
 * @property Gebruiker_model $gebruiker_model
 */
class Gebruiker extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->model('gebruiker_model');
        $this->load->library('excel');
    }

    /*
     * Listing of gebruiker
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

    function index_simulatie(){
            $data['titel'] = 'Studietraject simuleren';
            $partials = ['hoofding' => 'main_header',
                'inhoud' => 'gebruiker/simulatie',
                'voetnoot' => 'main_footer'];

            $this->template->load('main_master', $partials, $data);
    }

    function index_klaskeuze(){
            $data['titel'] = 'Klaskeuze';
            $partials = ['hoofding' => 'main_header',
                'inhoud' => 'gebruiker/klaskeuze',
                'voetnoot' => 'main_footer'];

            $this->template->load('main_master', $partials, $data);
    }

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

    public
    function meldAf()
    {
        $this->authex->meldAf();
        redirect('gebruiker/index');
    }

    public
    function toonFout()
    {
        $data['titel'] = 'Fout';
        $data['gebruiker'] = $this->authex->getGebruikerInfo();

        $partials = ['hoofding' => 'main_header',
            'menu' => 'main_menu',
            'inhoud' => 'gebruiker/fout_aanmelden',
            'voetnoot' => 'main_footer'];

        $this->template->load('main_master', $partials, $data);
    }

    public function export(){
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

    /*
     * Adding a new gebruiker
     */
    function add()
    {
        if (isset($_POST) && count($_POST) > 0) {
            $params = [
                'gebruikertypeId' => $this->input->post('gebruikertypeId'),
                'klasId' => $this->input->post('klasId'),
                'trajectId' => $this->input->post('trajectId'),
                'afspraakId' => $this->input->post('afspraakId'),
                'voornaam' => $this->input->post('voornaam'),
                'achternaam' => $this->input->post('achternaam'),
                'email' => $this->input->post('email'),
                'passwoord' => $this->input->post('passwoord'),
            ];

            $gebruiker_id = $this->gebruiker_model->add_gebruiker($params);
            redirect('gebruiker/index');
        } else {
            $data['_view'] = 'gebruiker/add';
            $this->load->view('layouts/main', $data);
        }
    }

    /*
     * Editing a gebruiker
     */
    function edit($id)
    {
        // check if the gebruiker exists before trying to edit it
        $data['gebruiker'] = $this->gebruiker_model->get($id);

        if (isset($data['gebruiker']['id'])) {
            if (isset($_POST) && count($_POST) > 0) {
                $params = [
                    'gebruikertypeId' => $this->input->post('gebruikertypeId'),
                    'klasId' => $this->input->post('klasId'),
                    'trajectId' => $this->input->post('trajectId'),
                    'afspraakId' => $this->input->post('afspraakId'),
                    'voornaam' => $this->input->post('voornaam'),
                    'achternaam' => $this->input->post('achternaam'),
                    'email' => $this->input->post('email'),
                    'passwoord' => $this->input->post('passwoord'),
                ];

                $this->gebruiker_model->update_gebruiker($id, $params);
                redirect('gebruiker/index');
            } else {
                $data['_view'] = 'gebruiker/edit';
                $this->load->view('layouts/main', $data);
            }
        } else
            show_error('The gebruiker you are trying to edit does not exist.');
    }

    /*
     * Deleting gebruiker
     */
    function remove($id)
    {
        $gebruiker = $this->gebruiker_model->get($id);

        // check if the gebruiker exists before trying to delete it
        if (isset($gebruiker['id'])) {
            $this->gebruiker_model->delete_gebruiker($id);
            redirect('gebruiker/index');
        } else
            show_error('The gebruiker you are trying to delete does not exist.');
    }

    public
    function haalKlasIdOp($klasid)
    {
        $watDoen = $this->input->get('watDoen');
        if ($watDoen == 'klasid') {
            $data['klasid'] = $klasid;
        }

        $this->load->view("klas/index");
    }

    public
    function maakGebruiker()
    {
        $gebruiker = new stdClass();
        $gebruiker->voornaam = "Simon";
        $gebruiker->achternaam = "Smedts";
        $gebruiker->email = "r0695798@student.thomasmore.be";
        $gebruiker->paswoord = password_hash("r0695798", PASSWORD_DEFAULT);
        $gebruiker->gebruikertypeId = 1;
        $this->db->insert('gebruiker', $gebruiker);
        return $this->db->insert_id();
    }
}


