<?php include "include/config.php"; ?>
<?php include "include/header.php"; ?>
<?php include "Admin/function.php"; ?>

  <body>
	<?php include "include/navigation.php"; ?>

	<div class="container">

		<div class="row">

			<div class="col-xs-6 col-xs-offset-3" style="margin-top:10%;">


					<?php

					if(isset($_POST['submit'])){

						$username = $_POST['username'];
						$email = $_POST['email'];
						$password = $_POST['userpass'];


						if(!empty($username) && !empty($email) && !empty($password)){


						$qr = $conn->query("SELECT randSalt FROM user");

						$row = $qr->fetch();
							
						$salt = $row['randSalt'];

						$password = crypt($password, $salt);

						$query = $conn->query("INSERT INTO user(username, user_email, user_password) VALUES('{$username}', '{$email}', '{$password}')");

						confirmQuery($query);

						$message = "<strong style='color:green; '>From is submited</strong>";

						}else{

							$message = "<strong style='color:red;'>Registration field cannot be empty</strong>";
						}

						

					}else{

						$message = "";
					}



					?>


		
				<div class="form-wrap" >
					<h2 class="">Registration</h2>

			      	<form class="form-signin" method="POST" action="Registration.php">
			      		
			      		<h6 class="text-center"><?php echo $message; ?></h6>
			        
			        	<label for="inputUser" class="sr-only">Username</label>
			        	<input type="text" name="username" id="inputUser" class="form-control" placeholder="User name"  autofocus><br>
			        	<label for="inputEmail" class="sr-only">Email address</label>
			        	<input type="email" name="email" id="inputEmail" class="form-control" placeholder="Somebody@Example.com" autofocus><br>
			        	<label for="inputPassword" class="sr-only">Password</label>
			        	<input type="password" name="userpass" id="inputPassword" class="form-control" placeholder="Password"><br>
			        
			        	<button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Register</button>
			      </form>

	      		</div>
			</div>
		</div>	
	</div> <!--end of container-->
	






    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
