<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
  <title>Online Job Portal</title>
  <link rel="stylesheet" href="../css/home.css">
  <script type="text/javascript" src="../js/slide.js"></script>
</head>
<body onload="showSlides()">
    
<nav>
       <ul>
         <li><a href="home.php">Home</a></li>
         <li><a href="#">Job Portal</a>
           <ul>
             <li><a href="Login.html">Explore Jobs</a></li>
             <li><a href="Login.html">Add Jobs</a></li>
 
           </ul>
         </li>
         <li><a href="Map.html">Find Us</a></li>
         <li><a href="about us.html">About Us</a>
           <ul>
             <li><a href="about%20us.html#aboutsec">Our Story</a></li>
             <li><a href="about%20us.html#missionpa">Our Mission</a></li>
             <li><a href="about%20us.html#wherewebac">Where We Work</a></li>
           </ul>
         </li>
         <li><a href="contactUs.html">Contact Us</a></li>
       </ul>
     </nav>



    <img src="../images/White logo m.png" id="logo">

    <div class="home">
        <a href="Login.php"><button class="butt" id="butt1">Log In</button></a>
        <a href="Register.php"><button class="butt" id="butt2">Register</button></a>
    </div>
    

    <div class="slideshow-container" >

                                  <div class="mySlides">
                                    <div class="numbertext">1 / 3</div>
                                    <img src="../images/slide1.png" style="width:100%">
                                    <div class="text">MAKE MONEY</div>
                                  </div>
                                  
                                  <div class="mySlides">
                                    <div class="numbertext">2 / 3</div>
                                    <img src="../images/slide2.png" style="width:100%">
                                    <div class="text">SEARCH JOBS</div>
                                  </div>
                                  
                                  <div class="mySlides">
                                    <div class="numbertext">3 / 3</div>
                                    <img src="../images/slide3.png" style="width:100%">
                                    <div class="text">WORK FROM HOME</div>
                                  </div>
                                  
                                  </div>
                                  <br>
                                  
                                  <div style="text-align:center">
                                    <span class="dot"></span> 
                                    <span class="dot"></span> 
                                    <span class="dot"></span> 
                                  </div>
<br>



    <?php include 'footer.php';?>
</body>
</html>