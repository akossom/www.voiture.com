<!Doctype HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html><!--Début du document html-->
	<!--l'entete du document -->
	<head>
		<!--Déclaration du jeu de caractères à utiliser -->
		<meta http-equiv="content-type" Content="text/html; charset=UTF-8">
		<link type="text/css" rel="stylesheet" href="loccar_style5.css">
		<!--le titre du document -->
		<title>Page d'accueil</title>
		
		<style>
			.myphoto{
				width:50px;
				height:50px;
				border-radius:50%;
				border:1px solid;
			}
		</style>
	</head> 
	
	<body><!-- corps ou contenu du document -->

	<div id="global"> 
	
		<div id="profil">
		
			<?php 
				$serveur="localhost";
				$user="root";
				$pw="";
				$bdd="loccar";
				$cnloccar=new mysqli($serveur,$user,$pw,$bdd);
				
				session_start();
				echo "Bonjour et Bienvenue\n".$_SESSION['monLogin']."<br>";
				
				$req="select * from utilisateurs where login='".$_SESSION['monLogin']."'";
				$resultat=mysqli_query($cnloccar,$req);
				$ligne=mysqli_fetch_assoc($resultat);
			?>
			<img src="<?php echo $ligne['my_photo'];?>" class="myphoto">
			<br />
			<a href="deconnecter.php">Deconnection</a>
		</div>
		<div id="tableaubord">
		
			<?php include("tableaubord.php") ?>
		
		</div>
	
	
	
	
	
	</div>
			
		
		
			
	</body>

	
</html><!--Fin du document html-->