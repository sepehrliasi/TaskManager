<?php 
session_start(); 
include "confdb.php";

$email = $_POST['email'];
$password = $_POST['password'];
    
$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) === 1) {
	$row = mysqli_fetch_assoc($result);
    $_SESSION['email'] = $row['email'];
    $_SESSION['userid'] = $row['userid'];
    header("Location: home.html");
	exit();
} else{
	header("Location: login.html?error=Incorrect email or password");
	exit();
}
?>