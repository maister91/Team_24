<?php
/**
 * @file isp_landing.php
 *
 * View waar de verschillende functionaliteiten van de isp verantwoordelijke kunnen worden bekeken
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
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><?php echo anchor('#', 'Klasindeling aanpassen', 'class="btn btn-outline-primary"'); ?></td>
            <td><?php echo anchor('', 'Afspraken beheren', 'class="btn btn-outline-primary"'); ?></td>
            <td><?php echo anchor('#', 'Studenteninformatie exporteren', 'class="btn btn-info"'); ?></td>
        </tr>
        <tr>
            <td><?php echo anchor('Klas/index_beheren', 'Klassen beheren', 'class="btn btn-outline-primary"'); ?></td>
            <td></td>
            <td><?php echo anchor('Export_klas/index', 'Klasgegevens exporteren', 'class="btn btn-info"'); ?></td>
        </tr>
        <tr>
            <td><?php echo anchor('Gebruikeradmin/index', 'Studentinformatie beheren', 'class="btn btn-outline-primary"'); ?></td>
            <td></td>
            <td></td>
        </tr>
        </tbody>
    </table>


<?php echo divAnchor('Gebruiker/meldAf', 'Afmelden'); ?>