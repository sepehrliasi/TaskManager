<?php
include $_SERVER['DOCUMENT_ROOT']."/TaskManager/server/database/confdb.php";

$db= $conn;
if(isset($_SESSION['userid'])){
    $myUserId = $_SESSION['userid'];
}
$taskid = $_GET['id'];

$fetchDep = fetch_dep($db, $myUserId, $taskid);

function fetch_dep($db, $myUserId, $taskid){
 if(empty($db)){
  $msg= "Database connection error";
 }elseif(empty("tasks")){
   $msg= "Table Name is empty";
 }else{

    $query = "SELECT * FROM tasks WHERE EXISTS (Select * from userTasks where tasks.taskid = userTasks.taskid and userTasks.UserID = '$myUserId') and 
    EXISTS (Select * from taskdependencies WHERE tasks.taskid = childTask and parentTask = '$taskid') ORDER BY taskid DESC";
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