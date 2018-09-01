<?php
    require_once "../includedPages/connect.php";

    $req = "SELECT * FROM eleves LEFT OUTER JOIN classes ON classe_eleve = id_classe WHERE solde_verse = 0 AND id_classe = ? ORDER BY nom_de_famille";
    $req_build=$bdd->prepare($req);
    $req_exe=$req_build->execute(array($_POST['classeEleve']));
    $req_check=$req_build->rowCount($req);
?>

<table class="soldeEcolageTab" width="99%" style="border-collapse: collapse; margin: 5px;">
    <tr>
        <td>
            <b>N°</b>
        </td>
        <td>
            <b>Nom</b>
        </td>
        <td>
            <b>Prénom (s)</b>
        </td>
        <td>
            <center><b>Matricule</b></center>
        </td>
        <td>
            <center><b>Solde à verser</b></center>
        </td>
        <td>
            <center><b>Solde versé</b></center>
        </td>
        <td>
            <center><b>Reste à payer</b></center>
        </td>
    </tr>

    <?php
        $i=0;
        while ($data=$req_build->fetch()) {
    ?>

    <tr>
        <td>
            <?=$i+=1; ?>
        </td>
        <td>
            <?=$data['nom_de_famille']; ?>
        </td>
        <td>
            <?=$data['prenom']; ?>
        </td>
        <td>
            <center><?=$data['mle']; ?></center>
        </td>
        <td>
            <center><?=$data['solde_ecolage']; ?></center>
        </td>
        <td>
            <center><b><?=$data['solde_verse']; ?></b></center>
        </td>
        <td>
            <center><b><?=($data['solde_ecolage'] - $data['solde_verse']); ?></b></center>
        </td>
    </tr>

    <?php
        }

        if ($req_check==0) {
            echo "<tr><td colspan='7'><center><b>Aucune correspondance</b></center></td></tr>";
        }
    ?>
                
</table>
