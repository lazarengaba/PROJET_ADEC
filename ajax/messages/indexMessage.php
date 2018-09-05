<?php

    require_once "../../includedPages/connect.php";

    $req=$bdd->prepare("SELECT * FROM users");
    $req_exe=$req->execute();

?>
    

    <div class="successMessage">

    </div>

    <div class="ajouterClasseContainer"><br />
        <div class="title">
            <i class="envelope icon"></i><b>Messagerie rapide</b><br /><br />

            <!--<table width="100%" border="1">
                <tr>
                    <td width="400">

                    <?php/*
                        while ($data=$req->fetch()) {
                            echo "<div>
                                    <span><b>".$data['nom']." ".$data['prenom']."</b></span>
                                </div>";
                        }*/
                    ?>
                        <div>
                            <span><b></b></span>
                        </div>
                    </td>
                    <td>
                        
                    </td>
                </tr>
            </table>-->

        </div>
    </div>