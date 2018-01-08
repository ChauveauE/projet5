<?php
require_once 'vendor/autoload.php';

$m = new Mustache_Engine(array(
    'loader' => new Mustache_Loader_FilesystemLoader(dirname(__FILE__) . '/view'),
));

try
{
	$bdd = new PDO('mysql:host=localhost;dbname=liste;charset=utf8', 'root', '');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

//affichage de la tâche
//$listes = $bdd->query('SELECT * FROM listetaches');
$req = "SELECT * FROM listetaches";
$listes = $bdd->query($req);

//insertion de la tâche
if (isset($_POST['tache']) && $_POST['tache']!='')
{
	$req = $bdd->prepare('INSERT INTO listetaches (tache) VALUES (:tache)');
	$req->execute(array(
		'tache' => $_POST['tache']));
}

//if (isset($_POST['tache']) && $_POST['tache']!='')
//{
//	$tache = $_POST['listetaches'];
//	$req = ("INSERT INTO listetaches (tache) VALUES (:tache)");
//	$sql = $bdd->prepare($req);
//	$sql->bindParam(':tache', $tache);

//	if ($sql->execute())
//		$info = 'La news a été créé avec succès';
//    else
//      	$info = 'Erreur lors de la création de la tâche';
//	header('Location: index.php');
//}

//suppression de la tâche
if (isset($_POST['id']) && isset($_POST['delete']))
{
	$bdd->exec('DELETE FROM listetaches WHERE id='.$_GET['id']);
}

//if (isset($_POST['id']) && isset($_POST['delete']))
//{
//	$tachesup = $_POST['tachesup'];
//	$req = ("DELETE FROM listetaches WHERE id='.$_POST['id']");
//	$sql = $bdd->prepare($req);
//	$sql->bindParam(':id', $tachesup);

//	if ($sql->execute())
//		$info = 'Tâche supprimée';
//	header('Location: index.php')
//}

// loads template from `view/liste.mustache` and renders it.
echo $m->render('liste', array('listes' => $listes));


