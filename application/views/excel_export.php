wex<html>
<head>
    <title>Export Data to Excel in Codeigniter using PHPExcel</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/js/bootstrap.min.js"></script>

</head>
<body>
<div class="container box">
    <h3 align="center">Studentgegevens exporteren</h3>
    <br />
    <div class="table-responsive">
        <table class="table table-bordered">
            <tr>
                <th>gebruikertypdeId</th>
                <th>klasId</th>
                <th>TrajectId</th>
                <th>afspraakId</th>
                <th>Voornaam</th>
                <th>Achternaam</th>
                <th>Email</th>
            </tr>
            <?php
            foreach($gebruikergegevens as $row)
            {


                echo '
     <tr>
      <td>'.$row->gebruikertypeId.'</td>
      <td>'.$row->klasId.'</td>
      <td>'.$row->trajectId.'</td>
      <td>'.$row->afspraakId.'</td>
      <td>'.$row->voornaam.'</td>
      <td>'.$row->achternaam.'</td>
      <td>'.$row->email.'</td>
     </tr>
     ';
            }
            ?>
        </table>
        <div align="center">
            <form method="post" action="<?php echo base_url(); ?>excel_export/createXLS">
                <input type="submit" name="export" class="btn btn-success" value="Export" />
            </form>
        </div>
        <br />
        <br />
    </div>
</div>
</body>
</html>
