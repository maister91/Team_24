<?php echo form_open('vak/edit/'.$vak['id'],array("class"=>"form-horizontal")); ?>

	<div class="form-group">
		<label for="richtingId" class="col-md-4 control-label">RichtingId</label>
		<div class="col-md-8">
			<input type="text" name="richtingId" value="<?php echo ($this->input->post('richtingId') ? $this->input->post('richtingId') : $vak['richtingId']); ?>" class="form-control" id="richtingId" />
		</div>
	</div>
	<div class="form-group">
		<label for="naam" class="col-md-4 control-label">Naam</label>
		<div class="col-md-8">
			<input type="text" name="naam" value="<?php echo ($this->input->post('naam') ? $this->input->post('naam') : $vak['naam']); ?>" class="form-control" id="naam" />
		</div>
	</div>
	<div class="form-group">
		<label for="beschrijving" class="col-md-4 control-label">Beschrijving</label>
		<div class="col-md-8">
			<input type="text" name="beschrijving" value="<?php echo ($this->input->post('beschrijving') ? $this->input->post('beschrijving') : $vak['beschrijving']); ?>" class="form-control" id="beschrijving" />
		</div>
	</div>
	<div class="form-group">
		<label for="studiepunt" class="col-md-4 control-label">Studiepunt</label>
		<div class="col-md-8">
			<input type="text" name="studiepunt" value="<?php echo ($this->input->post('studiepunt') ? $this->input->post('studiepunt') : $vak['studiepunt']); ?>" class="form-control" id="studiepunt" />
		</div>
	</div>
	<div class="form-group">
		<label for="fase" class="col-md-4 control-label">Fase</label>
		<div class="col-md-8">
			<input type="text" name="fase" value="<?php echo ($this->input->post('fase') ? $this->input->post('fase') : $vak['fase']); ?>" class="form-control" id="fase" />
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>
	
<?php echo form_close(); ?>