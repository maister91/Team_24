<?php
/**
 * @file error_db.php
 *
 * View waar de juiste error wordt weergeven aan de hand van een aangepaste foutboodschap
 * -gebruikt bootstrap
 */
?>

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

echo "\nDatabase error: ",
	$heading,
	"\n\n",
	$message,
	"\n\n";