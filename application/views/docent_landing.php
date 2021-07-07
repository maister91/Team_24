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
        <tbody>
        <tr>
            <td><?php echo anchor('Afspraak/index', 'Afspraken beheren', 'class="btn btn-outline-primary"'); ?></td>
            <td></td>
        </tbody>
    </table>





<?php echo divAnchor('Gebruiker/meldAf', 'Afmelden'); ?>