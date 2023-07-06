<?php
include $_SERVER['DOCUMENT_ROOT']."/TaskManager/server/database/confdb.php";

$db= $conn;
$taskid = $_GET['id'];
$email = $_POST['email'];

 if(empty($db)){
  $msg= "Database connection error";
 }elseif(empty("tasks")){
   $msg= "Table Name is empty";
 }else{

    $query = "SELECT * FROM users WHERE Email = '$email'";
    $result = $db->query($query);
    

    if($result== true){ 
        if ($result->num_rows > 0) {
            $row = mysqli_fetch_assoc($result);
            $userid = $row['UserID'];
            $sql = "INSERT INTO userTasks (UserID, taskid) VALUES ('$userid', '$taskid')";
            $result = $db->query($sql);
        } else {
           $msg= "No Data Found"; 
        }
    }
    header('Location: ' . $_SERVER['HTTP_REFERER']);
 }
?>