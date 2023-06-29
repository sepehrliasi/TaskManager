<?php
// Establishing connection to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "TaskManager";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Getting form data
$email = $_POST['email'];
$password = $_POST['password'];

$sqlvalidation = "SELECT * FROM users WHERE email='$email'";
$result = mysqli_query($conn, $sqlvalidation);

if (mysqli_num_rows($result) > 0) {
	echo "This email has been used before.. please use another email!";
}
else {
	// Inserting data into database
    $sql = "INSERT INTO users (email, password)
    VALUES ('$email', '$password')";

    if (mysqli_query($conn, $sql)) {
        echo "Registration successful!";
    }
    else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>