<?php
    $titre="SUCCES";
    require_once "../includedPages/connect.php";
    require_once "../includedPages/headerHtml.php";

    $testOK=0;

    for ($i=1; $i <= $_POST['LIGNES']; $i++) {
        

        if ($_POST['note1'.$i]=="" || $_POST['note2'.$i]=="" || strlen($_POST['matiere'])==0) {

            $testOK+=1;
?>

<?php
        } else {
            $insert = $bdd->prepare("INSERT INTO notes (mle_note, note_classe, note_matiere, note_semestre,note_note1, note_note2) VALUES (?,?,?,?,?,?)");
            $insert_exe = $insert->execute(array($_POST['noteMle'.$i], $_POST['classe'],$_POST['matiere'],$_POST['semestre'],$_POST['note1'.$i], $_POST['note2'.$i]));
    
        $insert->closeCursor();
?>
        
<?php        
        }
    }

    if ($testOK!=0) {
?>          <br /><br />
            <center>
                <div class="ui red segment">
                    <b>l'opération n'a pas aboutie dûe à une incohérence données. Rafraichir puis réessayer</b>
                </div><br /><br />

                <a href="/PROJET_ADEC/" class="ui red button" style="border-radius: 2px;">
                    <i class="refresh icon"></i>Rafraichir
                </a>

            </center>

<?php
    } else {
?>
        <br /><br />
        <center>
            <div class="ui green segment">
                <b>Les notes on été enregistrées avec succès !</b>
            </div><br /><br />
        
            <a href="../indexAdmin.php" class="ui violet button" style="border-radius: 2px;">
                <i class="refresh icon"></i>Rafraichir
            </a>
        
        </center>
<?php
    }
?>
        

        