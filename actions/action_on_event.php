<?php

require '../db_connexion/pdo.php';

if($_POST['sub_button']){

    $id_du_mec = $_POST['sub_button'];

    $req1 = $bdd->prepare("SELECT name FROM evenement WHERE id = ".$id_du_mec." ");
    $req1->execute();
    $data = $req1->fetch(PDO::FETCH_OBJ);

    
    $filename = $data->name;

    $filepath = 'c:/Users/ordan/Desktop/'.$filename.'.xls';


    $req = $bdd->prepare("SELECT DISTINCT  users.id,users.name, users.first_name, users.mail,evenement.id,evenement.name
    INTO OUTFILE '".$filepath."'
    FIELDS TERMINATED BY ' ' OPTIONALLY ENCLOSED BY ' '
    LINES TERMINATED BY '\n'
  
    FROM users,evenement 
    INNER JOIN signin 
    WHERE users.id = signin.id_users 
    AND evenement.id = ".$id_du_mec."
    ");
    $req->execute();

    header('Location:../event_admin.php');

    }else if ($_POST['supp_button']){

        $id_du_mec = $_POST['supp_button'];


        $req = $bdd->prepare("DELETE FROM evenement WHERE id=".$id_du_mec."");
        $req->execute();

        header('Location: ../event_admin.php');


    }else if($_POST['event_upgrade']){

        $id_du_mec = $_POST['event_upgrade'];

        $req2 = $bdd->prepare("UPDATE evenement SET month_event=0 ");
        $req2->execute();

        $req = $bdd->prepare("UPDATE evenement SET month_event=1 WHERE id=" . $id_du_mec . "");
        $req->execute();

        

        header('Location: ../event_admin.php');
    }




    