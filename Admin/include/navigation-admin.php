<?php include "function.php"; ?>

	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"><span>CMS</span>Admin</a>
				<ul class="user-menu">
					<li class="dropdown pull-right">

					<?php if(isset($_SESSION['username'])){

						$username = $_SESSION['username'];

						}?>						
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> <?php echo $username; ?> <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="#"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Profile</a></li>
							<li><a href="#"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"></use></svg> Settings</a></li>
							<li><a href="../include/logout.php"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>
							
		</div><!-- /.container-fluid -->
	</nav>

	<!--Sidebar For Admin -->	
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>


		<ul class="nav menu">
			<li class="active"><a href="index.php"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Dashboard</a></li>

			<li><a href="../index.php"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Home Page</a></li>

			<li class="parent">
				<a  data-toggle="collapse" href="javascript:;" data-target="#demo">
					<span"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> Post <span class="caret"></span> 
				</a>
				<ul class="collapse" id="demo">
					<li>
						<a class="" href="posts.php">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> view all posts
						</a>
					</li>
					<li>
						<a class="" href="posts.php?source=add_new_posts">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Add Post
						</a>
					</li>
				</ul>
			</li>

			<li>
				<a href="Comments.php"><svg class="glyph stroked table"><use xlink:href="#stroked-table"></use></svg> Comments</a>
			</li>
			<li>
				<a href="catagory-admin.php"><svg class="glyph stroked table"><use xlink:href="#stroked-table"></use></svg> Catagories</a>
			</li>
			<li>
				<a href="user.php?source=add_new_user"><svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"></use></svg>Add  Users</a>
			</li>
			<li>
				<a href="user.php"><svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"></use></svg> view  Users</a>
			</li>
			<li>
				<a href="profile.php"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg>Profile</a>
			</li>

	</div><!--/.sidebar-->
