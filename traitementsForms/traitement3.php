<?php
    $titre = "ADEC";
    require_once "../includedPages/connect.php";
    require_once "../includedPages/headerHtml.php";


    $req="SELECT * FROM (eleves LEFT OUTER JOIN notes ON mle = mle_note) LEFT OUTER JOIN matieres ON note_matiere = matieres.id WHERE (note_note1 IS NOT NULL)  AND (note_semestre = ? AND note_classe = ?)";
    $req_build=$bdd->prepare($req);
    $req_exe=$req_build->execute(array($_GET['semestre'], $_GET['classe']));
    $req_check=$req_build->rowCount($req);

    if (!$req_check) {
       echo "<div style='font-size: 13px;'>
                <center><b>Aucune impression de bulletin disponible !</b></center>
            </div>";

            exit(0);
    } else {
        while ($data=$req_build->fetch()) {
?>
            <div style="height: 900px;" class="ui container"><br /><br />
            <table width="100%" cellpadding="3" style="font-weight: bold;">
                <tr>
                    <td width="400">
                        MINISTRE DE L'ENSEIGNEMENT
                    </td>
                    <td></td>
                    <td width="400">
                        <center>REPUBLIQUE DU TOGOLAISE</center>
                    </td>
                </tr>
                <tr>
                    <td>
                        PRIMAIRE ET SECONDAIRE
                    </td>
                    <td></td>
                    <td>
                        <center>TRAVAIL - LIBERTE - PATRIE</center>
                    </td>
                </tr>
                <tr>
                    <td>
                        COMPLEXE SCOLAIRE PRIVE ET LAÏC
                    </td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>YANFOUOM</td>
                    <td></td>
                    <td style="text-align: center;">
                        <h2><b>BULLETIN DE NOTES</b></h2>
                    </td>
                </tr>
            </table>
            <br /><br />
            <table border="1" style="border-collapse: collapse;" width="100%">
                <tr>
                    <td>
                        <center><b>MATIERES</b></center>
                    </td>
                    <td>
                        <center><b>Coefficient</b></center>
                    </td>
                    <td>
                        <table border="1" style="border-collapse: collapse;" width="100%">
                            <tr>
                                <td colspan="2">
                                    <center><b>Notes</b></center>
                                </td>
                                
                            </tr>
                            <tr>
                                <td>
                                    <center><b>Classe</b></center>
                                </td>
                                <td>
                                    <center><b>Compo</b></center>
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td>
                        <center>
                            <b>
                                Moyenne trimestrielle
                            </b>
                        </center>
                    </td>
                    <td>
                    <center>
                            <b>
                                Rang
                            </b>
                        </center>
                    </td>
                    <td>
                        <center>
                            <b>
                                Appréciation des professeurs
                            </b>
                        </center>
                    </td>
                    <td>
                        <center>
                            <b>
                                Nom des professeurs
                            </b>
                        </center>
                    </td>
                    <td>
                        <center>
                            <b>
                                Signature
                            </b>
                        </center>
                    </td>
                </tr>

                <?php
                    $notesSQL=$bdd->prepare("SELECT * FROM notes WHERE mle_note = ?");
                    $notes_exe=$notesSQL->execute(array($data['mle']));


                    while ($notes=$notesSQL->fetch()) {
                ?>

                <tr>
                    <td>
                        <center><b><?="ok"; ?></b></center>
                    </td>
                    <td>
                        <center><b>Coefficient</b></center>
                    </td>
                    <td>
                        <table border="1" style="border-collapse: collapse;" width="100%">
                            
                            <tr>
                                <td>
                                    <center><b>Classe</b></center>
                                </td>
                                <td>
                                    <center><b>Compo</b></center>
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td>
                        <center>
                            <b>
                                Moyenne trimestrielle
                            </b>
                        </center>
                    </td>
                    <td>
                    <center>
                            <b>
                                Rang
                            </b>
                        </center>
                    </td>
                    <td>
                        <center>
                            <b>
                                Appréciation des professeurs
                            </b>
                        </center>
                    </td>
                    <td>
                        <center>
                            <b>
                                Nom des professeurs
                            </b>
                        </center>
                    </td>
                    <td>
                        <center>
                            <b>
                                Signature
                            </b>
                        </center>
                    </td>
                </tr>   

                <?php
                    }
                ?>
            </table>

        </div>

<?php
        }
    }
    require_once "../includedPages/bottomHtml.php";
?>