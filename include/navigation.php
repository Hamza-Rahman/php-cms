
<?php include "include/config.php";?>

<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">CMS-BLOG</a>
    </div>
    <div id="navbar" class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>

            <?php

            $ft = $conn->query("select * from catagory");
           
            while ( $row = $ft->fetch(PDO::FETCH_ASSOC)) {
              $cat_list = $row['cat_title'];

              echo "<li><a href='#'>{$cat_list}</a></li>";
            }

            ?>

            <li><a href="Admin">Admin </a></li>
           <!--  <li><a href="Admin">Admin2 </a></li>
 -->

          <?php

         if(!isset($_SESSION['user_role'])){
            
             if(isset($_GET['p_id'])){

              $the_id =  $_GET['p_id'];

                echo "<li><a href='Admin/posts.php?source=edit&id={$the_id}'>Edit Post</a></li>";
              
             }            

          }


          ?>

    </div><!--/.nav-collapse -->
  </div>
</nav>