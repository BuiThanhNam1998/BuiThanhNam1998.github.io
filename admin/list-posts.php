<?php session_start() ?>
<?php include"includes/header.php" ?>
<?php include"includes/connection.php" ?>
<?php include"includes/permission.php" ?>
<?php
	$query = "SELECT * FROM post";
	$result = mysqli_query($conn,$query);
?>
<?php 
	if(isset($_GET["id_delete"])){
		$id_delete = $_GET["id_delete"];
		$query = "DELETE FROM post WHERE id ="."$id_delete";
		mysqli_query($conn,$query);
		header("Location:list-posts.php");
	}
?>
	<h4><a href="add-post.php">Add post</a></h4>
	<table class="table table-hover">
		<thead>
			<tr>
				<th>ID</th>
				<th>Title</th>
				<th>Content</th>
				<th>User ID</th>
				<th>Category</th>
				<th>Public</th>
				<th>Operation</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				while ($data = mysqli_fetch_array($result)) {
			?>
				<tr>
					<td><?php echo $data["id"] ?></td>
					<td><?php echo $data["title"] ?></td>
					<td><?php echo substr($data["content"], 0, 80) ?></td>
					<td><?php echo $data["user_id"] ?></td>
					<td><?php if($data["category"] == 0){ echo "News";} else{echo "Review";} ?></td>
					<td><?php if($data["is_public"] == 0){ echo "No";} else{echo "Yes";} ?></td>
					<td><div><a href="list-posts.php?id_delete=<?php echo $data['id']; ?>" title="">Delete </a></div><div><a href="edit-post.php?id_edit=<?php echo $data['id'] ?>" title=""> Edit</a></div></td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
<?php include"includes/footer.php" ?>