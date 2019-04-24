<?php
/**
 * @file indexAdmin.php
 *
 * View waar je de verschillende trajecten kan bewerken
 * -gebruikt bootstrap
 */
?>

    <h2>Ingelogd als
        <?php
        $gebruiker = $this->authex->getGebruikerInfo();
        echo '<b>' . $gebruiker->voornaam . ' ' . $gebruiker->achternaam . '</b> ';
        ?>
    </h2>

    <div class="pull-right">
        <a href="<?php echo site_url('traject/add'); ?>" class="btn btn-success">Add</a>
    </div>


    <table class="table table-striped table-bordered">
        <tr>
            <th>ID</th>
            <th>Naam</th>
            <th>Beschrijving</th>
            <th>Actions</th>
        </tr>
        <?php foreach($traject as $t){ ?>
            <tr>
                <td><?php echo $t['id']; ?></td>
                <td><?php echo $t['naam']; ?></td>
                <td><?php echo $t['beschrijving']; ?></td>
                <td>
                    <a href="<?php echo site_url('traject/edit/'.$t['id']); ?>" class="btn btn-info btn-xs">Edit</a>
                    <a href="<?php echo site_url('traject/remove/'.$t['id']); ?>" class="btn btn-danger btn-xs">Delete</a>
                </td>
            </tr>

        <?php } ?>

    </table>

    Welkom
<?php
$gebruiker = $this->authex->getGebruikerInfo();
echo '<b>' . $gebruiker->voornaam . '</b> ';
?>


<?php echo divAnchor('Gebruiker/meldAf', 'Afmelden');?>