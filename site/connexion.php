<?php
session_start();
    include('header.php');
?>
    <!-- Page Content -->
    <div class="container">
        <h1>Bienvenue</h1>
        <br>
        <span class="salut">Veuillez vous connecter pour chatter</span>
        <br><br><br><br>
        <form class="form-horizontal" action="control_connexion.php" method="post">
        	<div class="form-group">
            	<label class="control-label col-lg-2" for="pseudo">Pseudo :</label>
            	<div class="col-lg-6">
            		<input type="text" id="pseudo" class="form-control" placeholder="Pseudo" name="pseudo">
            	</div>
            </div>
            <div class="form-group">
            	<label class="control-label col-lg-2" for="mdp">Mot de passe :</label>
            	<div class="col-lg-6">
            		<input type="password" id="mdp" class="form-control" placeholder="Mot de passe" name="mdp">
            	</div>
            </div>
            <div class="col-lg-10 col-lg-push-2 nopadding">
            	<button type="submit" class="btn btn-primary monbouton">Connexion</button>
            </div>
        </form>
        <a href="inscription.php">
        <div class="col-lg-10 col-lg-push-2 nopadding">
            <span class="question">Vous n'avez pas de compte ?</span>
            <br>
            <button type="submit" class="btn btn-info monbouton">Inscription</button>

        </div>
      </a>
    </div>
    <!-- /.container -->
<?php
    include('footer.php');
?>
