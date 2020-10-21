<?php 
session_start();
include 'config.php';


$username = "";
$name = "";
$role = "";
$country = "";
$email = "";
$bio = "";
$err = array(); 
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
      
      if ($password_1 != $password_2) {
        echo '<script type="text/javascript">';
        echo 'alert("The two passwords do not match");';
        echo '</script>';
        array_push($err, "The two passwords do not match");
      }
      
      $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
      $result = mysqli_query($db, $user_check_query);
      $user = mysqli_fetch_assoc($result);
      
      if ($user) { // Checking User Available in Database To prevent duplicate username
        if ($user['username'] === $username) {
          echo '<script type="text/javascript">';
          echo 'alert("Username already exists");';
          echo '</script>';
          array_push($err, "Username already exists");
        }
    
        if ($user['email'] === $email) {
          echo '<script type="text/javascript">';
          echo 'alert("email already exists");';
          echo '</script>';
          array_push($err, "email already exists");
        }
      }
    
      // Finally, register user if there are no err in the form
      if (count($err) == 0) {
          $password = md5($password_1);//encrypt the password before saving in the database
    
          $query = "INSERT INTO users (bio, role, country, name, username, email, password, profilepicture) 
                    VALUES('$bio', '$role', '$country', '$name', '$username', '$email', '$password', '$image')";
          mysqli_query($db, $query);
          
          $_SESSION['username'] = $username;
        
          header('location: Edash.php');
      }
    }
 }else // If user not upload image, registation will go through this scenario :)
 {
    $bio = mysqli_real_escape_string($db, $_POST['bio']);
    $role = mysqli_real_escape_string($db, $_POST['acctype']);
    $name = mysqli_real_escape_string($db, $_POST['name']);
    $country = mysqli_real_escape_string($db, $_POST['country']);
    $username = mysqli_real_escape_string($db, $_POST['uname']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password']);
    $password_2 = mysqli_real_escape_string($db, $_POST['cpassword']);

    if ($password_1 != $password_2) {
      echo '<script type="text/javascript">';
      echo 'alert("The two passwords do not match");';
      echo '</script>';
      array_push($err, "The two passwords do not match");
    }

    
    $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);
    
    if ($user) { // Checking User Available in Database To prevent duplicate username
      if ($user['username'] === $username) {
        echo '<script type="text/javascript">';
        echo 'alert("Username already exists");';
        echo '</script>';
        array_push($err, "Username already exists");
      }

      if ($user['email'] === $email) {
        echo '<script type="text/javascript">';
        echo 'alert("email already exists");';
        echo '</script>';
        array_push($err, "email already exists");
      }
    }

    // Checking Everything ok, The good to register :)
    if (count($err) == 0) {
        $password = md5($password_1);//encrypt the password using md5 to secure data

        $query = "INSERT INTO users (bio, role, country, name, username, email, password) 
                  VALUES('$bio', '$role', '$country', '$name', '$username', '$email', '$password')";
        mysqli_query($db, $query);
        
        $_SESSION['username'] = $username;
      
        header('location: Edash.php');
    }
 }
}
// End Registation

// Start Login
if (isset($_POST['user_login'])) {
    $username = mysqli_real_escape_string($db, $_POST['uname']);
    $password = mysqli_real_escape_string($db, $_POST['pwd']);
  
    if (empty($username)) {
        array_push($err, "Username is required");
    }
    if (empty($password)) {
        array_push($err, "Password is required");
    }
  
    if (count($err) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
          $_SESSION['username'] = $username;
          header('location: Edash.php');
        }else {
            echo '<script type="text/javascript">';
            echo 'alert("Wrong username/password combination");';
            echo '</script>';
            array_push($err, "Wrong username/password combination");
        }
    }
  }
// End Login

?>