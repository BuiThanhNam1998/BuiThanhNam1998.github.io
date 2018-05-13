<?php session_start() ?>
<?php include"includes/connection.php" ?>
<?php include"includes/permission.php" ?>
<?php include"includes/header.php" ?>
<?php  
	if(isset($_POST["submit"])){
		$id = $_GET["id_edit"];
		$username = $_POST["username"];
		$password = $_POST["password"];
		$email = $_POST["email"];
		$fullname = $_POST["fullname"];
		$is_block = 0;
		if(isset($_POST["is_block"])){
			$is_block = 1;
		}
		$permission = $_POST["permission"];
		if($username == "" || $password == "" || $email == "" || $fullname == "" || $permission == ""){
			echo "Complete form";
		}
		else{
			$query="UPDATE `users` SET `username` = '$username', `password` = '$password', `email` = '$email', `fullname` = '$fullname', `is_block` = '$is_block', `permission` = '$permission' WHERE `users`.`id` =  $id";
			mysqli_query($conn,$query);
			header("Location:list-users.php");
		}
	}
?>
<?php 
	$id = $_GET["id_edit"];
	$query = "SELECT * FROM users WHERE `users`.`id` =  $id";
	$result = mysqli_query($conn,$query);
	$data = mysqli_fetch_array($result);
?>
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<form action="" method="POST" role="form">
				<legend style="text-align: center;">Edit users</legend>
				
			<div class="form-group">
					<label for="">User name</label>
					<input type="text" class="form-control" name="username" placeholder="User name" value="<?php echo $data["username"] ?>">
				</div>
				<div class="form-group">
					<label for="">Password</label>
					<input type="text" class="form-control" name="password" value="<?php echo $data["password"] ?>">
				</div>
				<div class="form-group">
					<label for="">Full name</label>
					<input type="text" class="form-control" name="fullname" placeholder="Full name" value="<?php echo $data["fullname"] ?>">
				</div>
				<div class="form-group">
					<label for="">Email</label>
					<input type="text" class="form-control" name="email" placeholder="Email@gmail.com" value="<?php echo $data["email"] ?>">
				</div>
				<div class="form-group form-check">
					<input type="checkbox" class="form-check-input" id="exampleCheck1" name="is_block" <?php if($data["is_block"]==1){ echo "checked='checked'";} ?>>
					<label class="form-check-label" for="exampleCheck1">Block</label>
				</div>
				<div class="form-group">
					<label for="exampleFormControlSelect1">Permission</label>
				    <select class="form-control" id="exampleFormControlSelect1" name="permission" value="<?php echo $data["permission"] ?>">
					    <option value="1" <?php if($data["permission"]==1){ echo "selected='selected'";} ?>>Admin</option>
					    <option value="0" <?php if($data["permission"]==0){ echo "selected='selected'";} ?>>User</option>
				    </select>
				</div>
				<div class="col-auto col-lg-offset-5">
					<button type="submit" class="btn btn-warning" name="submit">Submit</button>
				</div>
			</form>
		</div>
	</div>
<?php include"includes/footer.php" ?>