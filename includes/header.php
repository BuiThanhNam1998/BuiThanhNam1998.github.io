<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>CinemaPlus</title>
	<link rel="stylesheet" type="text/css" href="style/style.css">
	<meta name="viewport" content="width = device-width, initial-scale=1">
	<!-- Latest compiled and minified CSS & JS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<script src="//code.jquery.com/jquery.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container">
		<!-- header -->
		<div class="row">
			<div class="navbar navbar-default" role = "navigation">

				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>

				<div class="collapse navbar-collapse" id="collapse" style="padding-left: 0;">
					<ul class="nav navbar-nav">
						<li class="active">
							<a href="index.php" class="menu">Home</a>
						</li>
						<li>
							<a href="index-news.php" class="menu">News</a>
						</li>
						<li>
							<a href="index-review.php" class="menu">Review</a>
						</li>
						<li>
							<a href="log-in.php" class="menu">Log in</a>
						</li>
						<?php if(isset($_SESSION['permission']) == true){
							$permission = $_SESSION['permission'];
							if($permission == 1){
								echo "
								<li>
									<a href='admin/admin.php' class='menu'>Admin</a>
								</li>";
							}
						}
						?>
					</ul>
				</div>
			</div>
		</div>