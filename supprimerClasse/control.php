<?php
    require_once "../includedPages/connect.php";

    $req=$bdd->prepare("DELETE FROM classes WHERE nom_classe = ?");
    $req_exe=$req->execute(array($_POST['ancienNomClasse']));
    $req->closeCursor();
?>