<?php
session_start();
unset($_SESSION["emp_username"]);
unset($_SESSION["emp_name"]);
unset($_SESSION["emp_lname"]);
unset($_SESSION["EmployeeID"]);
unset($_SESSION["emp_admin"]);
// session_destroy();
header("location: ./login.php");
?>