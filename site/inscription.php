<?php 
    include('header.php');
?>

<div class="container">

    <div class="pwek_main col-md-6 col-md-offset-3 col-sm-10 col-sm-offset-1">
    <br>
        <div class="pwek_welcome">
        BIENVENUE !
        </div>
        <br>
        <div class="pwek_welcome_sub">
        Entrez un pseudo, une adresse et un mot de passe, et commençez à chatter.
        </div>
        <br>
        <form class="form-horizontal" action="control_inscription.php" method="post">
        	<!-- pseudo -->
            <div class="form-group">
            	<label class="control-label col-sm-3" for="pseudo">Pseudo :</label>
            	<div class="col-sm-8  pwek_form_nopad">
            		<input type="text" id="pseudo" class="form-control" placeholder="Pseudo" name="pseudo">
            	</div> 
            </div>
            <!-- password -->
            <div class="form-group">
            	<label class="control-label col-sm-3" for="mdp">Mot de passe :</label>
            	<div class="col-sm-8 pwek_form_nopad">
            		<input type="password" id="mdp" class="form-control" placeholder="Mot de passe" name="mdp">
            	</div>
            </div>
            <!-- mail -->
            <div class="form-group">
                <label class="control-label col-sm-3" for="mail">Adresse mail :</label>
                <div class="col-sm-8 pwek_form_nopad">
                    <input type="mail" id="mail" class="form-control" placeholder="@" name="mail">
                </div>
            </div>
            <!-- nom -->
            <div class="form-group">
                <label class="control-label col-sm-3" for="nom">Nom :</label>
                <div class="col-sm-8 pwek_form_nopad">
                    <input type="text" id="nom" class="form-control" placeholder="..." name="nom">
                </div>
            </div>
            <!-- prenom -->
            <div class="form-group">
                <label class="control-label col-sm-3" for="prenom">Prénom :</label>
                <div class="col-sm-8 pwek_form_nopad">
                    <input type="text" id="prenom" class="form-control" placeholder="..." name="prenom">
                </div>
            </div>
            <!-- bio -->
            <div class="form-group pwek_last">
                <label class="control-label col-sm-3" for="description">À propos de moi :</label>
                <div class="col-sm-8 pwek_form_nopad">
                    <textarea id="description" class="form-control" placeholder="Votre description" rows="5" name="description"></textarea>
                </div>
            </div>
            <!-- Bouton de confirmation -->
            <div class="row">
                <div class="col-sm-3 col-sm-offset-8 col-xs-4 col-xs-offset-4">
                	<button type="submit" class="btn btn-primary pwek_btn" style="margin-left:15px;">Valider</button>
                </div>
            </div>
            <br>
        </form>

    </div> <!-- /.pwek_main -->
</div> <!-- /.container -->

<script>

document.getElementById('pseudo').addEventListener('input', function(e) {
    var pattern = e.target.value;
    if ( pattern.length >= 3  ) {
        this.style.borderColor = "green";
    } else {
        this.style.borderColor = "red";
    }
});
document.getElementById('mdp').addEventListener('input', function(e){
    var pattern = e.target.value;
    if ( pattern.length >= 6  ) {
        this.style.borderColor = "green";
    } else {
        this.style.borderColor = "red";
    }
});
document.getElementById('mail').addEventListener('input', function(e){
    var pattern = e.target.value;
    var regex = /.+@.+\..+/;
    if ( regex.test(pattern)) {
        this.style.borderColor = "green";
    } else {
        this.style.borderColor = "red";
    }
});
</script>

<?php
    include('footer.php');
?>
