<?php
        require_once "../../includedPages/connect.php";
        $req="SELECT * FROM classes";
        $req_build=$bdd->prepare($req);
        $req_exe=$req_build->execute();
        $req_fetch=$req_build->rowCount($req);

        $reqM="SELECT * FROM matieres";
        $req_buildM=$bdd->prepare($reqM);
        $req_exeM=$req_buildM->execute();
    ?>
    

    <div class="successMessage">

    </div>

    <div class="ajouterClasseContainer"><br />
        <div class="title">
            <i class="save icon"></i><b>Relevés de notes par classes et semestre</b><br /><br />

        </div>
    </div>
    
    <div style="font-size: 13px;">

        <?php
            if(!$req_fetch) {
                echo "<div class='ui red segment' style='font-size: 13px;'><center><b>Aucune classe n'a été reférencée !</b></center></div>";
            } else {
        
        ?>

        <table>
            <tr>
                <td>
                    Sélectionnez la classe et le semestre correspondants
                    <i class="chevron right icon"></i>
                </td>
                <td>
                <select style="outline: none; padding: 4px 8px 4px 8px; font-size: 13px;" id="classe">
                <?php
                    while ($data=$req_build->fetch()) {
                        echo "<option value='".$data['id_classe']."'>".$data['nom_classe']."</option>";
                    }
                ?>
                </select>
                <select style="outline: none; padding: 4px 8px 4px 8px; font-size: 13px;" id="semestre">
                    <option value="trimestreI">Trimestre I</option>
                    <option value="trimestreII">Trimestre II</option>
                    <option value="trimestreIII">Trimestre III</option>
                </select>
                <select style="outline: none; padding: 4px 8px 4px 8px; font-size: 13px;" id="matiere">
                <?php
                    while ($dataM=$req_buildM->fetch()) {
                        echo "<option value='".$dataM['id']."'>".$dataM['nom_matiere']."</option>";
                    }
                ?>
                </select>
                </td>
                
            </tr>
        </table>


        <div id="resultatRechercheClasse"></div>

        
        <?php
            }
        ?>

    </div>

    <script>
        
        $(document).ready(function() {

            var classe = $('#classe').val();
            var semestre = $('#semestre').val();
            var matiere = $('#matiere').val();
                
            $.post("/PROJET_ADEC/traitementsAjax/rechercheReleves.php",{classe:classe, semestre:semestre, matiere:matiere}, function(data) {
                $('#resultatRechercheClasse').html(data);
            });

            $('#classe').change(function() {
                var classe = $(this).val();
                var semestre = $('#semestre').val();
                var matiere = $('#matiere').val();
                
                $.post("/PROJET_ADEC/traitementsAjax/rechercheReleves.php", {classe:classe, semestre:semestre, matiere:matiere}, function(data) {
                    $('#resultatRechercheClasse').html(data);
                });

            });

            $('#semestre').change(function() {
                var classe = $('#classe').val();
                var semestre = $(this).val();
                var matiere = $('#matiere').val();
                
                $.post("/PROJET_ADEC/traitementsAjax/rechercheReleves.php", {classe:classe, semestre:semestre, matiere:matiere}, function(data) {
                    $('#resultatRechercheClasse').html(data);
                });

            });

            $('#matiere').change(function() {
                var classe = $('#classe').val();
                var semestre = $("#semestre").val();
                var matiere = $(this).val();
                
                $.post("/PROJET_ADEC/traitementsAjax/rechercheReleves.php", {classe:classe, semestre:semestre, matiere:matiere}, function(data) {
                    $('#resultatRechercheClasse').html(data);
                });

            });

        });
        
    </script>
