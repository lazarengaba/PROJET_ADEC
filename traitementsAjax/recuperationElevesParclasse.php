    <?php
        require_once "../includedPages/connect.php";

        $req="SELECT * FROM eleves LEFT OUTER JOIN classes ON classe_eleve = id_classe WHERE nom_classe = ?";
        $req_build=$bdd->prepare($req);
        $req_exe=$req_build->execute(array($_POST['classe']));
        $nb_row=$req_build->rowCount();

        if ($nb_row==0) {
            echo "<div class='ui red segment' style='font-size: 13px;'><center><b><i class='times icon'></i>Aucun (e) élève n'a été répertorié (e) !</b></center></div><br />";
        } else {
            $i=0;
    ?>
            <br />
            <table class="soldeEcolageTab" width="100%" style="border-collapse: collapse;">
                <tr>
                    <td>
                        <center><b>N°</b></center>  
                    </td>
                    <td>
                        <center><b>Matricule</b></center>  
                    </td>
                    <td>
                        <center><b>Nom</b></center>
                    </td>
                    <td>
                        <center><b>Prénom</b></center>
                    </td>
                    <td>
                        <center><b>Sexe</b></center>
                    </td>
                    <td>
                        <center><b>Date de naissance</b></center>
                    </td>
                    <td>
                        <center><b>Lieu de naissance</b></center>
                    </td>
                </tr>

    <?php
            while ($data=$req_build->fetch()) {
    ?>
                <tr>
                    <td>
                        <center><?=($i+=1); ?></center>
                    </td>
                    <td>
                        <?=$data['mle']; ?>
                    </td>
                    <td>
                        <?=$data['nom_de_famille']; ?>
                    </td>
                    <td>
                        <?=$data['prenom']; ?>
                    </td>
                    <td>
                        <center><?=$data['sexe_eleve']; ?></center>
                    </td>
                    <td>
                        <center><?=$data['date_de_naissance']; ?></center>
                    </td>
                    <td>
                        <center><?=$data['lieu_de_naissance']; ?></center>
                    </td>
                </tr>
    <?php
            }
        }
        
    ?>
            </table>