
<form action="" method="post">
	<div class="form-group">
		<lebel><strong>Update Catagory</strong></lebel><br>

		<?php 

		if(isset($_GET['edit'])){

			$cat_id = $_GET['edit'];

			$ft = $conn->query("SELECT * FROM catagory WHERE cat_id ={$cat_id}");

			while($row = $ft->fetch(PDO::FETCH_ASSOC)){

				$the_cat_id = $row['cat_id'];
				$the_cat_title = $row['cat_title'];
		?>

		<input type="text" value="<?php if(isset($the_cat_title)){echo $the_cat_title; } ?>" name="cat_titles" class="form-control">


		<?php }	} ?>

		<?php
			//update oparation for catagory

				if(isset($_POST['update'])){

					 $the_cat_title =$_POST['cat_titles']; 

					$qre = $conn->query("UPDATE catagory SET cat_title = '{$the_cat_title}' WHERE cat_id = {$cat_id}");
					
					if(!$qre){
						echo "ERROR IN Query".$conn->errorInfo();
					}
					header("Location:catagory-admin.php");

				}

		?>
		

	</div>
	<div class="form-group">
		<input type="submit" name="update" class="btn btn-primary" value="Update catagory">
	</div>
</form>
