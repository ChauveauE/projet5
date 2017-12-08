<!--Elodie CHAUVEAU-->
<!-- Connection à la BDD -->
<?php
	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=liste;charset=utf8', 'root', 'root');
	}
	catch (Exception $e)
	{
		die('Erreur : ' . $e->getMessage());
	}
?>