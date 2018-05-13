<?php session_start() ?>
<?php include"includes/header.php" ?>
<?php include"includes/connection.php" ?>
<?php 
	$id = $_GET['id'];
	$query = "SELECT * FROM post WHERE id = $id";
	$result = mysqli_query($conn,$query);
	$data = mysqli_fetch_array($result);
	$view = $data["view"]+1;
	$query_view = "UPDATE `post` SET `view` = '$view' WHERE `post`.`id` = $id ";
	mysqli_query($conn,$query_view);
?>
<?php 
	$query_list = "SELECT * FROM  post WHERE is_public = 1 ORDER BY createdate DESC LIMIT 3";
	$result_list = mysqli_query($conn,$query_list);
	
?>
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<header style="text-align: center"><?php echo $data["title"]; ?></header>
		<div style="text-align: center">
			<div class="glyphicon glyphicon-calendar"><?php echo $data["createdate"] ?></div>
		</div>
		<?php echo $data["content"]; ?>
		<div>
			<ul>
				<?php while($data_list =  mysqli_fetch_array($result_list)){ ?>
					<a href="display.php?id=<?php echo $data_list['id'];?>" style="font-size: 15px;">
						<?php echo $data_list['title']; ?> 
					</a>
				<?php } ?>
			</ul>
		</div>
	</div>
</div>
<?php include"includes/footer.php" ?>
