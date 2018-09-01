<?php
        require_once "../../includedPages/connect.php";
        $req="SELECT * FROM classes";
        $req_build=$bdd->prepare($req);
        $req_exe=$req_build->execute();

        $reqM="SELECT * FROM matieres";
        $req_buildM=$bdd->prepare($reqM);
        $req_exeM=$req_buildM->execute();
    ?>
    

    <div class="successMessage">

    </div>

    <div class="ajouterClasseContainer"><br />
        <div class="title">
            <i class="save icon"></i><b>Enregistrement de notes</b><br /><br />

        </div>
    </div>
    
    <div style="font-size: 13px;">
        <table>
            <tr>
                <td>
                    Sélectionnez la classe et le semestre correspondants
                    <i class="chevron right icon"></i>
                </td>
                <td>
                <select style="outline: none; padding: 4px 8px 4px 8px; font-size: 13px;" id="classe">
                <?php
                    while ($data=$req_build->fetch()) {
                        echo "<option value='".$data['id_classe']."'>".$data['nom_classe']."</option>";
                    }
                ?>
                </select>
                <select style="outline: none; padding: 4px 8px 4px 8px; font-size: 13px;" id="semestre">
                    <option value="semestreI">Semestre I</option>
                    <option value="semestreII">Semestre II</option>
                </select>
                </td>
                
            </tr>
        </table>

        <div id="resultatRechercheClasse"></div>

    </div>

    <script>
        
        $(document).ready(function() {

            

        });
        
    </script>
