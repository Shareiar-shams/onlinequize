<?php
// Initialize the session
session_start();
 
require_once "config.php";
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}


?>

<?php
	if(isset($_POST["submit1"]))
	{
		mysqli_query($link,"INSERT INTO exam_category VALUES(NULL, '$_POST[category]','$_POST[exam_time_in_minutes]')") or die(mysqli_error($link));
		?>
		<script type="text/javascript">
			alert("Exam Added Successfully.");
			window.location.href=window.location.href;
		</script>
		<?php
	}
?>

<!doctype html>
<html class="no-js" lang="en">
<?php include 'included/head.php';?>
<body>
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->

    <!-- page container area start -->
    <div class="page-container">
    	<?php include 'included/slidebar.php';?>
    	<!-- main content area start -->
        <div class="main-content">
        	<?php include 'included/header.php';?>
        	<!-- page title area end -->
            <div class="main-content-inner">
            	<div class="row">
	            	<!-- basic form start -->
	                <div class="col-lg-6 mt-5">
	                    <div class="card">
	                        <div class="card-body">
	                            <h4 class="header-title">Add Exam</h4>
	                            <form action="" method="post">
	                                <div class="form-group">
	                                    <label for="exampleInputEmail1">New Exam Category</label>
	                                    <input type="text" class="form-control" id="exampleInputEmail1" name="category" aria-describedby="emailHelp" placeholder="Enter Category">
	                                </div>
	                                <div class="form-group">
	                                    <label for="exampleInputPassword1"> Exam Time </label>
	                                    <input type="number" class="form-control" id="exampleInputPassword1" name="exam_time_in_minutes" placeholder="Time in minutes">
	                                </div>
	                                <button type="submit" name="submit1" class="btn btn-primary mt-4 pr-4 pl-4">Submit</button>
	                            </form>
	                        </div>
	                    </div>
	                </div>
	                <!-- basic form end -->
	                <!-- table dark start -->
	                <div class="col-lg-6 mt-5">
	                    <div class="card">
	                        <div class="card-body">
	                            <h4 class="header-title">All Exam</h4>
	                            <div class="single-table">
	                                <div class="table-responsive">
	                                    <table class="table text-center">
	                                        <thead class="text-uppercase bg-dark">
	                                            <tr class="text-white">
	                                                <th scope="col">#</th>
	                                                <th scope="col">Exam Name</th>
	                                                <th scope="col">Exam time</th>
	                                                <th scope="col">Edit</th>
	                                                <th scope="col">Delete</th>
	                                            </tr>
	                                        </thead>

	                                        <tbody>
	                                       	<?php
	                                        $count = 0;
	                                        $res = mysqli_query($link, "SELECT * FROM exam_category");
	                                        while ($row=mysqli_fetch_array($res)) 
	                                        {
	                                        	$count = $count+1;
	                                        	?>
	                                        	<tr>
	                                                <th scope="row"><?php echo $count; ?></th>
	                                                <td><?php echo $row["category"]; ?></td>
	                                                <td><?php echo $row["exam_time_in_minutes"]; ?></td>
	                                                <td><a href="edit_exam.php?id=<?php echo $row["id"]; ?>">Edit</a></td>
	                                                <td><a href="delete.php?id=<?php echo $row["id"]; ?>"><i class="ti-trash"></i></a></td>
	                                            </tr>
	                                            <?php
	                                        }
	                                        ?>
	                                        </tbody>
	                                    </table>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	                <!-- table dark end -->
            	</div>
            </div>
        </div>
        <!-- main content area end -->
        <?php include 'included/footer.php';?>
    </div>
    <!-- page container area end -->

    <!-- jquery latest version -->
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>

    <!-- start chart js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <!-- start highcharts js -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <!-- start zingchart js -->
    <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
    <script>
    zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
    ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "ee6b7db5b51705a13dc2339db3edaf6d"];
    </script>
    <!-- all line chart activation -->
    <script src="assets/js/line-chart.js"></script>
    <!-- all pie chart -->
    <script src="assets/js/pie-chart.js"></script>
    <!-- others plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>

</html>