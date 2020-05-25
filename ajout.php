<?php 
    session_start();

    $con=mysqli_connect('localhost', 'root', '', 'appartements');

    if(isset($_POST['ajouter'])){
        $localisation=mysqli_real_escape_string($con,$_POST['localisation']);
        $piece=$_POST['piece'];
        $prix=mysqli_real_escape_string($con, $_POST['prix']);
        $bain=$_POST['bain'];
        $chambre=$_POST['chambre'];

        
        $query="INSERT INTO `appartement`(`localisation`, `nb_piece`, `prix`, `chambre`, `salles_bain`) VALUES ('$localisation','$piece', '$prix', '$bain', '$chambre')";
        $res= mysqli_query($con, $query);

        $app_query="SELECT * FROM appartement";
        $app_0=mysqli_query($con, $app_query);
        $app=mysqli_fetch_assoc($app_0);
        $id= $app['ID'];
        
        foreach ($_FILES['image']['tmp_name'] as $key => $image) {
            $imageName=$_FILES['image']['name'][$key];
            $imageTmpName=addslashes(file_get_contents($_FILES["image"]["tmp_name"][$key]));

            $directory= 'uploaded_img/';

            $result=move_uploaded_file($imageTmpName, $directory.$imageName);
            $sql="INSERT INTO images(img, id_app) VALUES ('$imageTmpName', '$id')";
            $req=mysqli_query($con, $sql);

        }
        
        if($res){
            $_SESSION['success']=true;
            header ('location: sucess.php');
            exit;
        }
       
    }
