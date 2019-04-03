<?php
/**
 * @file index.php
 *
 * View waar je de verschillende trajecten kan bekijken
 * -gebruikt bootstrap
 */
?>
<h1 class="text-center">ISP LANDING </h1>
<h2>Ingelogd als
    <?php
    $gebruiker = $this->authex->getGebruikerInfo();
    echo $gebruiker->voornaam . ' ' . $gebruiker->achternaam ;
    ?>
</h2>

<table class="table table-borderless ">
    <thead>
    <tr>
        <th>Klasindelingen aanpassen</th>
        <th>Afspraken</th>
        <th>Info beheren</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td><a href="#" class="btn btn-outline-primary"  role="button">Klasindeling aanpassen</a></td>
        <td> <a href="#" class="btn btn-outline-primary" role="button">Afspraken beheren</a></td>
        <td> <a href="<?php echo site_url('gebruikeradmin/index/'); ?>" class="btn btn-info" role="button">Studenteninformatie beheren</a></td>
    </tr>
    <tr>
        <td> <a href="#" class="btn btn-outline-primary" role="button">Klassen beheren</a></td>
        <td></td>
        <td> <a href="#" class="btn btn-info" role="button">Klasgegevens exporteren</a></td>
    </tr>
    <tr><td><a href="#" class="btn btn-outline-primary" role="button">Studenten beheren</a></td>
    </tr>
    </tbody>
</table>





<?php echo divAnchor('Gebruiker/meldAf', 'Afmelden');?>
<?php echo anchor('Excel_import/index', 'uurrooster importeren'); ?>
