
<?php

	if (isset($_POST['submit-post'])) {

		$post_catagory_id = $_POST['category-option']; //it is not a string cause it carring cat_id
		$post_title = $_POST['titel'];
		$post_author = $_POST['post_author_option'];
		$post_status = $_POST['post_status'];
		
		$post_image = $_FILES['post_image']['name'];
		$post_temp_image = $_FILES['post_image']['tmp_name'];

		$post_content = $_POST['post_content'];
		$post_tags = $_POST['post_tag'];
		$post_date = date('d-m-y');
		//$post_comment_count = 4;

		move_uploaded_file($post_temp_image, "../image/{$post_image}");

		$qr = $conn->query("INSERT INTO posts(post_catagory_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_status) VALUES({$post_catagory_id},'{$post_title}','{$post_author}',now(),'{$post_image}','{$post_content}','{$post_tags}','{$post_status}')");

		confirmQuery($qr);

		$the_post_id = $conn->lastInsertId();


		echo "<p class='bg-success'>Post Created. <a href='../post.php?p_id={$the_post_id}'>View Post</a> or <a href='./posts.php'>Edit More Posts</a></p>";

					
	}

?>


<form action="" method="POST" enctype="multipart/form-data" >

	<div class="form-group">
		<label for="titel">Post Titel</label>
		<input type="text" name="titel" class="form-control" placeholder="Titel name" required>
	</div>

	<div class="form-group">
	<label for="titel">Post Category </label>
		<select name="category-option">

		<?php
			// $c_id = $_GET['id'];

			$qr = $conn->query("SELECT * FROM catagory ");
			while ($row = $qr->fetch(PDO::FETCH_ASSOC)) {

				$cat_id = $row['cat_id'];
				$cat_title = $row['cat_title'];

				echo "<option value='{$cat_id}'>{$cat_title}</option>";

			}
		?>
			
		</select>

	</div>

	<div class="form-group">
		<label for="post_author">Post author </label>
			<select name="post_author_option">

			<?php
				$qr = $conn->query("SELECT * FROM user");
				while ($row = $qr->fetch(PDO::FETCH_ASSOC)) {

					$user_name = $row['username'];

					echo "<option value='{$user_name}'>{$user_name}</option>";

				}
			?>
				
			</select>
	</div>

	

	<div class="form-group">
		<select name="post_status">
			<option value="">post status</option>
			<option value="published">Published</option>
			<option value="draft">Draft</option>
		</select>
	</div>



		<div class="form-group">
		<label for="post_image">Post Image</label>
		<input type="file" name="post_image" class="form-control" required>
	</div>

	<div class="form-group">
		<label for="post_tag">Post Tags </label>
		<input type="text" name="post_tag" class="form-control" placeholder="eg.your name" required>
	</div>

	<div class="form-group">
		<label for="post_content">Post Content </label>
		<textarea type="text" name="post_content" class="form-control" cols="3" rows="5" required>
		</textarea>
	</div>

	<div class="form-group">
		<input type="submit" name="submit-post" value="Post Submit" class="btn btn-primary">
	</div>

</form>