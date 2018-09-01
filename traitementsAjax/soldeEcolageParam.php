<?php
    require_once "../includedPages/connect.php";

    $supp = $bdd->prepare("UPDATE classes SET solde_ecolage = ? WHERE nom_classe = ?");
    $supp_exe = $supp->execute(array($_POST['soldeEcolageReg'], $_POST['nomClasseEcolage']));
    $supp->closeCursor();

?>