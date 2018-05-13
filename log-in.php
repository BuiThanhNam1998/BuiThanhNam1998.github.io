<?php session_start() ?>
<?php include"includes/header.php" ?>
<?php require_once("includes/connection.php") ?>
<?php  
	if(isset($_POST["submit"])){
		$username = $_POST["username"];
		$password = $_POST["password"];
		$username = strip_tags($username);
		$username = addslashes($username);
		$password = strip_tags($password);
		$password = addslashes($password);
		if($username == "" || $password == ""){
			echo "Not null";
		}
		else{
			$query = "SELECT * FROM users WHERE username = '$username' AND password = '$password' ";
			$result = mysqli_query($conn,$query);
			$num_rows = mysqli_num_rows($result);
			if($num_rows == 0){
				echo "User or password not exact";
			}
			else{
				while ($data = mysqli_fetch_array($result)) {
					$_SESSION["user_id"] = $data["id"];
					$_SESSION["username"] = $data["username"];
					$_SESSION["email"] = $data["email"];
					$_SESSION["fullname"] = $data["fullname"];
					$_SESSION["is_block"] = $data["is_block"];
					$_SESSION["permission"] = $data["permission"];
				}
				header("Location:index.php");
			}
		}
	}
?>
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<form action="" method="POST" role="form">
					<legend style="text-align: center;">Log in</legend>
					<div class="form-group">
						<label for="">User name</label>
						<input type="text" class="form-control" name="username" placeholder="User name">
					</div>
					<div class="form-group">
						<label for="">Password</label>
						<input type="password" class="form-control" name="password">
					</div>
					<div class="form-group">
						<p style="text-align: center;"><a href="register.php">If you haven't an account Click to register</a></p>
					</div>
					<div class="col-auto col-lg-offset-5">
						<button type="submit" class="btn btn-warning" name="submit">Submit</button>
					</div>
				</form>
			</div>
		</div>
<?php include"includes/footer.php" ?>
