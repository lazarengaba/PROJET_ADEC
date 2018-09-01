<?php
    $titre = "ADEC";
    require_once "../includedPages/connect.php";
    require_once "../includedPages/headerHtml.php";

    $req="SELECT * FROM classes LEFT OUTER JOIN eleves ON id_classe=classe_eleve GROUP BY nom_classe";
    $req_build=$bdd->prepare($req);
    $req_exe=$req_build->execute();
    $req_check=$req_build->rowCount($req);
    
?>
<div class="ui container" style="font-size: 13px;">
    <div class="ui grid">
        <div class="row">
            <div class="column sixteen wide">
                <div class="etatEcolage" style="background-color: #16ab39;">
                    <b>Etat d'écolages soldés du <?=date('d-m-Y'); ?></b>
                </div><br />

                <select style="outline: none; padding: 4px 8px 4px 8px;" id="classeEleve">
                    <?php

                        while ($data=$req_build->fetch()) {
                            
                            echo "<option value='".$data['id_classe']."'>".$data['nom_classe']."</option>";
                            
                        }
                    ?>
                </select><br /><br />

                <div id="bodySoldeEcolage"></div>
            </div>
        </div>
    </div>
</div>

    
<?php
    require_once "../includedPages/bottomHtml.php";
?>

 <script>
    $(document).ready(function() {
    
        var classeEleve = $('#classeEleve').val();

        $.post("/PROJET_ADEC/ecolageSolde/control.php",{classeEleve:classeEleve}, function(data) {
            $('#bodySoldeEcolage').html(data);
        });

        $('#classeEleve').change(function() {
            var classeEleve = $('#classeEleve').val();
            $.post("/PROJET_ADEC/ecolageSolde/control.php",{classeEleve:classeEleve}, function(data) {
                $('#bodySoldeEcolage').html(data);
            });
        });
       

    });
</script>