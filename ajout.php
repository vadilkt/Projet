<?php
session_start();

$con = mysqli_connect('localhost', 'root', '', 'appartements');

if (isset($_POST['ajouter'])) {

    $localisation = mysqli_real_escape_string($con, $_POST['localisation']);
    $piece = $_POST['piece'];
    $prix = mysqli_real_escape_string($con, $_POST['prix']);
    $bain = $_POST['bain'];
    $chambre = $_POST['chambre'];
    $contact= mysqli_real_escape_string($con, $_POST['contact']);


    $query = "INSERT INTO `appartement`(`localisation`, `nb_piece`, `prix`, `chambre`, `salles_bain`,`contact`) VALUES ('$localisation','$piece', '$prix', '$bain', '$chambre','$contact')";
    $res = mysqli_query($con, $query);




    

    $count=count($_FILES['image']['tmp_name']);
    for($it=0; $it<$count;$it++){
        $imagePath =$_FILES['image']['name'][$it] ;
        
        $directory = "uploaded_img/".basename($_FILES['image']['name'][$it]);
        $result = move_uploaded_file($_FILES['image']['tmp_name'][$it], $directory);

        $sql = "INSERT INTO `images`(`img`) VALUES ('$imagePath')";
        $req=mysqli_query($con,$sql);
    }
    
    

    if ($res) {
        $_SESSION['success'] = true;
        header('location: sucess.php');
        exit;
    }
}
