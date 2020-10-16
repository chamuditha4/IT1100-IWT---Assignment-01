<?php include 'Auth.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Online Job Portal | Register </title>
    <link rel="stylesheet" href="../css/dashoboard-nav.css">
    <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="../css/login_style.css">
    <script type="text/javascript" src="../js/loginej.js"></script>
    <script type="text/javascript" src="../js/Date&Time.js"></script>
    <script type="text/javascript" src="../js/Validate.js"></script>
</head>
<body>
    <!-- Start Header -->
    <?php include 'header.php';?>
    <!-- End Header -->

    <div class="center">
        <form method="post" action="Register.php">
            <label for="uname">Username :</label><br>
            <input type="text" id="uname" name="uname" value="" required><br>
            <label for="email">Email :</label><br>
            <input type="email" id="email" name="email" value="" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required><br>
            <label for="uname">Password:</label><br>
            <input type="password" id="password" name="password" value="" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{5,10}" title="Must contain at least one number and one uppercase and lowercase letter, and at min 5 and max 10 characters" required><br>
            <label for="password">Re-type Password:</label><br>
            <input type="password" id="cpassword" name="cpassword" value=""  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{5,10}" required ><br><br>
            <label>Account type</label><br>
            <label class="container">Employee
            <input type="radio" checked="checked" name="radio" required>
            <span class="checkmark"></span>
            </label>
            <label class="container">Job seeker
            <input type="radio" name="radio">
            <span class="checkmark"></span>
            </label>
            <label>Profile Picture</label><br>
            <div class="upload-btn-wrapper">
                <button class="btn">Upload a file</button>
                <input type="file" name="myfile" />
            </div><br><br>
            <input type="submit" id="butto" name="user_register"  value="Submit" >
        </form>
    </div>

    <!-- Start Footer -->
    <?php include 'footer.php';?>
    <!-- End Footer -->
</body>
</html>