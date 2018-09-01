<?php

require_once "../includedPages/connect.php";

    $req="SELECT * FROM matieres WHERE nom_matiere = ?";
    $req_build=$bdd->prepare($req);
    $req_exe=$req_build->execute(array($_POST['nomMatiere']));
    $check=$req_build->rowCount($req);

    if ($check) {
?>
        <div class="infoSuccessMessageColored">
            <i class="info icon"></i>
            La Matière existe déjà !
        </div>
<?php
    } else {
    
        $insert=$bdd->prepare("INSERT INTO matieres (nom_matiere, coeff_matiere) VALUES (?, ?)");
        $insert_exe=$insert->execute(array($_POST['nomMatiere'], $_POST['coeffMatiere']));
        $insert->closeCursor();
?>
        <div class="greenSuccessMessageColored">
            <i class="check icon"></i>
            Matière <b><?=$_POST['nomMatiere']; ?></b> ajoutée avec succès !
        </div>
<?php
    }

?>

<script>
$(document).ready(function() {
$('.greenSuccessMessageColored').click(function() {
    $(this).hide();
});
$('.infoSuccessMessageColored').click(function() {
    $(this).hide();
});
});
</script>