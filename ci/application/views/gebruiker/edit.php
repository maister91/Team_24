<?php echo form_open('gebruiker/edit/'.$gebruiker['idGebruiker'],array("class"=>"form-horizontal")); ?>

	<div class="form-group">
		<label for="passwoord" class="col-md-4 control-label"><span class="text-danger">*</span>Passwoord</label>
		<div class="col-md-8">
			<input type="text" name="passwoord" value="<?php echo ($this->input->post('passwoord') ? $this->input->post('passwoord') : $gebruiker['passwoord']); ?>" class="form-control" id="passwoord" />
			<span class="text-danger"><?php echo form_error('passwoord');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="voornaam" class="col-md-4 control-label">Voornaam</label>
		<div class="col-md-8">
			<input type="text" name="voornaam" value="<?php echo ($this->input->post('voornaam') ? $this->input->post('voornaam') : $gebruiker['voornaam']); ?>" class="form-control" id="voornaam" />
		</div>
	</div>
	<div class="form-group">
		<label for="achternaam" class="col-md-4 control-label">Achternaam</label>
		<div class="col-md-8">
			<input type="text" name="achternaam" value="<?php echo ($this->input->post('achternaam') ? $this->input->post('achternaam') : $gebruiker['achternaam']); ?>" class="form-control" id="achternaam" />
		</div>
	</div>
	<div class="form-group">
		<label for="email" class="col-md-4 control-label"><span class="text-danger">*</span>Email</label>
		<div class="col-md-8">
			<input type="text" name="email" value="<?php echo ($this->input->post('email') ? $this->input->post('email') : $gebruiker['email']); ?>" class="form-control" id="email" />
			<span class="text-danger"><?php echo form_error('email');?></span>
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>
	
<?php echo form_close(); ?>