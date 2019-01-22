<?php require '../db_connexion/pdo.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title></title>
    </head>
    <body>
    <?php

    $req = $bdd->prepare("SELECT * FROM evenement WHERE name=:event");
    $req->execute(array(':event' => $_GET['event']));

    $donnees = $req->fetch();
    ?>



        <?php
    if (!empty($_COOKIE['pseudo']) AND !empty($_COOKIE['session_id'])) // Si le mot de passe est bon
	{
	   
        $req = $bdd->prepare("SELECT * FROM users WHERE session_id=:sessionID AND first_name=:pseudo");
        $req->execute(array(':sessionID' => $_COOKIE['session_id'], 
                            ':pseudo' => $_COOKIE['pseudo']));
        $user=$req->fetch();


    	$req = $bdd->prepare('DELETE FROM signin WHERE id_users = :userID AND id_evenement = :eventID LIMIT 1');
        $req->execute(array(':eventID' => $donnees['id'] , ':userID' => $user['id']));

            
        $req->closeCursor();

       header('Location: ../event.php?event='.$_GET['event'].'&'.'error=removed');






    }
    else{
    	header('Location: ../event.php?event='.$_GET['event'].'&'.'error=notconnected');
    }

    ?>
    
    </body>
</html>



