<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['odmsaid']==0)) {
  header('location:logout.php');
  } else{

$name=$_SESSION['username'];

// Code for deleting product from cart
if(isset($_GET['delid']))
{
$rid=intval($_GET['delid']);
$sql1="delete from tblbooking where ID=:rid";
$query1=$dbh->prepare($sql1);
$query1->bindParam(':rid',$rid,PDO::PARAM_STR);
$query1->execute();
 echo "<script>alert('Data deleted');</script>"; 
  echo "<script>window.location.href = 'booking-search.php'</script>";     


}


  ?>
<!doctype html>
<html lang="en" class="no-focus"> <!--<![endif]-->
    <head>
        <title>College Amenity Booking System -  Booking Status</title>

        <link rel="stylesheet" href="assets/js/plugins/datatables/dataTables.bootstrap4.min.css">

        <link rel="stylesheet" id="css-main" href="assets/css/codebase.min.css">

    </head>
    <body>
        
        <div id="page-container" class="sidebar-o sidebar-inverse side-scroll page-header-fixed main-content-narrow">
           
           <?php include_once('includes/sidebar.php');?>

          <?php include_once('includes/header.php');?>


            <!-- Main Container -->
            <main id="main-container">
                <!-- Page Content -->
                <div class="content">
                    <h2 class="content-heading"> Booking Status</h2>

                   

                    <!-- Dynamic Table Full Pagination -->
                    <div class="block">
                        <div class="block-header block-header-default">
                            <h3 class="block-title"> Booking Status</h3>
                        </div>
                        <div class="block-content block-content-full">
                            <!-- DataTables init on table by adding .js-dataTable-full-pagination class, functionality initialized in js/pages/be_tables_datatables.js -->
                            
                            
  <h4 align="center">Result  </h4>
                            <table class="table table-bordered table-striped table-vcenter ">
                                <thead>
                                    <tr>
                                        <th class="text-center"></th>
                                        <th>Booking ID</th>
                                        <th class="d-none d-sm-table-cell">Venue</th>
                                        <th class="d-none d-sm-table-cell">Event Name</th>
                                        <th class="d-none d-sm-table-cell">Admin Remark</th>
                                        <th class="d-none d-sm-table-cell">Booking Date</th>
                                        <th class="d-none d-sm-table-cell">Status</th>
                                        
                                </thead>
                                <tbody>
                                    <?php
$sql="SELECT * from tblbooking where  Name like '$name' ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
                                    <tr>
                                        <td class="text-center"><?php echo htmlentities($cnt);?></td>
                                        <td class="font-w600"><?php  echo htmlentities($row->BookingID);?></td>
                                        <td class="font-w600"><?php  echo htmlentities($row->VenueAddress);?></td>
                                        <td class="font-w600"><?php  echo htmlentities($row->EventType);?></td>
										<?php if($row->Remark==""){ ?>

                     <td class="font-w600" ><?php echo "No Remarks Updated Yet"; ?></td>
<?php } else { 

 ?> 
										
                                        <td class="font-w600"><?php  echo htmlentities($row->Remark);?></td>
<?php } ?>
                                        <td class="font-w600">
                                            <span class="font-w600"><?php  echo htmlentities($row->BookingDate);?></span>
                                        </td>
                                        <?php if($row->Status==""){ ?>

                     <td class="font-w600" style="color:blue"><?php echo "Not Updated Yet"; ?> <td class="d-none d-sm-table-cell"><a href="booking-search.php?delid=<?php echo ($row->ID);?>" onclick="return confirm('Do you really want to Cancel ?');"><i class="fa fa-trash fa-delete" aria-hidden="true"></i></a></td></td>
<?php } else if($row->Status=="Cancelled"){ 

 ?> 
                                        <td class="d-none d-sm-table-cell">
                                            <span class="font-w600" style="color:red"><?php  echo htmlentities($row->Status);?></span>
                                        </td>
<?php } else {?> 
                                         
                             <td class="d-none d-sm-table-cell">
                                            <span class="font-w600" style="color:green"><?php  echo htmlentities($row->Status);?></span>
                                        </td>   
                                
<?php }?>
                                </tbody>
                                <?php 
$cnt=$cnt+1;
} } else { ?>
  <tr>
    <td colspan="8"> No record found against this search</td>

  </tr>
  <?php } }?>
                            </table>
                        </div>
                    </div>
                    <!-- END Dynamic Table Full Pagination -->

                    <!-- END Dynamic Table Simple -->
                </div>
                <!-- END Page Content -->
            </main>
            <!-- END Main Container -->

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
        <script src="assets/js/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="assets/js/plugins/datatables/dataTables.bootstrap4.min.js"></script>

        <!-- Page JS Code -->
        <script src="assets/js/pages/be_tables_datatables.js"></script>
    </body>
</html>
