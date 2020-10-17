<?php include 'Auth.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Online Job Portal | Login</title>
    <link rel="stylesheet" href="../css/dashoboard-nav.css">
    <link rel="stylesheet" href="../css/login_style.css">
    <script type="text/javascript" src="../js/loginej.js"></script>
</head>
<body>
    <!-- Start Header -->
    <?php include 'header.php';?>
    <!-- End Header -->
    
    <div class="center">
        <form method="post" action="Login.php">
            <label for="uname">Username:</label><br>
            <input type="text" id="uname" name="uname" value="" required><br>
            <label for="pwd">Password:</label><br>
            <input type="password" id="pwd" name="pwd" value="" required><br><br>
            <input id = "Signin" type="submit" value="Submit" name="user_login">
        </form>
    </div>
    
    <!-- Start Footer -->
    <?php include 'footer.php';?>
    <!-- End Footer -->
</body>
</html>