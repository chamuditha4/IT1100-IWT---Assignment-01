<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Online Job Portal</title>
  <script type="text/javascript" src="../js/slide.js"></script>
</head>
<body onload="showSlides()">
    <?php include 'header.php';?>
    <img src="../images/White logo m.png" id="logo">

    <div class="home">
        <a href="Login.php"><button class="butt" id="butt1">Log In</button></a>
        <a href="Register.php"><button class="butt" id="butt2">Register</button></a>
    </div>
    

    <div class="slideshow-container" >

<div class="mySlides">
  <div class="numbertext">1 / 3</div>
  <img src="../images/slide1.jpg" style="width:100%">
  <div class="text">MAKE MONEY</div>
</div>

<div class="mySlides">
  <div class="numbertext">2 / 3</div>
  <img src="../images/slide2.jpg" style="width:100%">
  <div class="text">SEARCH JOBS</div>
</div>

<div class="mySlides">
  <div class="numbertext">3 / 3</div>
  <img src="../images/slide3.jpg" style="width:100%">
  <div class="text">WORK FROM HOME</div>
</div>

</div>
<br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
</div>


    <?php include 'footer.php';?>
</body>
</html>