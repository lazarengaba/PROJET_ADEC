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
            <i class="book icon"></i><b>Ajouter une matière</b><br /><br />

        </div>
    </div>
    <div style="font-size: 13px;">
        Saisir le nom de la matière dans le champs <i class="chevron right icon"></i>

        <input type="text" class="input" placeholder="Saisir ici ..." id="nomMatiere">&nbsp;&nbsp;
        <input type="number" min="1" max="6" class="input" placeholder="Saisir le coefficient ici ..." id="coeffMatiere">&nbsp;&nbsp;

        <button class="ui button violet mini" style="border-radius: 0;" id="ajouterClasseBtn">
            Ajouter la matière
        </button>
        
    </div>
    

    <script>
        $(document).ready(function() {

            $('#ajouterClasseBtn').click(function() {

                var nomMatiere=$('#nomMatiere').val();
                var coeffMatiere=$('#coeffMatiere').val();

                if (nomMatiere!="" && coeffMatiere!="") {
                        
                    $.post('/PROJET_ADEC/traitementsAjax/ajouterMatiere.php', {nomMatiere:nomMatiere,coeffMatiere:coeffMatiere}, function(data) {
                        $('.successMessage').html(data);
                        $('#nomMatiere').val("");
                        $('#coeffMatiere').val("");
                    });

                } 

            });

        });
    </script>
