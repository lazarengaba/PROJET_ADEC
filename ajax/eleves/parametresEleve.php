<?php
        require_once "../../includedPages/connect.php";
        $req="SELECT * FROM classes LEFT OUTER JOIN niveaux ON niveau_classe = nom_niveau ORDER BY num_niveau DESC";
        $req_build=$bdd->prepare($req);
        $req_exe=$req_build->execute();
        $req_rows=$req_build->rowCount($req);
    ?>

    <div class="successMessage">

    </div>

    <div class="ajouterClasseContainer"><br />
        <div class="title">
            <i class="cog icon"></i><b>Paramètres généraux solde écolage</b><br />

        </div>
    </div><br /><br />
    <?php
        if(!$req_rows) {
            echo "<div class='ui red segment' style='font-size: 13px;'><center><b>Aucune classe n'a été répertoriée !</b></center></div>";
        } else {
    ?>   
        <center>
        <table cellpadding="7" width="85%">
            <tr style='background-color: #aaa;'>
                <td width="300">
                    <b>Classes</b>
                </td>
                <td width="250" align="right">
                    <b>Solde écolage Garçons</b>
                </td>
                <td align="right">
                    <b>Solde écolage Garçons</b>
                </td>
            </tr>

            <?php

                while ($data=$req_build->fetch()) {

                    echo "<tr style='background-color: #ddd;'><td>".$data['nom_classe']."</td>
                    <td align='right'>".$data['solde_ecolage_gar']." F CFA</td>
                    <td align='right'>".$data['solde_ecolage_fil']." F CFA</td></tr>";
                }

            ?>

        </table>
        </center>
        <?php
            }
        ?>
    </div>

    <script>
        
        $(document).ready(function() {
        

           
        });
        
    </script>
