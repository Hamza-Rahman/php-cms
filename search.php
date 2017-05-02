<?php include "include/config.php"; ?>
<?php include "include/header.php"; ?>

  <body>
	<?php include "include/navigation.php"; ?>

	<div class="container">
		<div class="row">
			<div class="col-md-8 blog">

			<!-- SOME PROBLEM IN BLANCK SEAR--> 

			<?php 

					if(isset($_POST['submit'])){

						 $search = $_POST['search'];

						$qr = $conn->query("SELECT * FROM posts WHERE post_tags LIKE '%$search%'");

						if(!$qr){

							echo "QUERY PROBLEM".$qr->errorInfo();
						}

						$c = $qr->rowCount();
						
						//echo $c;

						if($c == 0){
							echo "<h1>NO RESULT</h1>";

						}else{
							
					      
					      	while ( $row = $qr->fetch(PDO::FETCH_ASSOC)) {
					      	
					      	$post_title = $row['post_title'];
					      	$post_author = $row['post_author'];
					      	$post_date = $row['post_date'];
					      	$post_image = $row['post_image'];
					      	$post_content = $row['post_content'];

						?>

							<div class="blog-pos">
								<div class="clearfix"></div>
								<a href="#"><h1 style="margin-top:15%;"><?php echo $post_title; ?></h1></a><hr>
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
								
					<?php } 

						echo "</div>";


						}

					}


				 include "include/sidebar.php"; ?>


	
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
