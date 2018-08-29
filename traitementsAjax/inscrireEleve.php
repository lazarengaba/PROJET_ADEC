<?php
    require_once "../includedPages/connect.php";
    $insert=$bdd->prepare("INSERT INTO eleves VALUES (?,?,?,?,?,?,?,?,?,?,?)");
    $insert_exe=$insert->execute(array($_POST['matriculeEleve'], $_POST['classeEleve'], $_POST['nomDeFamilleEleve'], $_POST['prenomEleve'], $_POST['dateNaissEleve'],$_POST['lieuNaissEleve'],
                                        $_POST['sexeEleve'], $_POST['nomParentEleve'], $_POST['adresseParentEleve'], $_POST['contactParentEleve'], $_POST['civiliteParentEleve']));
?>


<div class="greenSuccessMessageColored">
    Opération effecutée !
</div>

<script>
    $('.greenSuccessMessageColored').click(function() {
        $(this).hide();
    });
</script>