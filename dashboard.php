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
                                	<div class="row">
                                		<div class="col-lg-2 col-lg-push-10">
                                			<div id="current_que" style="float: left;">0</div>
                                			<div style="float: left;">/</div>
                                			<div id="total_que" style="float: left;">0</div>
                                		</div>

                                		<div class="row" style="margin-top: 30px">
                                			<div class="row">
                                				<div class="col-lg-10 col-lg-push-1" style="min-height: 300px;" id="load_questions">
                                			</div>
                                		</div>
                                	</div>
                                	<div class="row">
                                		<div class="col-12 col-lg-push-3" style="min-height: 50px;">
                                			<div class="row" style="margin-left: 20px;">
                                				<input type="button" class="btn btn-warning" value="Previous" onclick="load_previous();">&nbsp;
                                				<input type="button" class="btn btn-success" value="Next" onclick="load_next();">
                                			</div>
                                		</div>
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
    	function load_total_que()
    	{
    		var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange=function(){
				if(xmlhttp.readyState==4 && xmlhttp.status==200)
				{
					document.getElementById("total_que").innerHTML=xmlhttp.responseText;
				}
			};
			xmlhttp.open("GET","forajax/load_total_que.php",true);
			xmlhttp.send(null);
    	}
    	var questionno = "1";
    	load_questions(questionno);
    	function load_questions(questionno)
    	{
    		document.getElementById("current_que").innerHTML=questionno;
    		var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange=function(){
				if(xmlhttp.readyState==4 && xmlhttp.status==200)
				{
					if(xmlhttp.responseText=="over")
					{
						window.location="result.php";
					}
					else
					{
						document.getElementById("load_questions").innerHTML=xmlhttp.responseText;
						load_total_que();
					}
				}
			};
			xmlhttp.open("GET","forajax/load_questions.php?questionno="+ questionno,true);
			xmlhttp.send(null);
    	}

    	function load_previous()
    	{
    		if(questionno=="1")
    		{
    			load_questions(questionno);
    		}
    		else
    		{
    			questionno= eval(questionno)-1;
    			load_questions(questionno);
    		}

    	}
    	function load_next()
    	{
    		questionno= eval(questionno)+1;
    			load_questions(questionno);
    	}

    	function radioclick(radiovalue, questionno){
    		var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange=function(){
				if(xmlhttp.readyState==4 && xmlhttp.status==200)
				{
					
				}
			};
			xmlhttp.open("GET","forajax/save_answer_in_session.php?questionno="+ questionno +"&value1="+radiovalue,true);
			xmlhttp.send(null);
    	}
    </script>
    
</body>

</html>

