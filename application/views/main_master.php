<!doctype html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        <?php echo $titel; ?>
    </title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
          integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU"
          crossorigin="anonymous">
    <?php echo pasStylesheetAan('css/style.css'); ?>
</head>

<body>
<div id="container">
    <div id="hoofding">
        <?php echo $hoofding; ?>
    </div>
    <div id="inhoud">
        <h4>
            <?php echo $titel; ?>
        </h4>
        <?php echo $inhoud; ?>
    </div>
</div>

<div id="voetnoot">
    <?php echo $voetnoot; ?>
</div>

</body>

</html>
