<?php

include('connection.php');

if( isset( $_POST['submit']) ) {
	
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$address = $_POST['address'];
	$gender = $_POST['gender'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	
	if( !empty($_POST['password']) ){
		
		$password = md5($_POST['password']);
	}

	$id = isset($_POST['id']) ? $_POST['id']:0;

	//SQL
	$created_at = date('Y-m-d h:i:s'); // 2016-0-13 16:01:00
	
	if($id>0){
		$query = "UPDATE users 
				SET fname= '$fname', 
				lname='$lname',
				address= '$address',
				gender ='$gender',
				phone ='$phone',
				email = '$email'
				";
	    if(isset($password)){

	    	$query .= ",password = '$password'";
	    }

	    $query .= " WHERE id='$id'";
	    			


	}else{
		$query ="INSERT INTO users(fname,lname,address,gender,phone,email,password,created_at)
			VALUES ('$fname','$lname','$address','$gender','$phone','$email','$password','$created_at')
		";
	}

	mysqli_query($conn, $query);
	header('Location: list.php');

}
