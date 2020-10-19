<?php 
session_start();
include 'config.php';


$username = "";
$name = "";
$role = "";
$country = "";
$email = "";
$bio = "";
$errors = array(); 
// Start Registation
if (isset($_POST['user_register'])) {
  if (is_uploaded_file($_FILES['myfile']['tmp_name'])) {
    if (is_uploaded_file($_FILES['myfile']['tmp_name'])) {
      $image = $_FILES['myfile']['tmp_name']; 
      $image = addslashes(file_get_contents(addslashes($image)));

      $bio = mysqli_real_escape_string($db, $_POST['bio']);
      $role = mysqli_real_escape_string($db, $_POST['acctype']);
      $name = mysqli_real_escape_string($db, $_POST['name']);
      $country = mysqli_real_escape_string($db, $_POST['country']);
      $username = mysqli_real_escape_string($db, $_POST['uname']);
      $email = mysqli_real_escape_string($db, $_POST['email']);
      $password_1 = mysqli_real_escape_string($db, $_POST['password']);
      $password_2 = mysqli_real_escape_string($db, $_POST['cpassword']);
    
      // form validation: ensure that the form is correctly filled ...
      // by adding (array_push()) corresponding error unto $errors array
      if (empty($username)) { array_push($errors, "Username is required"); }
      if (empty($email)) { array_push($errors, "Email is required"); }
      if (empty($password_1)) { array_push($errors, "Password is required"); }
      if ($password_1 != $password_2) {
        array_push($errors, "The two passwords do not match");
      }
    
      
      $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
      $result = mysqli_query($db, $user_check_query);
      $user = mysqli_fetch_assoc($result);
      
      if ($user) { // if user exists
        if ($user['username'] === $username) {
          array_push($errors, "Username already exists");
        }
    
        if ($user['email'] === $email) {
          array_push($errors, "email already exists");
        }
      }
    
      // Finally, register user if there are no errors in the form
      if (count($errors) == 0) {
          $password = md5($password_1);//encrypt the password before saving in the database
    
          $query = "INSERT INTO users (bio, role, country, name, username, email, password, profilepicture) 
                    VALUES('$bio', '$role', '$country', '$name', '$username', '$email', '$password', '$image')";
          mysqli_query($db, $query);
          
          $_SESSION['username'] = $username;
        
          header('location: Edash.php');
      }
    }
 }
}
// End Registation
// Start Login
if (isset($_POST['user_login'])) {
    $username = mysqli_real_escape_string($db, $_POST['uname']);
    $password = mysqli_real_escape_string($db, $_POST['pwd']);
  
    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
  
    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
          $_SESSION['username'] = $username;
          header('location: Edash.php');
        }else {
            array_push($errors, "Wrong username/password combination");
        }
    }
  }
// End Login

?>