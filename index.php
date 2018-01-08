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

// loads template from `view/liste.mustache` and renders it.
echo $m->render('liste', array('listes' => $listes));


