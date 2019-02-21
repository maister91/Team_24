<?php echo form_open('afspraak/edit/'.$afspraak['id'],array("class"=>"form-horizontal")); ?>

	<div class="form-group">
		<label for="tijdSlot" class="col-md-4 control-label"><span class="text-danger">*</span>TijdSlot</label>
		<div class="col-md-8">
			<input type="text" name="tijdSlot" value="<?php echo ($this->input->post('tijdSlot') ? $this->input->post('tijdSlot') : $afspraak['tijdSlot']); ?>" class="form-control" id="tijdSlot" />
			<span class="text-danger"><?php echo form_error('tijdSlot');?></span>
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>
	
<?php echo form_close(); ?>