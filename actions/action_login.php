<?php require '../db_connexion/pdo.php'; ?>
    
        <?php
    if (!empty($_POST['uname']) AND !empty($_POST['password']) ) // Si le mot de passe est bon
	{
        
	   
    	$req = $bdd->prepare('SELECT * FROM Users');
            $req->execute();
        
            $userExist = false;
            while ($donnees = $req->fetch())
            {
                if($donnees['first_name']==$_POST['uname'] AND $donnees['hash']==$_POST['password']){
                    $userExist=true;
                    break;
                }
            }
            
        if($userExist){
            $sessionID=strval(rand(100,100000000));
            $req = $bdd->prepare('UPDATE users SET session_id=:sessionID WHERE first_name=:uname');

            $connected=1;
            $req->execute(array(':sessionID' => $sessionID, ':uname' => $_POST['uname']));


            setcookie("pseudo", $_POST['uname'],  time() + 365*24*3600, '/');
            setcookie("session_id", $sessionID,  time() + 365*24*3600, '/');

            //$_SESSION['pseudo'] =  $_POST['uname'];
            
            header('Location: ../connsucc.php');
            
        }
        else{
            header('Location: ../login.php?error2=WrongPassword');
        }
        
        $req->closeCursor();
        

    }
    else{
        
    	header('Location: ../login.php?error2=emptyPost');
    }

    ?>
