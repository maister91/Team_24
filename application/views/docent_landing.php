<?php
/**
 * @file index.php
 *
 * View waar je de verschillende trajecten kan bekijken
 * -gebruikt bootstrap
 */
?>

<h2>Ingelogd als
    <?php
    $gebruiker = $this->authex->getGebruikerInfo();
    echo $gebruiker->voornaam . ' ' . $gebruiker->achternaam ;
    ?>
</h2>

<table class="table table-striped table-bordered">
    <tr>
        <th>ID</th>
        <th>Beschrijving</th>
        <th>Actions</th>
    </tr>
    <?php foreach($gebruikertype as $t){ ?>
        <tr>
            <td><?php echo $t['id']; ?></td>
            <td><?php echo $t['beschrijving']; ?></td>
            <td>
                <a href="<?php echo site_url('traject/edit/'.$t['id']); ?>" class="btn btn-info btn-xs">Edit</a>
                <a href="<?php echo site_url('traject/remove/'.$t['id']); ?>" class="btn btn-danger btn-xs">Delete</a>
            </td>
        </tr>

    <?php } ?>

</table>

<?php echo divAnchor('Gebruiker/meldAf', 'Afmelden');?>
