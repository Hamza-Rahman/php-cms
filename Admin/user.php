<?php include "../include/config.php"; ?>
<?php include "include/header.php"; ?>
<?php ob_start();   //important ?>

<body>

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
				<h1 class="page-header">WELCOME TO ADMIN PANEL</h1>
			</div>
		</div><!--/.row-->


		<?php

		if(isset($_GET['source'])){

			$source = $_GET['source'];


		}else{

			$source = '';
		}
		switch ($source) {
			
			case 'add_new_user':
				include "include/add_new_user.php";
				break;

			case 'edit':
				include "include/edit_user.php";
				break;

			case '40':
				echo "hello 40";
				break;
			
			default:
				
				include "include/view_all_user.php";
				break;
		}



		?>

	</div>


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
	</script>	
</body>

</html>
