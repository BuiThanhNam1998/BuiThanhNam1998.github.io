<?php session_start() ?>
<?php include"includes/connection.php" ?>
<?php include"includes/permission.php" ?>
<?php include"includes/header.php" ?>
<?php  
	if(isset($_POST["submit"])){
		$username = $_POST["username"];
		$password = $_POST["password"];
		$email = $_POST["email"];
		$fullname = $_POST["fullname"];
		$is_block =0;
		if(isset($_POST["is_block"])){
			$is_block = $_POST["is_block"];
		}
		$permission = $_POST["permission"];
		if($username == "" || $password == "" || $email == "" || $fullname == "" || $permission == ""){
			echo "Complete form";
		}
		else{
			$query = "INSERT INTO users(username,password,email,fullname,is_block,permission,createdate) VALUES ('$username','$password','$email','$fullname','$is_block','$permission',now())";
			mysqli_query($conn,$query);
			echo "Succeed";
			header("Location:list-users.php");
		}
	}
?>
	<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<form action="" method="POST" role="form">
					<legend style="text-align: center;">Add users</legend>
				
					<div class="form-group">
						<label for="">User name</label>
						<input type="text" class="form-control" name="username" placeholder="User name">
					</div>
					<div class="form-group">
						<label for="">Password</label>
						<input type="password" class="form-control" name="password">
					</div>
					<div class="form-group">
						<label for="">Full name</label>
						<input type="text" class="form-control" name="fullname" placeholder="Full name">
					</div>
					<div class="form-group">
						<label for="">Email</label>
						<input type="text" class="form-control" name="email" placeholder="Email@gmail.com">
					</div>
					<div class="form-group form-check">
					    <input type="checkbox" class="form-check-input" id="exampleCheck1" name="is_block">
					    <label class="form-check-label" for="exampleCheck1">Block</label>
					</div>
					<div class="form-group">
					    <label for="exampleFormControlSelect1">Permission</label>
					    <select class="form-control" id="exampleFormControlSelect1" name="permission">
						    <option value="1">Admin</option>
						    <option value="0">User</option>
					    </select>
					 </div>
					<div class="col-auto col-lg-offset-5">
						<button type="submit" class="btn btn-warning" name="submit">Add</button>
					</div>
				</form>
			</div>
		</div>
<?php include"includes/footer.php" ?>