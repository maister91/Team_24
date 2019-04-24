<?php
/**
 * @file excel_export.php
 *
 * View die de import van de excel toont
 * - gebruikt bootstrap
 */
?>
<!DOCTYPE html>
<html>
<head>
    <title>Uurrooster Importeren</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/bootstrap.min.css"/>
    <script src="<?php echo base_url(); ?>asset/jquery.min.js"></script>
</head>

<body>
<div class="container">
    <br/>
    <h3 align="center">Uurrooster importeren</h3>
    <form action="<?php echo base_url(); ?>index.php/excel_import/import" method="post" id="import_form"
          enctype="multipart/form-data">
        <p><label>Select Excel File</label>
            <input type="file" name="file" id="file" required accept=".xls, .xlsx"/></p>
        <br/>
        <input type="submit" name="import" value="Import" class="btn btn-info"/>
    </form>
    <br/>
    <div class="table-responsive" id="customer_data">
    </div>
</div>
<p><?php echo anchor('gebruikertype/opleidingmanager', 'Terug'); ?></p>
</body>
</html>

<script>