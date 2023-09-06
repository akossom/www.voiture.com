<!Doctype HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html><!--Début du document html-->
	<!--l'entete du document -->
	<head>
		<!--Déclaration du jeu de caractères à utiliser -->
		<meta http-equiv="content-type" Content="text/html; charset=UTF-8">
		<link type="text/css" rel="stylesheet" href="loccar_style5.css">
		<!--le titre du document -->
		<title>Ajouter une Location</title>
	</head> 
	
	<body><!-- corps ou contenu du document -->
       
		
		<div id="container"> 
		  <?php 
			$serveur="localhost";
			$user="root";
			$pw="";
			$bdd="loccar";
						
			$cnloccar=new mysqli($serveur,$user,$pw,$bdd);
						
			$auto="SELECT * FROM automobile"; 
			$listeauto=mysqli_query($cnloccar,$auto);
						
			$client="SELECT * FROM client"; 
			$listeclient=mysqli_query($cnloccar,$client);
			?>
		
			<!-- formulaire d'ajout d'une voiture -->
			<form name="formAdd" action="" method="post" class="formulaire" enctype="multipart/form-data">
				<h2 align="center">Ajouter une nouvelle location</h2>
				
				<label><b>Numero client:</b></label>
				<select name="idCli">
				   <?php while($row=mysqli_fetch_array($listeclient)):?>
				    <option value="<?php echo $row[0];?>"><?php echo $row[1];?></option>
				 </select>
				
				<label><b>Immatriculation voiture:</b></label>
				<select name="Imm">
				   <?php while($row=mysqli_fetch_array($listeauto)):?>
				    <option value="<?php echo $row[0]; ?>"><?php echo $row[1]; ?></option>
				</select>
				
				<label><b>Date de location:</b></label>
				<input type="date" name="dateLoc" class="zonetext" placeholder="Entrer la date de naissance du client" required>
				
				<label><b>Date Debut de location:</b></label>
				<input type="date" name="dateDeb" class="zonetext" placeholder="Entrer l'adresse du client" required>
				
				<label><b>Date fin de location:</b></label>
				<input type="date" name="dateFin" class="zonetext" placeholder="Entre le numero de telephone du client" required>
				
				<label><b>Type Payement</b></label>
				<input type="date" name="typePay" class="zonetext" placeholder="Entre le numero de telephone du client" required>
				
				<label><b>Montant</b></label>
				<input type="date" name="Montant" class="zonetext" placeholder="Entre le numero de telephone du client" required>
				
				
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
							$idcli=$_POST['idCli'];
							$imm=$_POST['Imm'];
							$datelocation=$_POST['dateLoc'];
							$datedeb=$_POST['dateDeb'];
							$datefin=$_POST['dateFin'];
							$typepayement=$_POST['typePay'];
							$montant=$_POST['Montant'];
																
							
							//Insertion des donnees recupérées dans la base de données
							$reqAdd="INSERT INTO location (idlocation,idcli,IMM,datelocation,datebebut,datefin,typepayement,montant) 
							VALUES(NULL,'$idcli','$imm','$datelocation','$datedeb','$datefin','$typepayement',$montant)";
							
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

</html>