<?php 
require '../db_connexion/pdo.php'; 

    if (!empty($_COOKIE['pseudo']) AND !empty($_COOKIE['session_id'])) // Si le mot de passe est bon
	{
	   
        $req = $bdd->prepare("SELECT * FROM users WHERE session_id=:sessionID AND first_name=:pseudo");
        $req->execute(array(':sessionID' => $_COOKIE['session_id'], 
                            ':pseudo' => $_COOKIE['pseudo']));
        $user=$req->fetch();


    	$req = $bdd->prepare('INSERT INTO likes(id_commentaires,id_user) VALUES(:commentID,:userID)');
        $req->execute(array(':commentID' => $_GET['comid'] , ':userID' => $user['id']));

            
        $req->closeCursor();


    }




header("Location: ../event.php?event=".$_GET['event']);

 ?>