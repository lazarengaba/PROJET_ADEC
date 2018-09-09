<?php
    require_once "../includedPages/connect.php";

    $req="SELECT * FROM (eleves LEFT OUTER JOIN notes ON mle = mle_note)
    LEFT OUTER JOIN matieres ON note_matiere = matieres.id WHERE classe_eleve = ? AND note_semestre = ? AND note_matiere = ?";

    $req_build=$bdd->prepare($req);
    $req_exe=$req_build->execute(array($_POST['classe'], $_POST['semestre'], $_POST['matiere']));
    $req_build_check=$req_build->rowCount($req);

    if (!$req_build_check) {
        echo "<br /><div class='ui red segment'><center><b>Pas de relevé disponible !</b></center></div>";
    } else {
        $i=0;
        echo "<br /><table class=\"soldeEcolageTab\" width=\"100%\" style=\"border-collapse: collapse;\"><tr><td width='70'><center><b>N°</b></center></td><td><b>Nom</b></td>
        <td><b>Prénom</b></td><td><b>Matricule</b></td><td><b>Date de naissance</b></td><td><b>Lieu de naissance</b></td><td width='100'><center><b>Note de classe</b></center></td><td width='100'><center><b>Note de composition</b></center></td></tr>";
       while ($data=$req_build->fetch()) {
           echo "<tr><td><center>".($i+=1)."</center></td><td>".$data['nom_de_famille']."</td><td>".$data['prenom']."</td><td>".$data['mle']."</td>
           <td>".$data['date_de_naissance']."</td><td>".$data['lieu_de_naissance']."</td><td>".$data['note_note1']."</td><td>".$data['note_note2']."</td></tr>";
       }
       echo "</table>";
    }
    
?>