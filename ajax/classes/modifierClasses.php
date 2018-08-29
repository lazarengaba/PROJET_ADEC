<?php
        require_once "../../includedPages/connect.php";
        $req="SELECT * FROM niveaux ORDER BY num_niveau";
        $req_build=$bdd->prepare($req);
        $req_exe=$req_build->execute();
    ?>

    <div class="successMessage">

    </div>

    <div class="ajouterClasseContainer"><br />
        <div class="title">
            <i class="edit icon"></i><b>Modifier une classe</b><br /><br />

        </div>
    </div>
    
    <div style="font-size: 13px;">
        <table>
            <tr>
                <td>
                    Saisir le nom de la classe à modifier
                    <i class="chevron right icon"></i>
                </td>
                <td>
                    <input type="text" class="input" placeholder="Saisir ici ..." id="chercheClasseModifier">
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <div class="resultatRechercheClasse"></div>
                </td>
            </tr>
        </table>
        
    </div>

    <script>
        
        $(document).ready(function() {
           
           $('#chercheClasseModifier').keyup(function() {
               if ($('#chercheClasseModifier').val().length>=3) {

                   var chercheClasseModifier = $('#chercheClasseModifier').val();

                   $('.resultatRechercheClasse').show();

                   $.post('/PROJET_ADEC/traitementsAjax/rechercheClasse.php', {chercheClasseModifier:chercheClasseModifier}, function(data) {
                        $('.resultatRechercheClasse').html(data);
                    });
                   
               } else {
                $('.resultatRechercheClasse').hide();                   
               }
           });
        });
        
    </script>
