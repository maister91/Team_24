<?php
/**
 * Created by PhpStorm.
 * User: Melih
 * Date: 25/02/2019
 * Time: 16:09
 */
if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH."third_party/PHPExcel.php";

class Excel extends PHPExcel {
    public function __construct() {
        parent::__construct();
    }
}