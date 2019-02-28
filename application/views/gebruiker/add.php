<?php echo form_open('gebruiker/add',array("class"=>"form-horizontal")); ?>

	<div class="form-group">
		<label for="gebruikertypeId" class="col-md-4 control-label">GebruikertypeId</label>
		<div class="col-md-8">
			<input type="text" name="gebruikertypeId" value="<?php echo $this->input->post('gebruikertypeId'); ?>" class="form-control" id="gebruikertypeId" />
		</div>
	</div>
	<div class="form-group">
		<label for="klasId" class="col-md-4 control-label">KlasId</label>
		<div class="col-md-8">
			<input type="text" name="klasId" value="<?php echo $this->input->post('klasId'); ?>" class="form-control" id="klasId" />
		</div>
	</div>
	<div class="form-group">
		<label for="trajectId" class="col-md-4 control-label">TrajectId</label>
		<div class="col-md-8">
			<input type="text" name="trajectId" value="<?php echo $this->input->post('trajectId'); ?>" class="form-control" id="trajectId" />
		</div>
	</div>
	<div class="form-group">
		<label for="afspraakId" class="col-md-4 control-label">AfspraakId</label>
		<div class="col-md-8">
			<input type="text" name="afspraakId" value="<?php echo $this->input->post('afspraakId'); ?>" class="form-control" id="afspraakId" />
		</div>
	</div>
	<div class="form-group">
		<label for="voornaam" class="col-md-4 control-label">Voornaam</label>
		<div class="col-md-8">
			<input type="text" name="voornaam" value="<?php echo $this->input->post('voornaam'); ?>" class="form-control" id="voornaam" />
		</div>
	</div>
	<div class="form-group">
		<label for="achternaam" class="col-md-4 control-label">Achternaam</label>
		<div class="col-md-8">
			<input type="text" name="achternaam" value="<?php echo $this->input->post('achternaam'); ?>" class="form-control" id="achternaam" />
		</div>
	</div>
	<div class="form-group">
		<label for="email" class="col-md-4 control-label">Email</label>
		<div class="col-md-8">
			<input type="text" name="email" value="<?php echo $this->input->post('email'); ?>" class="form-control" id="email" />
		</div>
	</div>
	<div class="form-group">
		<label for="passwoord" class="col-md-4 control-label">Passwoord</label>
		<div class="col-md-8">
			<input type="text" name="passwoord" value="<?php echo $this->input->post('passwoord'); ?>" class="form-control" id="passwoord" />
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>

<?php echo form_close(); ?>