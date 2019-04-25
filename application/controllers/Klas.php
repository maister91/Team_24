<?php

/**
 * @class Klas
 * @brief Controller-klasse voor Klas
 *
 * Controller-klasse met alle methodes voor de klassen
 */

class Klas extends CI_Controller
{

    /* @var Klas_model */
    public $Klas_model;

    /**
     * Klas constructor.
     */

    function __construct()
    {
        parent::__construct();
        $this->load->model('Klas_model');
        $this->load->library('excel');
    }

    /*
     * Listing of klas
     */

    /**
     * Lijst met de klassen
     *
     * @see authex::getGebruikerInfo()
     *
     * @see Klas::index()
     * @see Klas_model::get_all_klas()
     * @see Gebruiker::meldAf()
     *
     */
    function index()
    {

        $data['titel'] = '';

        $ingelogd = $this->authex->getGebruikerInfo();
        if ($ingelogd == null) {
            redirect('gebruiker/index');
        } else {
            switch ($ingelogd->gebruikertypeId) {
                case 3 || 4:
                    $data['titel'] = 'Klasindeling aanpassen';
                    $data['ontwikkelaar'] = 'War Op de Beeck';
                    $data['tester'] = 'Simon Smedts';
                    $data['klassen'] = $this->Klas_model->get_all_klas();

                    $partials = ['hoofding' => 'main_header',
                        'inhoud' => 'klas/index',
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
     * Geeft de klasindeling weer
     *
     * @see authex::getGebruikerInfo()
     * @see Gebruiker::index()
     * @see Klas_model::get_klas_gebruiker()
     * @see klas/edit.php
     * @see Gebruiker::meldAf()
     */
    function klasindeling()
    {
        $ingelogd = $this->authex->getGebruikerInfo();
        if ($ingelogd == null) {
            redirect('gebruiker/index');
        } else {
            switch ($ingelogd->gebruikertypeId) {
                case 3 || 4:
                    $klasId = $this->input->post('klassen');

                    $data['klasId'] = $klasId;
                    $data['titel'] = 'Klasindeling aanpassen';
                    $data['ontwikkelaar'] = 'War Op de Beeck';
                    $data['tester'] = 'Simon Smedts';
                    $data['klassen'] = $this->Klas_model->get_klas_gebruiker();

                    $partials = ['hoofding' => 'main_header',
                        'inhoud' => 'klas/edit',
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
     * De index beheren
     *
     * @see Klas_model::get_klassen()
     * @see klas/beheren.php
     */
    function index_beheren()
    {
        $data['ontwikkelaar'] = 'Thomas Dergent';
        $data['tester'] = 'Melih Doksanbir';
        $data['titel'] = 'Klassen beheren';
        $data['klassen'] = $this->Klas_model->get_klassen();
        $partials = ['hoofding' => 'main_header',
            'inhoud' => 'klas/beheren',
            'voetnoot' => 'main_footer'];
        $this->template->load('main_master', $partials, $data);
    }

    /**
     * De index aanpasssen
     * @see Klas_model::get_all_klas()
     * @see klas/aanpassen.php
     */

    function index_aanpassen()
    {
        $data['titel'] = 'Klassen toevoegen';
        $data['klas'] = $this->Klas_model->get_all_klas();
        $partials = ['hoofding' => 'main_header',
            'inhoud' => 'klas/aanpassen',
            'voetnoot' => 'main_footer'];
        $this->template->load('main_master', $partials, $data);
    }

    /**
     * @throws PHPExcel_Exception
     * @throws PHPExcel_Reader_Exception
     * @throws PHPExcel_Writer_Exception
     */
    public function createXLS()
    {
        // create file name
        $fileName = 'data-' . time() . '.xlsx';
        // load excel library
        $this->load->library('EXcel');
        $empInfo = $this->Klas_model->get_all_klas();
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        // set Header
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Klas');
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Max aantal');
        // set Row
        $rowCount = 2;
        foreach ($empInfo as $k) {
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $k->naam);
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $k->maxAantal);
            $rowCount++;
        }
        header('Content-type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Klasgegevens.xlsx"');
        header('Cache-Control: max-age=0');

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
    }

    /*
     * Adding a new klas
     */

    /**
     * Een klas toevoegen
     *
     * @see Klas_model::add_klas()
     * @see Klas::index()
     * @see klas/add.php
     */
    function add()
    {
        if (isset($_POST) && count($_POST) > 0) {
            $params = [
                'naam' => $this->input->post('naam'),
                'maxAantal' => $this->input->post('maxAantal'),
            ];

            $klas_id = $this->Klas_model->add_klas($params);
            redirect('klas/index');
        } else {
            $data['_view'] = 'klas/add';
            $this->load->view('layouts/main', $data);
        }
    }

    /**
     * Een klas wijzigen
     * @param $id Het id van de klas dat wordt gewijzigd
     *
     * @see Klas_model::get_klas()
     * @see Klas_model::update_klas()
     * @see Klas::index()
     * @see klad/edit.php
     */
    function edit($id)
    {
        // check if the klas exists before trying to edit it
        $data['Klas'] = $this->Klas_model->get_klas($id);

        if (isset($data['Klas']['id'])) {
            if (isset($_POST) && count($_POST) > 0) {
                $params = [
                    'naam' => $this->input->post('naam'),
                    'maxAantal' => $this->input->post('maxAantal'),
                ];

                $this->Klas_model->update_klas($id, $params);
                redirect('klas/index');
            } else {
                $data['_view'] = 'klas/edit';
                $this->load->view('layouts/main', $data);
            }
        } else
            show_error('The klas you are trying to edit does not exist.');
    }

    /**
     * Een klas verwijderen
     *
     * @param $id Het id van een klas dat verwijderd wordt
     *
     * @see Klas_model::get_klas()
     * @see Klas_model::delete_klas()
     * @see Klas::index()
     */
    function remove($id)
    {
        $klas = $this->Klas_model->get_klas($id);

        // check if the klas exists before trying to delete it
        if (isset($klas['id'])) {
            $this->Klas_model->delete_klas($id);
            redirect('klas/index');
        } else
            show_error('The klas you are trying to delete does not exist.');
    }

    /**
     * Haal lege klas op
     * @return stdClass
     */

    function getEmptyKlas()
    {
        $klas = new stdClass();

        $klas->id = 0;
        $klas->naam = '';
        $klas->maxAantal = 0;

        return $klas;
    }

    /**
     * Maak een nieuwe klas
     *
     * @see Klas::getEmptyKlas()
     * @see klas/klas_form.php
     */

    public function maakNieuwe()
    {
        $data['ontwikkelaar'] = 'Thomas Dergent';
        $data['tester'] = 'Melih Doksanbir';
        $data['klas'] = $this->getEmptyKlas();
        $data['titel'] = 'Klas toevoegen';

        $partials = ['hoofding' => 'main_header',
            'inhoud' => 'klas/klas_form',
            'voetnoot' => 'main_footer'];
        $this->template->load('main_master', $partials, $data);
    }

    /**
     * Wijzig een klas
     *
     * @param $id Het id van de klas die wordt gewijzigd
     *
     * @see Klas::$Klas_model
     * @see Klas_model::get_klas()
     * @see Klas::klas_form
     */

    public function wijzig($id)
    {
        $data['ontwikkelaar'] = 'Thomas Dergent';
        $data['tester'] = 'Melih Doksanbir';
        $this->load->model('Klas_model');
        $data['klas'] = $this->Klas_model->get_klas($id);
        $data['titel'] = 'Klas wijzigen';

        //var_dump($data['klas']);


        $partials = ['hoofding' => 'main_header',
            'inhoud' => 'klas/klas_form',
            'voetnoot' => 'main_footer'];
        $this->template->load('main_master', $partials, $data);
    }

    /**
     * Een klas verwijderen
     *
     * @param $id Het id van de klas dat wordt verwijderd
     *
     * @see Klas::$Klas_model
     * @see Klas_model::delete_klas()
     * @see Klas::index_beheren()
     */
    public function schrap($id)
    {
        $this->load->model('Klas_model');
        $data['klas'] = $this->Klas_model->delete_klas($id);

        redirect('/klas/index_beheren');
    }

    /**
     * Het registreren van een klas
     *
     * @see Klas_model::insert()
     * @see Klas_model::update_klas()
     * @see Klas::index_beheren()
     */

    public function registreer()
    {
        $id = $this->input->post('id');

        $klas = new stdClass();
        $klas->id = $id;
        $klas->naam = $this->input->post('naam');
        $klas->maxAantal = $this->input->post('maxAantal');

        $this->load->model('Klas_model');

        if ($id == 0) {
            $this->Klas_model->insert($klas);
        } else {
            $this->Klas_model->update_klas($klas);
        }

        redirect('/Klas/index_beheren');
    }

}
