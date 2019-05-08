<?php echo form_open('gebruikeradmin/editStudent/'.$gebruiker['id'],array("class"=>"form-horizontal")); ?>

    <div class="form-group">
        <label for="gebruikertypeId" class="col-md-4 control-label">Gebruikertype</label>
        <div class="col-md-8">
            <select name="gebruikertypeId" class="form-control">
                <option value="">select gebruikertype</option>
                <?php
                foreach($all_gebruikertype as $gebruikertype)
                {
                    $selected = ($gebruikertype['id'] == $gebruiker['gebruikertypeId']) ? ' selected="selected"' : "";
                    echo '<option value="'.$gebruikertype['id'].'" '.$selected.'>'.$gebruikertype['beschrijving'].'</option>';
                }
                ?>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="klasId" class="col-md-4 control-label">Klas</label>
        <div class="col-md-8">
            <select name="klasId" class="form-control">
                <option value="">select klas</option>
                <?php
                foreach($all_klassen as $klas)
                {
                    $selected = ($klas['id'] == $gebruiker['klasId']) ? ' selected="selected"' : "";
                    echo '<option value="'.$klas['id'].'" '.$selected.'>'.$klas['naam'].'</option>';
                }
                ?>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="trajectId" class="col-md-4 control-label">Traject</label>
        <div class="col-md-8">
            <select name="trajectId" class="form-control">
                <option value="">select traject</option>
                <?php
                foreach($all_traject as $traject)
                {
                    $selected = ($traject['id'] == $gebruiker['trajectId']) ? ' selected="selected"' : "";
                    echo '<option value="'.$traject['id'].'" '.$selected.'>'.$traject['naam'].'</option>';
                }
                ?>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="afspraakId" class="col-md-4 control-label">Afspraak</label>
        <div class="col-md-8">
            <select name="afspraakId" class="form-control">
                <option value="">select afspraak</option>
                <?php
                foreach($all_afspraak as $afspraak)
                {
                    $selected = ($afspraak['id'] == $gebruiker['afspraakId']) ? ' selected="selected"' : "";
                    echo '<option value="'.$afspraak['id'].'" '.$selected.'>'.$afspraak['id'].'</option>';
                }
                ?>
            </select>
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
        <label for="email" class="col-md-4 control-label">Email</label>
        <div class="col-md-8">
            <input type="text" name="email" value="<?php echo ($this->input->post('email') ? $this->input->post('email') : $gebruiker['email']); ?>" class="form-control" id="email" />
        </div>
    </div>
    <div class="form-group">
        <label for="paswoord" class="col-md-4 control-label">Paswoord</label>
        <div class="col-md-8">
            <input type="text" name="paswoord" value="<?php echo ($this->input->post('paswoord') ? $this->input->post('paswoord') : $gebruiker['paswoord']); ?>" class="form-control" id="paswoord" />
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-4 col-sm-8">
            <button type="submit" class="btn btn-success">Save</button>
        </div>
    </div>

<?php echo form_close(); ?>