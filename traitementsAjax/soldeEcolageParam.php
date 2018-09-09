<?php
    require_once "../includedPages/connect.php";

    $supp = $bdd->prepare("UPDATE classes SET solde_ecolage_gar = ?, solde_ecolage_fil = ? WHERE nom_classe = ?");
    $supp_exe = $supp->execute(array($_POST['soldeEcolageGarReg'], $_POST['soldeEcolageFilReg'], $_POST['nomClasseEcolage']));
    $supp->closeCursor();

?>