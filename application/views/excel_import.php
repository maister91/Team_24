<?php
/**
 * @file excel_import.php
 *
 * View die de import van de excel toont
 * - gebruikt bootstrap
 */
?>
<br/>
<h3 align="center">Uurrooster importeren</h3>
<form action="<?php echo base_url(); ?>index.php/excel_import/import" method="post" id="import_form"
      enctype="multipart/form-data">
    <p><label>Select Excel File</label>
    </p>
    <p><input type="file" name="file" id="file" required accept=".xls, .xlsx"/></p>
    <br/>
    <input type="submit" name="import" value="Import" class="btn btn-info"/>
</form>
<br/>
<div class="table-responsive" id="customer_data">
</div>
<p><?php echo anchor('gebruikertype/opleidingmanager', 'Terug'); ?></p>
