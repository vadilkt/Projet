<?php session_start();
ini_set('display_error',1); ?>


<div id="slides" class="carousel slide carousel-fade" data-ride="carousel">
    <ul class="carousel-indicators">
        <li data-target="#slides" data-slide-to="0" class="active"></li>
        <li data-target="#slides" data-slide-to="1"></li>
        <li data-target="#slides" data-slide-to="2"></li>
    </ul>

    <div class="carousel-inner">
        <div class="carousel-item active" style="height: 600px">
            <img src="images/0.jpg">

            <div id="cap" class="carousel-caption">
                <h1 class="display-1 font-weight-bold">Trouvez-vous un appartement</h1>
                <h3 class="text-uppercase font-weight-bolder">à Dschang</h3>
                <a href="#visiter"><button type="button" class="btn btn-outline-light btn-lg">
                        NOS APPARTEMENTS
                    </button></a>
                <a href="#search"><button type="button" class="btn btn-primary btn-lg">Trouver un Appartement</button></a>
            </div>
        </div>
        <div class="carousel-item" style="height: 600px">
            <img src="images/1.jpg">
            <div class="carousel-caption">
                <h1 class="display-1 text-center font-weight-bold">Selon Vos</h1>
                <h3 class="text-uppercase text-light text-center font-weight-bolder">préférences</h3>
            </div>
        </div>
        <div class="carousel-item" style="height: 600px">
            <img src="images/3.jpg" height="600px" width="100%">
            <div class="carousel-caption">
                <h1 class="display-1 text-light text-center font-weight-bolder">Dans votre </h1>
                <h2 class="text-uppercase text-center font-weight-bold text-light">budget</h2>
            </div>
        </div>

    </div>
</div>



<section class="search-sec" id="search">
    <div class="container-fluid">
        <form action="#" method="post" novalidate="novalidate">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="form-group py-3 px-2 col-lg-2 col-md-2 col-sm-12 p-0">
                            <input type="text" name="localisation" class="form-control search-slt" placeholder="Entrer une localisation (ex: Foto)">
                        </div>
                        <div class="form-group py-3 col-lg-2 col-md-2 col-sm-12 p-0">
                            <select name="chambre" class="form-control search-slt" id="exampleFormControlSelect1">
                                <option>Chambres</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                <option>6</option>
                                <option>7</option>
                                <option>8</option>
                            </select>
                        </div>
                        <div class="form-group py-3 px-2 col-lg-2 col-md-2 col-sm-12 p-0">
                            <select name="salleDeBain" class="form-control search-slt" id="exampleFormControlSelect1">
                                <option>Salles de bain</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                <option>6</option>
                                <option>7</option>
                                <option>8</option>
                            </select>
                        </div>
                        <div class="range-field py-3 search-slt form-group px-2 col-lg-2 col-md-2 col-sm-12 p-0 w-50">
                            <label for="price">Prix</label>
                            <input type="range" max="500000" min="5000" step="2500" id="price" name="price">
                            <span class="col-lg-2 col-md-2 col-sm-12 font-weight-bold text-primary ml-2 mt-1 valueSpan"></span><strong class="text-primary">FCFA</strong>
                        </div>
                        <div class="ml-auto  py-3 px-2 form-group col-lg-2 col-md-2 col-sm-12 p-0">
                            <button type="button" name ="trouver" class="btn btn-primary wrn-btn" style="margin-left: auto">Trouver</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<script>
    $(document).ready(function() {

        const $valueSpan = $('.valueSpan');
        const $value = $('#price');
        $valueSpan.html($value.val());
        $value.on('input change', () => {

            $valueSpan.html($value.val());
        });
    });
</script>



<div class="container-fluid">
    <div class="row jumbotron">
        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 col-xl-10">
            <p class="lead">
                <h3 class="text-uppercase text-dark font-weight-bolder">Immobil</h3> vous propose des appartements de différents standards
            </p>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-2">
            <a href="#visiter"><button type="button" class="btn btn-outline-secondary btn-lg">Visiter</button></a>
        </div>
    </div>
</div>


<div class="container-fluid padding">
    <div class="row welcome text-center">
        <div class="col-12">
            <h1 class="display-4 text-uppercase">Vos appartements.</h1>
        </div>
        <div class="col-12">
            <hr>
            <div class="col-12">
                <p class="lead">Bienvenu sur <h3 class="font-weight-bolder">Immobil!</h3>
                    Que vous soyez de passage ou à la recherche d'un lieu de résidence permanent à
                    Dschang, vous êtes servis.
                </p>
            </div>
        </div>
    </div>
</div>


<hr>



<div class="row" id="visiter">
    <?php 
        $con=mysqli_connect('localhost','root','','appartements');
        $query="SELECT * FROM appartement ORDER BY ID DESC";
        $ans=mysqli_query($con,$query);
        while($row=mysqli_fetch_array($ans)){
            echo '<div class="col-md-4 product-grid">';

                echo'<div class="card-img-top image">';
                    include ("image.php");
                echo '</div>';

                echo '<h3 class="text-center">'.$row['localisation'].'-'.$row['nb_piece'].' Pièces';
                echo '</h3>';
                echo '<h5 class="text-justify">'.$row['chambre'].' Chambres, '. $row['salles_bain'].' salle(s) de bain';
                echo '</h5>';
 
                
                if(isset($_SESSION['username'])){
                    echo '<button type="button" data-toggle="modal" data-target="#popup" class="btn btn-outline-primary"';
                    echo '>Contacter le vendeur</button>';
                    echo '<div id="popup" class="modal" role="dialog">';
                        echo '<div class="modal-content">';
                            echo '<div class="modal-header">';
                                echo '<button class="close" type="button" data-dismiss="modal">&times;</button>';
                                echo '<h4 class="modal-title">Contacter le vendeur</h4>';
                            echo '</div>';
                            echo '<div class="modal-body">';
                                echo '<p>Tel: '. $row['contact'].'</p>';
                            echo '</div>';
                            echo '<div class="modal-footer">';
                                echo '<button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>';
                            echo '</div>';
                               

                        echo '</div>';
                    echo '</div>';
                }
                else{
                    echo '<a class="btn btn-outline-primary" href="#top">Connexion/inscription</a>';
                }



            echo '</div>';

        }
    ?>
</div>