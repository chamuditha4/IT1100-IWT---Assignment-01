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
    $Vid = $_GET["Vid"];;
    $CVsql = "SELECT * FROM cv WHERE vid='$Vid'";
    $resultCV = $db->query($CVsql);
    
    
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
            <h1> <a href="home.php"> Home </a> > <a href="Edash.php"> Dashboard </a>><a href="ApproveCv.php"> Approve CV </a>> CV's</h1>
        </div>
        
        <div class="prof" style="margin-left:25%; padding-bottom:10px; padding-top:10px;">
            <?php
                if ($resultCV->num_rows > 0) {
                    echo "<table><tr><th>CV ID</th>";
                    echo "<th>CV TITLE</th>";
                    echo "<th>CV DESCRIPTION</th>";
                    echo "<th>STATUS</th>";
                    echo "<th>ACTION</th></tr>";
                    while($rowCV = $resultCV->fetch_assoc()) {
                        $status = $rowCV["status"];
                        if ($status == 'rejected'){
                            echo "<tr><td>" . $rowCV["id"]."</td>";
                            echo "<td>" . $rowCV["title"]."</td>";
                            echo "<td>" . $rowCV["description"]."</td>";
                            echo "<td style='color:red;'>" . $rowCV["status"]."</td>";
                            echo "<td> <a href='approve.php?id=$rowCV[id]'><img src='../images/correct-symbol.png'></td></tr>";
                        }elseif($status == 'pending'){
                            echo "<tr><td>" . $rowCV["id"]."</td>";
                            echo "<td>" . $rowCV["title"]."</td>";
                            echo "<td>" . $rowCV["description"]."</td>";
                            echo "<td style='color:yellow;'>" . $rowCV["status"]."</td>";
                            echo "<td> <a href='approve.php?id=$rowCV[id]'><img src='../images/correct-symbol.png'>&nbsp;&nbsp;";
                            echo "<a href='reject.php?id=$rowCV[id]'><img src='../images/delete.png'> </td></tr>";
                        }elseif($status == 'completed'){
                            echo "<tr><td>" . $rowCV["id"]."</td>";
                            echo "<td>" . $rowCV["title"]."</td>";
                            echo "<td>" . $rowCV["description"]."</td>";
                            echo "<td style='color:#f18973;'>" . $rowCV["status"]."</td>";
                            echo "<td></td></tr>";
                        }elseif($status == 'approved'){
                            echo "<tr><td>" . $rowCV["id"]."</td>";
                            echo "<td>" . $rowCV["title"]."</td>";
                            echo "<td>" . $rowCV["description"]."</td>";
                            echo "<td style='color:green;'>" . $rowCV["status"]."</td>";
                            echo "<td><a href='reject.php?id=$rowCV[id]'><img src='../images/delete.png'> </td></tr>";
                        }
                            
                    } 
                    echo "</table>";
                }
                else {
                    echo "</tr><br></table>";
                    echo "<br><h2>You Have no CV to Approve</h2>";
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