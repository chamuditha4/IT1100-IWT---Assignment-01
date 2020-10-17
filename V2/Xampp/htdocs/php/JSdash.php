<?php 
  session_start(); 
  include 'config.php';
  $role="";
  $uname = $_SESSION['username'];
  $sql = "SELECT * FROM users WHERE username='$uname'";
  $result = $db->query($sql);
  $row = $result->fetch_assoc();
  $role = $row["role"];

  if ($role == 'JobSeeker'){
    //header('location: login.php');
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
	<title>Job Seeker Dashboard</title>
	
</head>
<body>
<?php include 'header_logged.php';?>

<div class="content">
  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['username'])) : ?>
    	<hr>
        <div class="navvv">
            <h1> <a href="home.php"> Home </a> >Dashboard </h1>
        </div>
        <form class="search" action="Search jobs.html">
        <input type="text" placeholder="Search.." name="search">
        <button type="submit" ><i class="fa fa-search"><a href="Search jobs.html"></a></a></i>Search</button>
        </form>

        <div class="prof">
            <img src="../images/user.png" id="dp">
            <table>
                <tr>  <td class="ptd">Name: </td> <td><?php echo $row["name"]; ?></td> </tr>
                <tr>  <td class="ptd">BetterJobsID: </td> <td><?php echo $row["id"]; ?></td> </tr>
                <tr>  <td class="ptd">Email: </td> <td><?php echo $row["email"]; ?></td> </tr>
                <tr>  <td class="ptd">Country: </td> <td><?php echo $row["country"]; ?></td> </tr>
                <tr>  <td class="ptd">Bio: </td> <td><?php echo $row["Bio"]; ?></td> </tr>
            </table>
        </div>
        <div class="seekerb">
            <a href="report.html"><button class="jsd_btn" >Report Employer / Job seeker</button></a><br>
            <button class="jsd_btn" onclick="Messageerr()">Completed Jobs</button><br>
            <button class="jsd_btn" onclick="Messageerr()">Submit finished Work</button>
        </div>
</div>
        <?php
        
        ?>
    <?php endif ?>
</div>

<?php include 'footer.php';?>

</body>
</html>