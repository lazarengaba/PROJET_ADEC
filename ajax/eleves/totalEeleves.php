<?php
        require_once "../../includedPages/connect.php";
        $req="SELECT * FROM classes LEFT OUTER JOIN niveaux ON niveau_classe = nom_niveau ORDER BY num_niveau DESC";
        $req_build=$bdd->prepare($req);
        $req_exe=$req_build->execute();
        $req_lines=$req_build->rowCount($req);
    ?>

    <div class="successMessage">

    </div>

    <div class="ajouterClasseContainer"><br />
        <div class="title">
            <i class="list icon"></i><b>Liste des élèves répartie par classe</b><br /><br />

            <select style="outline: none; padding: 4px 8px 4px 8px;" id="classe">

            <?php
            
                while ($data=$req_build->fetch()) {
                    echo "<option>".$data['nom_classe']."</option>";
                }
            
            ?>

            </select>

        </div>
    </div><br />

    <div class="listeEleves"></div>

    <script>
        $(document).ready(function() {
            var classe = $('#classe').val();
            
            $.post('/PROJET_ADEC/traitementsAjax/recuperationElevesParclasse.php', {classe:classe}, function(data) {
                $('.listeEleves').html(data);
            });
            
            $('#classe').change(function() {
                var classe = $(this).val();
            
                $.post('/PROJET_ADEC/traitementsAjax/recuperationElevesParclasse.php', {classe:classe}, function(data) {
                    $('.listeEleves').html(data);
                });
            });

        });
    </script>