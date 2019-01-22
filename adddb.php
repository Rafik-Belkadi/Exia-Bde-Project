<?php 
    require 'db_connexion/pdo.php';
    if (isset($_POST['tab'])){
        $tab = $_POST['tab'];
    } else {
        $tab = "";
    }
    if (isset($_POST['sub'])){
        $sub = $_POST['sub'];
    } else {
        $sub = "";
    }
?>

<!DOCTYPE HTML>

<html>
	<head>
        <title>
            DBGestion<?php if($tab != ""){echo ' - ', $tab;}?>
        </title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="stylesheet" href="assets/css/profilpic.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body class="landing">
        <?php
        // check user privileges and redirect if not allowed to be here
            
        $userAccessReq = $bdd->prepare(
            "SELECT bde FROM users WHERE first_name = :name AND session_id = :session_id"
        ); // gets the privileges for selected user
        
        if (isset($_COOKIE['pseudo']) && isset($_COOKIE['session_id'])){
            $userAccessReq->execute(array(
                ":name" => $_COOKIE["pseudo"], 
                ":session_id" => $_COOKIE["session_id"]
            ));

            $userAccess = $userAccessReq->fetch();

            if ($userAccess['bde'] != 1){
                $auth = FALSE;
                header("Location: index.php"); // redirect unauthorized
            } else {
                $auth = TRUE;
            }
        } else {
            header("Location: index.php"); // redirect non login users
        }

        // handle sub_actions here
        if ($auth && isset($_POST['sub_action']) && isset($_POST['row'])) {
            switch ($_POST['sub_action']){
                case "delete":
                    break;
                case "edit":
                    break;
            }
        } else {
            // handle errors
        }
        ?>

		<div id="page-wrapper">

        <!-- Header -->
				<?php include("includes/header.php"); ?>
			<!-- Header -->
        <!-- Content -->

            <div id="main" class="wrapper style1">
                <div class="container">
                    <header class="major">
                        <h2><?php if ($auth){ echo ($tab != "") ? $tab : "Gestion"; }?></h2>	
                    </header>
                    <section id="content">
                        <?php if ($auth) {
                        echo '<form method="post" action="adddb.php">
                            <div class="row uniform 50%">
                                <div class="4u"></div>' ;
                        
                        switch ($sub) {
                            case "Delete": 
                                $sql = "SELECT * FROM :table";
                                break;
                            case "Edit":
                                $sql = "SELECT * FROM :table";
                                break;
                            case "Add":
                                $sql = "SELECT COLUMN_NAME, DATA_TYPE FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME=:table";
                                break;
                            default:
                                $sql = "";
                                $tab = "";
                                break;
                        }
                        
                        $req = $bdd->prepare($sql);
                        
                        if ($tab != "") {
                            $req->bindValue(":table", $tab);
                            $req->execute();

                            switch ($sub) {
                                case "Delete":
                                    echo '<div class="4u$" style="text-align: center;">
                                        <div class="select-wrapper">
                                            <select name="row" id="row">
                                                <option value="">- Contenu à supprimer -</option>';

                                    while ($row = $req->fetch()){
                                        echo '<option value="', $row['name'], '">', $row['name'], '</option>';
                                    }

                                    echo '</select></div>
                                        <br />
                                        <ul class="actions">
                                            <li><input name="sub_action" type="submit" value="delete" class="special" /></li>
                                        </ul>
                                    </div>';
                                    break;

                                case "Edit":
                                    echo '<div class="4u$" style="text-align: center;">
                                        <div class="select-wrapper">
                                            <select name="tab" id="tab">
                                                <option value="">- Contenu à modifier -</option>';

                                    while ($row = $req->fetch()){
                                        echo '<option value="', $row['name'], '">', $row['name'], '</option>';
                                    }

                                    echo '</select></div>
                                        <br />
                                        <ul class="actions">
                                            <li><input name="sub_action" type="submit" value="edit" class="special" /></li>
                                        </ul>
                                    </div>';
                                    break;

                                case "Add":
                                    echo '<div class="4u$" style="text-align: center;">' ;

                                    while ($row = $req->fetch()){
                                        switch ($row['DATA_TYPE']) {
                                            case "tinyint":
                                                echo '<div class="select-wrapper">
                                                        <select name="', $row['COLUMN_NAME'], '" id="', $row['COLUMN_NAME'], '">
                                                            <option value="0">- ',  $row['COLUMN_NAME'], ' -</option>
                                                            <option value="0">FALSE</option>
                                                            <option value="1">TRUE</option>
                                                        </select>
                                                        </div>';
                                                break;

                                            case "int":
                                                echo '<input type="number" name="', $row['COLUMN_NAME'], '" id="', $row['COLUMN_NAME'], '" value="', $row['COLUMN_NAME'], '">';
                                                break;

                                            case "varchar": default:
                                                break;
                                        }
                                    }

                                    echo '<br />
                                        <ul class="actions">
                                            <li><input name="sub_action" type="submit" value="add" class="special" /></li>
                                        </ul>
                                        </div>';
                                    break;

                                default:
                                    break;
                            }

                        } else {
                            echo '<div class="4u$" style="text-align: center;">
                                    <div class="select-wrapper">
                                        <select name="tab" value="tab" id="tab">
                                            <option value="">- Contenu à modifier -</option>
                                            <option name="users" value="users">Utilisateurs</option>
                                            <option value="products">Produits</option>
                                            <option value="evenement">Évenements</option>
                                            <option value="commentaires">Commentaires</option>
                                        </select>
                                    </div>
                                    <br />
                                    <ul class="actions">
                                        <li><input name="sub" type="submit" value="Add" class="special" /></li>
                                        <li><input name="sub" type="submit" value="Delete" class="special" /></li>
                                        <li><input name="sub" type="submit" value="Edit" class="special" /></li>
                                    </ul>
                                </div>';
                        }
                        } ?>
                        </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>

       <!-- footer -->
				<?php include("includes/footer.php"); ?>
			<!-- footer -->
            

    <!-- Scripts -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/jquery.scrolly.min.js"></script>
        <script src="assets/js/jquery.dropotron.min.js"></script>
        <script src="assets/js/jquery.scrollex.min.js"></script>
        <script src="assets/js/skel.min.js"></script>
        <script src="assets/js/util.js"></script>
        <!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
        <script src="assets/js/main.js"></script>
	</body>
</html>
