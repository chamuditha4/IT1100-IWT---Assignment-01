<?php 
  session_start(); 
  include 'config.php';
  include 'Vauth.php';
  $Searchr = $_GET["search"];
  $role="";
  $uname = $_SESSION['username'];
  $sql = "SELECT * FROM users WHERE username='$uname'";
  $result = $db->query($sql);
  $row = $result->fetch_assoc();
  $role = $row["role"];


  // Vacancies 

  $Vsql = "SELECT * FROM vacancie WHERE title LIKE '%$Searchr%' OR description LIKE '%$Searchr%' OR skills LIKE '%$Searchr%'";
  $resultV = $db->query($Vsql);

  echo $id;

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
	<title>Search Results : <?php echo $Searchr ?></title>
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
            <h1> <a href="home.php"> Home </a> > <a href="Edash.php"> Dashboard </a>> Search Results : <?php echo $Searchr ?> </h1>
        </div>
        

        <div class="prof" style="margin-left:25%; padding-bottom:10px; padding-top:10px;">
            <table>
                    <tr>
                        <th>TITLE</th>
                        <th>DESCRIPTION</th>
                        <th>SKILLS REQUIRED</th>
                        <th>PAYMENT</th>
                        <th>ACTION</th>
                    </tr>
                
                <?php
                    if ($resultV->num_rows > 0) {
                        while($rowV = $resultV->fetch_assoc()) {
                            echo "<tr><td>" . $rowV["title"]."</td>";
                            echo "<td>" . $rowV["description"]."</td>";
                            echo "<td>" . $rowV["skills"]."</td>";
                            echo "<td>" . $rowV["payment"]." LKR</td>";
                            echo "<td> <a href='apply.php?id=$rowV[id]'><img src='../images/submit.png'>";
                            
                        } 
                        echo "</table>";
                    }
                    else {
                        echo "</tr><br></table>";
                        echo "<br><h2>You Have no Any Vacancy to Delete</h2>";
                    }
                ?>
        </div>
</div>
        <?php
        
        ?>
    <?php endif ?>
</div>

<?php include 'footer.php';?>

</body>
</html>