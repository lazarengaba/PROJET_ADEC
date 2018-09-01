<?php
        require_once "../includedPages/connect.php";
        $titre = "ADEC";
        require_once "../includedPages/headerHtml.php";
        require_once "../includedPages/topBar.php";

        $req = "SELECT * FROM classes WHERE id_classe = ?";
        $req_build = $bdd->prepare($req);
        $req_exe = $req_build->execute(array($_GET['id']));
        $data=$req_build->fetch();
    ?><br />

    <input type="hidden" value="<?=$_GET['id']; ?>" id="idClasseEcolage">
    <div style="margin-left: 20px; font-size: 13px;">
        Saisir le nouveau solde de la classe
        <i class="chevron right icon"></i>
        <b><?=$data['nom_classe']; ?></b>&nbsp;&nbsp;

        <input type="number" class="input" value="<?=$data['solde_ecolage']; ?>" id="nouveauSoldeEcolage">

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

            var idClasseEcolage = $('#idClasseEcolage').val();
            var nouveauSoldeEcolage = $('#nouveauSoldeEcolage').val();
            
            if (nouveauSoldeEcolage!="") {
                $.post('/PROJET_ADEC/soldeEcolageParam/control.php',{idClasseEcolage:idClasseEcolage, nouveauSoldeEcolage:nouveauSoldeEcolage}, function(data) {
                    window.close();
                });
            }
            
        });
        
        $('#annulerSupprimerEleveBouton').click(function() {
            window.close();
        });

    </script>