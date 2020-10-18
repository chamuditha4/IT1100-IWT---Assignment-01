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
  
//
// Vacancies 

    $Vsql = "SELECT * FROM vacancie WHERE uid='$uid'";
    $resultV = $db->query($Vsql);
    
    
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
	<title> Edit Vacancies </title>
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
    
    <?php  if (isset($_SESSION['username'])) : ?>
    	<hr>
        <div class="navvv">
            <h1> <a href="home.php"> Home </a> > <a href="Edash.php"> Dashboard </a>> Edit Vacancies </h1>
        </div>
        
        <div class="prof" style="margin-left:25%; padding-bottom:10px; padding-top:10px;">

            <table>
                <tr>
                    <th>ID</th>
                    <th>TITLE</th>
                    <th>DESCRIPTION</th>
                    <th>SKILLS REQUIRED</th>
                    <th>PAYMENT</th>
                    <th>ACTION</th>
                </tr>
            
            <?php
                if ($resultV->num_rows > 0) {
                    while($rowV = $resultV->fetch_assoc()) {
                        echo "<tr><td>" . $rowV["id"]."</td>";
                        echo "<td>" . $rowV["title"]."</td>";
                        echo "<td>" . $rowV["description"]."</td>";
                        echo "<td>" . $rowV["skills"]."</td>";
                        echo "<td>" . $rowV["payment"]." LKR</td>";
                        echo "<td> <a href='delete.php?id=$rowV[id]'><img src='../images/edit.png'> </td></tr>";
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