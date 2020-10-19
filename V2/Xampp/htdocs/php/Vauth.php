<?php 
include 'config.php';
$id = "";
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

// Start Edit Vacancy
if (isset($_POST['UpdateVacancy'])) {
    
    $id = mysqli_real_escape_string($db, $_POST['id']);
    $title = mysqli_real_escape_string($db, $_POST['title']);
    $descrption = mysqli_real_escape_string($db, $_POST['des']);
    $skill = mysqli_real_escape_string($db, $_POST['skills']);
    $payment = mysqli_real_escape_string($db, $_POST['pyment']);

        $query = "UPDATE vacancie SET title='$title', description='$descrption', payment='$payment', skills='$skill' WHERE id=$id";
        mysqli_query($db, $query);
        header('location: UpdateVacancy.php');
  }
// End Edit Vacancy

// START Apply CV
if (isset($_POST['ApplyCv'])) {
    
    
    $title = mysqli_real_escape_string($db, $_POST['cvtitle']);
    $descrption = mysqli_real_escape_string($db, $_POST['cvdes']);
    $vid = mysqli_real_escape_string($db, $_POST['vid']);
    

        $query = "INSERT INTO cv (uid, title, description, vid) 
                  VALUES('$uid', '$title', '$descrption', '$vid')";
        mysqli_query($db, $query);
        header('location: JSdash.php');
  }
// END Apply CV

?>