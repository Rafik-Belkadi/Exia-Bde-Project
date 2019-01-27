<?php 

    
require '../db_connexion/pdo.php'; 

    if (!empty($_COOKIE['pseudo']) AND !empty($_COOKIE['session_id'])) // Si le mot de passe est bon
	{
	   
        $req = $bdd->prepare("SELECT * FROM users WHERE session_id=:sessionID AND first_name=:pseudo");
        $req->execute(array(':sessionID' => $_COOKIE['session_id'], 
                            ':pseudo' => $_COOKIE['pseudo']));
        $user=$req->fetch();


        $req2 = $bdd->prepare("SELECT * FROM vote WHERE id_evenement=".$_GET['comid']." AND id_users=".$user['id']."");
        $req2->execute();
        
        $user2=$req2->fetch();

        

        

        if(!empty($user2))
        {
            $req3 = $bdd->prepare("DELETE FROM vote WHERE id_evenement=".$_GET['comid']." AND id_users=".$user['id']);
            $req3->execute();
            
            $req4 = $bdd->prepare("SELECT nbr_vote FROM evenement WHERE id=".$_GET['comid']);
            $req4->execute();
            $nombre_old = $req4->fetch();

            $newVote = $nombre_old['nbr_vote'] - 1;

            echo $newVote;

            $req5 = $bdd->prepare("UPDATE evenement SET nbr_vote=".$newVote." WHERE id=".$_GET['comid']);
            $req5->execute();
           

        }else{
            $req3 = $bdd->prepare('INSERT INTO vote(id_evenement,id_users) VALUES(:commentID,:userID)');
            $req3->execute(array(':commentID' => $_GET['comid'] , ':userID' => $user['id']));

            $req4 = $bdd->prepare("SELECT nbr_vote FROM evenement WHERE id=".$_GET['comid']);
            $req4->execute();
            $nombre_old = $req4->fetch();

            $newVote = $nombre_old['nbr_vote'] + 1;

            $req5 = $bdd->prepare("UPDATE evenement SET nbr_vote=".$newVote." WHERE id=".$_GET['comid']);
            $req5->execute();

            

        }
    	

            
        $req->closeCursor();


    }




  header("Location: ../ideabox.php");

 ?>
