<?php 
session_start();
include $_SERVER['DOCUMENT_ROOT']."/TaskManager/server/database/confdb.php";

$email = $_POST['email'];
$password = $_POST['password'];
    
$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) === 1) {
	$row = mysqli_fetch_assoc($result);
    $_SESSION['email'] = $row['email'];
    $_SESSION['userid'] = $row['userid'];
    header("Location: dashboard.html");
	exit();
} else{
	header("Location: /TaskManager/client/user/login.html?error=Incorrect email or password");
	exit();
}
?>