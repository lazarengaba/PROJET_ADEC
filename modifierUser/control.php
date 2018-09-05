
<?php
    require_once "../includedPages/connect.php";

    $req=$bdd->prepare("UPDATE users SET nom = ?, prenom = ?, poste = ?, accreditation = ?, tel = ?, email = ?, MDP = ? WHERE mle_user = ?");
    $req_exe=$req->execute(array($_POST['nom'], $_POST['prenom'], $_POST['poste'], $_POST['accreditation'], $_POST['tel'], $_POST['email'], $_POST['password'], $_POST['mle_user']));
    $req->closeCursor();
?>

<div class="greenSuccessMessageColored">
    <b>Opération effectuée avec succès !</b>
</div>

<script>
    $('.greenSuccessMessageColored').click(function() {
        window.close();
    });
</script>