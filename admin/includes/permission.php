<?php  
	if(isset($_SESSION['user_id']) == false){
		header("Location:http://localhost/demo/log-in.php");
	}
	else{
		if(isset($_SESSION['permission']) == true){
			$permission = $_SESSION['permission'];
			if($permission == '0'){
				echo "unauthorized</br>";
				echo "<a href='http://localhost/demo/index.php'>Click to log in</a>";
				exit();
			}
		}
	}
?>