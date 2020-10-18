<?php 
include 'config.php';
$title = "";
$descrption = "";
$skill = "";
$payment = "";
$uname = $_SESSION['username'];
$sql = "SELECT * FROM users WHERE username='$uname'";
$result = $db->query($sql);
$row = $result->fetch_assoc();
$uid = $row["id"];
// START ADD Vacancies
if (isset($_POST['AddVacancy'])) {
    
    
    $title = mysqli_real_escape_string($db, $_POST['title']);
    $descrption = mysqli_real_escape_string($db, $_POST['des']);
    $skill = mysqli_real_escape_string($db, $_POST['skills']);
    $payment = mysqli_real_escape_string($db, $_POST['pyment']);

        $query = "INSERT INTO vacancie (uid, title, description, payment, skills) 
                  VALUES('$uid', '$title', '$descrption', '$payment', '$skill')";
        mysqli_query($db, $query);
        header('location: Edash.php');
  }
// END ADD Vacancies

?>