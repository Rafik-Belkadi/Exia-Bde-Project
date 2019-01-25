<?php 
require '../db_connexion/pdo.php'; 

    if (!empty($_COOKIE['pseudo']) AND !empty($_COOKIE['session_id'])) // Si le mot de passe est bon
	{
	   
        $req = $bdd->prepare("SELECT * FROM users WHERE session_id=:sessionID AND first_name=:pseudo");
        $req->execute(array(':sessionID' => $_COOKIE['session_id'], 
                            ':pseudo' => $_COOKIE['pseudo']));
        $user=$req->fetch();


        $req2 = $bdd->prepare("SELECT * FROM likes WHERE id_commentaires=".$_GET['comid']." AND id_user=".$user['id']."");
        $req2->execute();
        
        $user2=$req2->fetch();

        

        if(!empty($user2))
        {
            $req3 = $bdd->prepare("DELETE FROM likes WHERE id_commentaires=".$_GET['comid']." AND id_user=".$user['id']);
            $req3->execute();
            
            echo " c supp";

        }else{
            $req4 = $bdd->prepare('INSERT INTO likes(id_commentaires,id_user) VALUES(:commentID,:userID)');
            $req4->execute(array(':commentID' => $_GET['comid'] , ':userID' => $user['id']));

            

        }
    	

            
        $req->closeCursor();


    }




 header("Location: ../event.php?event=".$_GET['event']);

 ?>