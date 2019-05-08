<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property Template $template
 * @property Excel_export_model $excel_export_model
 */

class Excel_export extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('excel_export_model');
        $this->load->library('excel');
    }
    function index()
    {
        $this->load->model("excel_export_model");
        $data["gebruikergegevens"] = $this->excel_export_model->fetch_data();
        $data['_view']       = 'excel_export';
        $this->load->view('layouts/main', $data);
    }

    function action()
    {
        $this->load->model("excel_export_model");
        $this->load->library("excel");
        $object = new PHPExcel();

        $object->setActiveSheetIndex(0);

        $table_columns = array("gebruikertypeId", "klasId", "trajectId", "afspraakId", "voornaam","achternaam","email");

        $column = 0;

        foreach($table_columns as $field)
        {
            $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
            $column++;
        }

        $gebruikergegevens = $this->excel_export_model->fetch_data();

        $excel_row = 2;

        foreach($gebruikergegevens as $row)
        {
            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row->gebruikertypeId);
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->klasId);
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->trajectId);
            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row->afspraakId);
            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row->voornaam);
            $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $row->achternaam);
            $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $row->email);
            $excel_row++;
        }

        $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel2007');
        header('application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Gebruikergegevens.xlsx"');
        $object_writer->save('php://output');
    }



}
