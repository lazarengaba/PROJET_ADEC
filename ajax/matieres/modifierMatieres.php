<?php
        require_once "../../includedPages/connect.php";
       
    ?>

    <div class="successMessage">

    </div>

    <div class="ajouterClasseContainer"><br />
        <div class="title">
            <i class="edit icon"></i><b>Modifier une matière</b><br /><br />

        </div>
    </div>
    <div style="font-size: 13px;">
        <table>
            <tr>
                <td>
                    Saisir le nom de la matière à modifier
                    <i class="chevron right icon"></i>
                </td>
                <td>
                    <input type="text" class="input" placeholder="Saisir ici ..." id="nomMatiereModif">
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
           
           $('#nomMatiereModif').keyup(function() {

               var nomMatiereModif = $(this).val();

               if (nomMatiereModif.length>=1) {

                   $('.resultatRechercheClasse').show();

                   $.post('/PROJET_ADEC/traitementsAjax/rechercheMatiereModif.php', {nomMatiereModif:nomMatiereModif}, function(data) {
                        $('.resultatRechercheClasse').html(data);
                    });
                   
               } else {
                $('.resultatRechercheClasse').hide();                   
               }
           });
        });
        
    </script>
