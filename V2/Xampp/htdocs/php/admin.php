<?php 
  session_start(); 
  include 'config.php';
  $role="";
  $uname = $_SESSION['username'];
  $sql = "SELECT * FROM users WHERE username='$uname'";
  $result = $db->query($sql);
  $row = $result->fetch_assoc();
  $role = $row["role"];
  

  $printimg = '<img src = "data:image;base64,'.base64_encode($row["profilepicture"]).'" style="width:150px;border-radius: 50%;"  >';

  if ($role != 'admin'){
    header('location: home.php');
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

    $sql = "SELECT count(*) as total from vacancie";
    $v = mysqli_query($db, $sql);
    $vcount = mysqli_fetch_assoc($v)['total'];

    $sql = "SELECT count(*) as total from work";
    $work = mysqli_query($db, $sql);
    $wcount = mysqli_fetch_assoc($work)['total'];

    $sql = "SELECT count(*) as total from cv";
    $cv = mysqli_query($db, $sql);
    $cvcount = mysqli_fetch_assoc($cv)['total'];

    $sql = "SELECT count(*) as total from users";
    $users = mysqli_query($db, $sql);
    $count = mysqli_fetch_assoc($users)['total'];
    
?>
<!DOCTYPE html>
<html>
<head>
	<title> Employer Dashboard </title>
	
</head>
<body>
<?php include 'header_logged.php';?>

<div class="content">

    
    <?php  if (isset($_SESSION['username'])) : ?>
    	<hr>
        <div class="navvv">
            <h1> <a href="home.php"> Home </a> >Dashboard </h1>
        </div>
        

        <div style="margin-left:30%; background-color:#ffccff; margin-top:5%; margin-right:30%; text-align:center;">
                
            
            
            <table>
                <tr>  <td class="ptd">User Count: </td> <td><?php echo $count; ?></td> </tr>
                <tr>  <td class="ptd">Vacancy Count: </td> <td><?php echo $vcount; ?></td> </tr>
                <tr>  <td class="ptd">Submitted Work Count: </td> <td><?php echo $wcount; ?></td> </tr>
                <tr>  <td class="ptd">Cv Count: </td> <td><?php echo $cvcount; ?></td> </tr>
            </table>
        </div>
        
            

</div>
        <?php
        
        ?>
    <?php endif ?>
</div>

<?php include 'footer.php';?>

</body>
</html>