<?php
    require_once "../includedPages/connect.php";

    $req="SELECT * FROM matens WHERE enseignant = ? AND matiere_ens = ? AND classe_ens = ?";
    $req_build=$bdd->prepare($req);
    $req_exe=$req_build->execute(array($_POST['matieres'], $_POST['classes'], $_POST['classesEns']));
    $req_check=$req_build->rowCount($req);

    if ($req_check) {
        echo "<div class='infoSuccessMessageColored'><i class='info icon'></i>Cette attribution a déjà été effectuée !<div>";
    } else {
        $insert=$bdd->prepare("INSERT INTO matens (enseignant, matiere_ens, classe_ens) VALUES (?,?,?)");
        $insert_exe=$insert->execute(array($_POST['matieres'], $_POST['classes'], $_POST['classesEns']));
        $insert->closeCursor();

        echo "<div class='greenSuccessMessageColored'><i class='check icon'></i>Attribution effectuée avec succès !<div>";
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