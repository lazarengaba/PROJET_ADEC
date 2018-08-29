<?php
    require_once "../includedPages/connect.php";

    $supp = $bdd->prepare("DELETE FROM eleves WHERE mle = ?");
    $supp_exe = $supp->execute(array($_POST['matriculeEleve']));
    $supp->closeCursor();

?>