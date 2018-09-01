<?php
    require_once "../includedPages/connect.php";

    $req=$bdd->prepare("INSERT INTO ecolage (id_eleve, montant, auteur_versement, date) VALUES (?, ?, ?, ?)");
    $req_exe=$req->execute(array($_POST['matricule'], $_POST['montantVersementEcolage'], $_POST['auteurVersement'], date('d-m-Y')));
    $req->closeCursor();

    $select=$bdd->prepare("SELECT SUM(montant) somme_montant FROM ecolage WHERE id_eleve = ?");
    $select_build=$select->execute(array($_POST['matricule']));
    $select_fetch=$select->fetch();

    $update=$bdd->prepare("UPDATE eleves SET solde_verse = ? WHERE mle = ?");
    $update_build=$update->execute(array($select_fetch['somme_montant'], $_POST['matricule']));
    $update->closeCursor();

    
?>