<?php
    require_once "../includedPages/connect.php";

    $sel1="SELECT * FROM eleves WHERE (nom_de_famille LIKE ? OR prenom LIKE ?)  AND (mle = ?)";
    $sel1_build=$bdd->prepare($sel1);
    $sel1_exe=$sel1_build->execute(array("%".$_POST['eleveRecuBanque']."%", "%".$_POST['eleveRecuBanque']."%", $_POST['mleRecuBanque']));
    $sel1_rows=$sel1_build->rowCount($sel1);

    if (!$sel1_rows) {
        echo "<div class='redSuccessMessageColored'>
                <b>L'élève n'a pas été retrouvé (e) !</b>
            </div>";
    } else {

        $recu="SELECT * FROM recus_banks WHERE ref_recu = ?";
        $recu_build=$bdd->prepare($recu);
        $recu_exe=$recu_build->execute(array($_POST['numRecuBanque']));
        $recu_check=$recu_build->rowCount($recu);

        if ($recu_check) {
            echo "<div class='infoSuccessMessageColored'>
                    <b>Echec ! Ce reçu a fait l'objet d'un enregistrement antérieur !</b>
                </div>";
        } else {
            $insert =$bdd->prepare("INSERT INTO recus_banks (date_op, code_bank, num_compte, titulaire_compte, ref_recu, deposant, montant_depose, mle_eleve)
                                    VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            $insert_exe=$insert->execute(array(
                                            $_POST['dateRecuBanque'],
                                            $_POST['codeBanque'],
                                            $_POST['compteRecuBanque'],
                                            $_POST['titulaireRecuBanque'],
                                            $_POST['numRecuBanque'],
                                            $_POST['nomDeposantBanque'],
                                            $_POST['montantRecuBanque'],
                                            $_POST['mleRecuBanque']
                                        ));
            echo "<div class='greenSuccessMessageColored'>
                    <b>L'opération a été effectuée avec succès !</b>
                </div>";
        }
        
    }
    

?>
