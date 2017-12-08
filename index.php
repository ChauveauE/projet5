<!-- Projet 5: Exercice maison à rendre pour le 10/12/2017-->
<!-- Elodie CHAUVEAU -->
<?php 
	include 'connexion.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="stylesheet" href="style.css" />
	<title>Liste des tâches</title>
</head>

<body>
	<!--Insertion de la tâche-->
	<?php
	if (isset($_POST['tache']) && $_POST['tache']!='')
	{
		$req = $bdd->prepare('INSERT INTO listetaches (tache) VALUES (:tache)');
		$req->execute(array(
			'tache' => $_POST['tache']));
	}

	//suppression de la tâche
	if (isset($_GET['id']) && isset($_GET['delete']))
	{
		$bdd->exec('DELETE FROM listetaches WHERE id='.$_GET['id']);
	}
	?>

	<fieldset id="marge1">
		<h1>Todo list</h1>

		<fieldset class='marge'>
		<!-- Affichage de la liste des tâches-->
			<legend>Liste des tâches</legend>		
			<ul>
				<?php
					$listes = $bdd->query('SELECT * FROM listetaches');
					foreach ($listes as $liste) {
						echo "<a href = \"?id=".$liste["id"]."&delete\"> ⊠ </a>".$liste["tache"].""; ?><br><?php
					}
				?>
			</ul>
		</fieldset>	

		<fieldset class="marge">	
		<!-- Formulaire d'ajout d'une tâche-->
			<legend>Ajouter une tâche</legend>
			<form method="post" action="index.php">
				<label for="tache" id="tache1"> Tâche: </label>
				<input type="textarea" name="tache" id="tache" />
				<input type="submit" value="Enregistrer" id="valider" name="Enregistrer">
			</form>
		</fieldset>	

	</fieldset>

</body>
</html>