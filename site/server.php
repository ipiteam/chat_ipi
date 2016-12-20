<?php
header("Content-Type: text/xml");
echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>";
echo "<list>";

try
{
	$bdd = new PDO('mysql:host=localhost;dbname=chat;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

if ( $_GET['status'] == "onLoad" ) {
$req = $bdd->query('SELECT DISTINCT id_profil FROM messages LIMIT 30');
while ($donnees = $req->fetch())
{
    echo "<profils id=\"" . $donnees["id_profil"]
    . "\" />";
}

$req = $bdd->query('SELECT m.id id, m.id_profil id_profil, p.pseudo pseudo, m.texte texte, m.date_mess date_mess, m.heure_mess heure_mess
                        FROM messages m
                        JOIN profils p ON m.id_profil = p.id
                        ORDER BY id DESC
                        LIMIT 10');
} else if ($_GET['status'] == "refresh"){
     $req = $bdd->prepare("SELECT m.id id, m.id_profil id_profil, p.pseudo pseudo, m.texte texte, m.date_mess date_mess, m.heure_mess heure_mess
                         FROM messages m
                         JOIN profils p ON m.id_profil = p.id
                         WHERE m.id > ?");
     $req->execute(array($_GET['last']));


} else if ($_GET['status'] == "get_status"){
     $req = $bdd->prepare("SELECT id, pseudo
                         FROM profils
                         WHERE status=1");
    $req->execute(array($_GET['last']));
 }
while ($donnees = $req->fetch())
{
    echo "<item id=\"" . $donnees["id"]
    . "\" id_profil=\"" . $donnees["id_profil"]
    . "\" pseudo=\"" . $donnees["pseudo"]
    . "\" date_mess=\"" . $donnees["date_mess"]
    . "\" heure_mess=\"" . $donnees["heure_mess"]
    . "\" >"
    . "<texte>" .nl2br($donnees["texte"]) . "</texte> </item>";
}

$req->closeCursor();
echo "</list>";
?>
