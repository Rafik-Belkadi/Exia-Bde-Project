<?php 



    require '../db_connexion/pdo.php';



    $comId = $_GET['id'];



    $req = $bdd->prepare('DELETE FROM commentaires WHERE id='.$comId.'');
    $req->execute();

    header('Location: ' . $_SERVER['HTTP_REFERER']);