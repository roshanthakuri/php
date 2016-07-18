<?php
include('connection.php');
$query = "SELECT * FROM users";
$results = mysqli_query($conn,$query);
//var_dump($results );

?>
<!DOCTYPE html>
<html>
<head>
	<title>Cookies</title>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
<h2>User List</h2>
	<a class="btn btn-primary" href="index.php"> Add User </a>
	<a class="btn btn-success" href="logout.php">Logout</a>
	<hr>
	<table class="table  table-striped">
		<tr>
			<th>S.No</th>
			<th>Name</th>
			<th>Address</th>
			<th>Phone</th>
			<th>Email</th>
			<th>Gender</th>
			<th>Role</th>
			<th>Cereated Date</th>
			<th>Action</th>
		</tr>
		<?php 
		
			$i=1;
			while($result = mysqli_fetch_object($results)){
		?>
			<tr>
				<td><?php echo $i++;?></td>
				<td><?php echo $result->fname.' '.$result->lname;?></td>
				<td><?php echo $result->address;?></td>
				<td><?php echo $result->phone;?></td>
				<td><?php echo $result->email;?></td>
				<td><?php echo $result->gender =='m'? 'Male':'Female';?></td>
				<td><?php echo  $result->role;?></td>
				<td><?php echo  $result->created_at;?></td>
				<td>
					<a href="edit.php?id=<?php echo $result->id;?>">Edit</a>&nbsp;|&nbsp;
					<a href="delete.php?id=<?php echo $result->id;?>" onclick="return deleteRec(this);">Delete</a>
				</td>
			</tr>

		<?php } 
		
		?>		


	</table>
</div>
<script type="text/javascript">
	function deleteRec(elem){
		var result = confirm('Are you sure your want to delete this record?');
		if(result){
			return true;
		}else{
			return false;
		}
	}
</script>
</body>
</html>