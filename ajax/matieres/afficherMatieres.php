<?php
        require_once "../../includedPages/connect.php";
        $res_SQL="SELECT * FROM matieres M LEFT OUTER JOIN classes C ON M.id_classe = C.id_classe ORDER BY nom_classe";
        $req_matieres=$bdd->prepare($res_SQL);
        $req_matieres_exe=$req_matieres->execute();
        $req_matieres_rows=$req_matieres->rowCount($res_SQL);

    ?>

    <div class="successMessage"></div>
    
    <?php
        if (!$req_matieres_rows) {
            echo "<div class='ui red segment' style='font-size: 13px;'><center><b>Aucune matière n'a été enregistrée !</b></center></div>";
        } else {
       
    ?>

    <div class="ajouterClasseContainer"><br />
        <div class="title">
            <i class="sort icon"></i><b>Organisation de matières selon les classes</b><br /><br />
            <center>
            <table class="soldeEcolageTab" width="85%" style="border-collapse: collapse;">
                <tr style="background-color: #ccc;">
                    <td>
                        <center><b>Matières</b></center>
                    </td>
                    <td width="100">
                        <center><b>Coefficent</b></center>
                    </td>
                    <td>
                        <center><b>Classes</b></center>
                    </td>
                </tr>
                

                <?php
                    while ($data=$req_matieres->fetch()) {

                ?>
                    <tr>
                        <td>
                            <b><?=$data['nom_matiere']; ?></b>
                        </td>
                        <td>
                            <center><b><?=$data['coeff_matiere']; ?></b><center>
                        </td>
                        <td>
                            <center><b><?=$data['nom_classe']; ?></center>
                        </td>
                <?php
                        echo "</td></tr>";

                    }
                ?>
                    

            </table>
            </center>
        </div>
    </div>

    <?php
         }
        
    ?>

    
    <script>
        $(document).ready(function() {

            $('#ajouterClasseBtn').click(function() {

                var matieres=$('#matieres').val();
                var classes=$('#classes').val();

                $.post('/PROJET_ADEC/traitementsAjax/ajouterMatiereClasse.php', {matieres:matieres,classes:classes}, function(data) {
                    $('.successMessage').html(data);
                });

            });

        });
    </script>