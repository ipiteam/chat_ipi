<?php

if(isset($_SESSION['id'])) {
	Header('Location: chat.php');
	
}else {
	Header('Location: connexion.php');
}