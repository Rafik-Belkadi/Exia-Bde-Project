<?php


require '../db_connexion/pdo.php';



    $id_comm = $_GET['id'];



    $que = $bdd->prepare('SELECT * FROM evenement WHERE id=' . $id_comm . '');
    $que->execute();
    $comment = $que->fetch(PDO::FETCH_OBJ);



    $req = $bdd->prepare('INSERT INTO notifications(comment_id, contenu, raison, deprecated) VALUES (?, ?, ?, ?)');

    $req->execute([
        $id_comm,
        $comment->comments,
        $raison,
        0
    ]);

    $req2 = $bdd->prepare('UPDATE evenement
                                      SET undesirable = 1
                                      WHERE id=' . $id_comm . '');
    $req2->execute();

    header('Location: ../ideabox.php');
