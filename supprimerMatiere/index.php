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
        Supprimer la matière <b><?=$data['nom_matiere']; ?></b> ?&nbsp;&nbsp;&nbsp;&nbsp;

        <button id="supprimerEleveBouton" class="ui red button mini" style="border-radius: 0; width: 150px;">
            <i class="trash icon"></i>Supprimer
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
            
            $.post('/PROJET_ADEC/supprimerMatiere/control.php',{idMatiere:idMatiere}, function(data) {
                window.close();
            });
            
        });
        
        $('#annulerSupprimerEleveBouton').click(function() {
            window.close();
        });

    </script>