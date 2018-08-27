<?php
        require_once "../includedPages/connect.php";
        $req="SELECT * FROM classe ORDER BY num_niveau";
        $req_build=$bdd->prepare($req);
        $req_exe=$req_build->execute();

        $init_nb=$req_build->rowCount($req);

        switch ($init_nb) {
            case 0:
                $insert=$bdd->prepare("INSERT INTO classes (niveau_classe, nom_classe) VALUES (?, ?)");
                $insert_exe=$insert->execute(array($_POST['niveauClasse'], $_POST['niveauClasse']."A"));
    ?>
                <div class="greenSuccessMessageColored">
                    <i class="check icon"></i>
                    Opération effectuée avec succès !
                </div>
    <?php
                break;

            case 1:
                $insert=$bdd->prepare("INSERT INTO classes (niveau_classe, nom_classe) VALUES (?, ?)");
                $insert_exe=$insert->execute(array($_POST['niveauClasse'], $_POST['niveauClasse']."B"));
    ?>
                <div class="greenSuccessMessageColored">
                    <i class="check icon"></i>
                    Opération effectuée avec succès !
                </div>
    <?php
                break;

            case 2:
                $insert=$bdd->prepare("INSERT INTO classes (niveau_classe, nom_classe) VALUES (?, ?)");
                $insert_exe=$insert->execute(array($_POST['niveauClasse'], $_POST['niveauClasse']."C"));
    ?>
                <div class="greenSuccessMessageColored">
                    <i class="check icon"></i>
                    Opération effectuée avec succès !
                </div>
    <?php
                break;
            
            default:
                // code...
                break;
        }

    ?>

<script>
    $(document).ready(function() {
        $('.greenSuccessMessageColored').click(function() {
            $(this).hide();
        });
    });
</script>