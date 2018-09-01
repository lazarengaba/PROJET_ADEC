<?php
    require_once "../includedPages/connect.php";

    $req="SELECT * FROM enseignants WHERE mle_enseignant = ?";
    $req_build=$bdd->prepare($req);
    $req_exe=$req_build->execute(array($_POST['matriculeEleve']));
    $req_check=$req_build->rowCount($req);

    if ($req_check!=0) {
        echo "<div style='background-color: #fab5b5; color: #e20a0a; padding: 4px 15px; text-align: center; margin-top: 5px;'>Duplication de matricule non autorisée !</div>";
    } else {
    
    $insert=$bdd->prepare("INSERT INTO enseignants VALUES (?,?,?,?,?,?)");
    $insert_exe=$insert->execute(array($_POST['matriculeEleve'], $_POST['nomDeFamilleEleve'], $_POST['prenomEleve'],
                                        $_POST['sexeEleve'], $_POST['nomParentEleve'], $_POST['adresseParentEleve']));
?>


<div class="greenSuccessMessageColored">
    Opération effecutée !
</div>

<?php
    
    }
    
?>

<script>
    $('.greenSuccessMessageColored').click(function() {
        $(this).hide();
    });
</script>