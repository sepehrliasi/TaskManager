<?php
session_start();
include $_SERVER['DOCUMENT_ROOT']."/TaskManager/server/database/confdb.php";

$task1 = $_GET['id1'];
$task2 = $_GET['id2'];


    $sql = "DELETE from taskdependencies WHERE childTask='$task2' or parentTask='$task1'";
    mysqli_query($conn, $sql);

    header('Location: ' . $_SERVER['HTTP_REFERER']);

mysqli_close($conn);
?>