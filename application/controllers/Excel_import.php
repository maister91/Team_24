<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @class Excel_import
 * @brief Controller-klasse voor Excel_import
 *
 * Controller-klasse met alle methodes voor de import van excel bestanden
 */
class Excel_import extends CI_Controller
{

    /* @var Excel_import_model */
    public $excel_import_model;

    /**
     * Excel_import constructor.
     */
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

    /**
     * Toont de excel import index pagina
     *
     * @see excel_import.php
     */
    function index()
    {
        $data['titel'] = 'Importeer uurrooster';
        $data['ontwikkelaar'] = 'Melih Doksanbir';
        $data['tester'] = 'Thomas Dergent';

        $partials = ['hoofding' => 'main_header',
            'inhoud' => 'excel_import',
            'voetnoot' => 'main_footer'];

        $this->template->load('main_master', $partials, $data);

    }

    /**
     * Alle records uit excel halen en in een tabel van de database zetten
     *
     * @see klas_model::getKlasByName()
     * @see klas_model::insert()
     * @see richting_model::get_richting_by_name()
     * @see richting_model::insertRichting()
     * @see vak_model::get_vak_by_name_richting_fase()
     * @see vak_model::insertVak()
     * @see lesmoment_model::insertLesmoment()
     */
    function import()
    {
        if (isset($_FILES["file"]["name"])) {
            $path   = $_FILES["file"]["tmp_name"];
            try {
                $lessenRooster = $this->importVanExcel($path);
                foreach ($lessenRooster as $klasNaam => $rooster) {
                    if ($this->klas_model->getKlasByName($klasNaam) == null) {
                        $this->klas_model->insert(['naam'=>$klasNaam, 'maxAantal'=>25]);
                    }
                    $richting = explode(' ', $klasNaam);
                    if ($this->richting_model->get_richting_by_name($richting[1]) == null) {
                        $this->richting_model->insertRichting(['naam'=>$richting[1]]);
                    }
                    foreach ($rooster as $weekdagId => $vakken) {
                        $klas = $this->klas_model->getKlasByName($klasNaam);
                        $richtingModel = $this->richting_model->get_richting_by_name($richting[1]);
                        foreach ($vakken as $lesBlok => $vak) {
                            if ($vak !== null) {
                                if ($this->vak_model->get_vak_by_name_richting_fase($vak, $richtingModel['id'], $richting[0]) == null) {
                                    $this->vak_model->insertVak(
                                        [
                                            'richtingId' => $richtingModel['id'],
                                            'naam'       => $vak,
                                            'fase'       => $richting[0],
                                        ]
                                    );
                                }
                                $this->lesmoment_model->insertLesmoment(
                                    [
                                        'weekdag'   => $weekdagId<=4?$weekdagId:$weekdagId-5,
                                        'klasId'    => $klas['id'],
                                        'lesblok'   => $lesBlok+1,
                                        'maxAantal' => '25',
                                        'vakId'     => $this->vak_model->get_vak_by_name_richting_fase($vak, $richtingModel['id'], $richting[0])['id'],
                                        'semester'  => $weekdagId>=5?2:1,
                                    ]
                                );
                            }
                        }
                    }
                }
            } catch (Exception $exception) {
                echo 'Er is iets mis gegaan met de import: '.$exception->getMessage();
            }
            echo 'Data Imported successfully';
        }
    }

    /**
     * importeert gegevens van een excel naar database
     * @param $path het pad naar het excel bestand
     * @return klassen
     */
    protected function importVanExcel($path)
    {
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        $reader->setReadDataOnly(true);
        $classes = [];
        $spreadsheet = $reader->load($path);
        foreach ($spreadsheet->getAllSheets() as $sheetIndex => $activeSheet) {
            foreach ($activeSheet->getColumnIterator() as $index => $column) {
                if (
                    ($sheetIndex == 0 && !in_array($column->getColumnIndex(), ['A', 'B', 'K', 'L', 'M', 'R', 'S', 'T']))
                    ||($sheetIndex == 1 && !in_array($column->getColumnIndex(), ['A', 'B', 'I', 'J', 'K']))
                ) {
                    foreach ($column->getCellIterator() as $cell) {
                        if ($cell->getRow() >= 3) {
                            $className = $activeSheet->getCell($column->getColumnIndex().'2')->getValue();
                            $classes[$className][] = $cell->getValue();
                        }
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
        return $classes;
    }

    /**
     * Geeft het aantal uur voor een bepaald vak terug
     *
     * @param $vakNaam
     * @return aantal uur voor bepaald vak
     */
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
            'Angular '                                                          => 3,
            'Project 4.0 '                                                      => 2,
            'Angular Lite,  BI Lite, Emdev lite, Security Lite, Project Keulen' => 2,
            'Java advanced topics'                                              => 2,
            'sprekers Cyber security (Lite) '                                   => 2,
            'React '                                                            => 2,
            'SharePoint '                                                       => 2,
            'Business Intelligence w1-6 /SQL Server Analysis Services w7-12'    => 5,
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
            'Windows'                                                           => 2,
            'English'                                                           => 1,
            'Netwerken Routing&Switching'                                       => 2,
            'IoT essentials'                                                    => 2,
            'Java'                                                              => 2,
            'HTML5'                                                             => 1,
            'SQL Tinne E202'                                                    => 2,
            'SQL'                                                               => 2,
            'WPF w1-6 /ASP.NET w7-12'                                           => 2,
            'WPF w1-6 /ASP.NET w7-12 lesgroep 3'                                => 1,
            'WPF w1-6 /ASP.NET w7-12 lesgroepen 1 en 2'                         => 1,
            'Frans of Engels lesgroepen 1 en 2'                                 => 1,
            'Bus Pr&ITIL w1-5 / Project APP-BIT w7-12'                          => 2,
            'Cordova w1-6 '                                                     => 2,
            'Project APP-BIT '                                                  => 2,
            'UML w1-7 / Java w8-12'                                             => 2,
            'Bus Processen & ITIL'                                              => 2,
            'Frans of Engels IOT en APP lesgroep 3'                             => 1,
            'Cordova w1-6 / Project APP-BIT w7-12'                              => 2,
            'Bus Processen & ITIL w1-5'                                         => 2,
            'Smart Homes Technology'                                            => 2,
            'Embedded interfacing'                                              => 1,
            'Project IoT '                                                      => 2,
            'Wireless systems'                                                  => 2,
            'Programmable IoT devices'                                          => 2,
            'Embedded devices'                                                  => 2,
            'Linux network services'                                            => 2,
            'Datacenter Technology'                                             => 1,
            'Frans of Engels'                                                   => 1,
            'Scaling networks'                                                  => 2,
            'Project Hosting'                                                   => 2,
            'Database management'                                               => 2,
            'Windows server advanced'                                           => 2,
        ];
        if (isset($data[$vakNaam])) {
            return $data[$vakNaam];
        }
        return null;
    }

    /**
     * zet id van weekdag om naar een dag in text
     *
     * @param $weekdagId
     * @return weekdag in tekst
     */
    protected function weekDagIdNaarTekst($weekdagId)
    {
        $weekdagen = [
            0 => 'maandag',
            1 => 'dinsdag',
            2 => 'woensdag',
            3 => 'donderdag',
            4 => 'vrijdag',
            5 => 'maandag',
            6 => 'dinsdag',
            7 => 'woensdag',
            8 => 'donderdag',
            9 => 'vrijdag',
        ];
        return $weekdagen[$weekdagId];
    }
}

?>
