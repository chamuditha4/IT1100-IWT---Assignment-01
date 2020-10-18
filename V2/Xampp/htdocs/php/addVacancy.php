<?php  
  session_start(); 
  include 'config.php';
  include 'Vauth.php';
  $role="";
  $uname = $_SESSION['username'];
  $sql = "SELECT * FROM users WHERE username='$uname'";
  $result = $db->query($sql);
  $row = $result->fetch_assoc();
  $role = $row["role"];

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
	<title> Add Vacancies </title>
    <script type="text/javascript" src="../js/TotalPayment.js"></script>
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
            <h1> <a href="home.php"> Home </a> > <a href="Edash.php"> Dashboard </a>> Add Vacancies </h1>
        </div>
        
        <div class="prof" style="margin-left:25%; padding-bottom:10px; padding-top:10px;">
        <form method="post" action="addVacancy.php">
                <label for="title">Title</label><br>
                <input type="text" id="title" name="title" value="" size="54"><br><br>
                <label for="des">Description</label><br>
                <textarea id="des" name="des" rows="4" cols="50"></textarea><br><br>
                <label for="skills">Skills required</label><br>
                <textarea id="skills" name="skills" rows="2" cols="50"></textarea><br><br>
                <label for="pyment">Payment for the Work</label><br>
                <input type="number" id="pyment" name="pyment" min="1" style="width: 4em" value="1" onkeyup="calctotal()"><label> LKR</label><br><br>
                <label>Total: </label><label id="total">1</label><label> LKR</label><br><br>
                <input type="submit" value="ADD" name="AddVacancy">
            </form> 
        </div>
        
        
</div>
        <?php
        
        ?>
    <?php endif ?>
</div>

<?php include 'footer.php';?>

</body>
</html>