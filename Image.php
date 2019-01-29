<!DOCTYPE html>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<?php require 'db_connexion/pdo.php' ?>

<html>

	<head>
		<title>Image</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<style>
		
		
			a.special{
				background-color: #e44c65;
				box-shadow: none;
				color: #ffffff !important;
				-moz-appearance: none;
				-webkit-appearance: none;
				-ms-appearance: none;
				appearance: none;
				-moz-transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
				-webkit-transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
				-ms-transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
				transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
				background-color: transparent;
				border-radius: 4px;
				border: 0;
				box-shadow: inset 0 0 0 1px rgba(255, 255, 255, 0.3);
				color: #ffffff !important;
				cursor: pointer;
				display: inline-block;
				font-weight: 300;
				height: 3em;
				line-height: 3em;
				padding: 0 2.25em;
				text-align: center;
				text-decoration: none;
				white-space: nowrap;
			}

				a.special:hover{
					background-color: #e76278;
					box-shadow: inset 0 0 0 1px #e44c65;
					color:  #ffffff !important;
				}

		</style>
	</head>
    	<!-- header -->

	

<body>
	
<script>

 $(document).ready(function (e) {
$("#uploadimage").on('submit',(function(e) {
e.preventDefault();
$("#message").empty();
$('#loading').show();
$.ajax({
url: "ajax_php_file.php", // Url to which the request is send
type: "POST",             // Type of request to be send, called as method
data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
contentType: false,       // The content type used when sending data to the server.
cache: false,             // To unable request pages to be cached
processData:false,        // To send DOMDocument or non processed data file it is set to false
success: function(data)   // A function to be called if request succeeds
{
	$('#loading').hide();
	$("#message").html(data);
}
});
}));
 });
</script>

<?php 
		$req = $bdd->prepare("SELECT * FROM users WHERE `users`.`session_id` = :session_id AND `users`.`first_name` = :pseudo");
		$req->execute(array(':session_id' => $_COOKIE['session_id'], ':pseudo' => $_COOKIE['pseudo']));
        $data = $req->fetch(); 
        
        $req2 = $bdd->prepare("SELECT id_event,image FROM images where id_event=".$_GET['eventid']);
        $req2->execute();
        $data2 = $req2->fetchAll();
		
	?>

    	<?php include("includes/header.php"); ?>
	<!-- end header -->
<section>
    <section id="four" class="wrapper style1 special fade-up">
					<div class="container">
						<header class="major">
							<?php
								
									echo '<h2>Images</h2>';
								
							?>
						</header>
					</div>
				</section>

<div class="container">
    <div class="row">
        <div class="col-md-4" style="margin-bottom: 50px;">
            <input type="submit" class="special" value="Telecharger toutes les photos" onclick="downloadAll(window.links)">
        </div>
        <div class="col-md-6">
            <form id="uploadimage" action="" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-3">
                        <input type="file" name="file" id="file" required placeholder="Ajouter une image ">
                    </div>
					<input type="hidden" name="event" value="<?php echo $_GET['eventid']; ?>" >
                    <div class="col-md-3">
                        <input type="submit" value="Ajouter une image " class="special">
                    </div>
                </div>
            </form>
			<h4 id='loading' >loading..</h4>
			<div id="message"></div>
        </div>

    </div>
</div>
<div class="container" >
  <?php if($data['pro'] == 1) { ?>
                        
                            
                        
                    <?php } ?>
	<div class="row">
		<div class="row" id="allImages">
        <?php foreach($data2 as $value ) { 
           echo "<div class='col-lg-3 col-md-4 col-xs-6 thumb'>
                <a download class='thumbnail' href='".$value['image']."' data-image-id='' data-toggle='modal' data-title=''
                   data-image='".$value['image']. "'
                   data-target='#image-gallery'>
                     <img style='max-height= 244.995px;' class='img-thumbnail'
                         src='".$value['image']."'
                         alt='Another alt text'>
                </a>
            </div>";
         } ?>


        
	</div>
</div>


	
</section>





			<!-- Footer -->
				<?php include("includes/footer.php"); ?>
			<!-- Footer -->

		</div>
		
<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>
            
			
            <script>

                var links =  $(".thumbnail");
    
                function downloadAll(urls) {
                

                  
                    

                    
                    
                 for (var i = 0; i < urls.length; i++) {
                       
                       urls[i].click();
                        
                    }
                
                
                console.log(urls);
                
                }
            </script>
            
</body>