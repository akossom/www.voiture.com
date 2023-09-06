<!Doctype HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html><!--Début du document html-->
	<!--l'entete du document -->
	<head>
		<!--Déclaration du jeu de caractères à utiliser -->
		<meta http-equiv="content-type" Content="text/html; charset=UTF-8">
		<link type="text/css" rel="stylesheet" href="loccar_style5.css">
		<!--le titre du document -->
		<title>Modifier</title>
	</head> 
	
	<body><!-- corps ou contenu du document -->

		<div id="container"> 
			<!-- formulaire d'ajout d'une voiture -->
			<form name="formUpdate" action="" method="post" class="formulaire" enctype="multipart/form-data">
				<h2 align="center">Mattre à jour une voiture</h2>
				
				<label><b>Immatriculation :</b></label>
				<input type="text" name="txtImm" class="zonetext" value="<?php echo $_GET['mod'] ?> " readonly>
							
				<label><b>Marque :</b></label>
				<input type="text" name="txtMarque" class="zonetext" placeholder="Entrer la Marque" required>
				
				<label><b>Chauffeur</b></label>
				<input type="radio" name="chauffeur" value="Oui">Avec chauffeur<input type="radio" name="chauffeur" value="Non">Sans chauffeur<br><br>
				
				<label><b>Prix de Location :</b></label>
				<input type="number" name="txtPl" class="zonetext" placeholder="Entrer le Prix Unitaire" required>
												
				<label><b>Photo :</b></label>
				<input type="file" name="txtphoto" class="zonetext" placeholder="Choisir une image" required>
								
				<label><b>Disponibilite</b></label>
				<input type="radio" name="disponibilite" value="disponible">Disponible<input type="radio" name="disponibilite" value="disponible">Pas disponible<br><br>
				
				<input type="submit" name="btmod" value="Mettre à jour" class="submit">
				
				<p><a href="accueil.php" class="submit">Tableau de Bord</a></p>
				
				<label style="text-align: center; color: #960406;">
				
				
					<?php 
						$serveur="localhost";
						$user="root";
						$pw="";
						$bdd="loccar";
						$cnloccar=new mysqli($serveur,$user,$pw,$bdd);
						
						if(isset($_POST['btmod']))
						{
							$imm=$_POST['txtImm'];
							$marque=$_POST['txtMarque'];
							$chauffeur=$_POST['chauffeur'];
							$prixloc=$_POST['txtPl'];
							$modifier=$_GET['mod'];
							$image=$_FILES['txtphoto']['tmp_name'];
							
							$trajet="images/".$_FILES['txtphoto']['name'];
							
							move_uploaded_file($image,$trajet);
							
							$disponibilite=$_POST['disponibilite'];
							
							$reqUp="UPDATE automobile SET MARQUE='$marque',CHAUFFEUR='$chauffeur',PRIX_LOC='$prixloc',PHOTO='$trajet',DISPONIBILITE='$disponibilite' WHERE IMM='$modifier'";
							
							$resultat=mysqli_query($cnloccar,$reqUp);
							
							if($resultat)
							{
								echo "Mise à jour des données validées";
							}
							else
							{
								echo "Echec de modification des données";
							}
							
						}
					
					?>
					
				</label>
			</form>
		
		</div>		
			
	</body>

	
</html><!--Fin du document html-->