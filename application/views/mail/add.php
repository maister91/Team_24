<?php echo form_open('mail/add',array("class"=>"form-horizontal")); ?>

	<div class="form-group">
		<label for="onderwerp" class="col-md-4 control-label">Onderwerp</label>
		<div class="col-md-8">
			<input type="text" name="onderwerp" value="<?php echo $this->input->post('onderwerp'); ?>" class="form-control" id="onderwerp" />
		</div>
	</div>
	<div class="form-group">
		<label for="beschrijving" class="col-md-4 control-label">Beschrijving</label>
		<div class="col-md-8">
			<input type="text" name="beschrijving" value="<?php echo $this->input->post('beschrijving'); ?>" class="form-control" id="beschrijving" />
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>

<?php echo form_close(); ?>