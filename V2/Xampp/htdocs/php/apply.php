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
//
// Vacancies 
    $id = $_GET["id"];
    $Vsql = "SELECT * FROM vacancie WHERE id='$Vid'";
    $resultV = $db->query($Vsql);
    $rowV = $resultV->fetch_assoc();
//
  if ($role == 'JobSeeker'){
    //header('location: JSdash.php');
  }
  else{
    header('location: Edash.php');
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
	<title> Apply Vacancy : <?php echo $rowV['title']; ?> </title>
    <style>
        table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
        }

        td, th {
        border: 1px solid #dddddd;
        text-align: center;
        padding: 8px;
        }

        tr:nth-child(even) {
        background-color: #dddddd;
        }
    </style>
</head>
<body>
<?php include 'header_logged.php';?>

<div class="content">
    
    <?php  if (isset($_SESSION['username'])) :?>
    	<hr>
        <div class="navvv">
            <h1> <a href="home.php"> Home </a> > <a href="JSdash.php"> Dashboard </a>> Apply Vacancy : <?php echo $rowV['title']; ?> </h1>
        </div>
        
        <div class="prof" style="margin-left:25%; padding-bottom:10px; padding-top:10px;">
            <form method="post" action="apply.php">
                    <input type="hidden" id="id" name="vid" value="<?php echo $Vid; ?>">
                    <label for="cvtitle">CV Title</label><br>
                    <input type="text" id="cvtitle" name="cvtitle" value="" size="54"><br><br>
                    <label for="cvdes">CV Description</label><br>
                    <textarea id="cvdes" name="cvdes" rows="4" cols="50" ></textarea><br><br>
                    <input type="submit" value="Apply" name="ApplyCv">
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