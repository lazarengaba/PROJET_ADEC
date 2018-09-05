<?php
    require_once "../includedPages/connect.php";

    $req_check="SELECT * FROM notes WHERE note_classe = ? AND note_matiere = ? AND note_semestre = ?";
    $req_check_buid=$bdd->prepare($req_check);
    $req_check_exe=$req_check_buid->execute(array($_POST['classe'], $_POST['matiere'], $_POST['semestre']));
    $req_check_rows=$req_check_buid->rowCount($req_check);

    if ($req_check_rows) {
        echo "<br /><div style='font-size: 13px;' class='ui orange segment'><center><b>Ce relevé a déjà antérieurement été enregistré !</b></center></div>";
    } else {
        $req="SELECT * FROM eleves WHERE classe_eleve = ? ORDER BY nom_de_famille";
        $req_build=$bdd->prepare($req);
        $req_exe=$req_build->execute(array($_POST['classe']));
        $req_rows=$req_build->rowCount($req);

        if (!$req_rows) {
            echo "<br /><div class='ui red segment' style='font-size: 13px;'><center><b>Aucune correspondance d'élève !</b></center></div>";
        } else {

            $res_SQL="SELECT * FROM (classes LEFT OUTER JOIN enseignement ON id_classe = classe) LEFT OUTER JOIN matieres ON matiere = matieres.id WHERE id_classe = ? AND nom_matiere IS NOT NULL";
            $req=$bdd->prepare($res_SQL);
            $req_exe=$req->execute(array($_POST['classe']));
            $rowMat=$req->rowCount($res_SQL);
            
            if (!$rowMat) {
                echo "<br /><hr /><br /><center><b><i class='times icon'></i>Aucune correspondance de matière !</b></center>";
            } else {
                

            $i=1;
      
?>      
        <br />
        <form action="/PROJET_ADEC/traitementsForms/traitement1.php" method="post">
        <input type="hidden" name="semestre" value="<?=$_POST['semestre']; ?>">
        <input type="hidden" name="classe" value="<?=$_POST['classe']; ?>">
        <input type="hidden" name="matiere" value="<?=$_POST['matiere']; ?>" id="matiere">
        <input type="hidden" name="LIGNES" value="<?=$req_rows; ?>">
        <center>
            <table class="soldeEcolageTab" width="90%" style="border-collapse: collapse;">
                <tr>
                    <td width="100">
                        <center><b>N°</b></center>
                    </td>
                    <td>
                        <b>Nom</b>
                    </td>
                    <td>
                        <b>Prénom (s)</b>
                    </td>
                    <td width="150">
                        <center><b>Matricule</b></center>
                    </td>
                    <td width="200">
                        <center><b>Note1 sur 20</b></center>
                    </td>
                    <td width="200">
                        <center><b>Note2 sur 20</b></center>
                    </td>
                </tr>
                    <?php

                        while ($data=$req_build->fetch()) {
                    ?>
                            <tr>
                                <td width="100">
                                    <input type="hidden" value="<?=$data['mle']; ?>" name="noteMle<?=$i; ?>" />
                                    
                                    <center><b><?=$i; ?></b></center>
                                </td>
                                <td>
                                    <b><?=$data['nom_de_famille']; ?></b>
                                </td>
                                <td>
                                    <b><?=$data['prenom']; ?></b>
                                </td>
                                <td width="150">
                                    <center><b><?=$data['mle']; ?></b></center>
                                </td>
                                <td width="200">
                                    <input type="number" min="0" max="20" class="input" name="note1<?=$i; ?>">
                                </td>
                                <td width="200">
                                    <input type="number" min="0" max="20" class="input" name="note2<?=$i; ?>">
                                </td>
                            </tr>
                    <?php
                        $i+=1;
                        }

                    ?>
                    <tr>
                        <td colspan="6">
                        <button type="submit" class="ui green button tiny" id="submitNotes" style="border-radius: 0; float: right;">
                            <i class="save icon"></i>Sauvegarder les notes
                        </button>
                        </td>
                    </tr>
                
            </table>
        </center> 
        <form> 

<?php
            
        }
          
        }
    }

?>
