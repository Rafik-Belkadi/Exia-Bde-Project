<?php

 require 'db_connexion/pdo.php';

if (isset($_FILES["file"]["type"])) {
    $validextensions = array("jpeg", "jpg", "png");
    $temporary = explode(".", $_FILES["file"]["name"]);
    $file_extension = end($temporary);
    if ((($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/jpeg")) && ($_FILES["file"]["size"] < 100000)//Approx. 100kb files can be uploaded.
    && in_array($file_extension, $validextensions)) {
        if ($_FILES["file"]["error"] > 0) {
            echo "Return Code: " . $_FILES["file"]["error"] . "<br/><br/>";
        } else {
            if (file_exists("images/" . $_FILES["file"]["name"])) {
                echo $_FILES["file"]["name"] . " <span id='invalid'><b>already exists.</b></span> ";
            } else {
                $sourcePath = $_FILES['file']['tmp_name']; // Storing source path of the file in a variable
                $targetPath = "images/" . $_FILES['file']['name']; // Target path where file is to be stored
                move_uploaded_file($sourcePath, $targetPath); // Moving Uploaded file
                echo "<span id='success'>Image Uploaded Successfully...!!</span><br/>";
                $req = $bdd->prepare("INSERT INTO images (id_event,image) VALUES(:event_id, :image_name)");
                $req->execute([
                    'event_id' => $_POST['event'],
                    'image_name' => $targetPath
                ]);



            }
        }
    } else {
        echo "<span id='invalid'>***Invalid file Size or Type***<span>";
    }
}
?>