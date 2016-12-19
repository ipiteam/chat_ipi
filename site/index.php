<?php
//Mettre en dernier, car on créer la session que si tout est bon, sinon non.
session_start();
//Copie des POSTS à SESSION
if (isset($_SESSION['id']))
 {
	 $_SESSION['id'];
	 header('Location: chat.php');
 }
 else
 {
	 header('Location: connexion.php');
 }
