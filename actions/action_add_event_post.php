

<?php

require '../db_connexion/pdo.php';

$date = $_POST['date'];
$description = $_POST['description'];
$id_mec = $_POST['id_mec'];





    
  $req2 = $bdd->prepare("
        UPDATE evenement
        SET evenement=1, metting='".$date."',description='".$description."'
        WHERE id=".$id_mec."");
        $req2->execute();

        header('Location: ../ideaValidation.php');
