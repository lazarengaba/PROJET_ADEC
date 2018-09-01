    <?php
        require_once "../../includedPages/connect.php";

        $reqM="SELECT * FROM matieres";
        $req_matieres=$bdd->prepare($reqM);
        $req_matieres_exe=$req_matieres->execute();
        $req_matieres_rows=$req_matieres->rowCount($reqM);

        $req_classes=$bdd->prepare("SELECT * FROM classes");
        $req_classes_exe=$req_classes->execute();
    ?>

    <div class="successMessage"></div>


    <div class="ajouterClasseContainer"><br />
        <div class="title">
            <?php
                if (!$req_matieres_rows) {
                    echo "<center><i class=\"times icon\"></i><b>Aucune matière n'a été référencée !</b></center>";
                } else {
               
            ?>
            <i class="random icon"></i><b>Organisez les matières selon les classes</b><br /><br />

            <select style="outline: none; padding: 4px 8px 4px 8px; font-size: 13px;" id="matieres">
            <?php
                while ($data_matieres=$req_matieres->fetch()) {
                    echo "<option value='".$data_matieres['id']."'>".$data_matieres['nom_matiere']."</option>";
                }
            ?>
            </select>

            <select style="outline: none; padding: 4px 8px 4px 8px; font-size: 13px;" id="classes">
            <?php
                while ($data_classes=$req_classes->fetch()) {
                    echo "<option value='".$data_classes['id_classe']."'>".$data_classes['nom_classe']."</option>";
                }
            ?>
            </select>

            <button class="ui button violet mini" style="border-radius: 0;" id="ajouterClasseBtn">
                Ajouter à la matière
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

                $.post('/PROJET_ADEC/traitementsAjax/ajouterMatiereClasse.php', {matieres:matieres,classes:classes}, function(data) {
                    $('.successMessage').html(data);
                });

            });

        });
    </script>