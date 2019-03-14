<?php
/**
 * @file layout.php
 *
 * View waar de layout wordt opgebouwd
 * -gebruikt bootstrap
 */
?>

<!DOCTYPE html>
<html>

	<head>
		<title></title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

	    <!-- CSS styles -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	    <!-- JS Libs -->

        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <?php echo pasStylesheetAan('css/style.css'); ?>
	</head>

	<body>

	<?php	if(isset($_view) && $_view)
	    $this->load->view($_view);
	?>
	</body>
</html>
