<?php
    require_once "../includedPages/connect.php";

    $check="SELECT * FROM users WHERE mle_user = ? OR user_name = ? OR email = ?";
    $check_req=$bdd->prepare($check);
    $check_req_exe=$check_req->execute(array($_POST['matricule'], $_POST['nomUser'], $_POST['email']));
    $check_rows=$check_req->rowCount($check);

    if ($check_rows) {
        echo "<br /><div class='infoSuccessMessageColored'>
                <center><b><i class='info circle icon'></i>Impossible de dupliquer les paramètres !</b></center>
            </div>";
    } else {
        $req=$bdd->prepare("INSERT INTO users VALUES (?,?,?,?,?,?,?,?,?,?,?)");
        $req_exe=$req->execute(array($_POST['matricule'], $_POST['nom'], $_POST['prenom'], $_POST['nomUser'], $_POST['tel'], $_POST['email'],
        $_POST['BP'], $_POST['MDP'], $_POST['adresse'],$_POST['accreditation'],$_POST['poste']));
        $req->closeCursor();
        
        echo "<div class='greenSuccessMessageColored'>
            <center><b>L'utilisateur a été créé avec succès !</b></center>
        </div>";

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