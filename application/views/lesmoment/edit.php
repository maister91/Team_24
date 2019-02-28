<?php
/**
 * @file edit.php
 *
 * View waar een lesmoment kan worden aangepast
 * -gebruikt bootstrap
 */
?>

<?php echo form_open('lesmoment/edit/'.$lesmoment['id'],array("class"=>"form-horizontal")); ?>

	<div class="form-group">
		<label for="klasId" class="col-md-4 control-label">KlasId</label>
		<div class="col-md-8">
			<input type="text" name="klasId" value="<?php echo ($this->input->post('klasId') ? $this->input->post('klasId') : $lesmoment['klasId']); ?>" class="form-control" id="klasId" />
		</div>
	</div>
	<div class="form-group">
		<label for="vakId" class="col-md-4 control-label">VakId</label>
		<div class="col-md-8">
			<input type="text" name="vakId" value="<?php echo ($this->input->post('vakId') ? $this->input->post('vakId') : $lesmoment['vakId']); ?>" class="form-control" id="vakId" />
		</div>
	</div>
	<div class="form-group">
		<label for="richtingId" class="col-md-4 control-label">RichtingId</label>
		<div class="col-md-8">
			<input type="text" name="richtingId" value="<?php echo ($this->input->post('richtingId') ? $this->input->post('richtingId') : $lesmoment['richtingId']); ?>" class="form-control" id="richtingId" />
		</div>
	</div>
	<div class="form-group">
		<label for="weekdag" class="col-md-4 control-label">Weekdag</label>
		<div class="col-md-8">
			<input type="text" name="weekdag" value="<?php echo ($this->input->post('weekdag') ? $this->input->post('weekdag') : $lesmoment['weekdag']); ?>" class="form-control" id="weekdag" />
		</div>
	</div>
	<div class="form-group">
		<label for="lesblok" class="col-md-4 control-label">Lesblok</label>
		<div class="col-md-8">
			<input type="text" name="lesblok" value="<?php echo ($this->input->post('lesblok') ? $this->input->post('lesblok') : $lesmoment['lesblok']); ?>" class="form-control" id="lesblok" />
		</div>
	</div>
	<div class="form-group">
		<label for="maxAantal" class="col-md-4 control-label">MaxAantal</label>
		<div class="col-md-8">
			<input type="text" name="maxAantal" value="<?php echo ($this->input->post('maxAantal') ? $this->input->post('maxAantal') : $lesmoment['maxAantal']); ?>" class="form-control" id="maxAantal" />
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>
	
<?php echo form_close(); ?>