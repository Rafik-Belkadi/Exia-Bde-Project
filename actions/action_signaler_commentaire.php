<?php


require '../db_connexion/pdo.php';



    

    if (!empty($_POST['raison']))// Si le formulaire est bien rempli
    {
        $raison = $_POST['raison'];
        $id_comm = $_GET['id'];
        $redirect = $_POST['link'];
          

        $que = $bdd->prepare('SELECT * FROM commentaires WHERE id='.$id_comm.'');
        $que->execute();
        $comment = $que->fetch(PDO::FETCH_OBJ);
        

            
                $req = $bdd->prepare('INSERT INTO notifications(comment_id, contenu, raison, deprecated) VALUES (?, ?, ?, ?)');
            
                $req->execute([
                    $id_comm,
                    $comment->comments,
                    $raison,
                    0
                ]);

                $req2 = $bdd->prepare('UPDATE commentaires
                                      SET undesirable = 1
                                      WHERE id='.$id_comm.'');
                $req2->execute();

                header('Location: ../'.$linkback);
            
           
          
                   
    }else{
        header('Location: ../'.$redirect);
    }