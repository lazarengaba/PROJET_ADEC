<?php
    require_once "../includedPages/connect.php";

    $supp = $bdd->prepare("DELETE FROM matieres WHERE id = ?");
    $supp_exe = $supp->execute(array($_POST['idMatiere']));
    $supp->closeCursor();

    $supp_ens = $bdd->prepare("DELETE FROM enseignement WHERE matiere = ?");
    $supp_exe_ens = $supp_ens->execute(array($_POST['idMatiere']));
    $supp_ens->closeCursor();

?>