<?php
        require_once "../../includedPages/connect.php";
        $req="SELECT * FROM classes";
        $req_build=$bdd->prepare($req);
        $req_exe=$req_build->execute();

        $reqM="SELECT * FROM matieres";
        $req_buildM=$bdd->prepare($reqM);
        $req_exeM=$req_buildM->execute();

        if ($_SESSION['accreditation']<5) {
           echo "<br /><div style='font-size: 13px;' class='ui red segment'><center><b><i class='exclamation circle icon'></i>Vous n'êtes pas habilité à effectuer cette opération</b></center></div>";
           exit(0);
        }
    ?>
    

    <div class="successMessage">

    </div>

    <div class="ajouterClasseContainer"><br />
        <div class="title">
            <i class="user add icon"></i><b>Ajouter un utilisateur</b><br /><br /><hr /><br />
            <center>
            <table cellpadding="5" style="font-size: 13px;">
                <tr>
                    <td colspan="2">
                        <b>INFORMATIONS GENERALES</b>
                    </td>
                    
                    <td colspan="2">
                        <b>INFORMATIONS SUPPLEMENTAIRES</b>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        
                    </td>
                    
                    <td colspan="2">
                        
                    </td>
                </tr>
                <tr>
                    <td>
                        Nom
                    </td>
                    <td>
                        <input type="text" class="input" id="nom" placeholder="Champs obligatoire">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </td>
                    <td>
                        Téléphone
                    </td>
                    <td>
                        <input type="text" class="input" id="tel" placeholder="Champs obligatoire">
                    </td>
                    
                </tr>
                <tr>
                    <td>
                        Prénom
                    </td>
                    <td>
                        <input type="text" class="input" id="prenom" placeholder="Champs obligatoire">
                    </td>
                    <td>
                        Email
                    </td>
                    <td>
                        <input type="text" class="input" id="email">
                    </td>
                    
                </tr>
                <tr>
                    <td>
                        Nom d'utilisateur&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </td>
                    <td>
                        <input type="text" class="input" id="nomUser" placeholder="Champs obligatoire">
                    </td>
                    <td>
                        BP
                    </td>
                    <td>
                        <input type="text" class="input" id="BP">
                    </td>
                </tr>
                <tr>
                    <td>
                        Mot de masse
                    </td>
                    <td>
                        <input type="text" class="input" id="MDP" placeholder="Champs obligatoire">
                    </td>
                    <td>
                        Adresse complète&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </td>
                    <td>
                        <input type="text" class="input" id="adresse">
                    </td>
                </tr>
                <tr>
                    <td>
                        Accédiation
                    </td>
                    <td>
                        <input type="number" min="1" max="5" class="input" id="accreditation" placeholder="Champs obligatoire">
                    </td>
                    <td>
                        Poste / Profession&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </td>
                    <td>
                        <input type="text" class="input" id="poste" placeholder="Champs obligatoire">
                    </td>
                </tr>
                <tr>
                    <td>
                        Matricule
                    </td>
                    <td>
                        <input type="text" class="input" id="matricule" placeholder="Champs obligatoire">
                    </td>
                    <td>
                        
                    </td>
                    <td>
                        <button class="ui violet button tiny" style="border-radius: 0;" id="addUserBtn">
                            <i class="plus icon"></i>Ajouter
                        </button>
                    </td>
                </tr>
            </table>
            </center>

        </div>
    </div>
    
    <div style="font-size: 13px;">

        <div id="resultatRechercheClasse"></div>

    </div>

    <script>
        
        $(document).ready(function() {

            $('#addUserBtn').click(function() {
                var matricule = $('#matricule').val();
                var nom = $('#nom').val();
                var prenom = $('#prenom').val();
                var nomUser = $('#nomUser').val();
                var tel = $('#tel').val();
                var email = $('#email').val();
                var BP = $('#BP').val();
                var MDP = $('#MDP').val();
                var adresse = $('#adresse').val();
                var accreditation = $('#accreditation').val();
                var poste = $('#poste').val();

                if (matricule=="" || nom=="" || prenom=="" || nomUser=="" || tel=="" || MDP=="" || accreditation=="" || poste=="") {
                    alert("Veuillez remplir tous les champs obligatoires !");
                } else {
                    $.post("/PROJET_ADEC/traitementsAjax/ajouterUser.php", {
                        matricule:matricule,
                        nom:nom,
                        prenom:prenom,
                        nomUser:nomUser,
                        tel:tel,
                        email:email,
                        BP:BP,
                        MDP:MDP,
                        adresse:adresse,
                        accreditation:accreditation,
                        poste:poste
                    }, function(data) {
                        $('#matricule').val("");
                        $('#nom').val("");
                        $('#prenom').val("");
                        $('#nomUser').val("");
                        $('#tel').val("");
                        $('#email').val("");
                        $('#BP').val("");
                        $('#MDP').val("");
                        $('#adresse').val("");
                        $('#accreditation').val("");
                        $('#poste').val("");
                        $('#resultatRechercheClasse').html(data);
                    });   
                }
            });

        });
        
    </script>
