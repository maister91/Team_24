<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Excel_export extends CI_Controller {
    /* @var Excel_export_model */
    public $excel_export_model;
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
            if($row->klasId ==null) {
                $row->klasId = "1";
            }
            if($row->afspraakId ==null) {
                $row->afspraakId = "1";
            }
            if($row->trajectId ==null) {
                $row->trajectId = "1";
            }
            if($row->achternaam ==null) {
                $row->achternaam = "1";
            }
            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row->gebruikertypeId);
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->klasId);
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->trajectId);
            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row->afspraakId);
            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row->voornaam);
            $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $row->achternaam);
            $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $row->email);
            $excel_row++;
        }
        header('Content-type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Studentgegevens.xls"');
        header('Cache-Control: max-age=0');
        $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel2007');
        $object_writer->save('php://output');
    }
    public function createXLS() {
        // create file name
        $fileName = 'data-'.time().'.xlsx';
        // load excel library
        $this->load->library('excel');
        $gebruikergegevens = $this->excel_export_model->fetch_data();
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        // set Header
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'gebruikertypeId');
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'email');
        // set Row
        $rowCount = 2;
        foreach ($gebruikergegevens as $k) {
            var_dump($k);
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $k->gebruikertypeId);
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $k->email);
            $rowCount++;
        }
        header('Content-type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="studentgegevens.xlsx"');
        header('Cache-Control: max-age=0');
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
    }
}