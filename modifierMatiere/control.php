<?php
    require_once "../includedPages/connect.php";

    $supp = $bdd->prepare("UPDATE matieres SET nom_matiere = ?, coeff_matiere = ? WHERE id = ?");
    $supp_exe = $supp->execute(array($_POST['nomMatiere'], $_POST['coeffMatiere'], $_POST['idMatiere']));
    $supp->closeCursor();

?>