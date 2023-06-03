<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

    if(isset($_POST['submit']))
  {
  	$bid=$_GET['bookid'];
							 		 	
$sql="SELECT * from tblservice where ID = :bid";
$query=$dbh->prepare($sql);
    $query-> bindParam(':bid', $bid, PDO::PARAM_STR);
    $query-> execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    if($query->rowCount() > 0)
{
foreach ($results as $result) {
$_SESSION['id']=$result->ID;
$_SESSION['venue']=$result->ServiceName;

}
	$id=$_SESSION['odmsaid'];
	$name=$_SESSION['username'];
	$email=$_SESSION['email'];
	  
  $mobnum=$_SESSION['phn']; 
 $edate=$_POST['edate'];
 $est=$_POST['est'];
  $eetime=$_POST['eetime'];
 $vaddress=$_SESSION['venue'];
 $eventtype=$_POST['eventtype'];
 $addinfo=$_POST['addinfo'];
 $bookingid=mt_rand(100000000, 999999999);
 
 
 
 $sql1=  "SELECT EventDate FROM tblbooking where EventDate = :edate ";
 $query1=$dbh->prepare($sql1);
    $query1-> bindParam(':edate', $edate, PDO::PARAM_STR);
    $query1-> execute();
    $results1=$query1->fetchAll(PDO::FETCH_OBJ);
    if($query1->rowCount() > 0)
{
    echo'<script>alert("Selected dates are note available ")</script>';
}
else{ 

$sql1=  "SELECT EventStartingtime FROM tblbooking where EventStartingtime = :est ";
 $query1=$dbh->prepare($sql1);
    $query1-> bindParam(':est', $est, PDO::PARAM_STR);
    $query1-> execute();
    $results1=$query1->fetchAll(PDO::FETCH_OBJ);
    if($query1->rowCount() > 0)
{
    echo'<script>alert("Selected Starting time  are not available ")</script>';
}
else{ 

$sql1=  "SELECT EventEndingtime FROM tblbooking where EventEndingtime = :eetime ";
 $query1=$dbh->prepare($sql1);
    $query1-> bindParam(':eetime', $eetime, PDO::PARAM_STR);
    $query1-> execute();
    $results1=$query1->fetchAll(PDO::FETCH_OBJ);
    if($query1->rowCount() > 0)
{
    echo'<script>alert("Selected Ending time  are not available ")</script>';
}
else{ 



$sql="insert into tblbooking(BookingID,ServiceID,Name,MobileNumber,Email,EventDate,EventStartingtime,EventEndingtime,VenueAddress,EventType)values(:bookingid,:bid,:name,:mobnum,:email,:edate,:est,:eetime,:vaddress,:eventtype)";
$query=$dbh->prepare($sql);
$query->bindParam(':bookingid',$bookingid,PDO::PARAM_STR);
$query->bindParam(':bid',$bid,PDO::PARAM_STR);
$query->bindParam(':name',$name,PDO::PARAM_STR);
$query->bindParam(':mobnum',$mobnum,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':edate',$edate,PDO::PARAM_STR);
$query->bindParam(':est',$est,PDO::PARAM_STR);
$query->bindParam(':eetime',$eetime,PDO::PARAM_STR);
$query->bindParam(':vaddress',$vaddress,PDO::PARAM_STR);
$query->bindParam(':eventtype',$eventtype,PDO::PARAM_STR);

 $query->execute();
   $LastInsertId=$dbh->lastInsertId();
   if ($LastInsertId>0) {
	   if(!empty($_POST['check_list'])){
// Loop to store and display values of individual checked checkbox.
foreach($_POST['check_list'] as $selected)
{

	   $sql1="insert into bookreqtbl(BookingID,ServiceID,Requirement)value(:bookingid,:bid,:selected)";
	   $query1=$dbh->prepare($sql1);
	   $query1->bindParam(':bookingid',$bookingid,PDO::PARAM_STR);
$query1->bindParam(':bid',$bid,PDO::PARAM_STR);
$query1->bindParam(':selected',$selected,PDO::PARAM_STR);
$query1->execute();
   $LastInsertId2=$dbh->lastInsertId();
   if ($LastInsertId2>0) {

    echo '<script>alert("Your Booking Request Has Been Send. We Will Contact You Soon")</script>';
echo "<script>window.location.href ='dashboard.php'</script>";
  }
}
	   }
   }
  else
    {
         echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }
}

}
  
  }
}
  }
  
  
  
?><!doctype html>
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
<script>
var expanded = false;

function showCheckboxes() {
  var checkboxes = document.getElementById("checkboxes");
  if (!expanded) {
    checkboxes.style.display = "block";
    expanded = true;
  } else {
    checkboxes.style.display = "none";
    expanded = false;
  }
}
</script>
<style>
.multiselect {
  width: 200px;
}

.selectBox {
  position: relative;
}

.selectBox select {
  width: 100%;
  
}

.overSelect {
  position: absolute;
  left: 0;
  right: 0;
  top: 0;
  bottom: 0;
}

#checkboxes {
  display: none;
  border: 1px #dadada solid;
}

#checkboxes label {
  display: black;
}

#checkboxes label:hover {
  background-color: #1e90ff;
}

