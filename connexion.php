<?php
session_start();

$errors= array();

$db= mysqli_connect ('localhost', 'root', '', 'appartements');

if(isset($_POST['connexion'])){
    $username=mysqli_real_escape_string($db, $_POST['username']);
    $password=mysqli_real_escape_string($db, $_POST['pw']);

    $query="SELECT * FROM user WHERE username='$username' OR email='$username' ";
    $result= mysqli_query($db, $query);
    $user=mysqli_fetch_assoc($result);

    if($user){
        if($user['username']===$username && $user['password']===md5($password)){
            $_SESSION['username']=$username;
            header ('location: menu1.php');
            exit;
        }
        if($user['email']===$username && $user['password']===md5($password)){
            $_SESSION['username']=$username;
            header ('location: menu1.php');
            exit;
        }else{
            $_SESSION['error']=1;
            header ("location: index.php");
            exit();
        }
    }
}
?>