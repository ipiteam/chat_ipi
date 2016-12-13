<?php

// function requete($requete)
// {
//   try
//   {
//     $bdd = new PDO('mysql:host=localhost;dbname=pwek;charset=utf8', 'root', '');
//   }
//   catch(Exception $e)
//   {
//     die('Erreur : '.$e->getMessage());
//   }
//
//
//   $req = $bdd ->query($requete);
//
//
//   return $req;
//
// }


  try
  {
     $bdd = new PDO('mysql:host=localhost;dbname=pwek;charset=utf8', 'root', '');
  }
   catch(Exception $e)
   {
    die('Erreur : '.$e->getMessage());
  }

  $req =$bdd->prepare()
