<?php
session_start();
include $_SERVER['DOCUMENT_ROOT']."/TaskManager/server/database/confdb.php";

$taskid = $_GET['id'];


    $sql = "DELETE from tasks WHERE taskid='$taskid'";
    mysqli_query($conn, $sql);

    $sql2 = "DELETE from userTasks WHERE taskid='$taskid'";
    mysqli_query($conn, $sql2);

    $sql3 = "DELETE from taskdependencies WHERE childTask='$taskid' or parentTask='$taskid'";
    mysqli_query($conn, $sql3);

    header('Location: ' . $_SERVER['HTTP_REFERER']);

mysqli_close($conn);
?>