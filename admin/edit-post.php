<?php session_start() ?>
<?php include"includes/connection.php" ?>
<?php include"includes/permission.php" ?>
<?php include"includes/header.php" ?>
<?php  
	if(isset($_POST["submit"])){
		$id = $_GET["id_edit"];
		$title = $_POST["title"];
		$content = $_POST["content"];
		$photo = $_POST["photo"];
		$category = $_POST["category"];
		$is_public = 0;
		if(isset($_POST["is_public"])){
			$is_public = 1;
		}
		if($title == "" || $content == "" || $photo == ""){
			echo "Complete form";
		}
		else{
			$query="UPDATE `post` SET `title` = '$title', `content` = '$content', `photo` = '$photo', `is_public` = '$is_public',`category` = '$category' WHERE `post`.`id` =  $id";
			mysqli_query($conn,$query);
			header("Location:list-posts.php");
		}
	}
?>
<?php 
	$id = $_GET["id_edit"];
	$query = "SELECT * FROM post WHERE `post`.`id` =  $id";
	$result = mysqli_query($conn,$query);
	$data = mysqli_fetch_array($result);
?>
	<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<form action="" method="POST" role="form">
					<legend style="text-align: center;">Edit post post</legend>
				
					<div class="form-group">
    					<label for="exampleFormControlTextarea1">Title</label>
    					<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="title"><?php echo $data["title"] ?></textarea>
  					</div>
					<div class="form-group">
    					<label for="exampleFormControlTextarea1">Content</label>
    					<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="content"><?php echo $data["content"] ?></textarea>
  					</div>
					<div class="form-group form-check">
					    <input type="checkbox" class="form-check-input" id="exampleCheck1" name="is_public" <?php if($data["is_public"]==1){ echo "checked='checked'";} ?>>
					    <label class="form-check-label" for="exampleCheck1">Public</label>
					</div>
					<div class="form-group">
						<label for="exampleFormControlSelect1">Category</label>
					    <select class="form-control" id="exampleFormControlSelect1" name="category" value="<?php echo $data["category"] ?>">
						    <option value="1" <?php if($data["category"]==1){ echo "selected='selected'";} ?>>Review</option>
						    <option value="0" <?php if($data["category"]==0){ echo "selected='selected'";} ?>>News</option>
					    </select>
					</div>
					<div class="form-group">
						<label for="">Photo</label>
						<input type="text" class="form-control" name="photo" placeholder="Link photo" value="<?php echo $data["photo"] ?>">
					</div>
					<div class="col-auto col-lg-offset-5">
						<button type="submit" class="btn btn-warning" name="submit">Submit</button>
					</div>
				</form>
			</div>
		</div>
	<script>
		CKEDITOR.replace('content');
		CKEDITOR.replace('title');
	</script>
<?php include"includes/footer.php" ?>