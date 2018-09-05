<?php

        require_once "../includedPages/connect.php";

        if (isset($_POST['niveauClasse'])) {
            
            $req="SELECT * FROM classes WHERE niveau_classe = ?";
            $req_build=$bdd->prepare($req);
            $req_exe=$req_build->execute(array($_POST['niveauClasse']));

            $init_nb=$req_build->rowCount($req);

            switch ($init_nb) {
                case 0:
                    $insert=$bdd->prepare("INSERT INTO classes (niveau_classe, nom_classe) VALUES (?, ?)");
                    $insert_exe=$insert->execute(array($_POST['niveauClasse'], $_POST['niveauClasse']." I"));
                    $insert->closeCursor();
        ?>
                    <div class="greenSuccessMessageColored">
                        <i class="check icon"></i>
                        Classe <?=$_POST['niveauClasse']." I"; ?> ajoutée avec succès !
                    </div>
        <?php
        
                    break;

                case 1:
                    $insert=$bdd->prepare("INSERT INTO classes (niveau_classe, nom_classe) VALUES (?, ?)");
                    $insert_exe=$insert->execute(array($_POST['niveauClasse'], $_POST['niveauClasse']." II"));
                    $insert->closeCursor();
        ?>
                    <div class="greenSuccessMessageColored">
                        <i class="check icon"></i>
                        Classe <?=$_POST['niveauClasse']." II"; ?> ajoutée avec succès !
                    </div>
        <?php
                    break;

                case 2:
                    $insert=$bdd->prepare("INSERT INTO classes (niveau_classe, nom_classe) VALUES (?, ?)");
                    $insert_exe=$insert->execute(array($_POST['niveauClasse'], $_POST['niveauClasse']." III"));
                    $insert->closeCursor();
        ?>
                    <div class="greenSuccessMessageColored">
                        <i class="check icon"></i>
                        Classe <?=$_POST['niveauClasse']." III"; ?> ajoutée avec succès !
                    </div>
        <?php
                    break;

                    case 3:
                    $insert=$bdd->prepare("INSERT INTO classes (niveau_classe, nom_classe) VALUES (?, ?)");
                    $insert_exe=$insert->execute(array($_POST['niveauClasse'], $_POST['niveauClasse']." IV"));
                    $insert->closeCursor();
        ?>
                    <div class="greenSuccessMessageColored">
                        <i class="check icon"></i>
                        Classe <?=$_POST['niveauClasse']." IV"; ?> ajoutée avec succès !
                    </div>
        <?php
                    break;
                
                default:
                    
        ?>
                <div class="infoSuccessMessageColored">
                    <i class="info icon"></i>
                    Niveau maximum de nombre de classe atteint
                </div>
        <?php            

                    break;
            }
        
        } else {
            // code...
        }

        ?>

        

<script>
    $(document).ready(function() {
        $('.greenSuccessMessageColored').click(function() {
            $(this).hide();
        });
    });
</script>