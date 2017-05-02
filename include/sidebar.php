<?php include "include/config.php";?>

			<div class="col-md-4 sidebar" style="margin-top:5%;" > 	
	 	
				<div class="main-sidebar">
					<div class="sidebar">
						<h4 style="margin-top:18%;"><strong>Blog Search</strong></h4>
						<form action="search.php" method="POST">
						  <div class="form-group row">
							<div class="col-sm-10" style="padding-right: 0px;">
							  <input type="text" class="form-control" id="exampleInputAmount" name="search" placeholder="Search" required>
							</div>
							<button type="submit" name="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span></button>
						  </div>
						</form>
					</div>
				</div> <br/>
				
				
				<div class="main-sidebar">
					<div class="sidebar">
						<h4 style="margin-top:8%;"><strong>Login</strong></h4>
	
						<form class="form-horizontal" action="include/form.php" method="POST">
						  <div class="form-group">
							<div class="col-sm-12">
							  <input type="text" class="form-control" name="username" id="inputEmail3" placeholder="Email">
							</div>
						  </div>
						  <div class="form-group">
							<div class="col-sm-12">
							  <input type="password" class="form-control" name="password" id="inputPassword3" placeholder="Password"><br/>
							  <button type="submit" name="login" class="btn btn-primary">Sign in</button>
								&nbsp<a href="Registration.php"> Not Sign up?</a>
							</div>
						  </div>
						</form>
					</div>
				
				</div>
				
				
				<div class="main-sidebar">
					<div class="sidebar">
					<h4 style="margin-top:8%;"><strong>Catagories</strong></h4>

						<?php

						$qr = $conn->query("SELECT * FROM catagory LIMIT 3");
						while($row = $qr->fetch(PDO::FETCH_ASSOC)){

							$catagory_title = $row['cat_title'];
							$cat_id = $row['cat_id'];

							echo "<ul><li><a href='category.php?c_id={$cat_id}'>{$catagory_title}</a></li></ul>";

						}
						?>
					</div>
				</div>



					
				<div class="main-sidebar">
					<div class="sidebar">
						<div class="recent-text">
							<h4 style="margin-top:8%;"><strong>Recent post</strong></h4>
							<h5>This is new post</h5>
							<div class="recent-image">
								<img src="image/temp.jpg" style="weight:30px; height:20px; ">
							</div>
							<h6 class="blog-title">By <a href="#">Guru</a></h6>
						</div>			
					</div>
				</div>

			
			</div>
