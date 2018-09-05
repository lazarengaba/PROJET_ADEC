<?php
    require_once "../../includedPages/connect.php";

    $reqS="SELECT * FROM classes";
    $reqS_build=$bdd->prepare($reqS);
    $reqS_build_exe=$reqS_build->execute();
    $reqS_Rows=$reqS_build->rowCount($reqS);

    if (!$reqS_Rows) {
        echo "<div style='font-size: 13px;' class='ui red segment'>
                    <center><b>Aucune classe n'a été enregistrée !<b></center>
                </div>";
    }

?>


    <div class="ajouterClasseContainer"><br />
        <div class="title">
            <i class="print icon"></i><b>Impression de bulletin</b><br />
        </div><br /><br />

        <form action="/PROJET_ADEC/traitementsForms/traitement3.php" method="get">
        <select name="semestre" id="semestre" style="padding: 4px;">
            <option value="trimestreI">Trimestre I</option>
            <option value="trimestreII">Trimestre II</option>
            <option value="trimestreIII">Trimestre III</option>
        </select>

        <select name="classe" id="classe" style="padding: 4px;">
            <?php
                while ($data=$reqS_build->fetch()) {
                    echo "<option value='".$data['id_classe']."'>".$data['nom_classe']."</option>";
                }
            ?>
        </select>

        <button type="submit" class="ui violet button mini" style="border-radius: 0px; width: 150px;" id="imprimerBulletin">
            <i class="print icon"></i>Imprimer
        </button>
        </form>

    </div>
<!--
    <script>
        $('#imprimerBulletin').click(function() {
            $post("/PROJET_ADEC/traitementsAjax/")
        });
    </script>-->

