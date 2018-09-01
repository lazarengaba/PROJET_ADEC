<?php
    require_once "../includedPages/connect.php";

    $req=$bdd->prepare("UPDATE classes SET solde_ecolage = ? WHERE id_classe = ?");
    $req_exe=$req->execute(array($_POST['nouveauSoldeEcolage'], $_POST['idClasseEcolage']));
    $req->closeCursor();
?>