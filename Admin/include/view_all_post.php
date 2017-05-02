<?php

if (isset($_POST['checkBoxArray'])) {

	foreach ( $_POST['checkBoxArray'] as $postValueId) {
		
		  $bulk_options = $_POST['bulk_options'];
		
		switch ($bulk_options) {
			
			case 'published':

			$publish = $conn->query("UPDATE posts SET post_status = '$bulk_options' WHERE post_id = {$postValueId}");

				confirmQuery($publish);

				break;


			case 'draft':

			$draft = $conn->query("UPDATE posts SET post_status = '$bulk_options' WHERE post_id = {$postValueId}");

				confirmQuery($draft);

				break;


			case 'delete':

			$del = $conn->query("DELETE FROM posts WHERE post_id = '$postValueId'");

				confirmQuery($del);

				break;



			case 'clone':

				$qr = $conn->query("SELECT * FROM posts WHERE post_id = '$postValueId'");

				while ($row = $qr->fetch(PDO::FETCH_ASSOC)) {

					$post_catagory_id = $row['post_catagory_id']; //it is not a string
					$post_title = $row['post_title'];
					$post_author = $row['post_author'];
					$post_status = $row['post_status'];
					$post_image = $row['post_image'];
					$post_content = $row['post_content'];
					$post_tags = $row['post_tags'];
					$post_date = $row['post_date'];
					//$post_comment_count = 4;
				}
					$qr = $conn->query("INSERT INTO posts(post_catagory_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_status) VALUES({$post_catagory_id},'{$post_title}','{$post_author}',now(),'{$post_image}','{$post_content}','{$post_tags}','{$post_status}')");

					confirmQuery($qr);

				break;
			
			default:
				# code...
				break;
		}
		
	}
	

}



?>
<body>
<form class="" method="post">
	
	<table class="table table-bordered table-hover">

		<div id="BulkOptionCounter" class="col-xs-4 pull-left">
			<select class="form-control" id="" name="bulk_options">

				<option value="">Select Option</option>
				<option value="draft">Draft</option>
				<option value="published">Published</option>
				<option value="delete">Delete</option>
				<option value="clone">Clone</option>

			</select>	
		</div>

		<div class="col-xs-4">
			<input type="submit" name="submit" class="btn btn-success" value="Apply">
			<a href="posts.php?source=add_new_posts" class="btn btn-primary">Add new</a>
		</div>


			<thead>
				<tr>
					<th><input type="checkBox" id="SelectAllBox"></th>
					<th>ID</th>
					<th>Author</th>
					<th>Titel</th>
					<th>Category</th>
					<th>Status</th>
					<th>Image</th>
					<th>Tag</th>
					<th>Comments</th>
					<th>Dates</th>
					<th>View Post</th>
					<th>Delete</th>
					<th>Edit</th>
					<th>Views</th>
				</tr>
			</thead>
		<tbody>
			<?php
				//echo "<tr>"

				$qr = $conn->query("SELECT * FROM posts");

				while ($row = $qr->fetch(PDO::FETCH_ASSOC)) {

					$post_id = $row['post_id'];
					$post_catagory_id = $row['post_catagory_id'];
					$post_title = $row['post_title'];
					$post_author = $row['post_author'];
					$post_date = $row['post_date'];
					$post_image = $row['post_image'];
					$post_content = $row['post_content'];
					$post_tags = $row['post_tags'];
					$post_comment_count = $row['post_comment_count'];
					$post_status = $row['post_status'];
					$post_views = $row['post_views_count'];

					echo "<tr>";
			?>		

					<td><input type='checkBox' class='checkBoxs' name='checkBoxArray[]' value=' <?php echo $post_id ?>'></td>
			<?php		
					echo "<td>{$post_id}</td>";
					echo "<td>{$post_author}</td>";
					echo "<td>{$post_title}</td>";
					

					// something error happen myself in this line same name...	

				$qre = $conn->query("SELECT * FROM catagory WHERE cat_id ={$post_catagory_id}");
					while ($row = $qre->fetch(PDO::FETCH_ASSOC)) {

						$cat_id = $row['cat_id'];
						$cat_title = $row['cat_title'];

							 echo "<td>{$cat_title}</td>";
						//echo $cat_title;

						}

					//echo "<td>{$post_catagory_id}</td>";
					echo "<td>{$post_status}</td>";
					echo "<td><img width='100' hieght='40' src='../image/{$post_image}'></td>";
					echo "<td>{$post_tags}</td>";

			$query = $conn->query("SELECT * FROM comments WHERE comment_post_id = {$post_id}");
			$comment_count = $query->rowCount();
			$row = $query->fetch(PDO::FETCH_ASSOC);
			$comment_id = $row['comment_id'];


				echo "<td><a href='user_comment.php?id=$post_id'>{$comment_count}</a></td>";

					echo "<td>{$post_date}</td>";
					echo "<td><a href='../post.php?p_id={$post_id}'>view Post</a></td>";
					echo "<td><a onClick=\" javascript: return confirm('Are you sure want to delete ?'); \" href='posts.php?delete={$post_id}'>Delete</a></td>";
					echo "<td><a href='posts.php?source=edit&id={$post_id}'>Edit</a></td>";
					echo "<td><a onClick=\" javascript: return confirm('Are you sure want to reset All ?')\" href='posts.php?reset={$post_id}'>{$post_views}</a></td>";			
					echo "</tr>"; 
					
				}

			?>

		</tbody>
	</table>


	<?php

		if(isset($_GET['delete'])){

			$the_post_id = $_GET['delete'];
					
			$ft = $conn->query("DELETE FROM posts WHERE post_id = {$the_post_id} ");

			confirmQuery($ft);

			header("Location:posts.php");

		}


		if(isset($_GET['reset'])){

			$the_post_id = $_GET['reset'];
					
			$ft = $conn->query("UPDATE posts SET post_views_count = 0 WHERE post_id = {$the_post_id} ");

			confirmQuery($ft);

			header("Location:posts.php");

		}


	?>



		
</form>

</body>


