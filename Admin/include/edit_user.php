<?php

	if(isset($_GET['id'])){

		$the_user_id = $_GET['id']; 

	}


		$qr = $conn->query("SELECT * FROM user WHERE user_id = {$the_user_id}");

		while ($row = $qr->fetch(PDO::FETCH_ASSOC)) {

			$user_firstname = $row['user_firstname'];
			$user_lastname = $row['user_lastname'];
			$user_password = $row['user_password'];
			$username = $row['username'];
			$user_role = $row['user_role'];
			$user_email = $row['user_email'];
			//$user_salt = $row['randSalt'];


		}

		confirmQuery($qr);

		//$view_crypt_pass = crypt($user_password, $user_salt);


	if(isset($_POST['update-user'])){

		$user_firstname = $_POST['user_firstname'];
		$user_lastname = $_POST['user_lastname'];
		$user_password = $_POST['user_password'];
		$username = $_POST['user_name'];
		$user_role = $_POST['user-option'];
		$user_email = $_POST['user_email'];


		// move_uploaded_file($post_temp_image, "../image/{$post_image}");

		// if(empty($post_image)){

		// 	$qr = $conn->query("SELECT * FROM posts WHERE post_id= '{$the_post_id}'");
		// 	confirmQuery($qr);

		// 	while ($row = $qr->fetch(PDO::FETCH_ASSOC)) {

		// 		$post_image = $row['post_image'];
				
		// 	}
			
		// }


		$qry = $conn->query("SELECT randSalt FROM user");

		$row = $qry->fetch();
		$salt = $row['randSalt'];

		$crypt_pass = crypt($user_password, $salt);



		$qr = $conn->query("UPDATE user SET 
			username ='{$username}',
		 	user_password ='{$crypt_pass}', 
		 	user_firstname ='{$user_firstname}',  
		 	user_lastname ='{$user_lastname}', 
		 	user_email ='{$user_email}', 
		 	user_role ='{$user_role}' WHERE user_id = {$the_user_id}");

			confirmQuery($qr);



		 echo "<p class='bg-success'>Profile Updated. <a href='Admin/user.php'>View All user</a></p>";

			
	}

?>


<form action="" method="POST" enctype="multipart/form-data" >
	<div class="form-group">
		<label for="post_author">First Name</label>
		<input type="text" name="user_firstname" class="form-control" value="<?php echo $user_firstname; ?>" placeholder="First name" required>
	</div>

	<div class="form-group">
		<label for="post_status">Last Name</label>
		<input type="text" name="user_lastname" class="form-control" value="<?php echo $user_lastname; ?>" placeholder="Last name" required>
	</div>

	<div class="form-group">
		<select name="user-option">
			<option value='subscriber'><?php echo $user_role; ?></option>";
			<?php

			if($user_role == 'Admin'){

				echo "<option value='subscriber'>Subscriber</option>";

			}else{

				echo "<option value='Admin'>Admin</option>";

			}

			?>

				
		</select>

	</div>

		<div class="form-group">
		<label for="post_tag">User Name </label>
		<input type="text" name="user_name" class="form-control" value="<?php echo $username;?>" placeholder="User name" required>
	</div>


	<div class="form-group">
		<label for="post_tag">Email Address </label>
		<input type="Email" name="user_email" class="form-control" value="<?php echo $user_email; ?>" placeholder="Email Address" required>
	</div>

	<div class="form-group">
		<label for="post_content">Password </label>
		<input type="Password" name="user_password" value="<?php echo $user_password; ?>" class="form-control" required></input>
	</div>

	<div class="form-group">
		<input type="submit" name="update-user" value="Update User" class="btn btn-primary">
	</div>

</form>