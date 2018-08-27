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
            <i class="plus icon"></i><b>Ajouter une classe</b><br /><br />

        </div>
    </div>
    <div>
        Sélectionnez le niveau correspondant <i class="chevron right icon"></i>

        <select name="niveauClasse" id="niveauClasse" style="outline: none; padding: 4px 8px 4px 8px;">
            <option disabled selected>CLiquez ici pour sélectionner</option>
            <?php
                while ($data=$req_build->fetch()) {
                    echo "<option>".htmlspecialchars_decode($data['nom_niveau'])."</option>";
                }

                $req_build->closeCursor();
            ?>
        </select>

        <input type="text" class="input" placeholder="Saisir le nom de la classe ..." id="nomClasse">

        <button class="ui button violet mini" style="border-radius: 0;" id="ajouterClasseBtn">
            Ajouter la classe
        </button>
        <div class="errorInvalidChoice">
            <i class="delete icon"></i>    
            La sélection soumise est invalide !
        </div>
        
    </div>
    

    <script>
        $(document).ready(function() {

            $('#niveauClasse').change(function() {
                var niveauClasse = $(this).val();
                
                if (niveauClasse=="2nde"||niveauClasse=="1ere"||niveauClasse=="Tle") {
                    $('#nomClasse').show();
                } else {
                    $('#nomClasse').hide();
                }

            });

            $('#ajouterClasseBtn').click(function() {

                var niveauClasse = $(this).val();

                if ($('#niveauClasse').val()!=null) {

                    if (niveauClasse=="2nde"||niveauClasse=="1ere"||niveauClasse=="Tle") {
                        
                    } else {
                        $.post('/PROJET_ADEC/traitementsAjax/ajouterClasse.php', {niveauClasse:niveauClasse}, function(data) {
                            $('.successMessage').html(data);
                        });
                    }

                } else {
                    $('.errorInvalidChoice').css({
                        'opacity':'1'    
                    });
                }
            });

            $('.errorInvalidChoice').click(function() {
                $(this).css({
                        'opacity':'0'    
                });

            });

        });
    </script>
