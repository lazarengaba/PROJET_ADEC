<?php
    require_once "../includedPages/connect.php";

    $req=$bdd->prepare("UPDATE classes SET nom_classe = ? WHERE nom_classe = ?");
    $req_exe=$req->execute(array($_POST['nouveauNomClasse'], $_POST['ancienNomClasse']));
    $req->closeCursor();
?>