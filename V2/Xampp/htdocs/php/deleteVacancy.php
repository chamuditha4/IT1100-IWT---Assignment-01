<?php  
  session_start(); 
  include 'config.php';
  include 'Vauth.php';
// USER
  $role="";
  $uname = $_SESSION['username'];
  $sql = "SELECT * FROM users WHERE username='$uname'";
  $result = $db->query($sql);
  $row = $result->fetch_assoc();
  $role = $row["role"];
  $uid = $row["id"];
  $db->close();
//
// Vacancies 

//
  if ($role == 'JobSeeker'){
    header('location: JSdash.php');
  }
  else{
    //header('location: Edash.php');
  }
  //echo $row["id"] ;
    
  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: Login.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title> Delete Vacancies </title>
    <style>
        
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
        }

        
        input[type=number] {
        -moz-appearance: textfield;
        }
    </style>
</head>
<body>
<?php include 'header_logged.php';?>

<div class="content">
    
    <?php  if (isset($_SESSION['username'])) : ?>
    	<hr>
        <div class="navvv">
            <h1> <a href="home.php"> Home </a> > <a href="Edash.php"> Dashboard </a>> Delete Vacancies </h1>
        </div>
        
        <div class="prof" style="margin-left:25%; padding-bottom:10px; padding-top:10px;">
        
        </div>
        
        
</div>
        <?php
        
        ?>
    <?php endif ?>
</div>

<?php include 'footer.php';?>

</body>
</html>