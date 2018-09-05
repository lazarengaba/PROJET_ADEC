<?php
        require_once "../../includedPages/connect.php";

        $reqM="SELECT * FROM enseignants ORDER BY nom_enseignant";
        $req_matieres=$bdd->prepare($reqM);
        $req_matieres_exe=$req_matieres->execute();
        $req_matieres_rows=$req_matieres->rowCount($reqM);

        $req_classes=$bdd->prepare("SELECT * FROM matieres");
        $req_classes_exe=$req_classes->execute();

        $req=$bdd->prepare("SELECT * FROM classes");
        $reqexe=$req->execute();
    ?>

    <div class="successMessage"></div>


    <div class="ajouterClasseContainer"><br />
        <div class="title">
            <?php
                if (!$req_matieres_rows) {
                    echo "<div class='ui red segment' style='font-size: 13px;'><center><b>Aucune matière n'a été reférencée !</b></center></div>";
                } else {
               
            ?>
            <i class="refresh icon"></i><b>Organisez les enseignant(e)s selon les matières</b><br /><br />

            <select style="outline: none; padding: 4px 8px 4px 8px; font-size: 13px;" id="matieres">
            <?php
                while ($data_matieres=$req_matieres->fetch()) {
                    echo "<option value='".$data_matieres['mle_enseignant']."'>".$data_matieres['prenom_enseignant']." ".$data_matieres['nom_enseignant']."</option>";
                }
            ?>
            </select>

            <select style="outline: none; padding: 4px 8px 4px 8px; font-size: 13px;" id="classes">
            <?php
                while ($data_classes=$req_classes->fetch()) {
                    echo "<option value='".$data_classes['id']."'>".$data_classes['nom_matiere']."</option>";
                }
            ?>
            </select>
            
            <select style="outline: none; padding: 4px 8px 4px 8px; font-size: 13px;" id="classesEns">
            <?php
                while ($data=$req->fetch()) {
                    echo "<option value='".$data['id_classe']."'>".$data['nom_classe']."</option>";
                }
            ?>
            </select>

            <button class="ui button violet mini" style="border-radius: 0;" id="ajouterClasseBtn">
                Attibuer la matière
            </button>

            <?php
                     
                    }
                
            ?>

        </div>
    </div>

    
    <script>
        $(document).ready(function() {

            $('#ajouterClasseBtn').click(function() {

                var matieres=$('#matieres').val();
                var classes=$('#classes').val();
                var classesEns=$('#classesEns').val();

                $.post('/PROJET_ADEC/traitementsAjax/ajouterMatiereEnseignant.php', {matieres:matieres,classes:classes, classesEns:classesEns}, function(data) {
                    $('.successMessage').html(data);
                });

            });

        });
    </script>