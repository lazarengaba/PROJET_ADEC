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
        <table class="soldeEcolageTab" width="85%" style="border-collapse: collapse;">
            <tr>
                <td colspan="3">
                    <div>
                        
                        <center><b><i class="dollar icon"></i>SOLDE ECOLAGE</b></center>
                    </div>
                </td>
            </tr>
            <tr>
                <td width="300">
                    <b>Classes</b>
                </td>
                <td width="250">
                    <center><b>Solde écolage total</b></center>
                </td>
                <td align="center">
                    <b>Action</b>
                </td>
            </tr>

            <?php

                while ($data=$req_build->fetch()) {

                    echo "<tr><td>".$data['nom_classe']."</td><td style='text-align: right; padding-right: 30px;'>".$data['solde_ecolage']." F CFA</td><td align='center'><a target='_blank' href='/PROJET_ADEC/soldeEcolageParam/?id=".$data['id_classe']."'><i class='edit icon'></i>Modifier</a></td></tr>";
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
