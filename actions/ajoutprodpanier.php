<?php require '../db_connexion/pdo.php';?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title></title>
    </head>
    <body>
    
        <?php 

            if (empty($_COOKIE['pseudo']) AND empty($_COOKIE['session_id'])) {
                echo "Vous devez être connecter pour faire un achat";
            }else{

                $req = $bdd->prepare("SELECT * FROM users WHERE session_id=:session AND first_name=:pseudo");
                $req->execute(array(':session' => $_COOKIE['session_id'], ':pseudo' => $_COOKIE['pseudo']));
                $iduser = $req->fetch();
                $iduser = $iduser['id'];

                echo $iduser;

                $idprod = $_GET['idprod'];

                $rech = $bdd->prepare('SELECT * FROM basket WHERE `basket`.`id_products` = :prod AND `basket`.`id_users` = :user');
                $rech->execute(array(':prod' => $idprod, ':user' => $iduser));
                $count=0;
                $globalequalite = 0;

                while ($data = $rech->fetch()){
                    $count = $count + 1;
                    echo "count!".$count;
                    $globalequalite = $data['tot'];
                }

                if ($count>0) {
                    $count = $globalequalite + 1;
                    $reck = $bdd->prepare('UPDATE `basket` SET `tot`= :count WHERE `basket`.`id_products` = :prod AND `basket`.`id_users` = :user');
                    $reck->execute(array(':prod' => $idprod, ':user' => $iduser, ':count' => $count));
                }
                                    
                else{
                    $rek = $bdd->prepare('INSERT INTO basket(tot, id_products, id_users) VALUES (:tot, :prod, :user)');

                    $rek->execute(array(
                    ':tot' => '1',
                    ':user' => $iduser,
                    ':prod' => $idprod,
                    ));

                    echo "It works user is ".$iduser." and prod is ".$idprod;
                
                }



                header('Location: ../panier.php');

                $count=0;

            }

        ?>
    
    </body>
</html>