<?php

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
        $data['klas'] = $this->Klas_model->get_all_klas();
        $partials = ['hoofding' => 'main_header',
            'inhoud'   => 'klas/export',
            'voetnoot' => 'main_footer'];
        $this->template->load('main_master', $partials, $data);
    }

    function index_beheren()
    {
        $data['titel'] = 'Klassen beheren';
        $data['klas'] = $this->Klas_model->get_all_klas();
        $partials = ['hoofding' => 'main_header',
            'inhoud'   => 'klas/beheren',
            'voetnoot' => 'main_footer'];
        $this->template->load('main_master', $partials, $data);
    }

    function index_aanpassen()
    {
        $data['titel'] = 'Klassen toevoegen';
        $data['klas'] = $this->Klas_model->get_all_klas();
        $partials = ['hoofding' => 'main_header',
            'inhoud'   => 'klas/aanpassen',
            'voetnoot' => 'main_footer'];
        $this->template->load('main_master', $partials, $data);
    }

    public function createXLS() {
        // create file name
        $fileName = 'data-'.time().'.xlsx';
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
        if (isset($_POST) && count($_POST)>0) {
            $params = [
                'naam'      => $this->input->post('naam'),
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
            if (isset($_POST) && count($_POST)>0) {
                $params = [
                    'naam'      => $this->input->post('naam'),
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

}