</style>
    </head>
 <body>
        <div id="page-container" class="sidebar-o sidebar-inverse side-scroll page-header-fixed main-content-narrow">
         
         <?php include_once('includes/sidebar1.php');?>

          <?php include_once('includes/header.php');?>
           <div class="container" style = "color:black">  
		 <ol class="breadcrumb" style = "color:black">
	

		<form method="post">
		
			 <div class="contact-grids">
				 <div class="col-md-6 contact-left">
					 <p>Book Your Events now. </p>
					 <form method="post">
					 	
						
							 <li class="text-info">Event Date: </li>
							 <li><input type="date" class="form-control" name="edate" required="true"></li>
						 </ul>					 
						 <ul>
							 <li class="text-info">Event Starting Time:</li>
							 <li><select type="text" class="form-control" name="est" required="true">
							 	<option value="">Select Starting Time</option>
							 	<option value="1 a.m">1 a.m</option>
							 	<option value="2 a.m">2 a.m</option>
							 	<option value="3 a.m">3 a.m</option>
							 	<option value="4 a.m">4 a.m</option>
							 	<option value="5 a.m">5 a.m</option>
							 	<option value="6 a.m">6 a.m</option>
							 	<option value="7 a.m">7 a.m</option>
							 	<option value="8 a.m">8 a.m"</option>
							 	<option value="9 a.m">9 a.m</option>
							 	<option value="10 a.m">10 a.m</option>
							 	<option value="11 a.m">11 a.m</option>
							 	<option value="12 p.m">12 a.m</option>
							 	<option value="1 p.m">1 p.m</option>
							 	<option value="2 p.m">2 p.m</option>
							 	<option value="3 p.m">3 p.m</option>
							 	<option value="4 p.m">4 p.m</option>
							 	<option value="5 p.m">5 p.m</option>
							 	<option value="6 p.m">6 p.m</option>
							 	<option value="7 p.m">7 p.m</option>
							 	<option value="8 p.m">8 p.m</option>
							 	<option value="9 p.m">9 p.m</option>
							 	<option value="10 p.m">10 p.m</option>
							 	<option value="10 p.m">10 p.m</option>
							 	<option value="12 a.m">12 a.m</option>
							 </select></li>
						 </ul>
						 <ul>
							 <li class="text-info">Event Finish Time:</li>
							 <li><select type="text" class="form-control" name="eetime" required="true">
							 	<option value="">Select Finish Time</option>
							 	<option value="1 a.m">1 a.m</option>
							 	<option value="2 a.m">2 a.m</option>
							 	<option value="3 a.m">3 a.m</option>
							 	<option value="4 a.m">4 a.m</option>
							 	<option value="5 a.m">5 a.m</option>
							 	<option value="6 a.m">6 a.m</option>
							 	<option value="7 a.m">7 a.m</option>
							 	<option value="8 a.m">8 a.m"</option>
							 	<option value="9 a.m">9 a.m</option>
							 	<option value="10 a.m">10 a.m</option>
							 	<option value="11 a.m">11 a.m</option>
							 	<option value="12 p.m">12 a.m</option>
							 	<option value="1 p.m">1 p.m</option>
							 	<option value="2 p.m">2 p.m</option>
							 	<option value="3 p.m">3 p.m</option>
							 	<option value="4 p.m">4 p.m</option>
							 	<option value="5 p.m">5 p.m</option>
							 	<option value="6 p.m">6 p.m</option>
							 	<option value="7 p.m">7 p.m</option>
							 	<option value="8 p.m">8 p.m</option>
							 	<option value="9 p.m">9 p.m</option>
							 	<option value="10 p.m">10 p.m</option>
							 	<option value="10 p.m">10 p.m</option>
							 	<option value="12 a.m">12 a.m</option>
							 </select></li>
						 </ul>
				 
							 
							 
						 <ul>
						  
							 <li class="text-info">Type of Event:</li>
							 <li><select type="text" class="form-control" name="eventtype" required="true" >
							 
							 	<option value="">Choose Event Type</option>
							 	<?php 

$sql2 = "SELECT * from   tbleventtype ";
$query2 = $dbh -> prepare($sql2);
$query2->execute();
$result2=$query2->fetchAll(PDO::FETCH_OBJ);

foreach($result2 as $row)
{          
    ?>  
<option value="<?php echo htmlentities($row->EventType);?>"><?php echo htmlentities($row->EventType);?></option>
 <?php } ?>
							 </select></li>
						 </ul>	
						  <ul>
						  
							 <li class="text-info">Additional Requirement:</li>
							 <li>
							  <div class="multiselect">
    <div class="selectBox" onclick="showCheckboxes()">
      <select>
        <option>Select an option</option>
      </select>
      <div class="overSelect"></div>
    </div>
	  <div id="checkboxes">
     
	<?php 

$sql3 = "SELECT * from   tblrequirement ";
$query3 = $dbh -> prepare($sql3);
$query3->execute();
$result3=$query3->fetchAll(PDO::FETCH_OBJ);

foreach($result3 as $row)
{          
    ?>  
	
  
        <input type="checkbox" name="check_list[]" value="<?php echo htmlentities($row->Requirement);?> "  /><?php echo htmlentities($row->Requirement);?> <br>
		 
     <?php } ?>
    </div>
  </div>
							
							 	

 
							 </select></li>
						 </ul>					
						 <input type="submit" name="submit" value="Book">					 
					 </form>
				 </div>
				 				 <div class="clearfix"></div>
			 </div>
		 </div>
		 </form>
		<?php include_once('includes/footer.php');?>
	 </div>
</div>
<!---->

<!---->
</body>
</html>