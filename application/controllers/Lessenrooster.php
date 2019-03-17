<?php

class Lessenrooster extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        $reader->setReadDataOnly(true);
        $classes = [];
        $spreadsheet = $reader->load("application/test/test.xlsx");
        $activeSheet = $spreadsheet->getSheet(0);
        foreach ($activeSheet->getColumnIterator() as $column) {
            if (!in_array($column->getColumnIndex(), ['A', 'B', 'K', 'L', 'M', 'R', 'S', 'T'])) {
                foreach ($column->getCellIterator() as $cell) {

                    if ($cell->getRow() >= 3) {
                        $className = $activeSheet->getCell($column->getColumnIndex().'2')->getValue();
                        $classes[$className][] = $cell->getValue();
                    }
                }
            }
        }
        foreach ($classes as $mainKey => $class) {
            $daily = array_chunk($class, 6);
            foreach ($daily as $key => $day) {
                $lastCheckedLesson = '';
                $hasUsedLesson = false;
                unset($day[5]);
                foreach ($day as $index=>$lesson) {
                    if ($this->aantalUurVoorVak($lesson) == 2 && (!$hasUsedLesson || $lastCheckedLesson !== $lesson)) {
                        $hasUsedLesson = true;
                        $lastCheckedLesson = $lesson;
                        $day[$index+1] = $lesson;
                    }
                }
                $daily[$key] = $day;
            }
            $classes[$mainKey] = $daily;
        }
        var_dump($classes);
        $data['_view'] = 'lessenrooster';
        $this->load->view('layouts/main', $data);
    }

    protected function aantalUurVoorVak($vakNaam)
    {
        $data = [
            'Python '                                                           => 2,
            'English for IT '                                                   => 1,
            'Webdesign basis '                                                  => 2,
            'PO 1 '                                                             => 2,
            'Linux '                                                            => 2,
            'IT essentials even weken'                                          => 2,
            'Netwerken essentials'                                              => 2,
            'IT essentials oneven weken'                                        => 2,
            'Netwerken essentials '                                             => 2,
            'Python'                                                            => 2,
            'Webdesign basis'                                                   => 2,
            'IT essentials  oneven weken'                                       => 2,
            'Linux Webservices'                                                 => 2,
            'PO2'                                                               => 2,
            'Ontwerpproject'                                                    => 1,
            'Engels groep A2 en groep B2'                                       => 1,
            'Windows server essentials'                                         => 2,
            'Eisenanalyse'                                                      => 2,
            'PHP'                                                               => 2,
            'Engels groep A1'                                                   => 1,
            'IoT advanced'                                                      => 2,
            'Business Essentials'                                               => 2,
            'Engels groep B1'                                                   => 1,
            'Frans groep C1'                                                    => 1,
            'Frans groep C2 en groep D2'                                        => 1,
            'Frans groep D1'                                                    => 1,
            'React'                                                             => 2,
            'Mobile development'                                                => 2,
            'PO3'                                                               => 2,
            'Angular '                                                          => 2,
            'Project 4.0 '                                                      => 2,
            'Angular Lite,  BI Lite, Emdev lite, Security Lite, Project Keulen' => 2,
            'Java advanced topics'                                              => 2,
            'sprekers Cyber security (Lite) '                                   => 2,
            'React '                                                            => 2,
            'SharePoint '                                                       => 2,
            'Business Intelligence w1-6 /SQL Server Analysis Services w7-12'    => 2,
            'Big data'                                                          => 2,
            'KNX home automation groep 1'                                       => 2,
            'KNX home automation groep 2'                                       => 2,
            'Cordova w1-6'                                                      => 2,
            'Communication technology'                                          => 2,
            'Embedded dev adv '                                                 => 2,
            'Emb interf advanced '                                              => 2,
            'Cyber sec def & for '                                              => 2,
            'Cyber security threat & risk '                                     => 2,
            'Cloud communication '                                              => 2,
            'Microsoft System Center'                                           => 2,
            'ITIL'                                                              => 2,
        ];
        if (isset($data[$vakNaam])) {
            return $data[$vakNaam];
        }
        return null;
    }
}
