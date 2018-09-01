<?php
    require_once "../includedPages/connect.php";

    $supp = $bdd->prepare("DELETE FROM enseignants WHERE mle_enseignant = ?");
    $supp_exe = $supp->execute(array($_POST['matriculeEleve']));
    $supp->closeCursor();

?>