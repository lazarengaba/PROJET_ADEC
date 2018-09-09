<?php
        require_once "../../includedPages/connect.php";
        $req="SELECT * FROM classes";
        $req_build=$bdd->prepare($req);
        $req_exe=$req_build->execute();
        $req_rows=$req_build->rowCount($req);
    ?>

    <div class="successMessage">

    </div>

    <div class="ajouterClasseContainer"><br />
        <div class="title">
            <i class="book icon"></i><b>Ajouter une matière à une classe</b><br /><br />
        </div>
    </div>

    <?php
        if (!$req_rows) {
            echo "<div class='ui red segment' style='font-size: 13px;'><center><i class='times icon'></i><b>Aucune classe n'a été enregistrée !</b></center></div>";
        } else {
    ?>
            <div style="font-size: 13px;">
                Saisir le nom de la matière dans le champs <i class="chevron right icon"></i>
                
                <select id="classe" style="outline: none; padding: 4px 8px 4px 8px; font-size: 13px;">
                    <?php
                        while ($dataS=$req_build->fetch()) {
                    ?>

                            <option value="<?=$dataS['id_classe']; ?>"><?=$dataS['nom_classe']; ?></option>

                    <?php
                        }
                    ?>
                </select>

                <input type="text" class="input" placeholder="Saisir le nom de la matière ici ..." id="nomMatiere">&nbsp;&nbsp;
                <input type="number" min="1" max="6" class="input" placeholder="Saisir le coefficient ici ..." id="coeffMatiere">&nbsp;&nbsp;

                <button class="ui button violet mini" style="border-radius: 0;" id="ajouterClasseBtn">
                    Ajouter la matière
                </button>
            </div>
    <?php
        }
        
    ?>


    

    <script>
        $(document).ready(function() {

            $('#ajouterClasseBtn').click(function() {

                var nomMatiere=$('#nomMatiere').val();
                var coeffMatiere=$('#coeffMatiere').val();
                var classe = $('#classe').val();

                if (nomMatiere!="" && coeffMatiere!="") {
                        
                    $.post('/PROJET_ADEC/traitementsAjax/ajouterMatiere.php', {classe:classe, nomMatiere:nomMatiere,coeffMatiere:coeffMatiere}, function(data) {
                        $('.successMessage').html(data);
                        $('#nomMatiere').val("");
                        $('#coeffMatiere').val("");
                    });

                } 

            });

        });
    </script>
