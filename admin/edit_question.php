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
		$id = $_GET["id"];
		$exam_category = '';
		$res = mysqli_query($link,"SELECT * FROM exam_category WHERE id = $id") ;
		while ($row=mysqli_fetch_array($res)) 
	    {
	    	$exam_category = $row["category"];
	    	$exam_time = $row["exam_time_in_minutes"];
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
	                            <h4 class="header-title">Add Question With Text</h4>
	                            <form action="" method="post">
	                                <div class="form-group">
	                                    <label for="exampleInputEmail1">Question Title</label>
	                                    <input type="text" class="form-control" id="exampleInputEmail1" name="question" aria-describedby="emailHelp" placeholder="Enter Title">
	                                </div>
	                                <div class="form-group">
	                                    <label for="exampleInputEmail1">Add First Option</label>
	                                    <input type="text" class="form-control" id="exampleInputEmail1" name="opt1" aria-describedby="emailHelp" placeholder="Enter First Option">
	                                </div>
	                                <div class="form-group">
	                                    <label for="exampleInputEmail1">Add Second Option</label>
	                                    <input type="text" class="form-control" id="exampleInputEmail1" name="opt2" aria-describedby="emailHelp" placeholder="Enter Second Option">
	                                </div>
	                                <div class="form-group">
	                                    <label for="exampleInputEmail1">Add Third Option</label>
	                                    <input type="text" class="form-control" id="exampleInputEmail1" name="opt3" aria-describedby="emailHelp" placeholder="Enter Third Option">
	                                </div>
	                                <div class="form-group">
	                                    <label for="exampleInputEmail1">Add Forth Option</label>
	                                    <input type="text" class="form-control" id="exampleInputEmail1" name="opt4" aria-describedby="emailHelp" placeholder="Enter Forth Option">
	                                </div>
	                                <div class="form-group">
	                                    <label for="exampleInputEmail1">Add answer</label>
	                                    <input type="text" class="form-control" id="exampleInputEmail1" name="answer" aria-describedby="emailHelp" placeholder="Enter Answer">
	                                </div>
	                                <button type="submit" name="submit1" class="btn btn-primary mt-4 pr-4 pl-4">Submit</button>
	                            </form>
	                        </div>
	                    </div>
	                </div>
	                <!-- basic form end -->

	                <!-- basic form start -->
	                <div class="col-lg-6 mt-5">
	                    <div class="card">
	                        <div class="card-body">
	                            <h4 class="header-title">Add Question With Image</h4>
	                            <form action="" method="post" enctype="multipart/form-data">
	                                <div class="form-group">
	                                    <label for="exampleInputEmail1">Question Image</label>
	                                    <input type="file" class="form-control" id="exampleInputEmail1" name="fquestion" aria-describedby="emailHelp" placeholder="Enter Title">
	                                </div>
	                                 <div class="form-group">
	                                    <label for="exampleInputEmail1">Question Title</label>
	                                    <input type="text" class="form-control" id="exampleInputEmail1" name="question" aria-describedby="emailHelp" placeholder="Enter Title">
	                                </div>
	                                <div class="form-group">
	                                    <label for="exampleInputEmail1">Add First Option</label>
	                                    <input type="text" class="form-control" id="exampleInputEmail1" name="opt1" aria-describedby="emailHelp" placeholder="Enter First Option">
	                                </div>
	                                <div class="form-group">
	                                    <label for="exampleInputEmail1">Add Second Option</label>
	                                    <input type="text" class="form-control" id="exampleInputEmail1" name="opt2" aria-describedby="emailHelp" placeholder="Enter Second Option">
	                                </div>
	                                <div class="form-group">
	                                    <label for="exampleInputEmail1">Add Third Option</label>
	                                    <input type="text" class="form-control" id="exampleInputEmail1" name="opt3" aria-describedby="emailHelp" placeholder="Enter Third Option">
	                                </div>
	                                <div class="form-group">
	                                    <label for="exampleInputEmail1">Add Forth Option</label>
	                                    <input type="text" class="form-control" id="exampleInputEmail1" name="opt4" aria-describedby="emailHelp" placeholder="Enter Forth Option">
	                                </div>
	                                <div class="form-group">
	                                    <label for="exampleInputEmail1">Add answer</label>
	                                    <input type="text" class="form-control" id="exampleInputEmail1" name="answer" aria-describedby="emailHelp" placeholder="Enter Answer">
	                                </div>
	                                <button type="submit" name="submit2" class="btn btn-primary mt-4 pr-4 pl-4">Submit</button>
	                            </form>
	                        </div>
	                    </div>
	                </div>
	                <!-- basic form end -->
            	</div>

            	<div class="row">
            		<div class="col-12 mt-5">
            			<div class="card">
	                        <div class="card-body">
	                            <h4 class="header-title">All Question</h4>
	                            <div class="single-table">
	                                <div class="table-responsive">
	                                    <table class="table text-center">
	                                        <thead class="text-uppercase bg-dark">
	                                            <tr class="text-white">
	                                                <th scope="col">No</th>
	                                                <th scope="col">Question Image</th>
	                                                <th scope="col">Question Title</th>
	                                                <th scope="col">First Option</th>
	                                                <th scope="col">Second Option</th>
	                                                <th scope="col">Third Option</th>
	                                                <th scope="col">Forth Option</th>
	                                                <th scope="col">Delete</th>
	                                            </tr>
	                                        </thead>

	                                        <tbody>
	                                       	<?php
	                                        $res = mysqli_query($link, "SELECT * FROM questions WHERE category='$exam_category' order by  question_no asc");
	                                        while ($row=mysqli_fetch_array($res)) 
	                                        {
	                                        	?>
	                                        	<tr>
	                                                <th scope="row"><?php echo $row["question_no"]; ?></th>
	                                                <?php 
	                                                if(strpos($row["fquestion"], "questions_img/")!== false)
	                                                {
	                                                 ?>
	                                                 <td><img height="50" width="50" src="<?php $row["fquestion"]?>"></td>
	                                                 <?php
	                                                }
	                                                else
	                                                {
	                                                	?>
	                                                	<td><?php echo "----"; ?>
	                                                	<?php
	                                                }
	                                                ?>
	                                                <td><?php echo $row["question"]; ?></td>
	                                                <td><?php echo $row["opt1"]; ?></td>
	                                                <td><?php echo $row["opt2"]; ?></td>
	                                                <td><?php echo $row["opt3"]; ?></td>
	                                                <td><?php echo $row["opt4"]; ?></td>
	                                                <td><a href="delete_question.php?id=<?php echo $row["id"]; ?>">DELETE</a></td>
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
<?php
	if(isset($_POST["submit1"]))
	{
		$loop = 0;
		$count = 0;
		$res = mysqli_query($link,"SELECT * FROM questions WHERE category='$exam_category' order by id asc")or die(mysqli_error($link));

		$count = mysqli_num_rows($res);
		if($count == 0)
		{

		}
		else{
			while ($row=mysqli_fetch_array($res)) 
		    {
		    	$loop = $loop+1;
		    	mysqli_query($link,"UPDATE questions set question_no='$loop' WHERE id=$row[id]");
			}
		}

		$loop=$loop+1;
		mysqli_query($link,"INSERT INTO questions VALUES(NULL,'$loop','$_POST[question]','$_POST[opt1]','$_POST[opt2]','$_POST[opt3]','$_POST[opt4]','$_POST[answer]','$exam_category')") or die(mysqli_error($link));
		?>
		<script type="text/javascript">
			alert("Question Added Successfully.");
			window.location.href=window.location.href;
		</script>
		<?php
	}
?>

<?php
	if(isset($_POST["submit2"]))
	{
		$loop = 0;
		$count = 0;
		$res = mysqli_query($link,"SELECT * FROM questions WHERE category='$exam_category' order by id asc")or die(mysqli_error($link));

		$count = mysqli_num_rows($res);
		if($count == 0)
		{

		}
		else{
			while ($row=mysqli_fetch_array($res)) 
		    {
		    	$loop = $loop+1;
		    	mysqli_query($link,"UPDATE questions set question_no='$loop' WHERE id=$row[id]");
			}
		}

		$loop=$loop+1;
		$tm = md5(time());
		$fque = $_FILES["fquestion"]["name"];
		$dst1="./questions_img/".$fque;
		$dst_db ="questions_img/".$fque;
		move_uploaded_file($_FILES["fquestion"], ["tmp_name"],$dst1);
		mysqli_query($link,"INSERT INTO questions VALUES(NULL,'$loop','$dst_db','$_POST[question]','$_POST[opt1]','$_POST[opt2]','$_POST[opt3]','$_POST[opt4]','$_POST[answer]','$exam_category')") or die(mysqli_error($link));
		?>
		<script type="text/javascript">
			alert("Question Added Successfully.");
			window.location.href=window.location.href;
		</script>
		<?php
	}
?>