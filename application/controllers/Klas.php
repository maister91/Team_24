<?php

/**
 * @property Template $template
 * @property  Authex $authex
 */

class Klas extends CI_Controller
{

    /* @var Klas_model */
    public $Klas_model;

    function __construct()
    {
        parent::__construct();
        $this->load->model('Klas_model');
        $this->load->library('excel');
    }

    /*
     * Listing of klas
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

    function index_aanpassen()
    {
        $data['titel'] = 'Klassen toevoegen';
        $data['klas'] = $this->Klas_model->get_all_klas();
        $partials = ['hoofding' => 'main_header',
            'inhoud' => 'klas/aanpassen',
            'voetnoot' => 'main_footer'];
        $this->template->load('main_master', $partials, $data);
    }

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

    /*
     * Editing a klas
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

    /*
     * Deleting klas
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

    function getEmptyKlas()
    {
        $klas = new stdClass();

        $klas->id = 0;
        $klas->naam = '';
        $klas->maxAantal = 0;

        return $klas;
    }

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

    public function schrap($id)
    {
        $this->load->model('Klas_model');
        $data['klas'] = $this->Klas_model->delete_klas($id);

        redirect('/klas/index_beheren');
    }

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
