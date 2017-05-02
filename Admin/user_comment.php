<?php include "../include/config.php"; ?>
<?php include "include/header.php"; ?>
 <?php ob_start(); ?>    <!--Warning: Cannot modify header information - headers already sent by (output started at C:\xampp\htdocs\CMS\Admin\include\navigation-admin.php:83) in C:\xampp\htdocs\CMS\Admin\user_comment.php on line 174  (Without this <ob_start()> error will happen) -->


	<?php include "include/navigation-admin.php"; ?>

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


	if (isset($_POST['checkBoxArray'])) {

		foreach ( $_POST['checkBoxArray'] as $postValueId) {
			
			  $bulk_options = $_POST['bulk_options'];
			
			switch ($bulk_options) {
				
				case 'approve':

				$apv = $conn->query("UPDATE comments SET comment_status = '$bulk_options' WHERE comment_id = {$postValueId}");

					confirmQuery($apv);

					break;


				case 'unapprove':

				$unapv = $conn->query("UPDATE comments SET comment_status = '$bulk_options' WHERE comment_id = {$postValueId}");

					confirmQuery($unapv);

					break;


				case 'delete':

				$del = $conn->query("DELETE FROM comments WHERE comment_id = '$postValueId'");

					confirmQuery($del);

					break;
				
				default:
					# code...
					break;
			}	
		}
	}


	?>


<form action="" method="post">

	<table class="table table-bordered table-hover">

		<div id="BulkOptionCounter" class="col-xs-4 pull-left">
			<select class="form-control" id="" name="bulk_options">

				<option value="">Select Option</option>
				<option value="approve">Approve</option>
				<option value="unapprove">Unapprove</option>
				<option value="delete">Delete</option>
			</select>	
		</div>


		<div class="col-xs-4">
			<input type="submit" name="submit" class="btn btn-success" value="Apply">
		</div>

			<thead>
				<tr>
					<th><input type="checkBox" id="SelectAllBox"></th>
					<th>ID</th>
					<th>Author</th>
					<th>Comment</th>
					<th>Email</th>
					<th>Status</th>
					<th>In Response to</th>
					<th>Date</th>
					<th>Approve</th>
					<th>Unapprove</th>
					<th>Delete</th>
				</tr>
			</thead>

		<tbody>
			<?php
		
			$qr = $conn->query("SELECT * FROM comments WHERE comment_post_id=".$_GET['id']."");

				while ($row = $qr->fetch(PDO::FETCH_ASSOC)) {

					$comment_id = $row['comment_id'];
					$comment_post_id = $row['comment_post_id'];
					$comment_author = $row['comment_author'];
					$comment_email = $row['comment_email'];
					$comment_status = $row['comment_status'];
					$comment_date = $row['comment_date'];
					$comment_content = $row['comment_content'];
				
					echo "<tr>";
					?>

					<td><input type='checkBox' class='checkBoxs' name='checkBoxArray[]' value=' <?php echo $comment_id ?>'></td>
<?php
					echo "<td>{$comment_id}</td>";
					echo "<td>{$comment_author}</td>";
					echo "<td>{$comment_content}</td>";
					echo "<td>{$comment_email}</td>";
					
			
					echo "<td>{$comment_status}</td>";
					

				$qre = $conn->query("SELECT * FROM posts WHERE post_id = '{$comment_post_id}'");

				while ($row = $qre->fetch(PDO::FETCH_ASSOC)) {
						
						$post_id = $row['post_id'];
						$post_title = $row['post_title'];

						echo "<td><a href='../post.php?p_id=$post_id'>{$post_title}</a></td>";  //In responce to	

					}

					echo "<td>{$comment_date}</td>";
					echo "<td><a href='user_comment.php?approve=$comment_id&id=".$_GET['id']."'>Approve</a></td>";
					echo "<td><a href='user_comment.php?unapprove=$comment_id&id=".$_GET['id']."'>Unapprove</a></td>";
					echo "<td><a href='user_comment.php?delete=$comment_id&id=".$_GET['id']."'>Delete</a></td>";
					
					echo "</tr>"; 
					
				}

			?>

		</tbody>
	</table>

	<?php

		if(isset($_GET['approve'])){

			$the_comment_id = $_GET['approve'];
					
			$query2 = $conn->query("UPDATE comments SET comment_status = 'Approve' WHERE comment_id = {$the_comment_id}");

			confirmQuery($query2);

			header("Location:user_comment.php?id=".$_GET['id']."");

		}


	?>

	<?php

		if(isset($_GET['unapprove'])){

			$the_comment_id = $_GET['unapprove'];
					
			$query1 = $conn->query("UPDATE comments SET comment_status = 'Unapprove' WHERE comment_id = {$the_comment_id}");

			confirmQuery($query1);

			header("Location:user_comment.php?id=".$_GET['id']."");

		}


	?>


	<?php

		if(isset($_GET['delete'])){

			$the_comment = $_GET['delete'];
					
			$ft = $conn->query("DELETE FROM comments WHERE comment_id = {$the_comment}");

			confirmQuery($ft);

			header("Location:user_comment.php");

		}


	?>


	</form>



	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
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



	


