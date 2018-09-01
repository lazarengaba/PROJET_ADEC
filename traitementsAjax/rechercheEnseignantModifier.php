<?php
        require_once "../includedPages/connect.php";

        $req="SELECT * FROM enseignants WHERE nom_enseignant LIKE ? OR prenom_enseignant LIKE ? OR mle_enseignant LIKE ? ORDER BY nom_enseignant";
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
                    <?=$data['nom_enseignant']; ?>
                </td>
                <td>
                    <?=$data['prenom_enseignant']; ?>
                </td>
                <td>
                    <?=$data['mle_enseignant']; ?>
                </td>
                <td>
                    <a target="_blank" href="/PROJET_ADEC/modifierEnseignant/?matricule=<?=$data['mle_enseignant']; ?>" class="ui violet button mini" style="border-radius: 0;float: right;">Modifier</a>
                </td>
            </tr>
<?php
        }
?>
        </table>

