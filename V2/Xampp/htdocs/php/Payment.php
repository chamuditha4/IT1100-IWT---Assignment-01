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
	<title> Pay Employee </title>
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
            <h1> <a href="home.php"> Home </a> > <a href="Edash.php"> Dashboard </a>> Pay Employee </h1>
        </div>
        
        <div class="prof" style="width:80%; margin-left:5%; padding-bottom:10px; padding-top:10px;">

            <?php
                if ($resultV->num_rows > 0) {
                    echo "<table><tr><th>ID</th>";
                    echo "<th>WORK TITLE</th>";
                    echo "<th>WORK DESCRIPTION</th>";
                    echo "<th>STATUS</th>";
                    echo "<th>PAYMENT</th>";
                    echo "<th>ACTION</th></tr>";
                    while($rowV = $resultV->fetch_assoc()) {
                        $Vid = $rowV["id"];
                        $pay = "SELECT * FROM cv WHERE vid= '$Vid'";
                        $res = mysqli_query($db,$pay);
                        while($data = $res->fetch_assoc()) {
                            $Cid = $data["id"];
                            $work1 = "SELECT * FROM work WHERE cid= '$Cid'";
                            $res1 = mysqli_query($db,$work1);
                            while($work = $res1->fetch_assoc()) {
                                $status = $work["status"];
                                if ($status == 'reject'){
                                    echo "<tr><td>" . $work["id"]."</td>";
                                    echo "<td>" . $work["title"]."</td>";
                                    echo "<td>" . $work["description"]."</td>";
                                    echo "<td>" . $work["status"]."</td>";
                                    echo "<td>" . $rowV["payment"]." LKR</td>";
                                    echo "<td><a href='paid.php?id=$work[id]'><img src='../images/money.png'> </td></tr>";
                                    }elseif($status == 'paid'){
                                        echo "<tr><td>" . $work["id"]."</td>";
                                        echo "<td>" . $work["title"]."</td>";
                                        echo "<td>" . $work["description"]."</td>";
                                        echo "<td>" . $work["status"]."</td>";
                                        echo "<td>" . $rowV["payment"]." LKR</td>";
                                        echo "<td><a href='p_reject.php?id=$work[id]'><img src='../images/delete.png'></td></tr> ";
                                    }elseif($status == 'pending'){
                                        echo "<tr><td>" . $work["id"]."</td>";
                                        echo "<td>" . $work["title"]."</td>";
                                        echo "<td>" . $work["description"]."</td>";
                                        echo "<td>" . $work["status"]."</td>";
                                        echo "<td>" . $rowV["payment"]." LKR</td>";
                                        echo "<td><a href='paid.php?id=$work[id]'><img src='../images/money.png'> ";
                                        echo "<a href='p_reject.php?id=$work[id]'><img src='../images/delete.png'></td></tr> ";
                                    }
                                
                            }    
                        }
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