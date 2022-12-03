<?php
// if save change happen
if (!isset($_POST['save_change'])) {
   echo "Something wrong!";
   exit;
}

$PID = trim($_POST['PID']);
$Title = trim($_POST['Title']);
$Author = trim($_POST['Author']);
$MRP = floatval(trim($_POST['MRP']));
$Price = floatval(trim($_POST['Price']));
$Discount = floatval(trim($_POST['Discount']));
$Available = floatval(trim($_POST['Available']));
$Publisher = trim($_POST['Publisher']);
$Edition = floatval(trim($_POST['Edition']));
$Category = trim($_POST['Category']);
$Description = trim($_POST['Description']);
$Language = trim($_POST['Language']);
$page = floatval(trim($_POST['page']));
$weight = floatval(trim($_POST['weight']));

if (isset($_FILES['Image']) && $_FILES['Image']['name'] != "") {
   $Image = $_FILES['Image']['name'];
   $directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']);
   $uploadDirectory = $_SERVER['DOCUMENT_ROOT'] . $directory_self . "img/books/";
   $uploadDirectory .= $Image;
   move_uploaded_file($_FILES['Image']['tmp_name'], $uploadDirectory);
}

require_once("./func/db_func.php");
$con = db_connect();


$query = "UPDATE products SET  
	Title = '$Title', 
	Author = '$Author', 
	MRP = '$MRP', 
	Price = '$Price',
   Discount = '$Discount',
   Available = '$Available',
   Publisher = '$Publisher',
   Edition = '$Edition',
   Description = '$Description',
   Language = '$Language',
   page = '$page',
   weight = '$weight'";
if (isset($image)) {
   $query .= ", book_image='$image' WHERE PID = '$PID'";
} else {
   $query .= " WHERE PID = '$PID'";
}
// two cases for fie , if file submit is on => change a lot
$result = mysqli_query($con, $query);
if (!$result) {
   echo "Can't update data " . mysqli_error($con);
   exit;
} else {
   header("Location: edit.php?PID=$PID");
}
