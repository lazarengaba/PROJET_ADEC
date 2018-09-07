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
            <i class="dollar icon"></i><b>Solder l'écolage d'un élève</b><br /><br />

        </div>
    </div>
    
    <div style="font-size: 13px;">
    <table>
            <tr>
                <td>
                    Saisir le nom, prénom ou matricule de l'élève
                    <i class="chevron right icon"></i>
                </td>
                <td>
                    <input type="text" class="input" placeholder="Saisir ici ..." id="chercheClasseModifier">
                    <a href="#" class="ui violet button mini" id="bankInscBtn" style="border-radius: 0px;">
                        Inscription par banque
                    </a>
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

    <div class="ui modal">
        <i class="close icon"></i>
        <div class="header">
            <i class="save icon"></i>Enregistrez le reçu bancaire
        </div>
        <div class="content">

            <table cellpadding="7" width="100%" style="font-size: 13px;">
                <tr>
                    <td>
                        <b>DATE DE L'OPERATION</b>
                    </td>
                    <td>
                        <input type="date" class="input" id="dateRecuBanque">
                    </td>
                    <td>
                        <b>NOM DU DEPOSANT</b>
                    </td>
                    <td>
                        <input type="text" class="input" id="nomDeposantBanque">
                    </td>
                </tr>
                <tr>
                    <td>
                        <b>CODE BANQUE</b>
                    </td>
                    <td>
                        <input type="text" class="input" id="codeBanque">
                    </td>
                    <td>
                        <b>MONTANT TOTAL DEPOSE</b>
                    </td>
                    <td>
                        <input type="number" min="0" class="input" id="montantRecuBanque">
                    </td>
                </tr>
                <tr>
                    <td>
                        <b>N° DE COMPTE</b>
                    </td>
                    <td>
                        <input type="text" class="input" id="compteRecuBanque">
                    </td>
                    <td>
                        <b>ELEVE</b>
                    </td>
                    <td>
                        <input type="text" class="input" id="eleveRecuBanque" >
                        
                    </td>
                </tr>
                <tr>
                    <td>
                        <b>TITULAIRE DU COMPTE</b>
                    </td>
                    <td>
                        <input type="text" class="input" id="titulaireRecuBanque">
                        
                    </td>
                    <td>
                        <b>MATRICULE</b>
                    </td>
                    <td>
                        <input type="text" class="input" id="mleRecuBanque">
                    </td>
                </tr>
                <tr>
                    <td>
                        <b>NUMERO DE RECU</b>
                    </td>
                    <td>
                        <input type="text" class="input" id="numRecuBanque">
                    </td>
                    <td></td>
                    <td></td>
                </tr>
            </table>


        </div>
        <div class="actions">
            <button class="ui violet button tiny approve" id="saveRecuBank" style="border-radius: 1px; width: 125px;">
                <i class="save icon"></i>Enregistrer
            </button>
            <button class="ui default button tiny cancel" style="border-radius: 1px; width: 125px;">
                <i class="times icon"></i>Annuler
            </button>
        </div>
        <div class="footer"></div>
    </div>

    <script>
        
        $(document).ready(function() {

            $('#bankInscBtn').click(function() {
                $('.ui.modal').modal('show');
            });
           
           $('#chercheClasseModifier').keyup(function() {
               if ($('#chercheClasseModifier').val().length>=3) {

                   var chercheClasseModifier = $('#chercheClasseModifier').val();

                   $('.resultatRechercheClasse').show();

                   $.post('/PROJET_ADEC/traitementsAjax/rechercheEleveSolderEcolage.php', {chercheClasseModifier:chercheClasseModifier}, function(data) {
                        $('.resultatRechercheClasse').html(data);
                    });
                   
               } else {
                $('.resultatRechercheClasse').hide();                   
               }
           });

           $('#saveRecuBank').click(function() {
               var dateRecuBanque = $('#dateRecuBanque').val();
               var nomDeposantBanque = $('#nomDeposantBanque').val();
               var codeBanque = $('#codeBanque').val();
               var montantRecuBanque = $('#montantRecuBanque').val();
               var compteRecuBanque = $('#compteRecuBanque').val();
               var eleveRecuBanque = $('#eleveRecuBanque').val();
               var titulaireRecuBanque = $('#titulaireRecuBanque').val();
               var mleRecuBanque = $('#mleRecuBanque').val();
               var numRecuBanque = $('#numRecuBanque').val();

                if (dateRecuBanque!=""&&nomDeposantBanque!=""&&codeBanque!=""&&montantRecuBanque!=""&&compteRecuBanque!=""&&eleveRecuBanque!=""&&titulaireRecuBanque!=""&&mleRecuBanque!=""&&numRecuBanque!="") {
                    $.post("/PROJET_ADEC/traitementsAjax/rechercheEleveRecu.php",{
                        dateRecuBanque:dateRecuBanque,
                        nomDeposantBanque:nomDeposantBanque,
                        codeBanque:codeBanque,
                        montantRecuBanque:montantRecuBanque,
                        compteRecuBanque:compteRecuBanque,
                        eleveRecuBanque:eleveRecuBanque,
                        titulaireRecuBanque:titulaireRecuBanque,
                        mleRecuBanque:mleRecuBanque,
                        numRecuBanque:numRecuBanque
                    }, function(data) {
                        $('.successMessage').html(data);
                    });
                } else {
                    alert('Impossible de retourner un champs vide !');
                }

           });

        });
        
    </script>
