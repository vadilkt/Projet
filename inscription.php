<?php
session_start();

// initializing variables
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'appartements');

// REGISTER USER
if (isset($_POST['inscrire'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['mail']);
  $password_1 = mysqli_real_escape_string($db, $_POST['pw']);
  $password_2=mysqli_real_escape_string($db, $_POST['pw1']);
  $tel= mysqli_real_escape_string($db, $_POST['tel']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Nom d'utilisateur requis"); }
  if (empty($email)) { array_push($errors, "E-mail requis"); }
  if (empty($password_1)) { array_push($errors, "Mot de passe requis"); }
  if ($password_1 != $password_2) {
	array_push($errors, "Les mots de passe ne correspondent pas");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM user WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Cet utilisateur existe déjà");
    }

    if ($user['email'] === $email) {
      array_push($errors, "Cet Email utilisateur existe déjà");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO user (username, password, email, num_tel) 
  			  VALUES('$username', '$password', '$email', '$tel')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "Vous êtes connectés!";
    header('location: menu1.php');
    exit;
  }
}
?>