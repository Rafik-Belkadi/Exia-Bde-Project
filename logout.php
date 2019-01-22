<?php 
require 'db_connexion/pdo.php'; 




$req = $bdd->prepare("UPDATE `users` SET `session_id` = '' WHERE `users`.`session_id` = :session_id");
$req->execute(array(':session_id' => $_COOKIE['session_id']));


unset($_COOKIE['pseudo']);
setcookie('pseudo', null, -1, '/');

unset($_COOKIE['session_id']);
setcookie('session_id', null, -1, '/');

 header('Location: index.php');

 ?>