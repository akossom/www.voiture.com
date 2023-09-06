<?php 
// pour tester sans base de données
extract(unserialize(file_get_contents('datas.txt')));
/*
 * $conf = Configuration du site (information personnelles, Nom, SIRET.....)
 * $p = Information sur le projet
 * $c = Information sur les clients
 * $conf = Details du projet, diffenrentes taches.

*/

ob_start();

?>


<table>
   <tr>
	<td>Salut<td>

   <tr>
</table>

<?php 
	$content = ob_get_clean();
	require('html2pdf/html2pdf.class.php');
	try{
		$pdf = new HTML2PDF('P','A4','fr'); 
		$pdf ->writeHTML($content);
		$pdf ->Output('test.pdf');
	}catch(HTML2PDF_exception $e){
		die($e);
	}

?>

