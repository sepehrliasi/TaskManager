<?php
session_start();
include $_SERVER['DOCUMENT_ROOT']."/TaskManager/server/database/confdb.php";

$taskid = $_GET['id'];
// Getting form data
$title = $_POST['title'];
$description = $_POST['description'];
$begin_time = $_POST['begin_time'];
$deadline = $_POST['deadline'];
$notificationDate = $_POST['notif_time'];
$priority = $_POST['priority'];

$userid = $_SESSION['userid'];

	// Updating data in database
    $sql = "UPDATE tasks SET title='$title', description='$description', beginDate='$begin_time', deadline='$deadline', notifDate='$notificationDate', priority='$priority'
    WHERE taskid='$taskid'";
    if(mysqli_query($conn, $sql)){
        header("Location:  /TaskManager/server/Task/TaskDetails.php?id=".$taskid);
    }else{
        echo mysqli_error($conn);
    }
    

mysqli_close($conn);
?>