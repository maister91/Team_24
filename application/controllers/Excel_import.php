<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @property Klas_model      $klas_model
 * @property Lesmoment_model $lesmoment_model
 * @property Richting_model  $richting_model
 * @property Vak_model       $vak_model
 */
class Excel_import extends CI_Controller
{

    /* @var Excel_import_model */
    public $excel_import_model;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('excel_import_model');
        $this->load->model('klas_model');
        $this->load->model('lesmoment_model');
        $this->load->model('richting_model');
        $this->load->model('vak_model');
        $this->load->library('excel');
    }

    function index()
    {
        $this->load->view('excel_import');

    }

    function fetch()
    {
        $data   = $this->excel_import_model->select();
        $output = '
  <h3 align="center">Total Data - '.$data->num_rows().'</h3>
  <table class="table table-striped table-bordered">
   <tr>
   <th>Vak</th>
    <th>Weekdag</th>
    <th>Lesblok</th>
    <th>Richting</th>
    <th>Klas</th>
    <th>maxAantal</th>
   </tr>
  ';
        foreach ($data->result() as $row) {
            $output .= '
               <tr>
               <td>'.$row->vakId.'</td>
                <td>'.$row->weekdag.'</td>   
                <td>'.$row->lesblok.'</td>
                <td>'.$row->richtingId.'</td>
                <td>'.$row->klasId.'</td>
                <td>'.$row->maxAantal.'</td>
                
               </tr>
           ';
        }
        $output .= '</table>';
        echo $output;
    }

    function import()
    {
        if (isset($_FILES["file"]["name"])) {
            $path   = $_FILES["file"]["tmp_name"];
            $object = PHPExcel_IOFactory::load($path);
            foreach ($object->getWorksheetIterator() as $worksheet) {
                $highestRow    = $worksheet->getHighestRow();
                $highestColumn = $worksheet->getHighestColumn();
                for ($row = 2; $row<=$highestRow; $row++) {
                    $vak       = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                    $weekdag   = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                    $lesblok   = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                    $richting  = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                    $klas      = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                    $maxAantal = $worksheet->getCellByColumnAndRow(5, $row)->getValue();

                    $data   = [
                        'naam'      => $klas ?? '',
                        'maxAantal' => $maxAantal ?? 0,
                    ];
                    $klasId = $this->klas_model->insert($data);

                    $dataRichting = [
                        'naam' => $richting ?? 0,
                    ];
                    $richtingId   = $this->richting_model->insertRichting($dataRichting);

                    $dataVak = [
                        'naam'       => $vak ?? '',
                        'richtingId' => $richtingId,
                    ];
                    $vakId   = $this->vak_model->insertVak($dataVak);
                    if ($weekdag!==null) {
                        $dataLesmoment = [
                            'weekdag'    => $weekdag,
                            'lesblok'    => $lesblok,
                            'klasId'     => $klasId,
                            'vakId'      => $vakId,
                            'richtingId' => $richtingId,
                        ];
                        $this->lesmoment_model->insertLesmoment($dataLesmoment);
                    }

                }
            }
            echo 'Data Imported successfully';
        }
    }
}

?>
