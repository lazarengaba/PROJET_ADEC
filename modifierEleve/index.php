<?php
    $titre = "ADEC";
    require_once "../includedPages/connect.php";
    require_once "../includedPages/headerHtml.php";
    require_once "../includedPages/topBar.php";

    $req = "SELECT * FROM eleves WHERE mle = ?";
    $req_build = $bdd->prepare($req);
    $req_exe = $req_build->execute(array($_GET['matricule']));
    $data=$req_build->fetch();

    $classe = $bdd->prepare("SELECT * FROM classes LEFT OUTER JOIN niveaux ON niveau_classe=nom_niveau ORDER BY num_niveau DESC, nom_classe");
    $classe_exe=$classe->execute();
    
?><br /><br />
  
<div style="margin-left: 20px;">
    <table class="tableAjoutEleve">
        <tr>
            <td width="200">
                Classe
            </td>
            <td width="350">
                <select style="outline: none; padding: 4px 8px 4px 8px;" id="classeEleve">
            <?php

                while ($dataClasses=$classe->fetch()) {
                   
                    echo "<option ".$selected." value='".$dataClasses['nom_classe']."'>".$dataClasses['nom_classe']."</option>";
                }
            ?>
                </select>
                <span style="background-color: #e44b1c;padding: 5px; color: #fff; border-radius: 2px;"><b><?=$data['mle']; ?></b></span>
                <input type="hidden" id="matriculeEleve" style="width: 103px;" placeholder="Matricule ..." value="<?=$data['mle']; ?>" >
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
                <input type="text" class="input" id="nomDeFamilleEleve" value="<?=$data['nom_de_famille']; ?>">
            </td>
            <td>
                Nom complet parent / tuteur
            </td>
            <td>
                <input type="text" class="input" id="nomParentEleve" value="<?=$data['nom_complet_tuteur']; ?>">
            </td>
        </tr>
        <tr>
            <td>prénom (s)</td>
            <td>
                <input type="text" class="input" id="prenomEleve" value="<?=$data['prenom']; ?>">
            </td>
            <td>
                Adresse
            </td>
            <td>
                <input type="text" class="input" id="adresseParentEleve" value="<?=$data['adresse_tuteur']; ?>">
            </td>
        </tr>
        <tr>
            <td>Date de naissance</td>
            <td>
                <input type="text" class="input" id="dateNaissEleve" value="<?=$data['date_de_naissance']; ?>">
            </td>
            <td>
                Contact
            </td>
            <td>
                <input type="text" class="input" id="contactParentEleve" value="<?=$data['contact_tuteur']; ?>">
            </td>
        </tr>
        <tr>
            <td>Lieu de naissance</td>
            <td>
                <input type="text" class="input" id="lieuNaissEleve" value="<?=$data['lieu_de_naissance']; ?>">
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
                
            </td>
        </tr>
    </table><br />
</div>

    <div style="margin-left: 15px; font-size: 13px; border-top: 1px solid #ccc;"><br />

        <button class="ui violet button mini" style="border-radius: 0; width: 200px;" id="modifierClasseBouton">
        <i class="check icon"></i>Appliquer la modification
        </button>

        <button class="ui button mini" style="border-radius: 0; width: 200px;" id="annulerModifierClasseBouton">
            <i class="times icon"></i>Annuler l'opération
        </button>

    </div><br />

       
<?php
    require_once "../includedPages/bottomHtml.php";
?>

    <script>

        $(document).ready(function() {

            $('#modifierClasseBouton').click(function() {

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
                $.post('/PROJET_ADEC/modifierEleve/control.php',{
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
                    window.close();

                });
            } else {
                $('.successMessage').html("<div style='background-color: #fab5b5; color: #e20a0a; padding: 4px 15px; text-align: center; margin-top: 5px;'>Impossible de retourner un champs vide !</div>");
            }

            $('.successMessage').click(function() {
                $(this).html("");
            });

            });

            $('#annulerModifierClasseBouton').click(function() {
                window.close();
            });

        });
        
    </script>
