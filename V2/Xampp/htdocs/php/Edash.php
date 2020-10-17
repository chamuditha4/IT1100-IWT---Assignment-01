<?php 
  session_start(); 
  include 'config.php';

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
	<title>Home</title>
	
</head>
<body>
<?php include 'header_logged.php';?>
<div class="header">
	<h2>Home Page</h2>
</div>
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
    	<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
    	<p> <a href="Edash.php?logout='1'" style="color: red;">logout</a> </p>
    <?php endif ?>
</div>

<hr>
<div class="navvv">
<h1> <a href="home.html"> Home </a> >Dashboard </h1>
</div>
<form class="search" action="Search jobs.html">
  <input type="text" placeholder="Search.." name="search">
  <button type="submit" ><i class="fa fa-search"><a href="Search jobs.html"></a></a></i>Search</button>
</form>

<div class="prof">
      <img src="../images/user.png" id="dp">

      <table>
        <tr>  <td class="ptd">Name</td> <td>Chamalka Lakshan</td> </tr>
        <tr>  <td class="ptd">BetterJobsID</td> <td>12242442</td> </tr>
        <tr>  <td class="ptd">Email</td> <td>chamalkalk@gmail.com</td> </tr>
        <tr>  <td class="ptd">Country</td> <td>Sri Lanka</td> </tr>
        <tr>  <td class="ptd">Age</td> <td>7</td> </tr>
        <tr>  <td class="ptd">Skills</td> <td>Photography, Logo Design, Photoshop, Illustrator</td> </tr>
      </table>
    </div>

</body>
</html>