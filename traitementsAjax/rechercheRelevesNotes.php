<?php
    require_once "../includedPages/connect.php";

    $req="SELECT * FROM notes WHERE note_classe = ? AND note_matiere = ? note_semestre = ?";
    $req_build=$bdd->prepare($req);
    $req_exe=$req_build->execute(array($_POST['classe'], $_POST['semestre'], $_POST['matiere']));
    $req_check=$req_build->rowCount($req);

    if ($req_check) {
        echo "<div class='infoSuccessMessageColored'><center><i class='info icon'></i>Cet enregistrement a déjà été effectué !</div><div>";
    } else {
        $insert=$bdd->prepare("INSERT INTO notes (note_classe, note_matiere, note_semestre) VALUES (?,?,?)");
        $insert_exe=$insert->execute(array($_POST['classe'], $_POST['semestre'], $_POST['matiere']));
        $insert->closeCursor();
    }
    
    
?>


<script>
     $('.greenSuccessMessageColored').click(function() {
        $(this).hide();
    });
    $('.infoSuccessMessageColored').click(function() {
        $(this).hide();
    });
</script>