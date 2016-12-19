<?php
session_start();
//Vérification des données dans la BDD
  //Connexion à la BDD
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=chat;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

$pseudo = $_POST['pseudo'];
$pass = $_POST['mdp'];
$pass_hash = sha1($pass);
  //Requete de séléction dans la BDD des éléments saisie
$verif = $bdd->prepare('SELECT id FROM profils WHERE pseudo = :pseudo AND passwrd = :pass');
$verif->execute(array(
  'pseudo' => $pseudo,
  'pass' => $pass_hash
  ));
  //Fetch de requete pour savoir si le pseudo, l'email et le mdp ont bien été trouvés
$data = $verif->fetch();
 // echo $data['pseudo'];
$verif->closeCursor();

if(isset($data['id']))
{
  $_SESSION['id'] = $data['id'];
  header('Location: chat.php');
}
else
{
	//COPIE des POST aux variables pour utilisation dans PHP
	// htmlspecialchars(print_r($_POST));
	// $pseudo = $_POST['pseudo'];
	// $pass_hash = $_POST['pass'];
	// $mail = $_POST['mail'];
  header('Location: error_connect.php');
}


?>
