<?php

	if(isset($_GET['id'])){

		$the_post_id = $_GET['id']; 

	}


		$qr = $conn->query("SELECT * FROM posts WHERE post_id = {$the_post_id}");

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

		}

		confirmQuery($qr);


	if(isset($_POST['update-post'])){

		$post_catagory_id = $_POST['category-option']; //it is not a string
		$post_title = $_POST['titel'];
		$post_author = $_POST['post_author_option'];
		$post_status = $_POST['post_status'];
		
		$post_image = $_FILES['post_image']['name'];
		$post_temp_image = $_FILES['post_image']['tmp_name'];

		$post_content = $_POST['post_content'];
		$post_tags = $_POST['post_tag'];
		$post_date = date('d-m-y');
		$post_comment_count = 4;

		move_uploaded_file($post_temp_image, "../image/{$post_image}");

		if(empty($post_image)){

			$qr = $conn->query("SELECT * FROM posts WHERE post_id= '{$the_post_id}'");
			confirmQuery($qr);

			while ($row = $qr->fetch(PDO::FETCH_ASSOC)) {

				$post_image = $row['post_image'];
				
			}
			
		}

		$qr = $conn->query("UPDATE posts SET 
			post_catagory_id ='{$post_catagory_id}',
		 	post_title ='{$post_title}', 
		 	post_author ='{$post_author}', 
		 	post_date = now(), 
		 	post_image ='{$post_image}', 
		 	post_content ='{$post_content}', 
		 	post_tags ='{$post_tags}', 
		 	post_comment_count = '{$post_comment_count}', 
		 	post_status ='{$post_status}' WHERE post_id = {$the_post_id}");

			confirmQuery($qr);



		echo "<p class='bg-success'>Post Updated. <a href='../post.php?p_id={$the_post_id}'>View Post</a> or <a href='./posts.php'>Edit More Posts</a></p>";

			//echo 'post';

	}

?>


<form action="" method="POST" enctype="multipart/form-data" >

	<div class="form-group">
		<label for="titel">Post Titel</label>
		<input type="text" name="titel" class="form-control" placeholder="Titel name" value="<?php echo $post_title;?>">
	</div>

	<div class="form-group">
		<select name="category-option">

		<?php
			$c_id = $_GET['id'];

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

<!-- 	<div class="form-group">
		<label for="post_status">Post Status </label>
		<input type="text" name="post_status" class="form-control" placeholder="Status" value="<?php echo $post_status; ?>">
	</div> -->



	<div class="form-group">
		<select name="post_status" id="">

			<option value='<?php echo $post_status; ?>'><?php echo $post_status; ?></option>
			
			<?php

			if( $post_status == 'published'){

				echo "<option value='draft'>Draft</option>";

			}else{
				echo "<option value='published'>Publish</option>";

			}

			?>
	
		</select>
	</div>




	<div class="form-group">
		<img width="100" src="../image/<?php echo $post_image; ?>">
		<input type="file" name="post_image" value="../image/<?php echo $post_image; ?>" class="form-control">
		
		
	</div>

	<div class="form-group">
		<label for="post_tag">Post Tags </label>
		<input type="text" name="post_tag" class="form-control" placeholder="eg.your name" value="<?php echo $post_tags; ?>">
	</div>

	<div class="form-group">
		<label for="post_content">Post Content </label>
		<textarea type="text" name="post_content" class="form-control" cols="3" rows="5"><?php echo $post_content;?></textarea>
	</div>

	<div class="form-group">
		<input type="submit" name="update-post" value="Update post" class="btn btn-primary">
	</div>

</form>