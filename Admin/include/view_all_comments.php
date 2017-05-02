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
		
			$qr = $conn->query("SELECT * FROM comments");

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
					echo "<td><a href='comments.php?approve={$comment_id}'>Approve</a></td>";
					echo "<td><a href='comments.php?unapprove={$comment_id}'>Unapprove</a></td>";
					echo "<td><a href='comments.php?delete={$comment_id}'>Delete</a></td>";
					
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

			header("Location:comments.php");

		}


	?>

	<?php

		if(isset($_GET['unapprove'])){

			$the_comment_id = $_GET['unapprove'];
					
			$query1 = $conn->query("UPDATE comments SET comment_status = 'Unapprove' WHERE comment_id = {$the_comment_id}");

			confirmQuery($query1);

			header("Location:comments.php");

		}


	?>


	<?php

		if(isset($_GET['delete'])){

			$the_comment = $_GET['delete'];
					
			$ft = $conn->query("DELETE FROM comments WHERE comment_id = {$the_comment}");

			confirmQuery($ft);

			header("Location:comments.php");

		}


	?>




		


