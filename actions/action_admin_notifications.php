<?php

require '../db_connexion/pdo.php';

$id_notif = $_POST['notif'];

if($_POST['retablir_button']){

    $id_comm = $_POST['retablir_button'];
    

    $req1 = $bdd->prepare("UPDATE commentaires
                           SET undesirable=0 
                           WHERE id = ".$id_comm." ");
    $req1->execute();
    

    $req2 = $bdd->prepare("DELETE FROM notifications WHERE id=".$id_notif."");
    $req2->execute();

    header('Location:../Notifications_admin.php');

    }else if ($_POST['supp_button']){

        $id_comm = $_POST['supp_button'];


        $req = $bdd->prepare("DELETE FROM commentaires WHERE id=".$id_comm."");
        $req->execute();

        $req3 = $bdd->prepare("DELETE FROM notifications WHERE id=".$id_notif."");
        $req3->execute();


        header('Location:../Notifications_admin.php');


    }




    