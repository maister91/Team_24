<?php
/**
 * @file opleidingmanager.php
 *
 * View waar je de verschillende trajecten kan bekijken
 * -gebruikt bootstrap
 */
?>
    <h1 class="text-center"><?php $title?></h1>
    <h2>Ingelogd als
        <?php
        $gebruiker = $this->authex->getGebruikerInfo();
        echo $gebruiker->voornaam . ' ' . $gebruiker->achternaam;
        ?>
    </h2>

    <table class="table table-borderless ">
        <thead>
        <tr>
            <th>Exporteren van gegevens</th>
            <th>Uurooster</th>
            <th>Beheren van klassen en studenten</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><?php echo anchor('Gebruiker/export', 'Studenteninformatie exporteren', 'class="btn btn-info"'); ?></td>
            <td><?php echo anchor('Excel_import/index', 'Uurrooster importeren', 'class="btn btn-outline-primary"'); ?></td>
            <td><?php echo anchor('klas/index_beheren', 'Klassen beheren', 'class="btn btn-outline-primary"'); ?></td>
        </tr>
        <tr>
            <td><?php echo anchor('Export_klas/index', 'Klasgegevens exporteren', 'class="btn btn-info"'); ?></td>
            <td></td>
            <td><?php echo anchor('Gebruikeradmin/indexStudenten', 'Studenten beheren', 'class="btn btn-outline-primary"'); ?></td>
        </tr>
        </tbody>
    </table>


<?php echo divAnchor('Gebruiker/meldAf', 'Afmelden'); ?>