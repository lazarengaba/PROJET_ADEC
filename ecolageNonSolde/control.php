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
            <center><b>-</b></center>
        </td>
    </tr>

   
    <?php
        }

        if ($req_check==0) {
            echo "<tr><td colspan='7'><center><b>Aucune correspondance</b></center></td></tr>";
        }
    ?>
                
</table>
