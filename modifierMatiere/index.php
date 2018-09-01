<?php
        require_once "../includedPages/connect.php";
        $titre = "ADEC";
        require_once "../includedPages/headerHtml.php";
        require_once "../includedPages/topBar.php";

        $req = "SELECT * FROM matieres WHERE id = ?";
        $req_build = $bdd->prepare($req);
        $req_exe = $req_build->execute(array($_GET['idMatiere']));
        $data=$req_build->fetch();
    ?><br />

    <input type="hidden" value="<?=$_GET['idMatiere']; ?>" id="idMatiere">
    <div style="margin-left: 20px; font-size: 13px;">
        Saisir les nouvelles données
        <i class="chevron right icon"></i>

        <input type="text" class="input" value="<?=$data['nom_matiere']; ?>" id="nomMatiere" >
        <input type="number" class="input" value="<?=$data['coeff_matiere']; ?>" id="coeffMatiere" >

        <button id="supprimerEleveBouton" class="ui violet button mini" style="border-radius: 0; width: 150px;">
            <i class="edit icon"></i>Modifier
        </button>

        <button id="annulerSupprimerEleveBouton" class="ui button mini" style="border-radius: 0; width: 150px;">
            <i class="times icon"></i>Annuler
        </button>

    </div>
    <br />

    <div style="border-bottom: 1px solid #ccc;"></div>

<?php
    require_once "../includedPages/bottomHtml.php";
?>

    <script>
        $('#supprimerEleveBouton').click(function() {

            var idMatiere = $('#idMatiere').val();
            var nomMatiere = $('#nomMatiere').val();
            var coeffMatiere = $('#coeffMatiere').val();
            
            if (nomMatiere!="" && coeffMatiere!="") {
                $.post('/PROJET_ADEC/modifierMatiere/control.php',{idMatiere:idMatiere, nomMatiere:nomMatiere, coeffMatiere:coeffMatiere}, function(data) {
                    window.close();
                });
            }
            
        });
        
        $('#annulerSupprimerEleveBouton').click(function() {
            window.close();
        });

    </script>