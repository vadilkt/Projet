<?php 
session_start();
if(!isset($_SESSION['username'])){
    header ('location: index.php');
}
$con=mysqli_connect('localhost', 'root', '', 'appartements');

?>

<head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Immobil</title>
        <script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
        <script type="text/javascript" src="js/popper.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/script.js"></script>
        <script src="https://kit.fontawesome.com/c8b7417c93.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
<?php include ("menu.php") ?>

<?php include ("accueil.php") ?>