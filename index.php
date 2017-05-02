<?php include "include/config.php"; ?>
<?php include "include/header.php"; ?>

	<?php include "include/navigation.php"; ?>

	<div class="container">
		<div class="row">
			<div class="col-md-8 blog"> 

			<?php

				$page_temp = 5;

				if(isset($_GET['page'])){

					$page = $_GET['page'];
					

				}else{
					$page ="";

				}

				if($page == ""|| $page == $page_temp){

					$page_1 =0;

				}else{
					$page_1 = ($page * $page_temp) - $page_temp; 

				}




				$pa = $conn->query("SELECT * FROM posts");
				$count = $pa->rowCount();

				$page_count = ceil($count/$page_temp);


				$ft = $conn->query("SELECT * FROM posts LIMIT {$page_1}, {$page_temp}");
		      
		      	while ( $row = $ft->fetch(PDO::FETCH_ASSOC)) {
		      	
		      	$post_id = $row['post_id'];
		      	$post_title = $row['post_title'];
		      	$post_author = $row['post_author'];
		      	$post_date = $row['post_date'];
		      	$post_image = $row['post_image'];
		      	$post_content = substr($row['post_content'], 0, 30 );

			?>

				<div class="blog-pos">
					<div class="clearfix"></div>
					<a href="post.php?p_id=<?php echo $post_id ?>"><h1 style="margin-top:15%;"><?php echo $post_title; ?></h1></a><hr>
					<h4 class="blog-title">By <a href="#"><?php echo $post_author; ?></a></h4>
	
					<h5>posted on <?php echo $post_date; ?></h5>
					<hr></hr>


					<a href="post.php?p_id=<?php echo $post_id ?>">
						<div class="blog-post-image" style="weight:200px; height:300px; ">
							<img src="image/<?php echo $post_image; ?>" style="weight:200px; height:300px;" >
						</div>
					</a>

					<hr></hr>
					
					<p><?php echo $post_content; ?></p><br/>
					<a class="btn btn-primary" href="#">read more</a>
					<hr>
				
				</div>
					
		<?php } ?>

			</div>


				<?php include "include/sidebar.php"; ?>


	
		</div> <!--end of row-->
	</div> <!--end of container-->

	<ul class="pager">
	<?php

		for ($i=1; $i <=$page_count ; $i++) {

			if($i == $page){

				echo "<li><a class='active_link' href='index.php?page={$i}'>{$i}</a></li>";


			}else{

				echo "<li><a href='index.php?page={$i}'>{$i}</a></li>";


			} 
			
			
		}


	?>


		
	</ul>
	

	<?php include "include/footer.php"; ?>





    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>





  </body>
</html>
