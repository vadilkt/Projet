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
                <a href=""><button type="button" class="btn btn-outline-light btn-lg">
                        NOS APPARTEMENTS
                    </button></a>
                <a href=""><button type="button" class="btn btn-primary btn-lg">Trouver un Appartement</button></a>
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



<section class="search-sec bg-secondary">
    <div class="container-fluid">
        <form action="#" method="post" novalidate="novalidate">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                            <input type="text" name="localisation" class="form-control search-slt" placeholder="Entrer une localisation (ex: Foto)">
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 p-0">
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
                        <div class="col-lg-3 col-md-3 col-sm-12 p-0">
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
                        <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                            <button type="button" class="btn btn-primary wrn-btn" style="margin-left: auto">Trouver</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>



<div class="container-fluid">
    <div class="row jumbotron">
        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 col-xl-10">
            <p class="lead">
                <h3 class="text-uppercase text-dark font-weight-bolder">Immobil</h3> vous propose des appartements de différents standards
            </p>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-2">
            <a href=""><button type="button" class="btn btn-outline-secondary btn-lg">Visiter</button></a>
        </div>
    </div>
</div>


<div class="container-fluid padding">
    <div class="row welcome text-center">
        <div class="col-12">
            <h1 class="display-3">Vos appartements.</h1>
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


<div class="container">
    <div class="row">

        <?php
        $con = mysqli_connect('localhost', 'root', '', 'appartements');
        if ($con) {
            $query = "SELECT * FROM appartement ORDER BY ID DESC";
            $result = mysqli_query($con, $query);

            while ($row = mysqli_fetch_array($result)) {

                $description = $row['nb_piece'] . " Pièces," . $row['chambre'] . " Chambre(s), " . $row['salles_bain'] . " Salle(s) de bain.";

            }
        }
        ?>
    </div>
</div>