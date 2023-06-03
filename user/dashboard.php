<!doctype html>
 <html lang="en" class="no-focus"> <!--<![endif]-->
 <head>
 <title>College Amenity Booking System- User Dashboard</title>
 <link rel="stylesheet" id="css-main" href="assets/css/codebase.min.css">
 
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="css/touchTouch.css" type="text/css" media="all" />
<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- Custom Theme files -->
<script src="js/jquery.min.js"></script>

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--webfont-->
<link href='http://fonts.googleapis.com/css?family=Monoton' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Raleway:400,900,800,700,600,500,300,100,200' rel='stylesheet' type='text/css'>
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


    </head><style>
	.button1 {
  background-color: white; 
  color: black; 
  border: 2px solid #555555;
  padding: 20px 20px;
  border-radius :12px;
}

.button1:hover {
  background-color: #555555;
  color: white;
}

</style>
    <body>
        <div id="page-container" class="sidebar-o sidebar-inverse side-scroll page-header-fixed main-content-narrow">
         
         <?php include_once('includes/sidebar.php');?>

          <?php include_once('includes/header.php');?>
           <div class="container" style = "color:black">  
		 <ol class="breadcrumb" style = "color:black">
		  
		  <li class="active">Services</li>	  
		 </ol><br><br>
		 <h2>Services</h2>
		 <div class="event-main">
		 	<?php
$sql="SELECT * from tblservice";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
			 <div class="event-grids">
					<div class="col-md-3 event-grid" style ="Color: black">
						
						<ul>
							<li class="hedding" style ="Color: black"><?php  echo htmlentities($row->ServiceName);?></li>
							
						</ul>
						<div class="clearfix"> </div>
					</div>
					<div class="col-md-4 event-grid small-text" >
						<p style ="Color: black"><?php  echo htmlentities($row->SerDes);?></p>
					</div>
					
					<div class="col-md-3 event-grid text-button">
						<ul>
						
							<button class="button button1 ><li style="color : pink"><a href="book-services.php?bookid=<?php echo $row->ID;?>">Book Services</a></li></button>
						</ul>
					</div>
					<div class="clearfix"> </div>
			  </div>
			  <?php $cnt=$cnt+1;}} ?>
			 
					  
		 </div>		 
	

            
             <?php include_once('includes/footer.php');?>
        </div>
        <!-- END Page Container -->

        <!-- Codebase Core JS -->
        <script src="assets/js/core/jquery.min.js"></script>
        <script src="assets/js/core/popper.min.js"></script>
        <script src="assets/js/core/bootstrap.min.js"></script>
        <script src="assets/js/core/jquery.slimscroll.min.js"></script>
        <script src="assets/js/core/jquery.scrollLock.min.js"></script>
        <script src="assets/js/core/jquery.appear.min.js"></script>
        <script src="assets/js/core/jquery.countTo.min.js"></script>
        <script src="assets/js/core/js.cookie.min.js"></script>
        <script src="assets/js/codebase.js"></script>

        <!-- Page JS Plugins -->
        <script src="assets/js/plugins/chartjs/Chart.bundle.min.js"></script>

        <!-- Page JS Code -->
        <script src="assets/js/pages/be_pages_dashboard.js"></script>
    </body>
</html>