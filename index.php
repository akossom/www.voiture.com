<!Doctype HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html><!--Début du document html-->
	<!--l'entete du document -->
	<head>
		<!--Déclaration du jeu de caractères à utiliser -->
		<meta http-equiv="content-type" Content="text/html; charset=UTF-8">
		<link type="text/css" rel="stylesheet" href="loccar_style5.css">
		<!--le titre du document -->
		<title> Rechercher un véhicule</title>
	</head> 
	
	<body><!-- corps ou contenu du document -->

		<div id="entete">
		
		<a href="login.php" class="login">login</a><!--lien pour l,authentification-->
		
		
			<video class="video_entete" autoplay muted loop>
				<source src="images/LOC1.mp4" type="video/mp4" />
			</video>
			<p class="nomsite">Location Véhicules</p>
			
			<!-- formulaire de recherche -->
				<div id="formauto">
					<form name="formauto" method="post" action="">
						<input id="motcle" type="text" name="motcle" placeholder=" Recherche par Marque....."/>
						<input class="btfind" type="submit" name="btsubmit" value="Recherche"/>
					</form>
				</div>
		</div>
		
		<!-- afficher les articles de la base de donées -->
		<div id="articles">
		
		<?php
		
			$serveur="localhost";
			$user="root";
			$pw="";
			$bdd="loccar";
			$cnloccar=new mysqli($serveur,$user,$pw,$bdd);
		
			if(isset($_POST['btsubmit'])){
				$mc=$_POST['motcle'];
				$reqSelect="select * from automobile where MARQUE like '%$mc%'";
							
			}
			else{
				$reqSelect="select * from automobile";
				}
				$resultat=mysqli_query($cnloccar,$reqSelect);
				$nbr=mysqli_num_rows($resultat);
				echo "<p><b>".$nbr." </b> Resultats de votre recherche....</p>";
				while($ligne=mysqli_fetch_assoc($resultat))
			{					
		?>
			<div id="auto">
				<img src="<?php echo $ligne['PHOTO'] ?>" /><br />
				<?php echo $ligne["IMM"];?><br />
				<?php echo $ligne["MARQUE"];?><br />
				<?php echo $ligne["CHAUFFEUR"];?><br />
				<?php echo $ligne["PRIX_LOC"];?><br />
				<?php echo $ligne["DISPONIBILITE"];?><br />
				
			</div>
			
			<?php } ?>
			 
		</div>
		
		
		 <nav>
				
		</nav>
		
		<footer>
		
		
		</footer>
			
	</body>

	
</html><!--Fin du document html-->