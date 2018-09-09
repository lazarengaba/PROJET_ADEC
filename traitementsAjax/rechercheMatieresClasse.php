<?php
    require_once "../includedPages/connect.php";
    $reqM="SELECT * FROM matieres WHERE id_classe = ?";
    $req_buildM=$bdd->prepare($reqM);
    $req_exeM=$req_buildM->execute(array($_POST['classe']));
    $reqM_fetch=$req_buildM->rowCount($reqM);
    
    if (!$reqM_fetch) {
        echo "<option>Aucune entrée pour cette classe</option>";
    } else {

        while ($donnees=$req_buildM->fetch()) {
            echo "<option value='".$donnees['id']."'>".$donnees['nom_matiere']."</option>";
        }
    }
?>