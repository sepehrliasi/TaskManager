<?php
include $_SERVER['DOCUMENT_ROOT']."/TaskManager/server/database/confdb.php";

$db= $conn;
$taskid = $_GET['id'];

$fetchData = fetch_data($db, $taskid);

function fetch_data($db, $taskid){
 if(empty($db)){
  $msg= "Database connection error";
 }elseif(empty("tasks")){
   $msg= "Table Name is empty";
 }else{

    $query = "SELECT * FROM tasks WHERE taskid = '$taskid'";
    $result = $db->query($query);

    $msg = mysqli_fetch_assoc($result);
       
 }
 return $msg;
}
?>