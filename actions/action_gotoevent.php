<?php require '../db_connexion/pdo.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title></title>
    </head>
    <body>
    <?php

    $req = $bdd->prepare("SELECT * FROM evenement WHERE id=:event");
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


    	$req = $bdd->prepare('INSERT INTO signin(id_users,id_evenement) VALUES(:userID, :eventID)');
        $req->execute(array(':eventID' => $donnees['id'] , ':userID' => $user['id']));

            
        $req->closeCursor();

        header('Location: ../event.php?event='.$_GET['event'].'&'. 'error=suscribed&isPasse='.$donnees['past']);






    }
    else{
    	header('Location: ../event.php?event='.$_GET['event'].'&'. 'error=notconnected&isPasse='.$donnees['past'] );
    }

    ?>
    
    </body>
</html>



