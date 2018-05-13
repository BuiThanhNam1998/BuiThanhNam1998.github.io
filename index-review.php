<?php session_start() ?>
<?php include"includes/header.php" ?>
<?php include"includes/connection.php" ?>
<?php 
	$query_review = "SELECT * FROM  post WHERE is_public = 1 AND category = 1 ORDER BY createdate DESC LIMIT 3";
	$result_review = mysqli_query($conn,$query_review);
?>
<?php 
	$query_top = "SELECT * FROM  post WHERE is_public = 1 ORDER BY view DESC LIMIT 10";
	$result_top = mysqli_query($conn,$query_top);
?>
	<!-- content -->
	<div class="row">		<div class="col-md-8" style="padding: 0">
			<h3>REVIEW</h3>
			<div class="row">
				<?php while ($data_review = mysqli_fetch_array($result_review)) { ?>
				<div class="col-md-4">
					<div class="panel">
				 		<img src="<?php echo $data_review['photo']; ?>" style="width: 100%; height: 100px;" />
						<div>
							<div style="height: 100px"><h3><?php echo substr($data_review['title'],0,50)."..."; ?></h3></div>
							<div style="height: 100px"><?php echo substr($data_review['content'],0,180)."..."; ?></div>
							<a href="display.php?id=<?php echo $data_review['id']; ?>" class="btn btn-primary">Read more</a>
						</div>
					</div>
				</div>
				<?php } ?>
			</div> 
		</div> 
		<div class="col-md-4">
			<h4>Top 10 of Post</h4>
			<ul>
				<?php while($data_top = mysqli_fetch_array($result_top)){ ?>
				<a href="display.php?id=<?php echo $data_top['id'] ?>"> <?php echo $data_top['title']; ?></a>
				<?php } ?>
			</ul>
		</div>
	</div>
<?php include"includes/footer.php" ?>