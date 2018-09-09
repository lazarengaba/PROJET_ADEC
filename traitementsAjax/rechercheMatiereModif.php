<?php
        require_once "../includedPages/connect.php";

        $req="SELECT * FROM matieres M LEFT OUTER JOIN classes C ON M.id_classe = C.id_classe WHERE nom_matiere LIKE ?";
        $req_build=$bdd->prepare($req);
        $req_exe=$req_build->execute(array("%".$_POST['nomMatiereModif']."%"));
        $nb_row=$req_build->rowCount();

        $result = "Résultat";

        if ($nb_row>1) {
            $result = "Résultats";
        }

        echo "<div style='text-align: center; background-color: #ccc; padding: 3px 0;'><b>".$nb_row." ".$result."</b></div>";
?>
        <table width="100%" cellpadding="5" class="ui table">
<?php
        while ($data=$req_build->fetch()) {
?>
            <tr>
                <td>
                    <?=$data['nom_matiere']; ?>
                </td>
                <td>
                    <?=$data['nom_classe']; ?>
                </td>
                <td>
                    <?=$data['coeff_matiere']; ?>
                </td>
                <td width="150">
                    <a target="_blank" href="/PROJET_ADEC/modifierMatiere/?idMatiere=<?=$data['id']; ?>" class="ui violet button mini" style="border-radius: 0; width: 100%;">Modifier</a>
                </td>
            </tr>
<?php
        }
?>
        </table>

