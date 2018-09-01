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
            <i class="list alternate icon"></i><b>Etat de solde écolage</b><br /><br />

        </div>
    </div>
    
    <div style="font-size: 13px; text-align: center;">
        <div class="ui buttons" style="width: 50%;">
            <a target="_blank" href="/PROJET_ADEC/ecolageSolde/" class="ui green button" style="border-radius: 0;">
                <i class="check icon"></i>Ecolage totalement soldé
            </a>
            <a target="_blank" href="/PROJET_ADEC/ecolageEnCours/" class="ui orange button">
                <i class="time icon"></i>Ecolage en cours de solde
            </a>
            <a target="_blank" href="/PROJET_ADEC/ecolageNonSolde/" class="ui red button" style="border-radius: 0;">
                <i class="times icon"></i>Ecolage au solde non versé
            </a>
        </div><br /><br /><br /><hr />
    </div>

    <script>
        
        $(document).ready(function() {
           

           
        });
        
    </script>
