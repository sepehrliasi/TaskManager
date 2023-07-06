<?php
session_start();
include $_SERVER['DOCUMENT_ROOT']."/TaskManager/server/database/confdb.php";

$taskid = $_GET['id'];


    $sql = "DELETE from tasks WHERE taskid='$taskid'";
    mysqli_query($conn, $sql);
    header('Location: ' . $_SERVER['HTTP_REFERER']);

mysqli_close($conn);
?>