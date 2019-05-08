<?php
/**
 * @file index.php
 *
 * <<<<<<< HEAD
 * View waar de home (landing) page van de isp-verantwoordelijke getoond wordt
 * - gebruikt bootstrap
 * =======
 * View waar je de verschillende trajecten kan bekijken
 * -gebruikt bootstrap
 * >>>>>>> comments, studenteninfo exporteren
 */
?>
    <h2>Ingelogd als
        <?php
        $gebruiker = $this->authex->getGebruikerInfo();
        echo $gebruiker->voornaam . ' ' . $gebruiker->achternaam;
        ?>
    </h2>


    <table class="table table-striped table-bordered">
        <tr>
            <th>Klasindelingen aanpassen</th>
            <th>Afspraken</th>
            <th>Info beheren</th>
        </tr>
        <tbody>
        <tr>
            <td><?php echo anchor('Afspraak/index', 'Klassen beheren', 'class="btn btn-outline-primary"'); ?></td>
            <td></td>
        </tbody>
    </table>


<?php echo divAnchor('Gebruiker/meldAf', 'Afmelden'); ?>