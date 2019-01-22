<?php require '../db_connexion/pdo.php'; 

$id_du_mec = $_POST['sub_button'];


    $req = $bdd->prepare("SELECT pro FROM users WHERE id=".$id_du_mec."");
    $req->execute();
    $statue = $req->fetch(PDO::FETCH_OBJ);


    if( $statue->pro == 0)
    {
        $req2 = $bdd->prepare("
        UPDATE users
        SET pro=1
        WHERE id=".$id_du_mec."");
        $req2->execute();

        header('Location: ../members.php');
    
    }else if($statue->pro == 1)
    {
        $req2 = $bdd->prepare("
        UPDATE users
        SET pro=0
        WHERE id=".$id_du_mec."");
        $req2->execute();

        header('Location: ../members.php');
    }
    


?>