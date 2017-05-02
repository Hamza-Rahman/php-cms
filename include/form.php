<?php include "config.php"; ?>
<?php session_start(); ?>

<?php


	if(isset($_POST['login'])){

	 	$user_name = $_POST['username'];
	 	$password =  $_POST['password'];


		$qrs = $conn->query("SELECT * FROM user WHERE username LIKE '$user_name'");   
		//problem found ..try to ok ...

		if(!$qrs){

			echo "QUERRY PROBLEM..\n";
			print_r($conn->errorInfo());
		}


		while ($row = $qrs->fetch(PDO::FETCH_ASSOC)) {

			     $db_user_name = $row['username'];
			     $db_user_pass = $row['user_password'];
			     $db_user_firstname = $row['user_firstname'];
			     $db_user_lastname = $row['user_lastname'];
			     $db_user_role = $row['user_role'];

		}

		$password = crypt($password, $db_user_pass);  //taking the default value(AS define) and convert it.



		if($user_name !== $db_user_name && $password !== $db_user_pass){

			header("Location: ../index.php");	


		}else if($user_name == $db_user_name && $password == $db_user_pass){

			$_SESSION['username'] = $db_user_name;
			$_SESSION['user_firstname'] = $db_user_firstname;
			$_SESSION['user_lastname'] = $db_user_lastname;
			$_SESSION['user_role'] = $db_user_role;
			
			header("Location:../Admin");

		}else{

			header("Location: ../index.php");

		}


	}

?>