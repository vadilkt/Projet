<?php 
session_start();
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">IMmobil</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav nav navbar-left">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">Visiter</a>
                </li>
               
                <li class="nav-item">
                    <a class="nav-link" href="">A propos</a>
                </li>
            </ul>
            <?php
                if(!isset($_SESSION['username'])){
                    echo '<ul class="nav col-lg-4 navbar-nav flex-row justify-content-around ml-auto navbar-login">
                    <li class="nav-item dropdown">
                        <button type="button" id="dropdownMenu1" data-toggle="dropdown" class="btn btn-outline-primary dropdown-toggle">Connexion</button>
                        <ul class="dropdown-menu dropdown-menu-right mt-2">
                            <li class="px-4 py-2">
                                <form class="form" role="form" action="connexion.php" method="post" >
                                    <div class="form-group">
                                        <input type="text" name="username" title="Nom d\'utilisateur ou Email"class="form-control form-control-sm" placeholder="E-mail ou nom d\'utilisateur" required="required">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" title="Mot de passe" name="pw" class="form-control form-control-sm" placeholder="mot de passe" required="required">
                                    </div>
                                    <input type="submit" name="connexion" class="btn btn-primary btn-block" value="Connexion">
                                    <div class="form-footer">
                                        <small><a href="#">Mot de passe oublié?</a></small>
                                    </div>
                                </form>
                            </li>
    
                        </ul>    
                    </li>
                    <li class="nav-item dropdown" style="margin-left: 10px">
                        <button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle">Inscription</button>
                        <ul class="dropdown-menu dropdown-menu-right mt-2">
                            <li class="px-4 py-2">
                                <form class="form" role="form" action="inscription.php" method="post">
                                    <p class="hint-text">Créer un compte</p>
                                    <div class="form-group">
                                        <input type="text" name="username" title="Nom d\'utilisateur" class="form-control form-control-sm" placeholder="Nom d\'utilisateur" required="required">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="pw" title="Mot de passe" class="form-control form-control-sm" placeholder="Mot de passe" required="required">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="pw1" class="form-control form-control-sm" placeholder="Confirmation de mot de passe" title ="Confirmation de mot de passe"required="required">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="mail" title="E-mail" class="form-control form-control-sm" placeholder="E-mail" required="required">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="tel" title="Numéro de téléphone" class="form-control form-control-sm" placeholder="Téléphone" required="required">
                                    </div>
                                    <div class="form-group">
                                        <small><label class="checkbox-inline"><input type="checkbox" required="required"> J\'accepte les<a href="#">Termes &amp; Conditions</a></label></small>
                                    </div>
                                    <input type="submit" name="inscrire" class="btn btn-primary btn-block" value="Inscription">
                                    
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>';
                } else if(isset($_SESSION['username']))
                {
                    echo '<ul class="nav navbar-login navbar-nav flex-row justify-content-around ml-auto">
                       <li class="nav-item">
                       <i class="fas fa-user"></i>
                           <p class="text-bolder pr-2">' ;
                           echo $_SESSION['username'].'</p>';
                        echo '  
                        </li>
                        <li class="nav-item ml-10">
                            <a class="btn btn-outline-primary" href="ajouter.php" >Ajouter un appartement</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-primary ml-3" href="deconnexion.php">Déconnexion</a>
                        </li>';
                }
            ?>
        </div>
    </div>
</nav>