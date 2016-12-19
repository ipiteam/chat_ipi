<?php
    include('header.php');
	include('nav.php');
?>
    <!-- Page Content -->
    <div class="container">
        <div class="ipi_col-gauche col-lg-2 col-lg-offset-2 col-md-2 col-md-offset-2">
    <!-- Avatar & Pseudo -->
            <span class="pwek_pseudo">[PSEUDO]</span>
            <br>
            <img src="img/lolwut.jpg" alt="votre avatar" class="avatar img-responsive hidden-sm hidden-xs">
            <br>
        </div>
<!-- Texte Intro -->
        <div class="ipi_col-droite col-lg-6 col-md-6">
        <br>
                    <!-- Le formulaire principal : pseudo, pass, mail, nom, prenom, description, couleur -->
            <form class="form-horizontal" action="" method="post">
            	<!-- pseudo -->
                <div class="form-group">
                	<label class="control-label col-lg-3 col-md-3" for="pseudo">Pseudo :</label>
                	<div class="col-lg-8 col-md-8">
                		<input type="text" id="pseudo" class="form-control" placeholder="Pseudo">
                	</div> 
                </div>
                <!-- password -->
                <div class="form-group">
                	<label class="control-label col-lg-3 col-md-3" for="mdp">Mot de passe :</label>
                	<div class="col-lg-8 col-md-8">
                		<input type="password" id="mdp" class="form-control" placeholder="Mot de passe">
                	</div>
                </div>
                <!-- mail -->
                <div class="form-group">
                    <label class="control-label col-lg-3 col-md-3" for="mail">Adresse mail :</label>
                    <div class="col-lg-8 col-md-8">
                        <input type="mail" id="mail" class="form-control" placeholder="@">
                    </div>
                </div>
                <!-- nom -->
                <div class="form-group">
                    <label class="control-label col-lg-3 col-md-3" for="nom">Nom :</label>
                    <div class="col-lg-8 col-md-8">
                        <input type="text" id="nom" class="form-control" placeholder="...">
                    </div>
                </div>
                <!-- prenom -->
                <div class="form-group">
                    <label class="control-label col-lg-3 col-md-3" for="prenom">Prénom :</label>
                    <div class="col-lg-8 col-md-8">
                        <input type="text" id="prenom" class="form-control" placeholder="...">
                    </div>
                </div>
                <!-- bio -->
                <div class="form-group">
                    <label class="control-label col-lg-3 col-md-3" for="description">À propos de moi :</label>
                    <div class="col-lg-8 col-md-8">
                        <textarea id="description" class="form-control" placeholder="Votre description" rows="5"></textarea>
                    </div>
                </div>
                <!-- couleur de fond des messages /!\ experimental -->
                <!-- Bouton de confirmation -->
                <div class="col-lg-9 col-lg-offset-3">
                	<button type="submit" class="btn btn-primary monbouton">Confirmer !</button>
                </div>
            </form>
    <!-- changer d'avatar -->
            <div class="row col-lg-9 col-lg-offset-3">
                <button type="submit" class="btn btn-default monbouton">Changer d'avatar</button>
            </div>
    <!-- supprimer le compte-->
            <div class="row col-lg-9 col-lg-offset-3">
                <button type="submit" class="btn btn-default monbouton">Supprimer le compte</button>
            </div>
        </div>
        <!-- fin colonne gauche -->
    </div>
    <!-- /.container -->

<?php
    include('footer.php');
?>
