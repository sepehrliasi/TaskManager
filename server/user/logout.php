<?php 
session_start();

session_unset();
session_destroy();

header("Location: /TaskManager/server/user/login.html");
?>