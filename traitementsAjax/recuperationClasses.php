    <?php
        require_once "../includedPages/connect.php";

        $req="SELECT * FROM classes LEFT OUTER JOIN niveaux ON niveau_classe=nom_niveau ORDER BY num_niveau, nom_classe";
        $req_build=$bdd->prepare($req);
        $req_exe=$req_build->execute();
        $nb_row=$req_build->rowCount();

        $index=0;
    ?>

    <input type="hidden" value="<?php echo $nb_row; ?>" id="nbRows">
    
    <table width="100%">

    <?php
        while ($data=$req_build->fetch()) {
    ?>
            <tr>
                <?php
                    if ($data['num_niveau']>10) {
                        echo "<td width='20%'><b>".$data['nom_classe']."</b></td>
                            <td id='modifierClasse' width='35%'>
                                <a href='#'>Modifier<i class='chevron right icon'></i>&nbsp;&nbsp;</a>
                                <input style='width :60px;' type='text' class='input' id='ancienNomClasse".$index."' value='".$data['nom_classe']."'>
                                <input type='text' class='input' id='nouveauNomClasse".$index."' placeholder='Saisir le nouveau nom ...'>
                                <button class='ui violet button mini' id='modifierClassBouton".$index."' style='border-radius: 0;'>Terminer</button>
                            </td>
                            <td>
                                <a id='supprimerClasse' style='color: #e20a0a;' href='#'><i class='delete icon'></i>Supprimer</a>
                            </td>";
                    } else {
                        echo "<td width='20%'><b>".$data['nom_classe']."</b></td>
                        <td>
                            <i class='ban icon'></i>
                            <span style='color: #bbb;'>Non modifiable</span>
                        </td>
                        <td>
                            <i class='ban icon'></i>
                            <span style='color: #aaa;'>Non modifiable</span>
                        </td>";
                    }
                        
                ?>
            </tr>
    <?php
            $index+=1;
        }
    ?>

    </table>

    <script>
        var modifierClassBouton = $('#modifierClassBouton');

        $(modifierClassBouton).each(function() {
            $(this).click(function() {
                alert($('#ancienNomClasse').val()+" "+$('#nouveauNomClasse').val())
            });
        });

        var nbRows = $('#nbRows').val();

        for (let i = 0; i < nbRows; i++) {
            $('#modifierClassBouton'+i).click(function() {
                alert($('#ancienNomClasse'+i).val()+' '+$('#nouveauNomClasse'+i).val());
            });
        }

    </script>
