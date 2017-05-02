<?php include "../include/config.php"; ?>
<?php include "include/header.php"; ?>
<?php ob_start();?>

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




		<div class="col-xs-6">

			<?php
				if(isset($_GET['submit'])){

					$cat_name = $_GET['cat_title'];

					if($cat_name == " " || empty($cat_name)){

						echo "<span style='color:red';>Can not empty</span>";

					}else{

					$ft = $conn->query(" INSERT INTO catagory(cat_title) VALUE('{$cat_name}')");

					if(!$ft){

						echo "QUERRY PROBLEM".$ft->errorInfo();
						}
					}
				}
			?>

			<form action="" method="">
				<div class="form-group">
					<lebel><strong>Add Catagory</strong></lebel><br>
					<input type="text" name="cat_title" class="form-control" placeholder="Catagory name...">
				</div>
				<div class="form-group">
					<input type="submit" name="submit" class="btn btn-primary" value="Add catagory">
				</div>
			</form>
			
			<?php
				if(isset($_GET['edit'])){

					$cat_id = $_GET['edit'];

					include "include/upadate_categories.php";
				}

			?>			


		</div><!-- End of co-xs-6-->


		<div class="col-xs-6">

            <?php
            $ft = $conn->query("select * from catagory");

            ?>
			<table class="table table-bordered table-hover ">
				<thead>
					<tr>
						<th>ID</th>
						<th>Catagoris</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
			            while ( $row = $ft->fetch(PDO::FETCH_ASSOC)) {

			              $cat_id = $row['cat_id'];
			              $cat_list = $row['cat_title'];

			              echo "<tr>";
			              echo "<td>{$cat_id}</td>";
			              echo "<td>{$cat_list}</td>";
			             echo "<td><a href='catagory-admin.php?delete={$cat_id}'>Delete</a></td>";
			              echo "<td><a href='catagory-admin.php?edit={$cat_id}'>Edit</a></td>";
			              echo "</tr>";
			            }
					?>

					<?php

						// Delete oparation for catagory

						if(isset($_GET['delete'])){

						
							 $del_cat_id =$_GET['delete']; 

							$ft = $conn->query("DELETE FROM catagory WHERE cat_id={$del_cat_id}");
							
							if(!$ft){
								echo "ERROR IN Query".$ft->errorInfo();
							}
							header("Location:catagory-admin.php");

						}

					?>

				</tbody>
			</table>
			
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
