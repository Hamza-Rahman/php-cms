
		<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>ID</th>
					<th>Username</th>
					<th>First name</th>
					<th>Last name</th>
					<th>Email Address</th>
					<th>Role</th>
					
				</tr>
			</thead>
			<tbody>
				<?php
					//echo "<tr>"

					$qr = $conn->query("SELECT * FROM user");

					while ($row = $qr->fetch(PDO::FETCH_ASSOC)) {

						$user_id = $row['user_id'];
						$username = $row['username'];
						$user_firstname = $row['user_firstname'];
						$user_lastname = $row['user_lastname'];
						$user_email = $row['user_email'];
						$user_image = $row['user_image'];
						$user_role = $row['user_role'];
						
					
						echo "<tr>";
						echo "<td>{$user_id}</td>";
						echo "<td>{$username}</td>";
						echo "<td>{$user_firstname}</td>";
						echo "<td>{$user_lastname}</td>";
						echo "<td>{$user_email}</td>";
						
				
						// $qre = $conn->query("SELECT * FROM posts WHERE post_id = '{$comment_post_id}'");

						// while ($row = $qre->fetch(PDO::FETCH_ASSOC)) {
								
						// 		$post_id = $row['post_id'];
						// 		$post_title = $row['post_title'];

						// 		echo "<td><a href='../post.php?p_id=$post_id'>{$post_title}</a></td>";  //In responce to
	

						// 	}

						echo "<td>{$user_role}</td>";
					
						echo "<td><a href='user.php?change_to_admin={$user_id}'>Admin</a></td>";
						echo "<td><a href='user.php?change_to_subs={$user_id}'>Subscriber</a></td>";
						echo "<td><a href='user.php?source=edit&id={$user_id}'>Edit</a></td>";
						echo "<td><a onClick=\" javascript: return confirm('Are you sure want to delete ?') \" href='user.php?delete={$user_id}'>Delete</a></td>";
						
						echo "</tr>"; 
						
					}

				?>

			</tbody>
		</table>

		<?php

			if(isset($_GET['change_to_admin'])){

				$the_user_id = $_GET['change_to_admin'];
						
			$query2 = $conn->query("UPDATE user SET user_role = 'Admin' WHERE user_id = {$the_user_id}");

				confirmQuery($query2);

				header("Location:user.php");

			}


		?>
	
		<?php

			if(isset($_GET['change_to_subs'])){

				$the_user_id = $_GET['change_to_subs'];
						
				$query1 = $conn->query("UPDATE user SET user_role = 'Subscriber' WHERE user_id = {$the_user_id}");

				confirmQuery($query1);

				header("Location:user.php");

			}


		?>


		<?php

			if(isset($_GET['delete'])){

				$the_user = $_GET['delete'];
						
				$ft = $conn->query("DELETE FROM user WHERE user_id = {$the_user}");

				confirmQuery($ft);

				header("Location:user.php");

			}


		?>



		


