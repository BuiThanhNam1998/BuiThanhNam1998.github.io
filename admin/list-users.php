<?php session_start() ?>
<?php include"includes/header.php" ?>
<?php include"includes/connection.php" ?>
<?php include"includes/permission.php" ?>
<?php
	$query = "SELECT * FROM users";
	$result = mysqli_query($conn,$query);
?>
<?php 
	if(isset($_GET["id_delete"])){
		$id_delete = $_GET["id_delete"];
		$query = "DELETE FROM users WHERE id ="."$id_delete";
		mysqli_query($conn,$query);
		header("Location:list-users.php");
	}
?>
<div>
	<h4><a href="add-user.php">Add user</a></h4>
	<table class="table table-hover">
		<thead>
			<tr>
				<th>ID</th>
				<th>Username</th>
				<th>Password</th>
				<th>Email</th>
				<th>Block</th>
				<th>Permission</th>
				<th>Operation</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				while ($data = mysqli_fetch_array($result)) {
			?>
				<tr>
					<td><?php echo $data["id"] ?></td>
					<td><?php echo $data["username"] ?></td>
					<td><?php echo $data["password"] ?></td>
					<td><?php echo $data["email"] ?></td>
					<td><?php if($data["is_block"] == 0){ echo "No";} else{echo "Yes";} ?></td>
					<td><?php if($data["permission"] == 0){ echo "User";} else{echo "Admin";} ?></td>
					<td><div><a href="list-users.php?id_delete=<?php echo $data['id']; ?>" title="">Delete </a></div><div><a href="edit-user.php?id_edit=<?php echo $data['id'] ?>" title=""> Edit</a></div></td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>
<?php include"includes/footer.php" ?>