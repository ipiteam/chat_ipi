<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Pwek</title>
  </head>
  <body>



<?php

function exec_sql ($request) {
	try
		{
		$bdd = new PDO('mysql:host=localhost;dbname=pwek;charset=utf8', 'root', '');
		}

	catch(Exception $e)
		{
			die('Erreur : '.$e->getMessage());
		}	

	$sth = $bdd->prepare($request);
	$sth->execute();
	$result = $sth->fetchAll();
	print_r($sth->errorInfo());
	return $result;
}

$q = "INSERT INTO profils(nom, pseudo, passwrd, email, date_inscription) VALUES ('sylvain', 'Le ieuv', 'toto', 'sdgsdv@qsgdvqsg.com', '2016-12-13')";
exec_sql($q);

$sq = "SELECT nom, pseudo FROM profils";
print_r(exec_sql($sq));

?>








  </body>
</html>
