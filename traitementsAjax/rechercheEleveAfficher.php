<?php
        require_once "../includedPages/connect.php";

        $req="SELECT * FROM eleves WHERE nom_de_famille LIKE ? OR prenom LIKE ? OR mle LIKE ? ORDER BY nom_de_famille";
        $req_build=$bdd->prepare($req);
        $req_exe=$req_build->execute(array("%".$_POST['chercheClasseModifier']."%", "%".$_POST['chercheClasseModifier']."%", "%".$_POST['chercheClasseModifier']."%"));
        $nb_row=$req_build->rowCount();

        $result = "Résultat";

        if ($nb_row>1) {
            $result = "Résultats";
        }

        echo "<div style='text-align: center; background-color: #ccc; padding: 3px 0;'><b>".$nb_row." ".$result."</b></div>";
?>
        <table width="100%" cellpadding="5" class="ui table" style="font-size: 13px;">
<?php
        while ($data=$req_build->fetch()) {
?>
            <tr>
                <td>
                    <?=$data['nom_de_famille']; ?>
                </td>
                <td>
                    <?=$data['prenom']; ?>
                </td>
                <td>
                    <?=$data['classe_eleve']; ?>
                </td>
                <td>
                    <?=$data['mle']; ?>
                </td>
                <td>
                    <a target="_blank" href="/PROJET_ADEC/afficherEleve/?matricule=<?=$data['mle']; ?>" class="ui button mini" style="border-radius: 0;float: right;">Afficher</a>
                </td>
            </tr>
<?php
        }
?>
        </table>

