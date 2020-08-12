<?php
// Initialize the session
session_start();
 require_once "config.php";

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}
?>

<!doctype html>
<html class="no-js" lang="en">
<?php include 'include/head.php';?>
<body>
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->

    <!-- page container area start -->
    <div class="page-container">
    	<?php include 'include/slidebar.php';?>
    	<!-- main content area start -->
        <div class="main-content">
        	<?php include 'include/header.php';?>
        	<!-- page title area end -->
            <div class="main-content-inner">
            	<div class="row">
            		<div class="col-lg-6 col-lg-push-3">
            			<h3>Old Exam Result</h3>
            			<?php 
            				$count =0;
            				$res = mysqli_query($link,"select * from exam_result where username='$_SESSION[username]' order by id desc");
            				$count = mysqli_num_rows($res);
            				if($count==0)
            				{
            					echo "no result Found";
            				}
            				else
            				{
            					echo "<table class='table table-bordered'>";
            					echo "<tr style='background-color: #006df0; color:white;'>";
            					echo "<th>"; echo "UserName"; echo "</th>";
            					echo "<th>"; echo "Exam Type"; echo "</th>";
            					echo "<th>"; echo "Total Question"; echo "</th>";
            					echo "<th>"; echo "Correct Answer"; echo "</th>";
            					echo "<th>"; echo "Wrong Answer"; echo "</th>";
            					echo "<th>"; echo "Exam Time"; echo "</th>";
            					echo "</tr>";
            					


            					while ($row=mysqli_fetch_array($res)) {
            						echo "<tr>";
	            					echo "<td>"; echo $row["username"]; echo "</td>";
	            					echo "<td>"; echo $row["exam_type"]; echo "</td>";
	            					echo "<td>"; echo $row["total_question"]; echo "</td>";
	            					echo "<td>"; echo $row["correct_answer"]; echo "</td>";
	            					echo "<td>"; echo $row["wrong_answer"]; echo "</td>";
	            					echo "<td>"; echo $row["exam_time"]; echo "</td>";
	            					echo "</tr>";
            					}

            					echo "</table>";
            				}

            			?>
            		</div>
            	</div>
            </div>
        </div>
        <!-- main content area end -->
        <?php include 'include/footer.php';?>
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