<?php
	
	session_start();

	try {
		$bdd=new PDO('mysql:host=localhost;dbname=projet_adec', 'root', '');
	} catch (Exception $e) {
		die("Echec de connexion à la base de donnees");
	}
?>