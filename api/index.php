<?php

if (isset($_GET['event'])){
    require '../db_connexion/pdo.php';

    $sql = "SELECT first_name FROM users WHERE id IN (SELECT id_users FROM signin WHERE id_evenement=:id)";
    $req = $bdd->prepare($sql);
    $req->execute(array(":id" => $_GET['event']));
    $res = $req->fetchAll(PDO::FETCH_ASSOC);

    echo '<html><head></head><body>', json_encode($res, JSON_FORCE_OBJECT | JSON_PRETTY_PRINT), '</body></html>';
}