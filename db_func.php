<?php
function db_connect()
{
   $con = mysqli_connect("localhost", "root", "", "nlcn");
   if (!$con) {
      echo "Can't connect database " . mysqli_connect_error($con);
      exit;
   }
   return $con;
}

function getAll($con)
{
   $query = "SELECT * from products ORDER BY PID DESC";
   $result = mysqli_query($con, $query);
   if (!$result) {
      echo "Can't retrieve data " . mysqli_error($con);
      exit;
   }
   return $result;
}
