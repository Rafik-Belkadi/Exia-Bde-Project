<?php 


require '../db_connexion/pdo.php';



    $idprod = $_GET['idprod'];
    $cat = $_GET['cat'];

    $req = $bdd->prepare("DELETE FROM products WHERE id=".$idprod."");
    $req->execute();

    if($cat){
        header('Location: ../products.php?cat='.$cat);
    }else{
        header('Location: ../shop_cat.php');
    }