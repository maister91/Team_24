<!doctype html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        <?php echo $titel; ?>
    </title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.3.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <?php echo pasStylesheetAan('css/style.css'); ?>
</head>

<body>
<div id="hoofding">
    <?php echo $hoofding; ?>
</div>
<div id="inhoud">
    <h4>
        <?php echo $titel; ?>
    </h4>
    <?php echo $inhoud; ?>
</div>
<div id="voetnoot">
    <?php echo $voetnoot; ?>
</div>
</body>

</html>
