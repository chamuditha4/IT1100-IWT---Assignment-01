<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../css/Employer dashboard.css">
    <link rel="stylesheet" href="../css/jobseeker.css">
    <link rel="stylesheet" href="../css/search.css">
    <script type="text/javascript" src="../js/logoutConfirm.js"></script>
    <script type="text/javascript" src="../js/switch.js"></script>
    <script type="text/javascript" src="../js/Date&Time.js"></script>
    <script type="text/javascript" src="../js/Maintain.js"></script>
</head>
<body>
    <div >
      <h1 id="today"></h1>
    </div>
    <div class="hed"> 
        <?php 
            if (strlen($row["profilepicture"])!=0){
                $printimgq = '<img src = "data:image;base64,'.base64_encode($row["profilepicture"]).'" id="user1" style="width:100px;border-radius: 50%;" >';
                echo $printimgq;
            }
            else{
                echo '<img src = "../images/user.png" id="user1" style="width:100px;" >';
            }
        ?>
        <h1 id="use"><?php echo $_SESSION['username']; ?></h1> 
        <button class="logout" onclick="location.href='Edash.php?logout=1'">Logout </a></button>
        
    </div>
</body>
</html>