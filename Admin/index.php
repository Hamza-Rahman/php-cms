<?php include "../include/config.php"; ?>
<?php include "include/header.php"; ?>
<?php ob_start();?>



	<?php include "include/navigation-admin.php"; ?>

	<?php //include "include/temp.php"; ?>


	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Icons</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">
					Hello <?php echo $_SESSION['username']; ?> 
					<small><?php echo '('.$_SESSION['user_role'].')'; ?> </small>
				</h1>

				<h1><?php //echo $user_count; ?></h1>


			<div class="row">
				<div class="col-xs-12 col-md-6 col-lg-3">
					<div class="panel panel-blue panel-widget ">
						<div class="row no-padding">
							<a href="./posts.php">
								<div class="col-sm-3 col-lg-5 widget-left">
									<svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg>
								</div>
							</a>
							<div class="col-sm-9 col-lg-7 widget-right">
								
								<?php

									$qr = $conn->query("SELECT * FROM posts");

									$postCount = $qr->rowCount();

									echo "<div class='large'>{$postCount}</div>";

								?>

								<div class="text-muted">Total Post </div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-md-6 col-lg-3">
					<div class="panel panel-orange panel-widget">
						<div class="row no-padding">
							<a href="./comments.php">
								<div class="col-sm-3 col-lg-5 widget-left">
								<svg class="glyph stroked empty-message"><use xlink:href="#stroked-empty-message"></use></svg>
							</div>	
							</a>

							<div class="col-sm-9 col-lg-7 widget-right">

								<?php

									$qr = $conn->query("SELECT * FROM comments");

									$commentCount = $qr->rowCount();

									echo "<div class='large'>{$commentCount}</div>";

								?>

								<div class="text-muted">Comments</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-md-6 col-lg-3">
					<div class="panel panel-teal panel-widget">
						<div class="row no-padding">
							<a href="./user.php">
								<div class="col-sm-3 col-lg-5 widget-left">
								<svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>
							</div>
								
							</a>

							<div class="col-sm-9 col-lg-7 widget-right">
								<?php

									$qr = $conn->query("SELECT * FROM user");

									$userCount = $qr->rowCount();

									echo "<div class='large'>{$userCount}</div>";

								?>
								<div class="text-muted">Users</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-md-6 col-lg-3">
					<div class="panel panel-red panel-widget">
						<div class="row no-padding">
							<a href="./catagory-admin.php">
								<div class="col-sm-3 col-lg-5 widget-left">
									<svg class="glyph stroked app-window-with-content"><use xlink:href="#stroked-app-window-with-content"></use></svg>
								</div>	
							</a>
							<div class="col-sm-9 col-lg-7 widget-right">

								<?php

									$qr = $conn->query("SELECT * FROM catagory");

									$categoryCount = $qr->rowCount();

									echo "<div class='large'>{$categoryCount}</div>";

								?>
							
								<div class="text-muted">Categories</div>
							</div>
						</div>
					</div>
				</div>
			</div><!--/.row-->



		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Bar Chart online :<?php echo user_online(); ?></div>
					<div class="panel-body">
						<div class="canvas-wrapper">
							<canvas class="main-chart" id="bar-chart" height="200" width="600"></canvas>
						</div>
					</div>
				</div>
			</div>
		</div><!--/.row-->


		<?php

		$qr1 = $conn->query("SELECT * FROM posts WHERE post_status = 'draft'");
		$draftCount = $qr1->rowCount();

		$qr2 = $conn->query("SELECT * FROM comments WHERE comment_status = 'unapprove'");
		$unapproveCommentCount = $qr2->rowCount();

		$qr3 = $conn->query("SELECT * FROM user WHERE user_role = 'subscriber'");
		$userRoleCount = $qr3->rowCount();



		?>	


		<div class="row">
			<script type="text/javascript">

				var barChartData = {
						labels : ["Active Posts", "Draft posts", "Catagories", "Pending Commnets" , "User", "Comments","current online" ],
						datasets : [
							{
								fillColor : "rgba(48, 164, 255, 0.2)",
								strokeColor : "rgba(48, 164, 255, 0.8)",
								highlightFill : "rgba(48, 164, 255, 0.75)",
								highlightStroke : "rgba(48, 164, 255, 1)",
								data : [<?php echo $postCount; ?>, <?php echo $draftCount; ?>, <?php echo $categoryCount; ?>, <?php echo $unapproveCommentCount; ?>, <?php echo $userCount ;?>, <?php echo $commentCount; ?>, 2 ]
							}
						]
				
					}

			</script>
			 
		</div>	


			</div>
		</div><!--/.row-->
	

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script>
		$('#calendar').datepicker({
		});

		!function ($) {
		    $(document).on("click","ul.nav li.parent > a > span.icon", function(){          
		        $(this).find('em:first').toggleClass("glyphicon-minus");      
		    }); 
		    $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})

	
	window.onload = function(){

	var chart2 = document.getElementById("bar-chart").getContext("2d");
	window.myBar = new Chart(chart2).Bar(barChartData, {
		responsive : true
		});
	};

	</script>	
</body>

</html>
