<?php
    require_once "../../includedPages/connect.php";

    $req="SELECT * FROM users";
    $req_build=$bdd->prepare($req);
    $req_build_exe=$req_build->execute();
    $req_rows=$req_build->rowCount($req);

    if ($_SESSION['accreditation']<5) {
        echo "<br /><div style='font-size: 13px;' class='ui red segment'><center><b><i class='exclamation circle icon'></i>Vous n'êtes pas habilité à effectuer cette opération</b></center></div>";
        exit(0);
     }

    if (!$req_rows) {
        echo "<br /><div class='ui red segment' style='font-size: 13px;'><center><b>Aucun utilisateur n'a été enregistré !</b></center></div>";
    } else {
        $i=0;
?>      <br /><br /><center>
        <table style="font-size: 13px;" width="80%" cellpadding="5">
            <tr style="background-color: #ccc;">
                <td width="50">
                    <center><b>N°</b></center>
                </td>
                <td width="200">
                    <b>Nom</b>
                </td>
                <td width="200">
                    <b>Prénom</b>
                </td>
                <td width="200">
                    <center><b>Matricule</b></center>
                </td>
                <td width="150">
                    <center><b>Poste</b></center>
                </td>
                <td width="75">
                    <center><b>Niveau</b></center>
                </td>
                <td colspan="3">
                    <center><b>Action</b></center>
                </td>
            </tr>

            <?php
                while ($data=$req_build->fetch()) {
                   echo "<tr>
                            <td><center><b>".($i+=1)."</b></center></td>
                            <td>".$data['nom']."</td>
                            <td>".$data['prenom']."</td>
                            <td><center>".$data['mle_user']."</center></td>
                            <td><center>".$data['poste']."</center></td>
                            <td><center>".$data['accreditation']."</center></td>
                            <td><center><a href='/PROJET_ADEC/modifierUser/?matricule=".$data['mle_user']."' target='_blank' ><i class='pencil icon'></i>Modifier</a></center></td>
                            <td><center><a href='/PROJET_ADEC/supprimerUser/?matricule=".$data['mle_user']."' target='_blank' ><i class='trash icon'></i>Supprimer</a></center></td>
                        </tr>";
                }
            ?>

        </table>
        </center>
<?php
    }
    
?>