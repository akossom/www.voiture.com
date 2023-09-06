<?php
/*
 * Générer un PDF à partir d'une base de données
 */

//require('connexDB.php');

/*
 * Début de la temporisation de sortie
 */
ob_start();

?>
<style>
	.photocar{
			width:130px;
			height:100px;
			border-radius:5%;
			border:1px solid;
		}
		
		table{
	          caption-side: botton;
            }
        
		.tabcenter{
          margin-left:auto;
          margin-right:auto;
           }
		   
           th,td{
	        border:none;
	        padding:10px
	        cellalign:center;
           }

         th{
	       border:none;
	       background-color:#F30;
	       padding:10px;
		   text-align:center;
          }
		  
         td{
	      text-align:center;
		  }
</style>
		
<page backtop="5%" backbottom="0%" backleft="0%" backright="0%">

		

    
    <h1 style="text-align:center">Liste des voitures</h1>
    
    <table style="width:100%; border:1px text-align:center">
        <tr>
            <th style="width:17%">Immatriculation</th>
            <th style="width:10%">Marque</th>
            <th style="width:11%">Chauffeur</th>
            <th style="width:22%">Prix de Location</th>
			<th style="width:20%">Photo</th>
			<th style="width:20%">Disponibilite</th>
        </tr>
        
        <?php
            $serveur="localhost";
			$user="root";
			$pw="";
			$bdd="loccar";
			$cnloccar=new mysqli($serveur,$user,$pw,$bdd);
			
        /*
         * Requête SQL pour récupérer notre liste de livre.
         */
        
        $req = "select IMM,MARQUE,CHAUFFEUR,PRIX_LOC,PHOTO,DISPONIBILITE from automobile";
        $sql = mysqli_query($cnloccar,$req);
        while($row=mysqli_fetch_assoc($sql))
		{
        ?>
        <tr>
            <td><?php echo $row['IMM'];?></td>
            <td><?php echo $row['MARQUE'];?></td>
            <td><?php echo $row['CHAUFFEUR'];?></td>
            <td><?php echo $row['PRIX_LOC'];?></td>
			<td><img class="photocar" src="<?php echo $row['PHOTO'] ?>" /></td>
            <td><?php echo $row['DISPONIBILITE'];?></td>
           
        </tr>
        <?php
        }
        
        /*
         * Fin du traitement
         */
        
        ?>
    </table>
</page>

<?php

/*
 * $content récupére toutes les données mises en mémoire. 
 */

$content = ob_get_clean();

require('html2pdf/html2pdf.php');

/*
 * On instancie notre constructeur
 * On affiche le contenu
 * On génére notre PDF 
 */

$pdf = new HTML2PDF('P','A4','fr','true','UTF-8');
$pdf->writeHTML($content);
//$pdf->pdf->IncludeJS('print(true)');
$pdf->Output('liste.pdf');

?>