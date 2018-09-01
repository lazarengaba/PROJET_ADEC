<?php
    require_once "../includedPages/connect.php";
    $res_SQL="SELECT * FROM (classes LEFT OUTER JOIN enseignement ON id_classe = classe) LEFT OUTER JOIN matieres ON matiere = matieres.id WHERE id_classe = ? AND nom_matiere IS NOT NULL";
    $req=$bdd->prepare($res_SQL);
    $req_exe=$req->execute(array($_POST['classe']));
    $rowMat=$req->rowCount($res_SQL);
    
    if (!$rowMat) {
        echo "<option>Aucune entrée pour cette classe</option>";
    } else {
        echo "<option value='".$donnees['id']."'>Sélectionnez la matière</option>";
    while ($donnees=$req->fetch()) {
        echo "<option value='".$donnees['id']."'>".$donnees['nom_matiere']."</option>";
    }
}
?>