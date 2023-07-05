<?php 
session_start();

session_unset();
session_destroy();

header("Location: /TaskManager/client/user/login.html");
?>