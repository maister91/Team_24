<?php

class Traject extends CI_Controller
{

    /* @var Traject_model */
    public $Traject_model;
    /* @var Vak_model */
    public $Vak_model;
    /* @var Richting_model */
    public $Richting_model;
    /* @var Klas_model */
    public $Klas_model;
    /* @var Lesmoment_model */
    public $Lesmoment_model;

    function __construct()
    {
        parent::__construct();
        $this->load->model('Traject_model');
        $this->load->model('Vak_model');
        $this->load->model('Richting_model');
        $this->load->model('Klas_model');
        $this->load->model('Lesmoment_model');
    }

    /*
     * Listing of traject
     */
    function index()
    {
        $gebruikerId = $this->authex->getGebruikerInfo()->id;
        $data['trajecten'] = $this->Traject_model->get_all_traject();
        $data['titel'] = '';
        $data['ontwikkelaar'] = 'Simon Smedts';
        $data['tester'] ='Melih Doksanbir';
        $data['_view'] = 'traject/index';
        $partials = ['hoofding' => 'main_header',
            'inhoud' => 'traject/index',
            'voetnoot' => 'main_footer'];
        $this->template->load('main_master', $partials, $data);


    }
    /**
     * Maken van keuze traject
     * @see Traject_model::get_all_traject()
     * @see authex::getGebruikerInfo()
     * @see Traject_model::update_traject()
     * @see model_landing.php
     * @see combi_landing.php
     *
     */
    function kiesTraject()
    {
        $data['trajecten'] = $this->Traject_model->get_all_traject();
        $gebruikerId = $this->authex->getGebruikerInfo()->id;
        if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['knop'])) {
            $knop = $this->input->post("knop");
            if ($knop == "Model traject") {
                $this->Traject_model->update_traject(1, $gebruikerId);
                $data['titel'] = 'Model student landing page';
                $data['ontwikkelaar'] = 'Melih Doksanbir';
                $data['tester'] ='';
                $partials = ['hoofding' => 'main_header',
                    'inhoud' => 'model_landing',
                    'voetnoot' => 'main_footer'];
                $this->template->load('main_master', $partials, $data);
            }
            else if ($knop == "Combi traject"){
                $this->Traject_model->update_traject(2, $gebruikerId);
                $data['titel'] = 'Combi student landing page';
                $data['ontwikkelaar'] = 'Melih Doksanbir';
                $data['tester'] ='';
                $partials = ['hoofding' => 'main_header',
                    'inhoud' => 'combi_landing',
                    'voetnoot' => 'main_footer'];
                $this->template->load('main_master', $partials, $data);
            }
        }
    }

    function combi()
    {
        $klasId = $this->input->post('klassen');
        $semesterId = $this->input->post('semester');

        $gebruikerId = $this->authex->getGebruikerInfo()->id;
        $data['feedback'] = '';
        if ($this->input->get('klasId')) {
            $this->Lesmoment_model->update_klas($this->input->get('klasId'), $gebruikerId);
            $klasId = $this->input->get('klasId');
            $semesterId = $this->input->get('semesterId');
            $data['feedback'] = 'keuzeSuccesvol';
        }

        $lesmomenten = $this->Lesmoment_model->get_lesmoment_by_klas_en_semester($klasId, $semesterId);
        $rooster = [];
        $vakkenUniek = [];
        foreach ($lesmomenten as $lesmoment) {
            $vak = $this->Vak_model->get_vak($lesmoment['vakId']);
            if (!in_array($vak, $vakkenUniek)) {
                $vakkenUniek[] = $vak;
            }
            $rooster[$lesmoment['lesblok']][$lesmoment['weekdag']] = [
                'lesblok' => $lesmoment['lesblok'],
                'vakId'   => $vak['id'],
                'vakNaam' => $vak['naam'],
            ];
        }
        $data['lesmomenten'] = $rooster;
        $data['vakkenUniek'] = $vakkenUniek;
        $data['klasId'] = $klasId;
        $data['semesterId'] = $semesterId;
        $data['klassen'] = $this->Klas_model->get_all_klassen();
        $data['klassen1'] = $this->Klas_model->get_klassen_jaar(1);
        $data['klassen2'] = $this->Klas_model->get_klassen_jaar(2);
        $data['klassen3'] = $this->Klas_model->get_klassen_jaar(3);
        $data['vakken'] = $this->Vak_model->get_all_vak();
        $data['richtingen'] = $this->Richting_model->get_all_richting();
        $data['titel'] = '';
        $data['ontwikkelaar'] = 'Melih Doksanbir';
        $data['tester'] ='';
        $partials = ['hoofding' => 'main_header',
            'inhoud' => 'traject/combi',
            'voetnoot' => 'main_footer'];
        $this->template->load('main_master', $partials, $data);
    }


    /*
     * Adding a new traject
     */
    function add()
    {
        if (isset($_POST) && count($_POST) > 0) {
            $params = [
                'naam' => $this->input->post('naam'),
                'beschrijving' => $this->input->post('beschrijving'),
            ];

            $traject_id = $this->Traject_model->add_traject($params);
            redirect('traject/index');
        } else {
            $data['_view'] = 'traject/add';
            $this->load->view('layouts/main', $data);
        }
    }

    /*
     * Editing a traject
     */
    function edit($id)
    {
        // check if the traject exists before trying to edit it
        $data['traject'] = $this->Traject_model->get_traject($id);

        if (isset($data['traject']['id'])) {
            if (isset($_POST) && count($_POST) > 0) {
                $params = [
                    'naam' => $this->input->post('naam'),
                    'beschrijving' => $this->input->post('beschrijving'),
                ];

                $this->Traject_model->update_traject($id, $params);
                redirect('traject/index');
            } else {
                $data['_view'] = 'traject/edit';
                $this->load->view('layouts/main', $data);
            }
        } else
            show_error('The traject you are trying to edit does not exist.');
    }

    /*
     * Deleting traject
     */
    function remove($id)
    {
        $traject = $this->Traject_model->get_traject($id);

        // check if the traject exists before trying to delete it
        if (isset($traject['id'])) {
            $this->Traject_model->delete_traject($id);
            redirect('traject/index');
        } else
            show_error('The traject you are trying to delete does not exist.');
    }

    public function ajaxRequestVakken()
    {
        $klasId = $this->input->post('klasId');
        $semesterId = $this->input->post('semesterId');

        $lesmomenten = $this->Lesmoment_model->get_lesmoment_by_klas_en_semester($klasId, $semesterId);
        $vakkenUniek = [];
        foreach ($lesmomenten as $lesmoment) {
            $vak = $this->Vak_model->get_vak($lesmoment['vakId']);
            if (!in_array($vak, $vakkenUniek)) {
                $vakkenUniek[] = $vak;
            }
        }
        ob_start();
            foreach ($vakkenUniek as $vak) {
                ?><option value="<?php echo $vak['id'];?>"><?php echo $vak['naam'];?></option><?php
            }
        $html = ob_get_clean();
        echo $html;
    }

    public function ajaxRequestPost()
    {
        $items = $this->input->post('items');
        $items2 = $this->input->post('items3');
        $items3 = $this->input->post('items2');

        $klasId1 = $this->input->post('klasId1');
        $semesterId1 = $this->input->post('semesterId1');
        $klasId2 = $this->input->post('klasId2');
        $semesterId2 = $this->input->post('semesterId2');
        $klasId3 = $this->input->post('klasId3');
        $semesterId3 = $this->input->post('semesterId3');

        $lesmomenten1 = $this->Lesmoment_model->get_lesmoment_by_klas_en_semester($klasId1, $semesterId1);
        $lesmomenten2 = $this->Lesmoment_model->get_lesmoment_by_klas_en_semester($klasId2, $semesterId2);
        $lesmomenten3 = $this->Lesmoment_model->get_lesmoment_by_klas_en_semester($klasId3, $semesterId3);
        $lesmomenten = array_merge($lesmomenten1, $lesmomenten2, $lesmomenten3);
        // $lesmomenten = $this->Lesmoment_model->get_lesmoment_by_klas_en_semester($klasId, $semesterId);
        $rooster = [];
        foreach ($lesmomenten as $lesmoment) {
            $vak = $this->Vak_model->get_vak($lesmoment['vakId']);
            if (
                in_array($vak['id'], json_decode($items, true)?:[])
                || in_array($vak['id'], json_decode($items2, true)?:[])
                || in_array($vak['id'], json_decode($items3, true)?:[])
            ) {
                $klas = $this->Klas_model->get_klas($lesmoment['klasId']);
                $rooster[$lesmoment['lesblok']][$lesmoment['weekdag']][$lesmoment['vakId']] = [
                    'lesblok' => $lesmoment['lesblok'],
                    'vakId'   => $vak['id'],
                    'vakNaam' => '['.$klas['naam'].'] '.$vak['naam'],
                ];
            }
        }
        $lesmomenten = $rooster;
        ob_start();
        ?><table class="table">
            <thead>
            <tr>
                <th></th>
                <th>Maandag</th>
                <th>Dinsdag</th>
                <th>Woensdag</th>
                <th>Donderdag</th>
                <th>Vrijdag</th>
            </tr>
            </thead>
            <tbody><?php
                for ($i = 1; $i <= 5; ++$i) {
                    if (isset($lesmomenten[$i])) {
                        $lesmoment = $lesmomenten[$i];
                        ?>
                        <tr>
                        <td><?php echo $i; ?></td><?php
                        for ($j = 0; $j <= 4; ++$j) {
                            if (isset($lesmoment[$j])) {
                                ?><td><?php
                                foreach ($lesmoment[$j] as $vakken) {
                                    echo $vakken['vakNaam'].'<br />';
                                }
                                ?></td><?php
                            } else {
                                ?>
                                <td></td><?php
                            }
                        }
                    } else {
                            ?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr><?php
                        }
                    }
                    ?></tbody>
                </table><?php
        $data = ob_get_clean();
        echo $data;
    }
}
