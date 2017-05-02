<?php include "../include/config.php"; ?>

<?php include "include/header.php"; ?>
<?php ob_start();   //important ?>


<body>
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
				<h1 class="page-header">WELCOME TO ADMIN PANEL </h1>

				<?php

				if(isset($_SESSION['username'])){

					$the_user_name = $_SESSION['username']; 

				}

					$qrs = $conn->query("SELECT * FROM user WHERE username = '{$the_user_name}'");

					while ($row = $qrs->fetch(PDO::FETCH_ASSOC)) {

						$user_id = $row['user_id'];
						$user_name = $row['username'];
						$user_firstname = $row['user_firstname'];
						$user_lastname = $row['user_lastname'];
						$user_email = $row['user_email'];
						$user_pass = $row['user_password'];
						$user_role = $row['user_role'];

					}

					confirmQuery($qrs);

					$pass = crypt($user_pass);


				if(isset($_POST['update-user'])){

					$user_firstname = $_POST['user_firstname'];
					$user_lastname = $_POST['user_lastname'];
					$user_password = $_POST['user_pass'];
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


					

					if($user_password == $user_pass){

						$qr = $conn->query("UPDATE user SET 
						username ='{$username}',
					 	user_firstname ='{$user_firstname}',  
					 	user_lastname ='{$user_lastname}', 
					 	user_email ='{$user_email}', 
					 	user_role ='{$user_role}' WHERE username = '{$the_user_name}'");

						confirmQuery($qr);


						echo "<p class='bg-success'>Profile Updated. </p>";
					


					}else{

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
					 	user_role ='{$user_role}' WHERE username = '{$the_user_name}'");

						confirmQuery($qr);


						echo "<p class='bg-success'>Profile Updated. </p>";
					

					}
	
				}

				?>


				<form action="" method="POST" enctype="multipart/form-data" >

					<div class="form-group">
						<label>First Name </label>
						<input type="text" name="user_firstname" class="form-control" value="<?php echo $user_firstname;?>" placeholder="First name" required>
					</div>	

					<div class="form-group">
						<label for="post_status">Last Name</label>
						<input type="text" name="user_lastname" class="form-control" value="<?php echo $user_lastname;?>" placeholder="Last name" required>
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
						<input type="text" name="user_name" class="form-control" value="<?php echo $user_name;?>" placeholder="User name" required>
					</div>


					<div class="form-group">
						<label for="post_tag">Email Address </label>
						<input type="Email" name="user_email" class="form-control" value="<?php echo $user_email; ?>" placeholder="Email Address" required>
					</div>

					<div class="form-group">
						<label for="post_content">Password </label>
						<input type="Password" name="user_pass" value="<?php echo $user_pass;?>" class="form-control" required></input>
					</div>

					<div class="form-group">
						<input type="submit" name="update-user" value="Update User" class="btn btn-primary">
					</div>

				</form>
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
	</script>	
</body>

</html>
