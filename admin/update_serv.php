<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['odmsaid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {

$id1=$_GET['invid'];
$sername=$_POST['sername'];
$serdes=$_POST['serdes'];

  $sql="update tblservice set ServiceName=:sername,SerDes=:serdes where ID=:id1";
$query=$dbh->prepare($sql);
$query->bindParam(':sername',$sername,PDO::PARAM_STR);
$query->bindParam(':serdes',$serdes,PDO::PARAM_STR);
$query->bindParam(':id1',$id1,PDO::PARAM_STR);
$query->execute();


 

       echo '<script>alert("Services has been updated.")</script>';
echo "<script>window.location.href ='manage-services.php'</script>";
  
  
  
}

?>
<!doctype html>
 <html lang="en" class="no-focus"> <!--<![endif]-->
    <head>
 <title>College Amenity Booking System - Manage Services</title>
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
                
                    <!-- Register Forms -->
                    <h2 class="content-heading">Update Services</h2>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Bootstrap Register -->
                            <div class="block block-themed">
                                <div class="block-header bg-gd-emerald">
                                    <h3 class="block-title">Update Services</h3>
                                    <div class="block-options">
                                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                            <i class="si si-refresh"></i>
                                        </button>
                                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
                                    </div>
                                </div>
                                <div class="block-content">
								<?php
								
$id=$_GET['invid'];
$sql1="SELECT ServiceName,SerDes,CreationDate from  tblservice where ID=:id";
$query1 = $dbh -> prepare($sql1);
$query1->bindParam(':id',$id,PDO::PARAM_STR);
$query1->execute();
$results1=$query1->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query1->rowCount() > 0)
{
foreach($results1 as $row)
{               ?>

                                   
                                    <form method="post">
                                        
                                        <div class="form-group row">
                                            <label class="col-12" for="register1-email">Service Name:</label>
                                            <div class="col-12">
											
                                                 <input type="text" class="form-control" name="sername" value="<?php  echo $row->ServiceName;?>" required='true'>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12" for="register1-email">Service Description:</label>
                                            <div class="col-12">
                                                 <input type="text" class="form-control" name="serdes" value="<?php  echo $row->SerDes;?>" required='true'>
                                            </div>
                                        </div>
                                      <!--  <div class="form-group row">
                                            <label class="col-12" for="register1-password">Service Price:</label>
                                            <div class="col-12">
                                                <input type="text" class="form-control" name="serprice" value="" required='true'>
                                            </div>
                                        </div>-->
										<?php $cnt=$cnt+1;}} ?>
                                        <div class="form-group row">
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-alt-success" name="submit">
                                                    <i class="fa fa-plus mr-5"></i> Update
                                                </button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                            <!-- END Bootstrap Register -->
                        </div>
                        
                       </div>
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
    </body>
</html>
<?php }  ?>