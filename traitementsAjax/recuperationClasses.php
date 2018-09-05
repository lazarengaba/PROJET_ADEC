    <?php
        require_once "../includedPages/connect.php";

        $req="SELECT * FROM classes LEFT OUTER JOIN niveaux ON niveau_classe=nom_niveau ORDER BY num_niveau DESC, nom_classe";
        $req_build=$bdd->prepare($req);
        $req_exe=$req_build->execute();
        $nb_row=$req_build->rowCount();

        if ($nb_row==0) {
            echo "<div class='ui red segment' style='font-size: 13px;'><center><b>Aucune classe n'a été répertoriée !</b></center></div>";
        } else {
            # code...
        }
        
    ?>
    
    <table width="100%">

    <?php
        while ($data=$req_build->fetch()) {
    ?>
            <tr>
                <?php
                    if ($data['num_niveau']>10) {
                        echo "<td width='20%'><b>".$data['nom_classe']."</b></td>
                            <td id='modifierClasse' width='30%'>
                                <a href='#'>Modifier<i class='chevron right icon'></i>&nbsp;&nbsp;</a>
                                <div style='width: 75px; display: inline-block;'><b>".$data['nom_classe']."</b></div>
                                <a target='_blank' href='/PROJET_ADEC/modifierClasse/?nomClasse=".$data['nom_classe']."' class='ui violet button mini' style='border-radius: 0;'>Modifier la classe</a>
                            </td>
                            <td>
                                <a class='ui red button mini' style='border-radius: 0;' target='_blank' href='/PROJET_ADEC/supprimerClasse/?nomClasse=".$data['nom_classe']."'><i class='delete icon'></i>Supprimer</a>
                            </td>";
                    } else {
                        echo "<td width='20%'><b>".$data['nom_classe']."</b></td>
                        <td>
                            <a href='#'>Modifier<i class='chevron right icon'></i>&nbsp;&nbsp;</a>
                            <div style='width: 75px; display: inline-block;'><b>".$data['nom_classe']."</b></div>
                            <a class='ui button mini' style='border-radius: 0;'><i class='ban icon'></i>Non modifiable</a>
                        </td>
                        <td>
                            <a class='ui red button mini' style='border-radius: 0;' target='_blank' href='/PROJET_ADEC/supprimerClasse/?nomClasse=".$data['nom_classe']."'><i class='delete icon'></i>Supprimer</a>
                        </td>";
                    }
                        
                ?>
            </tr>
    <?php
        }
    ?>

    </table>