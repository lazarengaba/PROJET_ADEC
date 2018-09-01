<?php
        require_once "../includedPages/connect.php";
        $titre = "ADEC";
        require_once "../includedPages/headerHtml.php";
        require_once "../includedPages/topBar.php";

        $req = "SELECT *,SUM(montant) montant_verse FROM (eleves LEFT OUTER JOIN ecolage ON mle=id_eleve) LEFT OUTER JOIN classes ON classe_eleve=id_classe WHERE mle = ?";
        $req_build = $bdd->prepare($req);
        $req_exe = $req_build->execute(array($_GET['matricule']));
        $data=$req_build->fetch();
    ?><br />

    <input type="hidden" value="<?=$_GET['matricule']; ?>" id="matricule">
    <div style="margin: 0 20px; font-size: 13px;">
        <table class="ui table">
            <tr>
                <td>
                    <b>Nom et prénoms (s)</b>
                </td>
                <td>
                    <center><b>Classe</b></center>
                </td>
                <td>
                    <center><b>Solde total</b></center>
                </td>
                <td>
                    <center><b>Solde versé</b></center>
                </td>
                <td>
                    <center><b>Reste</b></center>
                </td>
                <td>
                    <center><b>Montant à verser</b></center>
                </td>
                <td>
                    <center><b>Auteur versement</b></center>
                </td>
            </tr>
            <tr>
                <td>
                    <?=$data['nom_de_famille']." ".$data['prenom']; ?>
                </td>
                <td>
                    <center><?=$data['nom_classe']; ?></center>
                </td>
                <td>
                    <center><?=$data['solde_ecolage']; ?></center>
                </td>
                <td><center>
                    <?php
                        if ($data['montant_verse']) {
                            echo $data['montant_verse'];
                        } else {
                           echo "Aucun versement antérieur";
                        }
                        
                    ?></center>
                </td>
                <td><center>
                    <?php
                        if ($data['montant_verse']==$data['solde_ecolage']) {
                            echo "<span style='color: green;'><i class='check icon'></i>Soldé</span>";
                        } else {
                    ?>
                            <?=$data['solde_ecolage']-$data['montant_verse']; ?>
                            <?php $reste=$data['solde_ecolage']-$data['montant_verse']; ?>

                            <input type="hidden" value="<?=$reste; ?>" id="resteSoldeEcolage" />
                    <?php
                        }
                        
                    ?></center>
                </td>
                <td><center>
                    <?php
                        if ($data['montant_verse']==$data['solde_ecolage']) {
                            echo "-";
                        } else {
                    ?>
                           <input type="number" min="0" class="input" placeholder="Saisir le montant ici ..." id="montantVersementEcolage" />
                    <?php
                        }
                        
                    ?></center>
                </td>
                <td><center>
                    <?php
                        if ($data['montant_verse']==$data['solde_ecolage']) {
                            echo "-";
                        } else {
                    ?>
                           <input type="text" class="input" placeholder="Saisir le nom complet ici ..." id="auteurVersement" />
                    <?php
                        }
                        
                    ?></center>
                </td>
            </tr>
        </table><br />

        <?php
            if ($data['montant_verse']==$data['solde_ecolage']) {
                
            } else {
        ?>
            <button id="supprimerEleveBouton" class="ui violet button mini" style="border-radius: 0; width: 150px;">
                <i class="save icon"></i>Sauver
            </button>
        <?php
            }
                        
        ?>

        <button id="annulerSupprimerEleveBouton" class="ui button mini" style="border-radius: 0; width: 150px;">
            <i class="times icon"></i>Fermer
        </button>

    </div>
    <br />

    <div style="border-bottom: 1px solid #ccc;"></div>

<?php
    require_once "../includedPages/bottomHtml.php";
?>

    <script>

        $('#montantVersementEcolage').keyup(function() {
            if($(this).val().length == $('#resteSoldeEcolage').val().length && $(this).val() > $('#resteSoldeEcolage').val()) {
                alert( "Le montant entré est excédent sur le reste à verser");
                $('#montantVersementEcolage').val("");
            }
        });

        $('#supprimerEleveBouton').click(function() {

            var matricule = $('#matricule').val();
            var montantVersementEcolage = $('#montantVersementEcolage').val();
            var auteurVersement = $('#auteurVersement').val();
            
            if (montantVersementEcolage!="" && auteurVersement!="") {
                $.post('/PROJET_ADEC/SolderEcolage/control.php',{matricule:matricule, montantVersementEcolage:montantVersementEcolage, auteurVersement:auteurVersement}, function(data) {
                    window.close();
                });
            }
            
        });
        
        $('#annulerSupprimerEleveBouton').click(function() {
            window.close();
        });

    </script>