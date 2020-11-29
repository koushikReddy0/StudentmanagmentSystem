<?php
session_start();

if($_SESSION['type']=="admin"){
    header("Location: admin_dashboard.php");
}
else if($_SESSION['type']=="student"){
    header("Location: student_dashboard.php");
}
else{
    header("Location: login.php");
}

?>