<?php
        require_once "../../includedPages/connect.php";

        $req_matieres=$bdd->prepare("SELECT * FROM matieres LEFT OUTER JOIN enseignement ON matieres.id = matiere GROUP BY nom_matiere");
        $req_matieres_exe=$req_matieres->execute();

    ?>

    <div class="successMessage"></div>


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

                        $sel=$bdd->prepare("SELECT * FROM enseignement LEFT OUTER JOIN classes ON classe = id_classe WHERE matiere = ?");
                        $sel_exe=$sel->execute(array($data['matiere']));
                        
                ?>
                    <tr>
                        <td>
                            <b><?=$data['nom_matiere']; ?></b>
                        </td>
                        <td>
                            <center><b><?=$data['coeff_matiere']; ?></b><center>
                        </td>
                        <td>
                            
                        <?php
                            while ($data_sel=$sel->fetch()) {
                                echo "<center>".$data_sel['nom_classe']."</center>";
                            }            
                        ?>
                            
                <?php
                        echo "</td></tr>";

                    }
                ?>
                    

            </table>
            </center>
        </div>
    </div>

    
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