<?php session_start(); ?>

<!DOCTYPE html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Immobil</title>
    <meta charset="utf-8">
    <script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="js/jquery.slim.min.js"></script>
    <script type="text/javascript" src="js/popper.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
    <script src="https://kit.fontawesome.com/c8b7417c93.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>


<?php
include("menu.php");

$con = mysqli_connect('localhost', 'root', '', 'appartements');

if (isset($_POST['trouver'])) {
    $localisation = mysqli_real_escape_string($con, $_POST['localisation']);
    $chambre = $_POST['chambre'];
    $salle = $_POST['salleBain'];
    $prix = $_POST['price'];

    $sql = "SELECT * FROM appartement WHERE localisation LIKE '%$localisation%'  OR chambre LIKE '%$chambre%' OR salles_bain LIKE '%$salle%' OR prix <$prix";

    $ans = mysqli_query($con, $sql);
    
if(empty($row)){
?>
<section class="container-fluid bg">
        <section class="row justify-content-center">



        <div class="jumbotron text-center">
  <h1 class="display-3">Aucun Résultat!</h1>
  <p class="lead"><strong>L'appartement que vous cherchez</strong> n'est pas encore disponible!</p>
  <hr>
  <p>
    
  </p>
  <p class="lead">
    <a class="btn btn-primary btn-sm" href="index.php" role="button">Revenir à l'accueil</a>
  </p>
</div>
        </section>
    </section>


<?php
} else{



?>

    <body>
        <div class="row">
            <?php
            while ($row = mysqli_fetch_array($ans)) {
                echo '<div class="col-md-4 product-grid">';

                echo '<div class="card-img-top image">';
                include("image.php");
                echo '</div>';

                echo '<h3 class="text-center">' . $row['localisation'] . '-' . $row['nb_piece'] . ' Pièces';
                echo '</h3>';
                echo '<h5 class="text-justify">' . $row['chambre'] . ' Chambres, ' . $row['salles_bain'] . ' salle(s) de bain';
                echo '</h5>';
                echo '<h5 class="text-justify">' . $row['prix'] . ' FCFA';
                echo '</h5>';


                if (isset($_SESSION['username'])) {
                    echo '<button type="button" data-toggle="modal" data-target="#popup" class="btn btn-outline-primary"';
                    echo '>Contacter le vendeur</button>';
                    echo '<div id="popup" class="modal" role="dialog">';
                    echo '<div class="modal-content">';
                    echo '<div class="modal-header">';
                    echo '<button class="close" type="button" data-dismiss="modal">&times;</button>';
                    echo '<h4 class="modal-title">Contacter le vendeur</h4>';
                    echo '</div>';
                    echo '<div class="modal-body">';
                    echo '<p>Tel: ' . $row['contact'] . '</p>';
                    echo '</div>';
                    echo '<div class="modal-footer">';
                    echo '<button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>';
                    echo '</div>';


                    echo '</div>';
                    echo '</div>';
                } else {
                    echo '<a class="btn btn-outline-primary" href="#top">Connexion/inscription</a>';
                }



                echo '</div>';
            }

            ?>

        </div>
    </body>
<?php
}
}
exit;
?>