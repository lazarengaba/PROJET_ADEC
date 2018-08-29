<?php
    require_once "../includedPages/connect.php";
    $insert=$bdd->prepare("UPDATE eleves SET mle = ?, classe_eleve = ?, nom_de_famille = ?, prenom = ?,
                                                    date_de_naissance = ?, lieu_de_naissance = ?, sexe_eleve = ?,
                                                    nom_complet_tuteur = ?, adresse_tuteur = ?, contact_tuteur = ?, civilite_tuteur = ? WHERE mle = ?");
    $insert_exe=$insert->execute(array($_POST['matriculeEleve'], $_POST['classeEleve'], $_POST['nomDeFamilleEleve'], $_POST['prenomEleve'], $_POST['dateNaissEleve'],$_POST['lieuNaissEleve'],
                                        $_POST['sexeEleve'], $_POST['nomParentEleve'], $_POST['adresseParentEleve'], $_POST['contactParentEleve'], $_POST['civiliteParentEleve'], $_POST['matriculeEleve']));
?>