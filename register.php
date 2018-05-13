<?php session_start() ?>
<?php include"includes/header.php" ?>
<?php require_once("includes/connection.php") ?>
<?php  
	if(isset($_POST["submit"])){
		$username = $_POST["username"];
		$password = $_POST["password"];
		$fullname = $_POST["fullname"];
		$email = $_POST["email"];
		if($username == "" || $password == "" || $fullname == "" || $email == ""){
			echo "Not null";
		}
		else{
			$query = "INSERT INTO users(username,password,fullname,email,createdate) VALUE ('$username','$password','$fullname','$email',now()) ";
			mysqli_query($conn,$query);
			echo "succeed";
		}
	}
?>
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<form action="" method="POST" role="form">
					<legend style="text-align: center;">Register</legend>
				
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
					<div class="col-auto col-lg-offset-5">
						<button type="submit" class="btn btn-warning" name="submit">Submit</button>
					</div>
				</form>
			</div>
		</div>
<?php include"includes/footer.php" ?>