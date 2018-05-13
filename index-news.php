<?php session_start() ?>
<?php include"includes/header.php" ?>
<?php include"includes/connection.php" ?>
<?php 
	$query_news = "SELECT * FROM  post WHERE is_public = 1 AND category = 0 ORDER BY createdate DESC LIMIT 6";
	$result_news = mysqli_query($conn,$query_news);
?>
<?php 
	$query_top = "SELECT * FROM  post WHERE is_public = 1 ORDER BY view DESC LIMIT 10";
	$result_top = mysqli_query($conn,$query_top);
?>
	<!-- content -->
	<div class="row">
		<div class="col-md-8" style="padding: 0">
			<h3>NEWS</h3>
			<div class="row">
				<?php while ($data_news = mysqli_fetch_array($result_news)) { ?>
				<div class="col-md-4">
					<div class="panel">
				 		<img src="<?php echo $data_news['photo']; ?>" style="width: 100%; height: 100px;" />
						<div>
							<div style="height: 100px"><h3><?php echo substr($data_news['title'],0,50)."..."; ?></h3></div>
							<div style="height: 100px"><?php echo substr($data_news['content'],0,180)."..."; ?></div>
							<a href="display.php?id=<?php echo $data_news['id']; ?>" class="btn btn-primary">Read more</a>
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