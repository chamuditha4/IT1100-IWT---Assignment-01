<?php 
include 'config.php';
$title = "";
$descrption = "";
$skill = "";
$payment = "";
$uid = "" ;
if (isset($_POST['AddVacancy'])) {
    $uname = $_SESSION['username'];
    $sql = "SELECT * FROM users WHERE username='$uname'";
    $result = $db->query($sql);
    $row = $result->fetch_assoc();
    
    $title = mysqli_real_escape_string($db, $_POST['title']);
    $descrption = mysqli_real_escape_string($db, $_POST['des']);
    $skill = mysqli_real_escape_string($db, $_POST['skills']);
    $payment = mysqli_real_escape_string($db, $_POST['pyment']);
    $uid = $row["id"];
    // Finally, register user if there are no errors in the form

  
        $query = "INSERT INTO vacancies (uid, title, description, payment, skills) 
                  VALUES('$uid', '$title', '$descrption', '$payment', '$skill')";
        mysqli_query($db, $query);
        header('location: Edash.php');
  }


?>