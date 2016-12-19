<?php
/* header("Content-Type: text/xml"); */
/* echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>"; */
/* echo "<list>"; */

try
{
	$bdd = new PDO('mysql:host=localhost;dbname=chat;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

$req = $bdd->prepare('INSERT INTO messages VALUES(null, CURDATE(), CURTIME(), :id, :texte )') ;
// $req->execute(array( 'id' => $_POST['id'],
//                         'texte' => $_POST['texte']));
$req->execute(array( 'id' => $_POST['id'],
                        'texte' => $_POST['texte']));

/* echo "</list>"; */

/* End of file filename.php */
