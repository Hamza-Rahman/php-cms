
<?php

	if (isset($_POST['create-user'])) {

		//$user_id = $_POST['user_id']; //it is not a string
		$user_name = $_POST['user_name'];
		$user_firstname = $_POST['user_firstname'];
		$user_lastname = $_POST['user_lastname'];
		$user_pass = $_POST['user_pass'];
		
		// $post_image = $_FILES['post_image']['name'];
		// $post_temp_image = $_FILES['post_image']['tmp_name'];

		$user_email = $_POST['user_email'];
		$user_role = $_POST['user_role'];
		// $post_date = date('d-m-y');
		//$post_comment_count = 4;

		//move_uploaded_file($post_temp_image, "../image/{$post_image}");

		$qr = $conn->query("INSERT INTO user( username, user_firstname, user_lastname, user_password,  user_email, user_role) VALUES( '{$user_name}', '{$user_firstname}', '{$user_lastname}','{$user_pass}', '{$user_email}','{$user_role}')");

		confirmQuery($qr);

		header("Location:user.php");
					
	}

?>


<form action="" method="POST" enctype="multipart/form-data" >

	<div class="form-group">
		<label for="post_author">First Name</label>
		<input type="text" name="user_firstname" class="form-control" placeholder="First name" required>
	</div>

	<div class="form-group">
		<label for="post_status">Last Name</label>
		<input type="text" name="user_lastname" class="form-control" placeholder="Last name" required>
	</div>

	<div class="form-group">
		<select name="user_role">
			<option >Select option</option>
			<option value="Subscriber">Subscriber</option>
			<option value="Admin">Admin</option>
		</select>

	</div>

		<div class="form-group">
		<label for="post_tag">User Name </label>
		<input type="text" name="user_name" class="form-control" placeholder="User name" required>
	</div>


	<div class="form-group">
		<label for="post_tag">Email Address </label>
		<input type="Email" name="user_email" class="form-control" placeholder="Email Address" required>
	</div>

	<div class="form-group">
		<label for="post_content">Password </label>
		<input type="Password" name="user_pass" class="form-control" required></input>
	</div>

	<div class="form-group">
		<input type="submit" name="create-user" value="Add User" class="btn btn-primary">
	</div>

</form>