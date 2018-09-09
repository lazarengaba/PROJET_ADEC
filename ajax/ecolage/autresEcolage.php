<?php
        require_once "../../includedPages/connect.php";
        $req="SELECT * FROM classes LEFT OUTER JOIN niveaux ON niveau_classe = nom_niveau ORDER BY num_niveau DESC";
        $req_build=$bdd->prepare($req);
        $req_exe=$req_build->execute();
        $req_check=$req_build->rowCount($req);
    ?>

    <div class="successMessage">

    </div>
    <center>
    <div style="display: inline-block;" id="successRegSoldeEcolage">
                        
    </div>
    </center>
    <div class="ajouterClasseContainer"><br />
        <div class="title">
            <i class="cogs icon"></i><b>Paramétrage du montant total du sole d'écolage</b><br /><br />

        </div>
    </div>
    
    <div style="font-size: 13px;">
    <?php
        if (!$req_check) {
            echo "<div class='ui red segment' style='font-size: 13px;'><center><b>Aucune classe n'a été répertoriée !</b></center></div>";
        } else {
    ?>
        <table cellpadding="3">
            <tr>
                <td>
                    Sélectionnez la classe correspondante
                    <i class="chevron right icon"></i>
                </td>
                <td>
                    <select id="nomClasseEcolage" style="outline: none; padding: 4px 8px 4px 8px;">
                    <?php
                        while ($data=$req_build->fetch()) {
                            echo "<option>".$data['nom_classe']."</option>";
                        }
                    ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td align="right">
                    <b>Garçons</b>
                </td>
                <td>
                    <input type="number" min="0" class="input" placeholder="Saisir nouveau solde ..." id="soldeEcolageGarReg" /> <b>F CFA</b>&nbsp;&nbsp;

                    

                </td>
            </tr>
            <tr>
                <td align="right">
                    <b>Filles</b>
                </td>
                <td>
                    <input type="number" min="0" class="input" placeholder="Saisir nouveau solde ..." id="soldeEcolageFilReg" /> <b>F CFA</b>&nbsp;&nbsp;
                </td>
                
            </tr>
            <tr>
                <td></td>
                <td>
                    <button class="ui violet button mini" style="border-radius: 0;" id="soldeEcolageRegBouton">
                        <i class="cog icon"></i>Paramétrer
                    </button>
                </td>
            </tr>
            
        </table>

        <?php
             }
        ?>
    </div>

    <script>
        
        $(document).ready(function() {
           
           $('#soldeEcolageRegBouton').click(function() {

               var soldeEcolageGarReg = $('#soldeEcolageGarReg').val();
               var soldeEcolageFilReg = $('#soldeEcolageFilReg').val();
               var nomClasseEcolage = $('#nomClasseEcolage').val();

               if (soldeEcolageFilReg!=""&&soldeEcolageGarReg!="") {

                   $.post('/PROJET_ADEC/traitementsAjax/soldeEcolageParam.php', {soldeEcolageGarReg:soldeEcolageGarReg, soldeEcolageFilReg:soldeEcolageFilReg, nomClasseEcolage:nomClasseEcolage}, function(data) {
                        $('#successRegSoldeEcolage').html("<div style='background-color: #baecbc; color: #238028; padding: 4px; width: 200px; font-size: 13px;'><center><b><i class='check icon'></i>Opération effectuée !</b></center></div>");
                    });
                   
               }

           });

           $('#nomClasseEcolage').change(function() {
                $('#successRegSoldeEcolage').html("");
                $('#soldeEcolageReg').val("");
            });

        });
        
    </script>
