<?php

    require_once "../includedPages/connect.php";
    $titre = "ADEC";
    require_once "../includedPages/headerHtml.php";
    require_once "../includedPages/topBar.php";

    $req="SELECT * FROM users WHERE mle_user = ?";
    $req_build=$bdd->prepare($req);
    $req_build_exe=$req_build->execute(array($_GET['matricule']));
    $req_rows=$req_build->rowCount($req);
?>
    <center>
        <div class="succeesMessage"></div>
        <table style="font-size: 13px;" width="30%" cellpadding="5">
            <tr style="background-color: #ccc;">
                <td width="200">
                    <b>Nom</b>
                </td>
                <td width="200">
                    <b>Prénom</b>
                </td>
                <td>
                    <center><b>Email</b></center>
                </td>
                <td width="200">
                    <center><b>Mot de passe</b></center>
                </td>
                <td width="150">
                    <center><b>Poste</b></center>
                </td>
                <td width="75">
                    <center><b>Niveau</b></center>
                </td>
                <td>
                    <center><b>Téléphone</b></center>
                </td>
            </tr>

            <?php
                while ($data=$req_build->fetch()) {
                   echo "<tr>
                            <td><input type='text' class='inputT' value='".$data['nom']."' id='nom'/></td>
                            <td><input type='text' class='inputT' value='".$data['prenom']."' id='prenom'/></td>
                            <td><input type='hidden' class='inputT' value='".$data['mle_user']."' id='mle_user'/>
                            <input type='text' class='inputT' value='".$data['email']."' id='email'/></td>
                            <td><input type='text' class='inputT' value='".$data['MDP']."' id='password'/></td>
                            <td><input type='text' class='inputT' value='".$data['poste']."' id='poste'/></td>
                            <td><input type='number' min='1' max='5' class='inputT' value='".$data['accreditation']."' id='accreditation'/></td>
                            
                            <td><input type='text' class='inputT' value='".$data['tel']."' id='tel'/></td>
                        </tr>";
                }
            ?>

        </table><br />
            
            <a href="#" class="ui violet button tiny" style="border-radius: 0;" id="valideModifBtn">
                <i class="check icon"></i>Valider la modification
            </a>

            <a href="#" class="ui button tiny" style="border-radius: 0;" id="annuleModifBtnUser">
                <i class="times icon"></i>Annuler la modification
            </a>

            <?php require_once "../includedPages/bottomHtml.php" ?>

        </center>

        <script>
            $('#valideModifBtn').click(function() {


                var nom = $('#nom').val();
                var prenom = $('#prenom').val();
                var password = $('#password').val();
                var mle_user = $('#mle_user').val();
                var poste = $('#poste').val();
                var accreditation = $('#accreditation').val();
                var tel = $('#tel').val();
                var email = $('#email').val();

                if (nom=="" || prenom=="" || mle_user=="" || poste=="" || accreditation=="" || tel=="" || email=="" || password=="") {
                    alert('Impossible de retourner un champs vide !');
                } else {
                    $.post("/PROJET_ADEC/modifierUser/control.php", {nom:nom, prenom:prenom, mle_user:mle_user, poste:poste, accreditation:accreditation, tel:tel, email:email,password:password}, function(data) {
                        $('.succeesMessage').html(data);
                    });   
                }
            });

            $('#annuleModifBtnUser').click(function() {
                window.close();
            });

        </script>