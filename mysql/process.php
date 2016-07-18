<?php
session_start();
include('connection.php');

if( isset($_POST['submit'])){
	$email = $_POST['email'];
	$password = md5($_POST['password']);

	$query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
	$result = mysqli_query($conn, $query);
	if($result){
		$record = mysqli_fetch_object($result);
		$_SESSION['islogin'] = true;
		$_SESSION['userinfo']= $record;
		
		if($record->role == 'admin' ){
			header('Location: list.php');
		}else if( $record->role == 'user'){
			header('Location: profile.php');
		}
		
	} else{
		
		header('Location: login.php?error=1');

	}
}