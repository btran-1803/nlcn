<?php
$PID = $_GET['PID'];

require_once "./func/db_func.php";
$con = db_connect();

$query = "DELETE FROM products WHERE PID = '$PID'";
$result = mysqli_query($con, $query);
if (!$result) {
   echo "delete data unsuccessfully " . mysqli_error($con);
   exit;
}
header("Location: Manager.php");
