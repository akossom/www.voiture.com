<!Doctype HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html><!--Début du document html-->
	<!--l'entete du document -->
	<head>
		<!--Déclaration du jeu de caractères à utiliser -->
		<meta http-equiv="content-type" Content="text/html; charset=UTF-8">
		<link type="text/css" rel="stylesheet" href="loccar_style5.css">
		<!--le titre du document -->
		<title>Tableau de bord...</title>
		
		<style>
			.photocar{
				width:130px;
				height:100px;
				border-radius:5%;
				border:1px solid;
			}
</style>
		
	</head> 
	
	<body><!-- corps ou contenu du document -->

	<p> <h1><b>Liste des Voitures...</b></h1>
	
	<?php
		$serveur="localhost";
		$user="root";
		$pw="";
		$bdd="loccar";
		$cnloccar=new mysqli($serveur,$user,$pw,$bdd);
				
		$reqselect="select*from automobile";
		$resultat=mysqli_query($cnloccar,$reqselect);
		
		$nbr=mysqli_num_rows($resultat);
		echo "<p> Total <b>".$nbr."</b>Voitures.....</p>";
	?>
	</p>
	<p><a href="ajouter.php"><img src="images/ajouter.png" width="50px" height="50px"></a></p>
	
	<table width="100%" border="1"> <!--partie statique-->
		<tr>
			<th>Immatriculation</th>
			<th>Marque</th>
			<th>Chauffeur</th>
			<th>Prix de location</th>
			<th>Photo</th>
			<th>Disponibilite</th>
			<th>Supprimer</th>
			<th>Modifier</th>
			
		</tr>
		
		<!--- partie dynamique du tableau --->
		<?php 
		
		$serveur="localhost";
		$user="root";
		$pw="";
		$bdd="loccar";
		$cnloccar=new mysqli($serveur,$user,$pw,$bdd);
	
		while($ligne=mysqli_fetch_assoc($resultat))
		{
		?>	
		<tr>
			<td><?php echo $ligne['IMM'];?></td>
			<td><?php echo $ligne['MARQUE'];?></td>
			<td><?php echo $ligne["CHAUFFEUR"];?></td>
			<td><?php echo $ligne['PRIX_LOC'];?></td>
			<td><img class="photocar" src="<?php echo $ligne['PHOTO'];?>"></td>
			<td><?php echo $ligne["DISPONIBILITE"];?></td>
			<td><a href="supprimer.php?supCar=<?php echo $ligne['IMM'];?>">
			<img src="images/supprimer.png" width="50px" height="50px"></a></td>
			<td><a href="modifier.php?mod=<?php echo $ligne['IMM'];?>">
			<img src="images/modifier.png" width="50px" height="50px"></a></td>
		
		</tr>
		<?php
		}
		?>
		
	</table>
			 <a href="pdfauto.php">Liste des voitures</a> 
	</body>

	
</html><!--Fin du document html-->