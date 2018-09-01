<?php
    $titre = "ADEC";
    require_once "../includedPages/connect.php";
    require_once "../includedPages/headerHtml.php";
    require_once "../includedPages/topBar.php";
    
?><br />

<div style="margin-left: 15px; font-size: 13px;">
    <input type="hidden" value="<?=$_GET['nomClasse']; ?>" class="input" style="width: 75px;" id="ancienNomClasse" >
    
    Voulez - vous vraiment supprimer la classe <b><?=$_GET['nomClasse']; ?> ?</b> <span style="color: red;">Cette action sera irréversible et entraînra la perte de toutes les données relatives.</span>&nbsp;&nbsp;

    <button class="ui red button mini" style="border-radius: 0; width: 110px;" id="modifierClasseBouton">
        <i class="trash icon"></i>Supprimer
    </button>

    <button class="ui button mini" style="border-radius: 0; width: 110px;" id="annulerModifierClasseBouton">
        <i class="times icon"></i>Annuler
    </button>

</div><br />

<hr />

    
<?php
    require_once "../includedPages/bottomHtml.php";
?>

 <script>
    $(document).ready(function() {
        $('#modifierClasseBouton').click(function() {

            var ancienNomClasse = $('#ancienNomClasse').val();

            $.post('/PROJET_ADEC/supprimerClasse/control.php',{ancienNomClasse:ancienNomClasse}, function(data) {
                
            });

            window.close();
        });

        $('#annulerModifierClasseBouton').click(function() {
            window.close();
        });

    });
</script>