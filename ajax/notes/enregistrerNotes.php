<?php
        require_once "../../includedPages/connect.php";
        $req="SELECT * FROM classes";
        $req_build=$bdd->prepare($req);
        $req_exe=$req_build->execute();

        
    ?>
    

    <div class="successMessage">

    </div>

    <div class="ajouterClasseContainer"><br />
        <div class="title">
            <i class="save icon"></i><b>Enregistrement de notes</b><br /><br />

        </div>
    </div>
    
    <div style="font-size: 13px;">
        <table>
            <tr>
                <td>
                    Sélectionnez la classe et la matière correspondante
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
                </td>
                <td>
                   <select name="" id="" class="matieresClasse" style='outline: none; padding: 4px 8px 4px 8px; font-size: 13px;' id='matNotes'>

                   </select> 
                </td>
            </tr>
        </table>

        <div id="resultatRechercheClasse"></div>

    </div>

    <script>
        
        $(document).ready(function() {

            var classe = $('#classe').val();
           
            $.post('/PROJET_ADEC/traitementsAjax/rechercheMatieresClasse.php', {classe:classe}, function(data) {
                $('.matieresClasse').html(data);
            });

            
            var semestre = $('#semestre').val();
            var matiere = $('.matieresClasse').val();
            $.post('/PROJET_ADEC/traitementsAjax/affichageLignesNotes.php', {classe:classe, semestre:semestre, matiere:matiere}, function(data) {
                $('#resultatRechercheClasse').html(data);
            });
            
           $('#classe').change(function() {
                var classe = $(this).val();
                $.post('/PROJET_ADEC/traitementsAjax/rechercheMatieresClasse.php', {classe:classe}, function(data) {
                    $('.matieresClasse').html(data);
                });
           });

           $('#classe').change(function() {
                var classe = $(this).val();
                var semestre = $('#semestre').val();
                var matiere = $('.matieresClasse').val();
                $.post('/PROJET_ADEC/traitementsAjax/affichageLignesNotes.php', {classe:classe, semestre:semestre, matiere:matiere}, function(data) {
                    $('#resultatRechercheClasse').html(data);
                });
           });

           $('#semestre').change(function() {
                var classe = $('#classe').val();
                var semestre = $(this).val();
                var matiere = $('.matieresClasse').val();
                $.post('/PROJET_ADEC/traitementsAjax/affichageLignesNotes.php', {classe:classe, semestre:semestre, matiere:matiere}, function(data) {
                    $('#resultatRechercheClasse').html(data);
                });
           });


           $('.matieresClasse').change(function() {
                var matiere = $(this).val();
                var classe = $('#classe').val();
                var semestre = $('#semestre').val();
                $.post('/PROJET_ADEC/traitementsAjax/affichageLignesNotes.php', {classe:classe, semestre:semestre, matiere:matiere}, function(data) {
                    $('#resultatRechercheClasse').html(data);
                });
           });

        });
        
    </script>
