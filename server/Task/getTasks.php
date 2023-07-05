<?php
session_start();
include $_SERVER['DOCUMENT_ROOT']."/TaskManager/server/database/confdb.php";

$db= $conn;
$myUserId = $_SESSION['userid'];
$fetchData = fetch_data($db);

function fetch_data($db){
 if(empty($db)){
  $msg= "Database connection error";
 }elseif(empty("tasks")){
   $msg= "Table Name is empty";
 }else{

    $query = "SELECT * FROM tasks WHERE EXISTS (Select * from userTasks where tasks.taskid = userTasks.taskid and userTasks.UserID = '$myUserId') ORDER BY taskid DESC";
    $result = $db->query($query);
       
       
    if($result== true){ 
        if ($result->num_rows > 0) {
           $row= mysqli_fetch_all($result, MYSQLI_ASSOC);
           $msg= $row;
        } else {
           $msg= "No Data Found"; 
        }
    }else{
        $msg= mysqli_error($db);
    }
 }
 return $msg;
}
?>