<?php
	$serveur="localhost";
	$user="root";
	$pw="";
	$bdd="loccar";
	$cnloccar=new mysqli_connect($serveur,$user,$pw,$bdd);
	mysqli_select_db("loccar");
?>