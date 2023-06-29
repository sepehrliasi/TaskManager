<?php
include $_SERVER['DOCUMENT_ROOT']."/TaskManager/server/database/confdb.php";

// Getting form data
$title = $_POST['title'];
$description = $_POST['description'];
$begin_time = $_POST['begin_time'];
$deadline = $_POST['deadline'];

	// Inserting data into database
    $sql = "INSERT INTO tasks (title, description, beginDate, deadline)
    VALUES ('$title', '$description', '$begin_time', '$deadline')";

    if (mysqli_query($conn, $sql)) {
        echo "Task successfully has been added!";
    }
    else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

mysqli_close($conn);
?>