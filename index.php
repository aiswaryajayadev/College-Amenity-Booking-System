<?php
session_start();
error_reporting(0);

include('includes/dbconnection.php');
?>
<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/w3css/3/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
<body>
<head>
<title>College Amenity  Booking System || Home Page</title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="css/touchTouch.css" type="text/css" media="all" />
<!-- Custom Theme files 
<script src="js/jquery.min.js"></script>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--webfont
<link href='http://fonts.googleapis.com/css?family=Monoton' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
<!---//End-css-style-switecher----->
<script type="text/javascript" src="js/jquery.fancybox.js"></script>
		<link rel="stylesheet" type="text/css" href="css/jquery.fancybox.css" media="screen" />
	   <script type="text/javascript">
			$(document).ready(function() {
				/*
				 *  Simple image gallery. Uses default settings
				 */

				$('.fancybox').fancybox();

			});
		</script>

</head>
<style>
.content 
{padding:20px;

background-repeat: no-repeat;

  background-size:2000px 2000px;
  
  }
 .col-md-6 abt-pic
 {
	 width:1100px;
    height:500px;
	text-align:center; 
	 
 }
  
  
</style>


<body>
<!---->
<div class="hero flex middle-xs" style="background-image: linear-gradient(rgba(1, 0, 0, 0.9), rgba(1, 0, 0, 0.7)), url('7.jpg');}">
<div class="content">
<?php include_once('includes/header.php');?>

	 <div class="container"> 		 
		 <ol class="breadcrumb">
		  <li><a href="index.php">Home</a></li>
		  <!--<li class="active">About</li>	  -->
		 </ol>
		 <h2 style="color:white">Welcome....</h2>
		 <div class="about-main">
 <div class="col-md-6" >
				 <section >
  <img align="center" class="mySlides" src="images/3.jpg" style="width:200%">
  <img align="center" class="mySlides" src="images/4.jpg" style="width:200%">
  <img align="center" class="mySlides" src="images/7.jpg" style="width:200%">
 
</section>
			 </div>
			 
			 			 <div class="clearfix"></div>
		 </div>
	<br>
		 <div class="latest" style="align:center">
		  </div>
		
	<section class="w3-container w3-center w3-content"  >
  <h2class="w3-wide" style="color:white">
  <p class="w3-justify" style="color:white"><b>College Amenity Booking System is one of  trusted  Booking Service that provide  good functioning seminar halls and well equipped computer labs and other amenities based on your needs.</b>
</h2></section>

			
			 
			 <div class="clearfix"></div>
		
		<?php include_once('includes/footer.php');?>
	 </div>
</div>
</div>
<!---->

<!---->
<script>
// Automatic Slideshow - change image every 3 seconds
var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}
  x[myIndex-1].style.display = "block";
  setTimeout(carousel, 3000);
}
</script>
</body>
</html>