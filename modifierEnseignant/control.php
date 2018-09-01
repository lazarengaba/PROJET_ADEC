<?php
    require_once "../includedPages/connect.php";

    $insert=$bdd->prepare("UPDATE enseignants SET  nom_enseignant = ?, prenom_enseignant = ?, sexe_enseignant = ?,
                                                    email_enseignant = ?, telephone_enseignant = ? WHERE mle_enseignant = ?");
    $insert_exe=$insert->execute(array($_POST['nomDeFamilleEleve'], $_POST['prenomEleve'], $_POST['sexeEleve'], $_POST['nomParentEleve'],
                                        $_POST['adresseParentEleve'], $_POST['matriculeEleve']));
?>