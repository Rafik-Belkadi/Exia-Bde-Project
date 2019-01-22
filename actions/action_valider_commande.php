<?php

 require '../db_connexion/pdo.php';
    

    if(!empty($_GET['products']) AND !empty($_GET['total']) AND !empty($_GET['id_user'])){

        $products = $_GET['products'];
        $total = $_GET['total'];
        $id_user= $_GET['id_user'];


        $req = $bdd->prepare("SELECT * FROM users WHERE id=".$id_user);
        $req->execute();

        $data = $req->fetch(PDO::FETCH_OBJ);

        $to = "rafik.belkadi.dz@viacesi.fr";
        $subject = "Nouvel commande !";
        $message = " Client : ".$data->name."  ".$data->first_name." \n Details de la commande : \n - ".$products." \n - Total : ".$total." $";
        $from = $data->mail;
        $headers = "From:" . $from;
        mail($to,$subject,$message,$headers);

        header('Location:../Thankyou_page.php');
        
    }
    else{
        header('Location:../panier.php?error=EmptyPanier');
    }



?>