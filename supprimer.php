<!Doctype HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html><!--Début du document html-->
	<!--l'entete du document -->
	<head>
		<!--Déclaration du jeu de caractères à utiliser -->
		<meta http-equiv="content-type" Content="text/html; charset=UTF-8">
		<link type="text/css" rel="stylesheet" href="loccar_style5.css">
		<!--le titre du document -->
		<title>Supprimer</title>
	</head> 
	
	<body><!-- corps ou contenu du document -->

		<div id="container"> 
			<!-- formulaire suppression d'une voiture -->
			<form name="formdelet" class="formulaire">
				<p><a href="accueil.php" class="submit">Tableau de Bord</a></p>
				
					<?php 
						$serveur="localhost";
						$user="root";
						$pw="";
						$bdd="loccar";
						$cnloccar=new mysqli($serveur,$user,$pw,$bdd);
						
						if(isset($_GET['supCar']))
						{
							$sup=$_GET['supCar'];
							$reqDelete="DELETE FROM automobile WHERE IMM='$sup'";
							$resultat=mysqli_query($cnloccar,$reqDelete);
						}
						
						if($resultat){
							echo "<label style='text-align:center; color:#960406;'>La suppression a été correctement effectuée...</label>";
							}
							
						else{
							echo "<label style='text-align:center; color:#960406;'>La suppression a échoué...</label>";
							}
						
					?>
			</form>
		
		</div>		
			
	</body>

	
</html><!--Fin du document html-->