<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=liste;charset=utf8', 'root', '');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
//insertion de la tâche
if (isset($_POST['tache']) && $_POST['tache']!='')
{
	$req = $bdd->prepare('INSERT INTO listetaches (tache) VALUES (:tache)');
	$req->execute(array(
		':tache' => $_POST['tache']));
}

//suppression de la tâche
if (isset($_POST['id']) && isset($_POST['delete']))
{
	$bdd->exec('DELETE FROM listetaches WHERE id='.$_POST['id']);
}
?>