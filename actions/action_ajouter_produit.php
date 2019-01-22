<?php 


require '../db_connexion/pdo.php';


      
    if (!empty($_POST['nom']) AND !empty($_POST['description']) AND !empty($_POST['categorie']) AND !empty($_POST['picture'] AND !empty($_POST['price'])))// Si le formulaire est bien rempli
    {
        $nomProd = $_POST['nom'];
        $catProd = $_POST['categorie'];
        $prixProd = $_POST['price'];
        $descProd = $_POST['description'];
        $picProd = $_POST['picture'];      


        

            
                $req = $bdd->prepare('INSERT INTO products(name, description, price, categorie,picture) VALUES (?, ?, ?, ?, ?)');

                $req->execute([
                     $nomProd,
                     $descProd ,
                     $prixProd,
                     $catProd ,
                     $picProd
                ]);

                header('Location: ../shop_cat.php');
            
                   
    }else{
        header('Location: ../ajouter_produit?error=emptyPost');
    }






