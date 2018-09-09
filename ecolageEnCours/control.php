<?php
    require_once "../includedPages/connect.php";

    $req = "SELECT * FROM eleves LEFT OUTER JOIN classes ON classe_eleve = id_classe WHERE (((solde_verse < solde_ecolage_fil) AND (solde_verse !=0)) OR ((solde_verse < solde_ecolage_gar) AND (solde_verse !=0))) AND (id_classe = ?) ORDER BY nom_de_famille";
    $req_build=$bdd->prepare($req);
    $req_exe=$req_build->execute(array($_POST['classeEleve']));
    $req_check=$req_build->rowCount($req);

    /*$req2 = "SELECT * FROM eleves LEFT OUTER JOIN classes ON classe_eleve = id_classe WHERE solde_verse < solde_ecolage_gar AND solde_verse !=0 AND id_classe = ? ORDER BY nom_de_famille";
    $req_build2=$bdd->prepare($req2);
    $req_exe2=$req_build2->execute(array($_POST['classeEleve']));
    $req_check2=$req_build2->rowCount($req2);*/
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

    <tr bgcolor="<?=(($data['sexe_eleve']=="Féminin") ? '#e8fba6' : ''); ?>">
        <td>
            <b><?=$i+=1; ?></b>
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
            <center><?=(($data['sexe_eleve']=="Masculin") ? $data['solde_ecolage_gar'] : $data['solde_ecolage_fil']); ?></center>
        </td>
        <td>
            <center><b><?=$data['solde_verse']; ?></b></center>
        </td>
        <td>
            <center><b><?=(($data['sexe_eleve']=="Masculin") ? ($data['solde_ecolage_gar']-$data['solde_verse']) : ($data['solde_ecolage_fil']-$data['solde_verse'])); ?></b></center>
        </td>
    </tr>

    <?php

        }

        
        /*while ($data2=$req_build2->fetch()) {
    ?>

    <tr>
        <td>
            <b><?=$i+=1; ?></b>
        </td>
        <td>
            <?=$data2['nom_de_famille']; ?>
        </td>
        <td>
            <?=$data2['prenom']; ?>
        </td>
        <td>
            <center><?=$data2['mle']; ?></center>
        </td>
        <td>
            <center><?=$data2['solde_ecolage_gar']; ?></center>
        </td>
        <td>
            <center><b><?=$data2['solde_ecolage_gar']; ?></b></center>
        </td>
        <td>
            <center><b>-</b></center>
        </td>
    </tr>

    <?php
        }*/

        if ($req_check==0) {
            echo "<tr><td colspan='7'><center><b>Aucune correspondance</b></center></td></tr>";
        }
    ?>
                
</table>
