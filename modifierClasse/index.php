<?php
    $titre = "ADEC";
    require_once "../includedPages/connect.php";
    require_once "../includedPages/headerHtml.php";
    require_once "../includedPages/topBar.php";
    
?><br />

<div style="margin-left: 15px; font-size: 13px;">
    <input type="text" value="<?=$_GET['nomClasse']; ?>" class="input" style="width: 75px;" id="ancienNomClasse" > <i class="chevron right icon"></i> Nouveau nom <i class="chevron right icon"></i>
    <input type="text" class="input" placeholder="Entrez le nouveau nom ..." id="nouveauNomClasse">

    <button class="ui violet button mini" style="border-radius: 0; width: 200px;" id="modifierClasseBouton">
    <i class="check icon"></i>Appliquer la modification
    </button>

    <button class="ui button mini" style="border-radius: 0; width: 200px;" id="annulerModifierClasseBouton">
        <i class="times icon"></i>Annuler l'opération
    </button>

</div><br />

<hr />

    
<?php
    require_once "../includedPages/bottomHtml.php";
?>

 <script>
    $(document).ready(function() {
        $('#modifierClasseBouton').click(function() {

            if ($('#nouveauNomClasse').val()!="") {
                var ancienNomClasse = $('#ancienNomClasse').val();
                var nouveauNomClasse = $('#nouveauNomClasse').val();

                $.post('/PROJET_ADEC/modifierClasse/control.php',{ancienNomClasse:ancienNomClasse, nouveauNomClasse:nouveauNomClasse}, function(data) {
                    
                });

                window.close();
  
            }
        });

        $('#annulerModifierClasseBouton').click(function() {
            window.close();
        });

    });
</script>