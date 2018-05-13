<?php session_start() ?>
<?php include"includes/connection.php" ?>
<?php include"includes/permission.php" ?>
<?php include"includes/header.php" ?>
<?php  
	if(isset($_POST["submit"])){
		$title = $_POST["title"];
		$content = $_POST["content"];
		$photo = $_POST["photo"];
		$is_public =0;
		$category = $_POST["category"];
		$user_id = $_SESSION["user_id"];
		if(isset($_POST["is_public"])){
			$is_public = $_POST["is_public"];
		}
		if($title == "" || $content == "" || $photo == "" || $category == ""){
			echo "Complete form";
		}
		else{
			$query = "INSERT INTO post(title,content,user_id,photo,is_public,category,createdate) VALUES ('$title','$content','$user_id','$photo','$is_public','$category',now())";
			mysqli_query($conn,$query);
			echo "Succeed";
			header("Location:list-posts.php");
		}
	}
?>
	<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<form action="" method="POST" role="form">
					<legend style="text-align: center;">Add post</legend>
				
					<div class="form-group">
    					<label for="exampleFormControlTextarea1">Title</label>
    					<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="title"></textarea>
  					</div>
					<div class="form-group">
    					<label for="exampleFormControlTextarea1">Content</label>
    					<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="content"></textarea>
  					</div>
					<div class="form-group form-check">
					    <input type="checkbox" class="form-check-input" id="exampleCheck1" name="is_public">
					    <label class="form-check-label" for="exampleCheck1">Public</label>
					</div>
					<div class="form-group">
					    <label for="exampleFormControlSelect1">Category</label>
					    <select class="form-control" id="exampleFormControlSelect1" name="category">
						    <option value="0">News</option>
						    <option value="1">Review</option>
					    </select>
					 </div>
					<div class="form-group">
						<label for="">Photo</label>
						<input type="text" class="form-control" name="photo" placeholder="Link photo">
					</div>
					<div class="col-auto col-lg-offset-5">
						<button type="submit" class="btn btn-warning" name="submit">Add</button>
					</div>
				</form>
			</div>
		</div>
	<script>
		CKEDITOR.replace('content');
		CKEDITOR.replace('title');
	</script>
<?php include"includes/footer.php" ?>