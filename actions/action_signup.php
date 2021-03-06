<?php require '../db_connexion/pdo.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title></title>
    </head>
    <body>
    
        <?php
    if (!empty($_POST['uname']) AND !empty($_POST['name']) AND !empty($_POST['email']) AND !empty($_POST['password']) AND !empty($_POST['confirm_password']) AND !empty($_POST['localisation'])) // Si le mot de passe est bon
	{
            $password = $_POST["password"];
            $cpassword = $_POST["confirm_password"];
            if (strlen($_POST["password"]) <= 8) {
                $passwordErr = "Your Password Must Contain At Least 8 Characters!";

                header('Location: ../login.php?error=passwordLength');


            } elseif (!preg_match("#[0-9]+#", $password)) {
                $passwordErr = "Your Password Must Contain At Least 1 Number!";

                header('Location: ../login.php?error=passwordNoNumber');


            } elseif (!preg_match("#[A-Z]+#", $password)) {
                $passwordErr = "Your Password Must Contain At Least 1 Capital Letter!";

                header('Location: ../login.php?error=passwordCapitalLetter');


            } elseif (!preg_match("#[a-z]+#", $password)) {
                $passwordErr = "Your Password Must Contain At Least 1 Lowercase Letter!";

                header('Location: ../login.php?error=passwordLowerCase');

            }else{
                    if($_POST['password']==$_POST['confirm_password']){

                    $req = $bdd->prepare('SELECT * FROM Users');
                    $req->execute();

                    $userExist = true;
                    while ($donnees = $req->fetch())
                    {
                        if($donnees['first_name']==$_POST['uname'] OR $donnees['mail']==$_POST['email']){
                            $userExist=false;
                        }
                    }
                    if($userExist){
                        $req = $bdd->prepare('INSERT INTO users(name, first_name, hash, mail, connected,localisation) VALUES (:name, :first_name, :hash, :mail, :connected, :localisation)');
                        


                        $req->execute(array(
                            ':name' => $_POST['name'],
                            ':first_name' => $_POST['uname'],
                            ':hash' => $_POST['password'],
                            ':mail' => $_POST['email'],
                            ':connected' => '1',
                            ":localisation" => $_POST['localisation']

                        ));
                        $sessionID=strval(rand(100,100000000));
                        $req = $bdd->prepare('UPDATE users SET session_id=:sessionID WHERE first_name=:uname');

                        $connected=1;
                        $req->execute(array(':sessionID' => $sessionID, ':uname' => $_POST['uname']));


                        setcookie("pseudo", $_POST['uname'],  time() + 365*24*3600, '/');
                        setcookie("session_id", $sessionID,  time() + 365*24*3600, '/');

                        header('Location: ../inscsucc.php');
                    }
                    else{
                        header('Location: ../login.php?error=bddExist');
                    }
                    $req->closeCursor();




                } else {
                    header('Location: ../login.php?error=samePassword');
                } 
            }
        } else {
            header('Location: ../login.php?error=emptyPost');
        }
    	

    ?>
    
    </body>
</html>



