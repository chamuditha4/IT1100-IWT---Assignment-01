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
	<title> Approve CV </title>
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
            <h1> <a href="home.php"> Home </a> > <a href="Edash.php"> Dashboard </a>> Approve CV </h1>
        </div>
        
        <div class="prof" style="margin-left:15%; width:70%; padding-bottom:10px; padding-top:10px;">
            <?php
                if ($resultV->num_rows > 0) {
                    echo "<table><tr><th>ID</th>";
                    echo "<th>TITLE</th>";
                    echo "<th>DESCRIPTION</th>";
                    echo "<th>SKILLS REQUIRED</th>";
                    echo "<th>PAYMENT</th>";
                    echo "<th>CV Count</th></tr>";
                    while($rowV = $resultV->fetch_assoc()) {
                        echo "<tr><td>" . $rowV["id"]."</td>";
                        echo "<td>" . $rowV["title"]."</td>";
                        echo "<td>" . $rowV["description"]."</td>";
                        echo "<td>" . $rowV["skills"]."</td>";
                        echo "<td>" . $rowV["payment"]." LKR</td>";
                        $Vid = $rowV["id"];
                        $count = "SELECT COUNT(vid) AS count FROM cv WHERE vid= '$Vid'";
                        $res = mysqli_query($db,$count);
                        $data=mysqli_fetch_assoc($res);
                        echo "<td><a href='cv.php?Vid=$Vid'>" .$data['count']. "</a></td></tr>";
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