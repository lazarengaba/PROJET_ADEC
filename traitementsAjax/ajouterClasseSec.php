    <?php

        require_once "../includedPages/connect.php";

        if (isset($_POST['niveauClasse'])&&isset($_POST['nomClasse'])&&$_POST['nomClasse']!="") {

            $req="SELECT * FROM classes WHERE nom_classe = ?";
            $req_build=$bdd->prepare($req);
            $req_exe=$req_build->execute(array($_POST['nomClasse']));
            $check=$req_build->rowCount($req);

            if ($check) {
    ?>
                <div class="infoSuccessMessageColored">
                    <i class="info icon"></i>
                    La classe existe déjà !
                </div>
    <?php
            } else {
            
                $insert=$bdd->prepare("INSERT INTO classes (niveau_classe, nom_classe) VALUES (?, ?)");
                $insert_exe=$insert->execute(array($_POST['niveauClasse'], $_POST['nomClasse']));
                $insert->closeCursor();
    ?>
                <div class="greenSuccessMessageColored">
                    <i class="check icon"></i>
                    Classe <?=$_POST['nomClasse']; ?> ajoutée avec succès !
                </div>
    <?php
            }
            
        }

    ?>

<script>
    $(document).ready(function() {
        $('.greenSuccessMessageColored').click(function() {
            $(this).hide();
        });
    });
</script>