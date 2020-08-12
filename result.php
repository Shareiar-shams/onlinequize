<?php
// Initialize the session
session_start();
 require_once "config.php";

 $date = date("Y-m-d H:i:s");
 $_SESSION["end_time"]=date("Y-m-d H:i:s",strtotime($date."+ $_SESSION[exam_time] minutes"));
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
            	<div class="card-area">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 mt-5">
                            <div class="card card-bordered">
                                
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mt-5">
                            <div class="card card-bordered">
                                <img class="card-img-top img-fluid" src="assets/images/download.jpg" alt="image">
                                <div class="card-body">
                                    <div class="row">
                                		<div class="col-lg-6 col-lg-push-3">
                                			<?php
                                			$correct = 0;
                                			$wrong =0;
                                			if(isset($_SESSION["answer"]))
                                			{
                                				for($i =1;$i<=sizeof($_SESSION["answer"]);$i++)
                                				{
                                					$answer = "";
                                					$res = mysqli_query($link,"select * from questions where category='$_SESSION[exam_category]' && questions_no=$i");
                                					while ($row=mysqli_fetch_array($res)) {
                                						$answer = $row["answer"];
                                					}
                                					if(isset($_SESSION["answer"][$i]))
                                					{
                                						if($answer == $_SESSION["answer"][$i])
                                						{
                                							$correct = $correct+1;
                                						}
                                						else
                                						{
                                							$wrong = $wrong+1;
                                						}
                                					}
                                					else
                                					{
                                						$wrong = $wrong+1;
                                					}
                                				}
                                			}
                                			$count =0;
                                			$res=mysqli_query($link,"select * from questions where category='$_SESSION[exam_category]'");
                                			$count = mysqli_num_rows($res);
                                			$wrong = $count-$correct;
                                			echo "<br>"; echo "<br>";
                                			echo "<center>";
                                			echo "Total Questions=".$count;
                                			echo "<br>";
                                			echo "Correct Answer=".$correct;
                                			echo "<br>";
                                			echo "Wrong Answer=".$wrong;
                                			echo "<br>";

                                			echo "</center>";
                                			?>
                                		</div>
                                	</div>

                                	<?php
                                	if(isset($_SESSION["exam_start"]))
                                	{
                                		$date=date("Y-m-d");
                                		$res = mysqli_query($link, "insert into exam_result(id,username,exam_type, total_question, correct_answer, wrong_answer,exam_time)values(NULL,'$_SESSION[username]','$_SESSION[exam_category]','$count','$correct','$wrong','$date')");
                                	} 
                                	if(isset($_SESSION["exam_start"]))
                                	{
                                		unset($_SESSION["exam_start"]);
                                		?>
                                		<script type="text/javascript">
                                			window.location.href=window.location.href;
                                		</script>
                                		<?php
                                	}
                                	?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mt-5">
                            <div class="card card-bordered">
                                
                            </div>
                        </div>
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