<?php
        require_once "../../includedPages/connect.php";
        $req="SELECT * FROM classes LEFT OUTER JOIN niveaux ON niveau_classe=nom_niveau ORDER BY num_niveau DESC, nom_classe";
        $req_build=$bdd->prepare($req);
        $req_exe=$req_build->execute();
        $nb_row=$req_build->rowCount();
    ?>

    <div class="successMessage">

    </div>

    <div class="ajouterClasseContainer"><br />
        <div class="title">
            <i class="plus icon"></i><b>Ajouter un (e) enseignant (e)</b><br />
        </div>
    </div>

    <?php
        if ($nb_row==0) {
            echo "<div class='ui red segment' style='font-size: 13px;'><center><b>Aucune matière n'a été reférencée !</b></center></div>";
        } else {
            
    ?>
    <center>
    <table class="tableAjoutEleve">
        <tr>
            <td width="200">
                Matricule
            </td>
            <td width="350">
                
                <input type="text" class="input" id="matriculeEleve" placeholder="Matricule ...">
            </td>
            <td width="250" colspan="2">
                <b>AUTRES INFORMATION</b>
                <div style="border-bottom: 1px solid #ccc;"></div><br />
            </td>
        </tr>
        <tr>
            <td>
                Nom de famille
            </td>
            <td>
                <input type="text" class="input" id="nomDeFamilleEleve">
            </td>
            <td>
                Email&nbsp;&nbsp;&nbsp;
            </td>
            <td>
                <input type="text" class="input" id="nomParentEleve">
            </td>
        </tr>
        <tr>
            <td>prénom (s)</td>
            <td>
                <input type="text" class="input" id="prenomEleve">
            </td>
            <td>
                Téléphone&nbsp;&nbsp;&nbsp;
            </td>
            <td>
                <input type="text" class="input" id="adresseParentEleve">
            </td>
        </tr>
        <tr>
            <td>Sexe</td>
            <td>
                <select style="outline: none; padding: 4px 8px 4px 8px;" id="sexeEleve">
                    <option value="Masculin">Masculin</option>
                    <option value="Feminin">Feminin</option>
                </select>
            </td>
            <td>
                
            </td>
            <td>
                <button class="ui violet button mini" style="border-radius: 0; width: 200px;" id="inscrireEleveBouton">
                    <i class="sign in icon"></i>Valider l'inscription
                </button>
            </td>
        </tr>
    </table>
    </center>

    <?php

        }

    ?>

    <script>
        $('#inscrireEleveBouton').click(function() {

            var matriculeEleve = $('#matriculeEleve').val();
            var nomDeFamilleEleve = $('#nomDeFamilleEleve').val();
            var nomParentEleve = $('#nomParentEleve').val();
            var prenomEleve = $('#prenomEleve').val();
            var adresseParentEleve = $('#adresseParentEleve').val();
            var sexeEleve = $('#sexeEleve').val();

            if (matriculeEleve!=""&&nomDeFamilleEleve!=""&&nomParentEleve!=""&&prenomEleve!=""&&adresseParentEleve!="") {
                $.post('/PROJET_ADEC/traitementsAjax/inscrireEnseignant.php',{
                    matriculeEleve:matriculeEleve,
                    nomDeFamilleEleve:nomDeFamilleEleve,
                    nomParentEleve:nomParentEleve,
                    prenomEleve:prenomEleve,
                    adresseParentEleve:adresseParentEleve,
                    sexeEleve:sexeEleve
                }, function(data) {
                    $('.successMessage').html(data);
                    $('#matriculeEleve').val("");
                    $('#nomDeFamilleEleve').val("");
                    $('#nomParentEleve').val("");
                    $('#prenomEleve').val("");
                    $('#adresseParentEleve').val("");
                });
            } else {
                $('.successMessage').html("<div style='background-color: #fab5b5; color: #e20a0a; padding: 4px 15px; text-align: center; margin-top: 5px;'>Impossible de retourner un champs vide !</div>");
            }
            
            $('.successMessage').click(function() {
                $(this).html("");
            });

        });
    </script>