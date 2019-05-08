<?php
/**
 * @file index.php
 *
 * View waar de home (landing) page van de isp-verantwoordelijke getoond wordt
 * - gebruikt bootstrap
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
            <td><?php echo anchor('Afspraak/index', 'Klassen beheren', 'class="btn btn-outline-primary"'); ?></td>
            <td></td>
        </tbody>
    </table>





<?php echo divAnchor('Gebruiker/meldAf', 'Afmelden'); ?>