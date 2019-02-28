<?php echo form_open('afspraak/add',array("class"=>"form-horizontal")); ?>

	<div class="form-group">
		<label for="studentId" class="col-md-4 control-label">StudentId</label>
		<div class="col-md-8">
			<input type="text" name="studentId" value="<?php echo $this->input->post('studentId'); ?>" class="form-control" id="studentId" />
		</div>
	</div>
	<div class="form-group">
		<label for="docentId" class="col-md-4 control-label">DocentId</label>
		<div class="col-md-8">
			<input type="text" name="docentId" value="<?php echo $this->input->post('docentId'); ?>" class="form-control" id="docentId" />
		</div>
	</div>
	<div class="form-group">
		<label for="lokaalId" class="col-md-4 control-label">LokaalId</label>
		<div class="col-md-8">
			<input type="text" name="lokaalId" value="<?php echo $this->input->post('lokaalId'); ?>" class="form-control" id="lokaalId" />
		</div>
	</div>
	<div class="form-group">
		<label for="tijdslot" class="col-md-4 control-label">Tijdslot</label>
		<div class="col-md-8">
			<input type="text" name="tijdslot" value="<?php echo $this->input->post('tijdslot'); ?>" class="form-control" id="tijdslot" />
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>

<?php echo form_close(); ?>