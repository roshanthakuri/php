<?php 
include('connection.php');
$id = $_GET['id'];
$query = "SELECT * FROM users WHERE id='$id'";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_object($result);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
	
<div
	style="position:absolute;float:right;top:0px;"
	><a class="btn btn-success" href="logout.php">Logout</a></div>
<br><br>
	<h2>Add user profile</h2>
	
	
	<form method="post" action="userprocess.php">
	 	<div class="form-group">
	 		<label>First Name:</label>
	 		 <input type="text" name="fname" id="fname" class="form-control" value="<?php echo $row->fname;?>"/>
	 	</div>
		
		<div class="form-group">
			<label>Last Name:</label>
			<input type="text" name="lname" id="lname" class="form-control" value="<?php echo $row->lname;?>">
		</div>

		<div class="form-group">
			<label>Email:</label>
			<input type="text" name="email" id="email" class="form-control" value="<?php echo $row->email;?>">
		</div>

		<div class="form-group">
			<label>Password:</label>
			<input type="password" name="password" id="password" class="form-control">
		</div>

		<div class="form-group">
			<label>Phone No:</label>
			<input type="text" name="phone" id="phone" class="form-control" value="<?php echo $row->phone;?>">
		</div>

		<div class="form-group">
			<label>Address:</label>
			<textarea name="address"  class="form-control"><?php echo $row->address;?></textarea>
		</div>

		<div class="form-group">
			<label>Gender:</label>
			<input type="radio" name="gender" id="gender1" value="m"  class="form-control" <?php if( $row->gender=='m'){echo 'checked';}?>>Male
			<input type="radio" name="gender" id="gender2" value="f"  class="form-control" <?php if($row->gender=='f'){echo 'checked';}?>>Female
		</div>


		<div class="form-group">
			<input type="hidden" name="id" value="<?php echo $id;?>">
			<input type="submit" name="submit" value="Submit"  class="form-control">
		</div>

	</form>
</div>
</body>
</html>