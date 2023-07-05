<?php
include $_SERVER['DOCUMENT_ROOT']."/TaskManager/server/database/confdb.php";

$db= $conn;
$tableName="tasks";
$columns= ['title', 'description', 'begin_time', 'deadline', 'priority', 'isComplete'];
$fetchData = fetch_data($db, $tableName, $columns);

function fetch_data($db, $tableName, $columns){
 if(empty($db)){
  $msg= "Database connection error";
 }elseif (empty($columns) || !is_array($columns)) {
  $msg="columns Name must be defined in an indexed array";
 }elseif(empty($tableName)){
   $msg= "Table Name is empty";
}else{

$query1 = "SELECT taskId FROM userTasks WHERE UserID = ".$_SESSION['userid'];
$result1 = $db->query($query1);

if($result1== true){ 
    if ($result1->num_rows > 0) {
       $row1= mysqli_fetch_all($result, MYSQLI_ASSOC);
       $taskIDs= $row1;

       $columnName = implode(", ", $columns);
       $query = "SELECT * FROM tasks WHERE EXISTS (Select * from userTasks where tasks.taskid = userTasks.taskid and userTasks.UserID = ".$_SESSION['userid'].") ORDER BY taskid DESC";
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
    }else {
       $msg= "No Data Found"; 
    }
}else{
    $msg= mysqli_error($db);
}

return $msg;
}}
?>