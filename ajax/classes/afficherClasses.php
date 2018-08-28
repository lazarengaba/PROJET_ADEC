<?php
        require_once "../../includedPages/connect.php";
        $req="SELECT * FROM niveaux ORDER BY num_niveau";
        $req_build=$bdd->prepare($req);
        $req_exe=$req_build->execute();
    ?>

    <div class="successMessage">

    </div>

    <div class="ajouterClasseContainer"><br />
        <div class="title">
            <i class="list icon"></i><b>Liste des classes ajoutées</b><br /><br />
        </div>
    </div>

    <div class="listeClasses"></div>

    <script>
        $(document).ready(function() {
            recupClasses();
	
            function recupClasses() {
                $.post('/PROJET_ADEC/traitementsAjax/recuperationClasses.php', function(data) {
                    $('.listeClasses').html(data);
                });
            }
            setInterval(recupClasses,2000);
        });
    </script>