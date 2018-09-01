<?php
    $titre = "ADEC";
    require_once "../includedPages/connect.php";
    require_once "../includedPages/headerHtml.php";
    require_once "../includedPages/topBar.php";

    $req = "SELECT * FROM enseignants WHERE mle_enseignant = ?";
    $req_build = $bdd->prepare($req);
    $req_exe = $req_build->execute(array($_GET['matricule']));
    $data=$req_build->fetch();

?><br /><br />
  
<div style="margin-left: 20px;">
    <table class="tableAjoutEleve">
        <tr>
            <td width="200">
                Matricule
            </td>
            <td width="350">
                
                <span style="background-color: #e44b1c;padding: 5px; color: #fff; border-radius: 2px;"><b><?=$data['mle_enseignant']; ?></b></span>
                <input type="hidden" id="matriculeEleve" style="width: 103px;" placeholder="Matricule ..." value="<?=$data['mle_enseignant']; ?>" >
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
                <input type="text" class="input" id="nomDeFamilleEleve" value="<?=$data['nom_enseignant']; ?>">
            </td>
            <td>
                Email
            </td>
            <td>
                <input type="text" class="input" id="nomParentEleve" value="<?=$data['email_enseignant']; ?>">
            </td>
        </tr>
        <tr>
            <td>prénom (s)</td>
            <td>
                <input type="text" class="input" id="prenomEleve" value="<?=$data['prenom_enseignant']; ?>">
            </td>
            <td>
                Téléphone
            </td>
            <td>
                <input type="text" class="input" id="adresseParentEleve" value="<?=$data['telephone_enseignant']; ?>">
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

            var matriculeEleve = $('#matriculeEleve').val();
            var nomDeFamilleEleve = $('#nomDeFamilleEleve').val();
            var nomParentEleve = $('#nomParentEleve').val();
            var prenomEleve = $('#prenomEleve').val();
            var adresseParentEleve = $('#adresseParentEleve').val();
            var sexeEleve = $('#sexeEleve').val();

            if (matriculeEleve!=""&&nomDeFamilleEleve!=""&&nomParentEleve!=""&&prenomEleve!=""&&adresseParentEleve!="") {
                $.post('/PROJET_ADEC/modifierEnseignant/control.php',{
                    matriculeEleve:matriculeEleve,
                    nomDeFamilleEleve:nomDeFamilleEleve,
                    prenomEleve:prenomEleve,
                    nomParentEleve:nomParentEleve,
                    adresseParentEleve:adresseParentEleve,
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
