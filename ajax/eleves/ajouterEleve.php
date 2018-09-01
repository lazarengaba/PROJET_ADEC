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
            <i class="plus icon"></i><b>Ajouter un (e) élève</b><br /><br />
        </div>
    </div>

    <div style="border-bottom: 1px solid #ccc;"></div><br />

    <?php
        if ($nb_row==0) {
            echo "<center><h3><b><i class='times icon'></i>Aucune classe n'a été répertoriée !</h3></b></center>";
        } else {
            
    ?>
    <center>
    <table class="tableAjoutEleve">
        <tr>
            <td width="200">
                Classe
            </td>
            <td width="350">
                <select style="outline: none; padding: 4px 8px 4px 8px;" id="classeEleve">
            <?php
                while ($data=$req_build->fetch()) {
                    echo "<option value='".$data['nom_classe']."'>".$data['nom_classe']."</option>";
                }
            ?>
                </select>
                <input type="text" class="input" id="matriculeEleve" style="width: 103px;" placeholder="Matricule ...">
            </td>
            <td width="250" colspan="2">
                <b>INFO PARENT / TUTEUR</b>
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
                Nom complet parent / tuteur&nbsp;&nbsp;&nbsp;
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
                Adresse
            </td>
            <td>
                <input type="text" class="input" id="adresseParentEleve">
            </td>
        </tr>
        <tr>
            <td>Date de naissance</td>
            <td>
                <input type="text" class="input" id="dateNaissEleve">
            </td>
            <td>
                Contact
            </td>
            <td>
                <input type="text" class="input" id="contactParentEleve">
            </td>
        </tr>
        <tr>
            <td>Lieu de naissance</td>
            <td>
                <input type="text" class="input" id="lieuNaissEleve">
            </td>
            <td>
                Civilité
            </td>
            <td>
                <select style="outline: none; padding: 4px 8px 4px 8px;" id="civiliteParentEleve">
                    <option value="Monsieur">Monsieur</option>
                    <option value="Madame">Madame</option>
                    <option value="Mademoiselle">Mademoiselle</option>
                </select>
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

            var classeEleve = $('#classeEleve').val();
            var matriculeEleve = $('#matriculeEleve').val();
            var nomDeFamilleEleve = $('#nomDeFamilleEleve').val();
            var nomParentEleve = $('#nomParentEleve').val();
            var prenomEleve = $('#prenomEleve').val();
            var adresseParentEleve = $('#adresseParentEleve').val();
            var dateNaissEleve = $('#dateNaissEleve').val();
            var contactParentEleve = $('#contactParentEleve').val();
            var lieuNaissEleve = $('#lieuNaissEleve').val();
            var civiliteParentEleve = $('#civiliteParentEleve').val();
            var sexeEleve = $('#sexeEleve').val();

            if (matriculeEleve!=""&&nomDeFamilleEleve!=""&&nomParentEleve!=""&&prenomEleve!=""&&adresseParentEleve!=""&&dateNaissEleve!=""&&contactParentEleve!=""&&lieuNaissEleve!="") {
                $.post('/PROJET_ADEC/traitementsAjax/inscrireEleve.php',{
                    matriculeEleve:matriculeEleve,
                    classeEleve:classeEleve,
                    nomDeFamilleEleve:nomDeFamilleEleve,
                    nomParentEleve:nomParentEleve,
                    prenomEleve:prenomEleve,
                    adresseParentEleve:adresseParentEleve,
                    dateNaissEleve:dateNaissEleve,
                    contactParentEleve:contactParentEleve,
                    lieuNaissEleve:lieuNaissEleve,
                    civiliteParentEleve:civiliteParentEleve,
                    sexeEleve:sexeEleve
                }, function(data) {
                    $('.successMessage').html(data);
                    $('#matriculeEleve').val("");
                    $('#nomDeFamilleEleve').val("");
                    $('#nomParentEleve').val("");
                    $('#prenomEleve').val("");
                    $('#adresseParentEleve').val("");
                    $('#dateNaissEleve').val("");
                    $('#contactParentEleve').val("");
                    $('#lieuNaissEleve').val("");
                });
            } else {
                $('.successMessage').html("<div style='background-color: #fab5b5; color: #e20a0a; padding: 4px 15px; text-align: center; margin-top: 5px;'>Impossible de retourner un champs vide !</div>");
            }
            
            $('.successMessage').click(function() {
                $(this).html("");
            });

        });
    </script>