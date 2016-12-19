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
$mail = $_POST['mail'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$description = $_POST['description'];
if (($pseudo == null ) ||($mail == null ) || ($pass == null)) {
  header('Location: error_inscription.php');
}

  //Requete de séléction dans la BDD des éléments saisie
$verif = $bdd->prepare('SELECT id FROM profils
              WHERE pseudo = :pseudo OR mail = :mail ');
$verif->execute(array(
  'pseudo' => $pseudo,
  'mail' => $mail
  ));
  //Fetch de requete pour savoir si le pseudo, l'email et le mdp ont bien été trouvés
$data = $verif->fetch();
 // echo $data['pseudo'];
$verif->closeCursor();

if(isset($data['id']))
{
  header('Location: error_inscription.php');
}

$verif = $bdd->prepare('INSERT INTO profils
  VALUES( NULL, :mail, :pseudo, :pass, NULL, NULL, :nom, :prenom, :description, CURDATE())');


$verif->execute(array(
  'mail' => $mail,
  'pseudo' => $pseudo,
  'pass' => $pass_hash,
  'nom' => $nom,
  'prenom' => $prenom,
  'description' => $description
  ));


  //Requete de séléction dans la BDD des éléments saisie
$verif = $bdd->prepare('SELECT id FROM profils
              WHERE pseudo = :pseudo');
$verif->execute(array(
  'pseudo' => $pseudo
  ));
  //Fetch de requete pour savoir si le pseudo, l'email et le mdp ont bien été trouvés
$data = $verif->fetch();
 // echo $data['pseudo'];
$verif->closeCursor();
 $_SESSION['id'] = $data['id'];
 header('Location: chat.php');

?>
