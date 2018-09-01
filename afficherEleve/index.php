<?php
    $titre = "ADEC";
    require_once "../includedPages/connect.php";
    require_once "../includedPages/headerHtml.php";
    require_once "../includedPages/topBar.php";

    $req = "SELECT * FROM eleves LEFT OUTER JOIN classes ON classe_eleve = id_classe WHERE mle = ?";
    $req_build = $bdd->prepare($req);
    $req_exe = $req_build->execute(array($_GET['matricule']));
    $data=$req_build->fetch();

    $req_ecol="SELECT * FROM ecolage WHERE id_eleve = ?";
    $req_ecol_build=$bdd->prepare($req_ecol);
    $req_ecol_exe=$req_ecol_build->execute(array($_GET['matricule']));
    $req_ecol_row=$req_ecol_build->rowCount($req_ecol);
    
?><br />


  
<div style="margin: 0 20px;">
    <div style="background-color: #e44b1c; padding: 5px; color: #FFF; border-radius: 2px;">
        <i class="info icon"></i>
        Informations de <b><?=$data['nom_de_famille']." ".$data['prenom']; ?></b>
    </div>
    
    <br /><br />
    <table class="tableAjoutEleve">
        <tr>
            <td width="200">
                Classe
            </td>
            <td width="350">
                <b><?=$data['nom_classe']; ?></b>&nbsp;&nbsp;
                <span style="background-color: #e44b1c;padding: 5px; color: #fff; border-radius: 2px;"><b><?=$data['mle']; ?></b></span>
            </td>
            <td width="250" colspan="2">
                <b>INFO PARENT / TUTEUR</b>
                <div style="border-bottom: 1px solid #ccc;"></div><br />
            </td>
        </tr>
        <tr>
            <td>
                Nom de famille
            </td>
            <td>
                <b><?=$data['nom_de_famille']; ?></b>
            </td>
            <td>
                Nom complet parent / tuteur&nbsp;&nbsp;
            </td>
            <td>
                <b><?=$data['nom_complet_tuteur']; ?></b>
            </td>
        </tr>
        <tr>
            <td>prénom (s)</td>
            <td>
                <b><?=$data['prenom']; ?></b>
            </td>
            <td>
                Adresse
            </td>
            <td>
                <b><?=$data['adresse_tuteur']; ?></b>
            </td>
        </tr>
        <tr>
            <td>Date de naissance</td>
            <td>
                <b><?=$data['date_de_naissance']; ?></b>
            </td>
            <td>
                Contact
            </td>
            <td>
                <b><?=$data['contact_tuteur']; ?></b>
            </td>
        </tr>
        <tr>
            <td>Lieu de naissance</td>
            <td>
                <b><?=$data['lieu_de_naissance']; ?></b>
            </td>
            <td>
                Civilité
            </td>
            <td>
                <b><?=$data['civilite_tuteur']; ?></b>
            </td>
        </tr>
        <tr>
            <td>Sexe</td>
            <td>
                <b><?=$data['sexe_eleve']; ?></b>
            </td>
            <td>
                
            </td>
            <td>
                
            </td>
        </tr>
    </table><br />
</div>

    <div style="margin: 0 20px; font-size: 13px; border-top: 1px solid #ccc;"><br />
        <div class="greenSuccessMessageColored">
            <i class="dollar icon"></i>
            <b>HISTORIQUE SOLDE ECOLAGE</b>
        </div>    
    
        <table class="ui table">
            <tr>
                <td>
                    <b>Date de versement</b>
                </td>
                <td>
                    <b>Montant versé</b>
                </td>
                <td width="300">
                    <center><b>Auteur de versement</b></center>
                </td>
            </tr>
            <?php

                if ($req_ecol_row==0) {
                    echo "<tr><td>-</td><td>-</td><td>-</td></tr>";
                } else {
                    $totalVersement = 0;

                    while ($data_ecol=$req_ecol_build->fetch()) {
                        $totalVersement+=$data_ecol['montant'];
                        echo "<tr><td>".$data_ecol['date']."</td><td>".$data_ecol['montant']." F CFA</td><td>".$data_ecol['auteur_versement']."</td></tr>";
                    }
                }
                

            ?>
            <tr>
                <td>
                    <b>Total versement</b>
                </td>
                <td colspan="2">
                <?php
                    if ($req_ecol_row==0) {
                        echo "-";
                    } else {
                        echo "<b>".$totalVersement." F CFA</b>";
                    }
                ?>
                </td>
            </tr>
            <tr>
                <td>
                    <b>Reste à verser</b>
                </td>
                <td colspan="2">
                <?php
                    if ($req_ecol_row==0) {
                        echo "<b>".$data['solde_ecolage']."</b>";
                    } else {
                        echo "<b>".($data['solde_ecolage'] - $totalVersement)."</b>";
                    }
                ?>
                </td>
            </tr>
        </table>

        <button class="ui red button mini" style="border-radius: 0; width: 200px; float: right;" id="annulerModifierClasseBouton">
            <i class="times icon"></i>Fermer
        </button>

    </div><br /><br />

       
<?php
    require_once "../includedPages/bottomHtml.php";
?>

    <script>

        $(document).ready(function() {

            $('#annulerModifierClasseBouton').click(function() {
                window.close();
            });

        });
        
    </script>
