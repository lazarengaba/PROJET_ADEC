<?php
    require_once "../includedPages/connect.php";

    $req="SELECT * FROM eleves WHERE mle = ?";
    $req_build=$bdd->prepare($req);
    $req_exe=$req_build->execute(array($_POST['matriculeEleve']));
    $req_check=$req_build->rowCount($req);

    $classe=$bdd->prepare("SELECT * FROM classes WHERE nom_classe = ? ");
    $classe_exe=$classe->execute(array($_POST['classeEleve']));
    $dataClasse=$classe->fetch();

    if ($req_check!=0) {
        echo "<div style='background-color: #fab5b5; color: #e20a0a; padding: 4px 15px; text-align: center; margin-top: 5px;'>Duplication de matricule non autorisée !</div>";
    } else {
    

    $insert=$bdd->prepare("INSERT INTO eleves VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)");
    $insert_exe=$insert->execute(array($_POST['matriculeEleve'], $dataClasse['id_classe'],0, $_POST['nomDeFamilleEleve'], $_POST['prenomEleve'], $_POST['dateNaissEleve'],$_POST['lieuNaissEleve'],
                                        $_POST['sexeEleve'], $_POST['nomParentEleve'], $_POST['adresseParentEleve'], $_POST['contactParentEleve'], $_POST['civiliteParentEleve'],$_POST['professionParentEleve']));
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