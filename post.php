<?php include "include/config.php"; ?>
<?php include "include/header.php"; ?>

  <body>
	<?php include "include/navigation.php"; ?>

	<div class="container">
		<div class="row">
			<div class="col-md-8 blog"> 

			<?php 

			if(isset($_GET['p_id'])){

				$the_p_id = $_GET['p_id']; 

        $view = $conn->query("UPDATE posts SET post_views_count = post_views_count + 1 WHERE post_id = {$the_p_id}");

				$ft = $conn->query("SELECT * FROM posts WHERE post_id = {$the_p_id}");
		      
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
					
					<hr>
				
				</div>

    <?php } 


      }else{
        header("Location:index.php");

      }



     ?>

            <div class="well">
              <h4>Leave a Comment: </h4>
              <form role="form" action="" method="POST">
                 <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="comment_name" class="form-control">
                 </div>

                 <div class="form-group">
                    <label>Email</label>
                    <input type="Email" name="comment_email" class="form-control">
                 </div>

                 <div class="form-group">
                    <label>Your Commnet</label>
                    <textarea class="form-control" rows="3" name="comment_content"></textarea>
                 </div>
                 <button type="submit" name="submit-commnent" class="btn btn-primary">Submit</button>
              </form>
            </div>
          <!--end of comment form-->



            <?php


           if(isset($_POST['submit-commnent'])){


              $the_post_id = $_GET['p_id'];

              $comment_author = $_POST['comment_name'];
              $comment_email = $_POST['comment_email'];
              $comment_content = $_POST['comment_content'];


              $query = $conn->query("INSERT INTO comments(comment_post_id, comment_author, comment_email, comment_status, comment_date, comment_content) VALUES ('{$the_post_id}', '{$comment_author}', '{$comment_email}', 'unapprove', now(), '{$comment_content}')");

              if(!$query){

                echo "QUERRY PROBLEM..\n";
                print_r($conn->errorInfo());
              
                }

           }

      ?>

          <?php

          if(isset($_GET['p_id'])){

            $the_id = $_GET['p_id'];

                  $q = $conn->query("SELECT * FROM comments WHERE comment_post_id = {$the_id} AND comment_status ='Approve' ORDER BY comment_id DESC");


                  while($row = $q->fetch(PDO::FETCH_ASSOC)){

                    $comment_author = $row['comment_author'];
                    $comment_date = $row['comment_date'];
                    $comment_content = $row['comment_content']

                  ?>

                   <!--start user comment-->
                   <div class="comments">
                      <div class="comment">
                         <a class="comment-avator pull-left" href="#">
                            <img src="image/user.png">
                         </a>
                         <div class="comment-text">
                            <h4 class="media-heading">
                            
                              <small><?php echo $comment_author.'  '.$comment_date; ?></small>
                            </h4> 
                            <p><?php echo $comment_content; ?></p>
                         </div>
                      </div>
                   </div>
                   <!--end of user comment-->
           
                 <?php } } ?>


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
