<?php
        require_once "../includedPages/connect.php";
        $titre = "ADEC";
        require_once "../includedPages/headerHtml.php";
        require_once "../includedPages/topBar.php";

        $req = "SELECT * FROM users WHERE mle_user = ?";
        $req_build = $bdd->prepare($req);
        $req_exe = $req_build->execute(array($_GET['matricule']));
        $data=$req_build->fetch();
    ?><br /><br />
    <input type="hidden" value="<?=$_GET['matricule']; ?>" id="matriculeEleve">
    <div style="margin-left: 20px; font-size: 13px;">
        Voulez-vous vraiment supprimer <b><?=$data['nom']." ".$data['prenom']; ?></b> de la liste ?&nbsp;&nbsp;

        <button id="supprimerEleveBouton" class="ui red button mini" style="border-radius: 0; width: 150px;">
            <i class="trash icon"></i>Supprimer
        </button>

        <button id="annulerSupprimerEleveBouton" class="ui button mini" style="border-radius: 0; width: 150px;">
            <i class="times icon"></i>Annuler
        </button>

    </div>
    <br /><br />

    <div style="border-bottom: 1px solid #ccc;"></div><br />

<?php
    require_once "../includedPages/bottomHtml.php";
?>

    <script>
        $('#supprimerEleveBouton').click(function() {

            var matriculeEleve = $('#matriculeEleve').val();
           
            $.post('/PROJET_ADEC/supprimerUser/control.php',{matriculeEleve:matriculeEleve}, function(data) {
                window.close();
            });
        });
        
        $('#annulerSupprimerEleveBouton').click(function() {
            window.close();
        });

    </script>