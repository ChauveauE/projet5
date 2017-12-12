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

$listes = $bdd->query('SELECT * FROM listetaches');

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


// loads template from `view/liste.mustache` and renders it.
echo $m->render('liste', array('listes' => $listes));