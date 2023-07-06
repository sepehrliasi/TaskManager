<?php
session_start();
include $_SERVER['DOCUMENT_ROOT']."/TaskManager/server/database/confdb.php";

// Getting form data
$title = $_POST['title'];
$description = $_POST['description'];
$begin_time = $_POST['begin_time'];
$deadline = $_POST['deadline'];
$notificationDate = $_POST['notif_time'];

$userid = $_SESSION['userid'];

	// Inserting data into database
    $sql = "INSERT INTO tasks (title, description, beginDate, deadline, notifDate)
    VALUES ('$title', '$description', '$begin_time', '$deadline', '$notificationDate')";
    mysqli_query($conn, $sql);
    $id = mysqli_insert_id($conn);

    $sql2 = "INSERT INTO userTasks (UserID, taskid) VALUES ('$userid', '$id')";
    if (mysqli_query($conn, $sql2)) {
        echo "Task successfully has been added!";
        header("Location: /TaskManager/server/task/ViewTasks.php");
    }
    else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

mysqli_close($conn);
?>