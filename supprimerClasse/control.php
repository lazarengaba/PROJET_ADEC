<?php
    require_once "../includedPages/connect.php";

    $select=$bdd->prepare("SELECT * FROM classes WHERE nom_classe = ?");
    $select_exe=$select->execute(array($_POST['ancienNomClasse']));
    $data=$select->fetch();

    $req_classe=$bdd->prepare("DELETE FROM classes WHERE nom_classe = ?");
    $req_exe_classe=$req_classe->execute(array($_POST['ancienNomClasse']));
    $req_classe->closeCursor();

    $req_eleve=$bdd->prepare("DELETE FROM eleves WHERE classe_eleve = ?");
    $req_exe_eleve=$req_eleve->execute(array($data['id_classe']));
    $req_eleve->closeCursor();
?>