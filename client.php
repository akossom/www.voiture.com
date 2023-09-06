<!Doctype HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html><!--Début du document html-->
	<!--l'entete du document -->
	<head>
		<!--Déclaration du jeu de caractères à utiliser -->
		<meta http-equiv="content-type" Content="text/html; charset=UTF-8">
		<link type="text/css" rel="stylesheet" href="loccar_style5.css">
		<!--le titre du document -->
		<title>Ajouter une Client</title>
	</head> 
	
	<body><!-- corps ou contenu du document -->

		<div id="container"> 
			<!-- formulaire d'ajout d'une voiture -->
			<form name="formAdd" action="" method="post" class="formulaire" enctype="multipart/form-data">
				<h2 align="center">Ajouter une nouvel client</h2>
				
				<label><b>Nom:</b></label>
				<input type="text" name="txtNom" class="zonetext" placeholder="Entrer le nom de l'utilisateur" required>
				
				<label><b>Prenom:</b></label>
				<input type="text" name="txtPrenom" class="zonetext" placeholder="Entrer le prenom du client" required>
				
				<label><b>Date de Naissance:</b></label>
				<input type="date" name="dateNaiss" class="zonetext" placeholder="Entrer la date de naissance du client" required>
				
				<label><b>Adresse:</b></label>
				<input type="text" name="txtAdresse" class="zonetext" placeholder="Entrer l'adresse du client" required>
				
				<label><b>Telephone:</b></label>
				<input type="text" name="txtTel" class="zonetext" placeholder="Entre le numero de telephone du client" required>
				
				<label><b>Date d'Inscription</b></label>
				<input type="date" name="dateInscr" class="zonetext" placeholder="Entre le numero de telephone du client" required>
				
				<input type="submit" name="btadd" value="Ajouter" class="submit">
				
				<p><a href="listeclient.php" class="submit">Liste des clients</a></p>
				
				<label style="text-align: center; color: #960406;">
				
				
					<?php 
						$serveur="localhost";
						$user="root";
						$pw="";
						$bdd="loccar";
						
						$cnloccar=new mysqli($serveur,$user,$pw,$bdd);
						
						if(isset($_POST['btadd']))
						{
							//Recupeation des donnees saisies dans les champs du formulaire
							$nom=$_POST['txtNom'];
							$prenom=$_POST['txtPrenom'];
							$datenaiss=$_POST['dateNaiss'];
							$adresse=$_POST['txtAdresse'];
							$tel=$_POST['txtTel'];
							$dateinscr=$_POST['dateInscr'];
																
							
							//Insertion des donnees recupérées dans la base de données
							$reqAdd="INSERT INTO client (idcli,nom,prenom,datenaissance,addresse,telephone,dateinscription) 
							VALUES(NULL,'$nom','$prenom','$datenaiss','$adresse','$tel','$dateinscr')";
							
							//Test de validation des données inserées
							$resultat=mysqli_query($cnloccar,$reqAdd);
							
							if($resultat)
							{
								echo "Insertion des données validées";
							}
							else
							{
								echo "Echec d'Insertion des données";
							}
							
						}
					
					?>
					
				</label>
			</form>
		
		</div>		
			
	</body>

	
</html><!--Fin du document html-->