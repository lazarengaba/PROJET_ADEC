<?php
    require_once "../includedPages/connect.php";
    $titre = "ADEC";
    require_once "../includedPages/headerHtml.php";
    require_once "../includedPages/topBar.php";

    $supp = $bdd->prepare("DELETE FROM users WHERE mle_user = ?");
    $supp_exe = $supp->execute(array($_POST['matriculeEleve']));
    $supp->closeCursor();

?>