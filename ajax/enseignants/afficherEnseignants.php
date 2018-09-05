<?php
        require_once "../../includedPages/connect.php";

        $req_SQL="SELECT * FROM matens LEFT OUTER JOIN enseignants ON enseignant = mle_enseignant GROUP BY nom_enseignant";
        $req_matieres=$bdd->prepare($req_SQL);
        $req_matieres_exe=$req_matieres->execute();
        $rows_req=$req_matieres->rowCount($req_SQL);

    ?>

    <div class="successMessage"></div>

    <?php
        if (!$rows_req) {
            echo "<div class='ui red segment' style='font-size: 13px;'><center><b>Aucune matière n'a été reférencée !</b></center></div>";
        } else {
        
    ?>

    <div class="ajouterClasseContainer"><br />
        <div class="title">
            <i class="list icon"></i><b>Liste des enseignants</b><br /><br />
            <center>
            <table class="soldeEcolageTab" width="85%" style="border-collapse: collapse;">
                <tr style="background-color: #ccc;">
                    <td>
                        <center><b>Enseignant (e)</b></center>
                    </td>
                    <td>
                        <center><b>Matières</b></center>
                    </td>
                    <td>
                        <center><b>Classes</b></center>
                    </td>
                </tr>
                

                <?php
                    while ($data=$req_matieres->fetch()) {

                        $sel=$bdd->prepare("SELECT * FROM matens LEFT OUTER JOIN matieres ON matiere_ens = matieres.id WHERE enseignant = ?");
                        $sel_exe=$sel->execute(array($data['mle_enseignant']));

                        $selC=$bdd->prepare("SELECT * FROM matens LEFT OUTER JOIN classes ON classe_ens = id_classe WHERE enseignant = ?");
                        $sel_exeC=$selC->execute(array($data['mle_enseignant']));
                        
                ?>
                    <tr>
                        <td>
                            <b><?=$data['nom_enseignant']." ".$data['prenom_enseignant']; ?></b>
                        </td>
                        <td>
                            
                        <?php
                            while ($data_sel=$sel->fetch()) {
                                echo "<center>".$data_sel['nom_matiere']."</center>";
                            }            
                        ?>
                            
                            <td>
                            
                            <?php
                                while ($data_selC=$selC->fetch()) {
                                    echo "<center>".$data_selC['nom_classe']."</center>";
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