<?php
/**
 * @file error_general.php
 *
 * View waar de juiste error wordt weergeven aan de hand van een aangepaste foutboodschap
 * -gebruikt bootstrap
 */
?>

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

echo "\nERROR: ",
	$heading,
	"\n\n",
	$message,
	"\n\n";