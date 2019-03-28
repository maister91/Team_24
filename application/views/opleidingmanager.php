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
            <th>Klasindelingen aanpassen</th>
            <th>Afspraken</th>
            <th>Info beheren</th>
            <th>Opleidingsmanager opties</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><?php echo anchor('#', 'Klasindeling aanpassen', 'class="btn btn-outline-primary"'); ?></td>
            <td><?php echo anchor('#', 'Afspraken beheren', 'class="btn btn-outline-primary"'); ?></td>
            <td><?php echo anchor('#', 'Studenteninformatie beheren', 'class="btn btn-info"'); ?></td>
            <td><?php echo anchor('Excel_import/index', 'Uurrooster beheren', 'class="btn btn-outline-primary"'); ?></td>
        </tr>
        <tr>
            <td><?php echo anchor('#', 'Klassen beheren', 'class="btn btn-outline-primary"'); ?></td>
            <td></td>
            <td><?php echo anchor('Export_klas/index', 'Klasgegevens exporteren', 'class="btn btn-info"'); ?></td>
            <td><?php echo anchor('#', 'Docenten en ISP verantwoordelijken beheren', 'class="btn btn-outline-primary"'); ?></td>
        </tr>
        <tr>
            <td><?php echo anchor('#', 'Studenten beheren', 'class="btn btn-outline-primary"'); ?></td>
            <td></td>
            <td></td>
            <td><?php echo anchor('#', 'Currriculum aanpassen', 'class="btn btn-outline-primary"'); ?></td>
        </tr>
        </tbody>
    </table>


<?php echo divAnchor('Gebruiker/meldAf', 'Afmelden'); ?>