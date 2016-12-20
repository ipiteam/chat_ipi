<?php
    session_start();
    include('header.php');
?>

<div class="container">

    <div class="pwek_main col-md-6 col-md-offset-3 col-sm-10 col-sm-offset-1" style="height:200px">
    <br>

        <div class="row">

<!-- Smileyface -->
            <div class="col-sm-2 pwek_welcome">
            <img src="img/default_avatar.svg" style="height:120px; margin-left:-30px;">
            </div>
            <br>

<!-- Champs -->
            <form class="form-horizontal" action="control_connexion.php" method="post">
                <div class="input-group col-sm-6 col-sm-offset-1">
                    <span class="input-group-addon">
                        <i class="glyphicon glyphicon-user"></i>
                    </span>
                    <input id="pseudo" type="text" class="form-control" name="pseudo" placeholder="Pseudo">
                </div>

                <div class="input-group col-sm-6 col-sm-offset-1">
                    <span class="input-group-addon">
                        <i class="glyphicon glyphicon-lock"></i>
                    </span>
                    <input id="mdp" type="password" class="form-control" name="mdp" placeholder="Mot de Passe">
                </div>

<!-- Bouton de confirmation -->
                <div class="col-sm-6 col-sm-offset-1 col-xs-4 col-xs-offset-4">
                    <button type="submit" class="btn btn-primary pwek_btn">
                        <span class="glyphicon glyphicon-ok" style="font-size:1.5em;"></span>
                    </button>
                </div>
            </form>

        </div> <!-- /.row -->
    </div> <!-- /.pwek_main -->

<!-- Zone d'inscription -->
    <div class="pwek_question col-md-6 col-md-offset-3 col-sm-10 col-sm-offset-1 col-xs-12">
        <br><br>
        Pas de compte ?
        <br>
        <a href="inscription.php">
        <div class="col-sm-4 col-sm-offset-4 col-xs-4 col-xs-offset-4">
            <button type="submit" class="btn btn-default pwek_btn">
                S'inscrire
            </button>
        </div>
        </a>
    </div> <!-- /.pwek_question -->

</div> <!-- /.container -->

<?php include('footer.php');
?>
