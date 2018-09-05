<?php
    require_once "../includedPages/connect.php";

    $req="SELECT * FROM users WHERE (user_name = ? AND MDP = ?) OR (email = ? AND MDP = ?)";
    $req_build=$bdd->prepare($req);
    $req_exe=$req_build->execute(array($_POST['userName'], $_POST['password'],$_POST['userName'], $_POST['password']));
    $req_check=$req_build->rowCount($req);

    if (!$req_check) {
        echo "<div class='redSuccessMessageColored'>
                <center><b><i class='warning circle icon'></i>Nom d'utlisateur ou mot de passe incorrecte !</b></center>
            </div>";
    } else {
        $sessions=$bdd->prepare("SELECT * FROM users WHERE user_name = ? OR email = ?");
        $sessions_exe=$sessions->execute(array($_POST['userName'], $_POST['userName']));
        $data=$sessions->fetch();

        $_SESSION['nom'] = $data['nom'];
        $_SESSION['prenom'] = $data['prenom'];
        $_SESSION['accreditation'] = $data['accreditation'];
        $_SESSION['email'] = $data['email'];
        $_SESSION['user_name'] = $data['user_name'];
?>
        <script> window.location = "indexAdmin.php"; </script>
<?php
    }

?>