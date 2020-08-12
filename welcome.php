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
                                    <h5 class="title text-center">Quize Test</h5>
                                    
                                    <div class="table-responsive">
	                                    <table class="dbkit-table">
	                                        <tbody>
	                                        	<?php
	                                        		$res = mysqli_query($link,"SELECT * FROM exam_category") ;
													while ($row=mysqli_fetch_array($res)) 
												    {
												    	?>
												    	<tr class="heading-td">
			                                                <td><input type="button" class="btn btn-success form-control" value="<?php echo $row["category"]; ?>" onclick="set_exam_type_session(this.value);"></td>
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
    <script type="text/javascript">
	function set_exam_type_session(exam_category)
	{
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange=function(){
			if(xmlhttp.readyState==4 && xmlhttp.status==200)
			{
				alert(xmlhttp.responseText);
				window.location="dashboard.php";
			}
		};
		xmlhttp.open("GET","forajax/set_exam_type_session.php?exam_category="+ exam_category,true);
		xmlhttp.send(null);
	}
</script>
</body>

</html>