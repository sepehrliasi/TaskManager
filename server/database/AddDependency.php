<?php
include $_SERVER['DOCUMENT_ROOT']."/TaskManager/server/database/confdb.php";

$db= $conn;
$task1 = $_GET['id1'];
$task2 = $_GET['id2'];
$_SESSION['dep'] = "";

if ($task1 == $task2){
    $_SESSION['dep'] = "Cannot add dependency to the same task!";
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}else {
    $sql = "INSERT INTO taskdependencies (parentTask, childTask) values ('$task1', '$task2')";
    if (mysqli_query($conn, $sql)){
        $_SESSION['dep'] = "Dependency successfully added!";
    }else {
        $_SESSION['dep'] = "Database Error!";
    }
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}

?>