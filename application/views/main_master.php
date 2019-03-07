<!doctype html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        <?php echo $titel; ?>
    </title>
    <?php echo pasStylesheetAan('style.css'); ?>
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
    <div id="menu">
        <?php echo $menu; ?>
    </div>
    <div id="voetnoot">
        <?php echo $voetnoot; ?>
    </div>
</body>

</html>
