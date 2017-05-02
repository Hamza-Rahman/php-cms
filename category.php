<?php include "include/config.php"; ?>
<?php include "include/header.php"; ?>


	<?php include "include/navigation.php"; ?>

	<div class="container">
		<div class="row">
			<div class="col-md-8 blog"> 

			<?php 

			if(isset($_GET['c_id'])){

				$the_c_id = $_GET['c_id']; 

				$ft = $conn->query("SELECT * FROM posts WHERE post_catagory_id = {$the_c_id}");
		      
		      	while ( $row = $ft->fetch(PDO::FETCH_ASSOC)) {
		      	
		      	$post_title = $row['post_title'];
		      	$post_author = $row['post_author'];
		      	$post_date = $row['post_date'];
		      	$post_image = $row['post_image'];
		      	$post_content = $row['post_content'];

			?>

				<div class="blog-pos">
					<div class="clearfix"></div>
					<a href="post.php"><h1 style="margin-top:15%;"><?php echo $post_title; ?></h1></a><hr>
					<h4 class="blog-title">By <a href="#"><?php echo $post_author; ?></a></h4>
	
					<h5>posted on <?php echo $post_date; ?></h5>
					<hr></hr>
					<div class="blog-post-image" style="weight:200px; height:300px; ">
						<img src="image/<?php echo $post_image; ?>" style="weight:200px; height:300px;" >
					</div>
					<hr></hr>
					
					<p><?php echo $post_content; ?></p><br/>
					<a class="btn btn-primary" href="#">read more</a>
					<hr>
				
				</div>


		           <div class="comment-form">
                      <form class="form-inline">
                         <div class="form-group">
                            <input type="text" class="form-control" id="user-post" placeholder="comment here">
                         </div>
                         <button type="submit" class="btn btn-default">Post</button>
                      </form>
                   </div>


               <!--end of comment form-->
                   
                   <div class="comments">
                      <!--start user comment-->
                      <div class="comment">
                         <a class="comment-avator pull-left" href="#">
                            <img src="image/user.png">
                            <div class="text-center user"></div>
                         </a>
                         <div class="comment-text">
                            <p>If it's a styling or placement issue you're experiencing, just add a custom class to the avatar image and style accordingly 
                            </p>
                         </div>
                      </div>
                   </div>
                   <!--end of user comment-->
           
                   
                   <div class="comments">
                      <!--start user comment-->
                      <div class="comment">
                         <a class="comment-avator pull-left" href="#">
                            <img src="image/user.png">
                            <div class="text-center user"></div>
                         </a>
                         <div class="comment-text">
                            <p>If it's a styling or placement issue you're experiencing, just add. </p>
                         </div>
                      </div>
                   </div>
                   <!--end of user comment-->


                    <!--start Reply user comment-->
                   <div class="comments">
                      <div class="comment">
                         <a class="comment-avator pull-left" href="#">
                            <img src="image/user.png">
                            <div class="text-center user"></div>
                         </a>
                         <div class="comment-text">
                            <p>If it's a styling or placement issue you're </p>

                           
	                      <div class="comment">
	                         <a class="comment-avator pull-left" href="#">
	                            <img src="image/user.png">
	                            <div class="text-center user"></div>
	                         </a>
	                         <div class="comment-text">
	                            <p>it's a styling</p>   
	                         </div>
	                      </div>


                         </div>
                      </div>
                   </div>
                   <!--end of reply loop-->
                   <br>

					
		<?php } } ?>

			</div>


				<?php include "include/sidebar.php"; ?>


	
		</div> <!--end of row-->
	</div> <!--end of container-->
	

	<?php include "include/footer.php"; ?>





    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>

  </body>
</html>
