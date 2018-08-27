<?php
    $titre = "ADEC";
    require_once "includedPages/connect.php";
    require_once "includedPages/headerHtml.php";
    require_once "includedPages/topBar.php";
    require_once "includedPages/menuBar.php";
    require_once "includedPages/ribbon.php";
?>

<div class="containerPersonalisee">
    <div class="row">
        <div class="sixteen wide column">
            <div class="titreEcoleAnnee">
                <b>Collège d'enseignement Général de YANFOUOM</b>

                <span style="float: right;">
                    Année scolaire : 2018 - 2019
                </span>

            </div>

            <table class="resumeTable">
                <tr>
                    <td width="98">
                        <img src="images/Classroom_96px.png" alt="Photo nombre classe">
                    </td>
                    <td>
                        Nombre total de classes<br />
                        <a href="#">
                            10 Classes
                        </a><br />
                        <div style="height: 5px;"></div>
                        <a href="#" class="ui button mini" style="border-radius: 0;">
                            <i class="plus icon"></i>Voir plus
                        </a>

                    </td>
                    <td width="15"></td>
                    <td width="98">
                        <img src="images/Students_96px.png" alt="Photo nombre classe">
                    </td>
                    <td>
                        Nombre total d'élèves<br />
                        <a href="#">
                            2153 Elèves
                        </a><br />
                        <div style="height: 5px;"></div>
                        <a href="#" class="ui button mini" style="border-radius: 0;">
                            <i class="plus icon"></i>Voir plus
                        </a>
                    </td>
                    <td width="15"></td>
                    <td width="98">
                        <img src="images/Training_96px.png" alt="Photo nombre classe">
                    </td>
                    <td>
                        Nombre total d'enseignants<br />
                        <a href="#">
                            21 Enseignants
                        </a><br />
                        <div style="height: 5px;"></div>
                        <a href="#" class="ui button mini" style="border-radius: 0;">
                            <i class="plus icon"></i>Voir plus
                        </a>
                    </td>
                    <td width="15"></td>
                    <td width="98">
                        <img src="images/Book_96px.png" alt="Photo nombre classe">
                    </td>
                    <td>
                        Nombre total de matières<br />
                        <a href="#">
                            21 Matières
                        </a><br />
                        <div style="height: 5px;"></div>
                        <a href="#" class="ui button mini" style="border-radius: 0;">
                            <i class="plus icon"></i>Voir plus
                        </a>
                    </td>
                </tr>
            </table><br />

            <table width="100%">
                <tr>
                    <td width="400" class="ADECdesc">
                        <div>
                            <h3>ADministration d'ECole ADEC</h3>
                            Outil d'administration et de gestion d'école<br />

                            <a href="#">
                                Version 1.0.0
                            </a><br />

                            <a href="#" style="float: right; margin-top: 8px;">
                                <i class="search icon"></i>Recherche de mise à jour
                            </a>

                        </div>
                    </td>
                    <td>
                        <table class="ui violet table segment historique" style="border-radius: 0;">
                            <tr>
                                <td>
                                    <a href="">
                                        <i class="time icon"></i><b>Historiques</b>
                                        <i class="chevron right icon"></i>
                                        <b>Actions
                                    </a>
                                </td>
                                <td width="250">
                                    <a href="#"><b>Date</b></a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Inscription d'un nouvel élève
                                </td>
                                <td>
                                    25 - 08 - 2018 à 15 Heures 35 min.
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Règlement de facture
                                </td>
                                <td>
                                    25 - 08 - 2018 à 15 Heures 35 min.
                                </td>
                            </tr>
                        </table>
                    
                    </td>
                    
                </tr>
            </table>
            <br /><br />
        </div>
    </div>

    <div class="row">
        <div class="">
            <div class="accesRapide">
                <i class="accessible icon"></i><b>Accès rapide</b>
            </div><br />

            <div class="accessButton ui buttons tiny" style="width: 100%;">
                <a href="#" class="ui violet button ajouterEleve" style="border-radius: 0;" id="boutonAccesRapide">
                    <i class="plus icon"></i>Ajouter un élève
                </a>
                <a href="#" class="ui button solderEcolage" id="boutonAccesRapide">
                    <i class="dollar icon"></i>Solder un écolage
                </a>
                <a href="#" class="ui orange button enregistrerNotes" id="boutonAccesRapide">
                    <i class="save icon"></i>Enregistrer une note
                </a>
                <a href="#" class="ui button impressionBulletins" id="boutonAccesRapide">
                    <i class="print icon"></i>Imprimer un bulletin
                </a>
                <a href="#" class="ui violet button ajouterMatieres" id="boutonAccesRapide">
                    <i class="book icon"></i>Ajouter une matière
                </a>
                <a href="#" class="ui button ajouterClasses" id="boutonAccesRapide">
                    <i class="plus icon"></i>Ajouter une classe
                </a>
                <a href="#" class="ui pink button ajouterEnseignants" id="boutonAccesRapide">
                    <i class="plus icon"></i>Ajouter un enseignant
                </a>
                <a href="#" class="ui button impressionPlanning" style="border-radius: 0;" id="boutonAccesRapide">
                    <i class="calendar icon"></i>Imprimer un planning
                </a>
                <a href="#" class="ui violet button paiementsDepenses" style="border-radius: 0;" id="boutonAccesRapide">
                    <i class="money icon"></i>Effecuter un paiement
                </a>
                <a href="#" class="ui button etatCaisse" style="border-radius: 0;" id="boutonAccesRapide">
                    <i class="area graph icon"></i>Etat de caisse
                </a>
                
            </div>
        </div>
    </div><br /><br />

    <div class="row">
        <div class="">
            <div class="gestionUsers">
                <i class="users icon"></i><i class="cog icon"></i><b>Gestion d'utilisateurs et plus</b>
            </div><br />

            <div class="accessButton ui buttons tiny">
                <a href="#" class="ui teal button" style="border-radius: 0;" id="boutonAccesRapide">
                    <i class="user add icon"></i>Ajouter un utlisateur
                </a>
                <a href="#" class="ui button" id="boutonAccesRapide">
                    <i class="user edit icon"></i>Modifier les données
                </a>
                <a href="#" class="ui red button" id="boutonAccesRapide">
                    <i class="user delete icon"></i>Supprimer un compte
                </a>
                <a href="#" class="ui button" id="boutonAccesRapide">
                    <i class="eye icon"></i>Voir un compte
                </a>
                <a href="#" class="ui teal button" id="boutonAccesRapide">
                    <i class="university icon"></i>Gérer la bilothèque
                </a>
                <a href="#" class="ui button" id="boutonAccesRapide">
                    <i class="database icon"></i>Gérer le stockage
                </a>
                <a href="#" class="ui red button" id="boutonAccesRapide">
                    <i class="archive icon"></i>Gérer les archives
                </a>
                <a href="#" class="ui button" id="boutonAccesRapide">
                    <i class="openned book icon"></i>Accéder à la domumentation
                </a>
                <a href="#" class="ui teal button" id="boutonAccesRapide">
                    <i class="cog icon"></i>Gestion d'accréditations
                </a>
                <a href="#" class="ui button" style="border-radius: 0;" id="boutonAccesRapide">
                    <i class="plus circle icon"></i>Découvrir plus
                </a>
                
            </div>
        </div>
    </div><br />

    <div class="row">
       <div style="text-align: center; font-size: 13px;">

            <div class="separateurFotter"></div><br />

            <a href="#">
                <i class="question circle icon"></i>FAQ
            </a> |
            <a href="#">
                <i class="users icon"></i>Forum
            </a> |
            <a href="#">
                <i class="comment icon"></i>Suggestion
            </a><br />
            <a href="#">
                <i class="hand point right icon"></i>Termes et conditions d'utilisations
            </a> |
            <a href="#">
                <i class="check icon"></i>Mentions légales
            </a><br />
            <a href="#">
                Copyright<i class="copyright outline icon"></i>2018
            </a> |
            <a href="#">
                Powered by lazaro
            </a>
       </div>
    </div>

</div>

<?php
    require_once "includedPages/bottomHtml.php";
?>