
<!Doctype HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html><!--Début du document html-->
	<!--l'entete du document -->
	<head>
		<!--Déclaration du jeu de caractères à utiliser -->
		<meta http-equiv="content-type" Content="text/html; charset=UTF-8">
		<link type="text/css" rel="stylesheet" href="loccar_style5.css">
		<!--le titre du document -->
		<title>login</title>
	</head> 
	
	<body><!-- corps ou contenu du document -->

		<div id="container">
			<!-- formulaire de recherche -->
					<form action="" method="post" class="formulaire">
						<h1>Connexion</h1>
						<label><b>Nom d'utilisateur:</b></label>
						<input type="text" placeholder="Entrer le nom d'utilisateur" 
						name="txtlogin" required class="zonetext">
						<label><b>Mot de Passe:</b></label>
						<input type="password" placeholder="Entrer le mot de passe" 
						name="txtpw" required class="zonetext">
						<input type="submit" name="btlogin" value="LOGIN" 
						id="submit" class="submit">
						
						<?php

							$serveur="localhost";
							$user="root";
							$pw="";
							$bdd="loccar";
							$cnloccar=new mysqli($serveur,$user,$pw,$bdd);
							
							if(isset($_POST['btlogin']))
							{
								$req="select*from utilisateurs where login='".$_POST['txtlogin']."' and motPass='".$_POST['txtpw']."'";
								if($resultat=mysqli_query($cnloccar,$req))
								{
									$ligne=mysqli_fetch_assoc($resultat);
									if($ligne!=0){
										session_start();
										$_SESSION['monLogin']=$_POST['txtlogin'];
										header("location:accueil.php");
									}
									else{
										echo "<font color='#F0001D'> Login ou mot de passe invalide</font>";
									}
								}
							}
						
						?>
					</form>
		</div>
		
		
			
	</body>

	
</html><!--Fin du document html-->