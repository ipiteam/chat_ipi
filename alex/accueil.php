<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Pwek</title>
  </head>
  <body>









<?php
echo 'ok';
try
{
   $bdd = new PDO('mysql:host=localhost;dbname=pwek;charset=utf8', 'root', '');
}
 catch(Exception $e)
 {
  die('Erreur : '.$e->getMessage());
}

$sth = $bdd->prepare("SELECT nom, pseudo FROM profils");
$sth->execute();

/* Récupération de toutes les lignes d'un jeu de résultats */
print("Récupération de toutes les lignes d'un jeu de résultats :\n");
$result = $sth->fetchAll();
print_r($result);



try {
  $insert = $bdd->prepare("INSERT INTO profils(pseudo, email) VALUES ('salqsdfdqsfuqsfq','okok@gsdfsdmail.com', 'test') ");
  $insert->execute();
} catch (PDOException $e) {
      if ($e->getCode() == 1062) {
        echo "<div>error</div>";
          // Take some action if there is a key constraint violation, i.e. duplicate name
      } else {
          throw $e;
          echo "<div>error</div>";
      }
  }

#print_r($insert);
// $data=$insert->fetchAll(PDO::FETCH_ASSOC);
//
// print_r($data);



/* Récupération de toutes les lignes d'un jeu de résultats */
// print("Récupération de toutes les lignes d'un jeu de résultats :\n");
// $result_insert = $insert->fetchAll();
// print_r($result_insert);


?>








  </body>
</html>
