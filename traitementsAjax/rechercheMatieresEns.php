<?php
    require_once "../includedPages/connect.php";

    $req="SELECT * FROM matieres WHERE id_classe = ?";
    $req_build=$bdd->prepare($req);
    $req_exe=$req_build->execute(array($_POST['classesEns']));
    $req_rows=$req_build->rowCount($req);

    if ($req_rows) {

        while ($data=$req_build->fetch()) {
            echo "<option value='".$data['id']."'>".$data['nom_matiere']."</option>";
        }

    } else {
        echo "<option value=''>Aucune matière pour cette classe</option>";    
    }
    

    
?>