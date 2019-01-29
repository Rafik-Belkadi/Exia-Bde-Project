<?php require '../db_connexion/pdo.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Codes d'accès au serveur central de la NASA</title>
    </head>
    <body>
    
        <?php
    if (!empty($_POST['nom']) AND !empty($_POST['description']) AND !empty($_POST['datee']) AND !empty($_POST['picture'] AND !empty($_POST['price'])))// Si le formulaire est bien rempli
    {
            $req = $bdd->prepare('SELECT * FROM evenement');
            $req->execute();

            $eventExist = true;
            while ($donnees = $req->fetch())
            {
                if($donnees['name']==$_POST['nom']){
                    $eventExist=false;
                }
            }
            if($eventExist){
                $req = $bdd->prepare('INSERT INTO evenement(name, description, price, nbr_vote, metting, picture, undesirable, evenement, id_users,past) VALUES (:nom, :description, :price, :nbr_vote, :datee, :picture, :undesirable, :evenement, :id_users,:past)');

                $req->execute(array(
                    ':nom' => $_POST['nom'],
                    ':description' => $_POST['description'],
                    ':price' => $_POST['price'],
                    ':nbr_vote' => '0',
                    ':datee' => $_POST['datee'],
                    ':picture' => $_POST['picture'],
                    ':undesirable' => '0',
                    ':evenement' => '0',
                    ':id_users' => '5',
                    ':past' => '0' 
                ));

                header('Location: ../ideabox.php');
            }
            else{
                header('Location: ../addidea.php?error=bddExist');
            }
            $req->closeCursor();

    }
    else{
        header('Location: ../addidea.php?error=emptyPost');
    }

    ?>
    
    </body>
</html>



