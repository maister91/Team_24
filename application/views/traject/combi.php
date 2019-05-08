<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                <select id="klas_1" name="klassen" class="form-control">
                    <option value="0">--- Maak een keuze ---</option><?php
                    foreach ($klassen1 as $klas) {
                        echo '<option value="' . $klas['id'] . '">' . $klas['naam'] . '</option>';
                    }
                ?></select>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="form-group">
                <select id="semester_1" name="semester" class="form-control">
                    <option>1</option>
                    <option>2 </option>
                </select>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <select id="js_vakken_1" name="vakken" class="selectpicker form-control" multiple data-selected-text-format="count > 3" title="Selecteer de vakken die je wilt opnemen"></select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                <select id="klas_2" name="klassen" class="form-control">
                    <option value="0">--- Maak een keuze ---</option><?php
                    foreach ($klassen2 as $klas) {
                        echo '<option value="' . $klas['id'] . '">' . $klas['naam'] . '</option>';
                    }
                ?></select>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="form-group">
                <select id="semester_2" name="semester" class="form-control">
                    <option>1</option>
                    <option>2 </option>
                </select>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <select id="js_vakken_2" name="vakken" class="selectpicker form-control" multiple data-selected-text-format="count > 3" title="Selecteer de vakken die je wilt opnemen"></select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                <select id="klas_3" name="klassen" class="form-control">
                    <option value="0">--- Maak een keuze ---</option><?php
                    foreach ($klassen3 as $klas) {
                        echo '<option value="' . $klas['id'] . '">' . $klas['naam'] . '</option>';
                    }
                ?></select>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="form-group">
                <select id="semester_3" name="semester" class="form-control">
                    <option>1</option>
                    <option>2 </option>
                </select>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <select id="js_vakken_3" name="vakken" class="selectpicker form-control" multiple data-selected-text-format="count > 3" title="Selecteer de vakken die je wilt opnemen"></select>
            </div>
        </div>
    </div>
    <div class="row">
        <div id="feedback"></div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div id="lessenrooster">
            </div>
        </div>
    </div>
</div>
<?php
$alleVakIds = [];
foreach ($vakkenUniek as $vakken) {
    $alleVakIds[] = $vakken['id'];
}
?>
<br>
<br>
<?php echo form_open('Gebruiker/meldAf'); ?>
<button type='submit' name='Afmelden' class="btn btn-primary">Afmelden</button>
<?php echo form_close(); ?>
<script type="text/javascript">
    $(function() {
        var vakken = JSON.stringify(<?php echo json_encode($alleVakIds); ?>);
        $('select').selectpicker();
        $('#js_vakken_1, #js_vakken_2, #js_vakken_3').change(function() {
            var klasId = $('#klas_1').val();
            var semesterId = $('#semester_1').val();
            var klasId2 = $('#klas_2').val();
            var semesterId2 = $('#semester_2').val();
            var klasId3 = $('#klas_3').val();
            var semesterId3 = $('#semester_3').val();
            $('#feedback').html('<p class="alert-info"><strong>Bezig met het ophalen van de aangepaste lessenrooster...</strong></p>');
            $.ajax({
                type: "POST",
                url: "<?php echo site_url("traject/ajaxRequestPost"); ?>",
                data: {
                    items: JSON.stringify($('#js_vakken_1').val()),
                    items2: JSON.stringify($('#js_vakken_2').val()),
                    items3: JSON.stringify($('#js_vakken_3').val()),
                    klasId1: klasId,
                    klasId2: klasId2,
                    klasId3: klasId3,
                    semesterId1: semesterId,
                    semesterId2: semesterId2,
                    semesterId3: semesterId3
                },
                success: function(data){
                    $('#feedback').html('<p class="alert-success"><strong>Klaar!</strong></p>');
                    $('#lessenrooster').html(data);
                },
                failure: function(errMsg) {
                    alert(errMsg);
                }
            });
        });
        $('#klas_1, #semester_1').change(function() {
            var klasId = $('#klas_1').val();
            var semesterId = $('#semester_1').val();
            $.ajax({
                type: "POST",
                url: "<?php echo site_url("traject/ajaxRequestVakken"); ?>",
                data: {klasId: klasId, semesterId: semesterId},
                success: function(data){
                    $('#js_vakken_1').html(data).selectpicker('refresh');
                },
                failure: function(errMsg) {
                    console.log('fail');
                }
            });
        });
        $('#klas_2, #semester_2').change(function() {
            var klasId = $('#klas_2').val();
            var semesterId = $('#semester_2').val();
            $.ajax({
                type: "POST",
                url: "<?php echo site_url("traject/ajaxRequestVakken"); ?>",
                data: {klasId: klasId, semesterId: semesterId},
                success: function(data){
                    $('#js_vakken_2').html(data).selectpicker('refresh');
                },
                failure: function(errMsg) {
                    console.log('fail');
                }
            });
        });
        $('#klas_3, #semester_3').change(function() {
            var klasId = $('#klas_3').val();
            var semesterId = $('#semester_3').val();
            $.ajax({
                type: "POST",
                url: "<?php echo site_url("traject/ajaxRequestVakken"); ?>",
                data: {klasId: klasId, semesterId: semesterId},
                success: function(data){
                    $('#js_vakken_3').html(data).selectpicker('refresh');
                },
                failure: function(errMsg) {
                    console.log('fail');
                }
            });
        });
    });
</script>
