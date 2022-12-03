<?php
session_start();
require_once "admin-log.php";
require_once "./header.php";
$title = "Thêm mới";
require "./func/db_func.php";
$con = db_connect();

if (isset($_POST['add'])) {
   $PID = trim($_POST['PID']);
   $PID = mysqli_real_escape_string($con, $PID);

   $Title = trim($_POST['Title']);
   $Title = mysqli_real_escape_string($con, $Title);

   $Price = floatval(trim($_POST['Price']));
   $Price = mysqli_real_escape_string($con, $Price);

   $Available = floatval(trim($_POST['Available']));
   $Available = mysqli_real_escape_string($con, $Available);

   $Category = trim($_POST['Category']);
   $Category = mysqli_real_escape_string($con, $Category);

   $Description = trim($_POST['Description']);
   $Description = mysqli_real_escape_string($con, $Description);



   // add image
   if (isset($_FILES['Image']) && $_FILES['Image']['name'] != "") {
      $Image = $_FILES['Image']['name'];
      $directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']);
      $uploadDirectory = $_SERVER['DOCUMENT_ROOT'] . $directory_self . "img/books/";
      $uploadDirectory .= $Image;
      move_uploaded_file($_FILES['Image']['tmp_name'], $uploadDirectory);
   }


   $query = "INSERT INTO products VALUES ('" . $PID . "'
                                       , '" . $Title . "'
                                       , '" . $Image . "'
                                       , '" . $Price . "'
                                       , '" . $Available . "'
                                       , '" . $Category . "'
                                       , '" . $Description . "')";
   $result = mysqli_query($con, $query);
?>
   <script type="text/javascript">
      alert("Đã thêm sản phẩm!");
   </script>
   <?php
   if (!$result) {
   ?>
      <script type="text/javascript">
         alert("Không thể thêm, vui lòng kiểm tra lại thông tin!");
      </script>
<?php
      exit;
   }
}
?>

<form method="post" action="add.php" enctype="multipart/form-data">
   <table class="table">
      <tr>
         <th>Mã sản phẩm</th>
         <td><input type="text" name="PID"></td>
      </tr>
      <tr>
         <th>Tên</th>
         <td><input type="text" name="Title" required></td>
      </tr>
      <tr>
         <th>Hình ảnh</th>
         <td><input type="file" name="Image" required> </td>
      </tr>
      <tr>
         <th>Giá</th>
         <td><input type="text" name="Price" required></td>
      </tr>
      <tr>
         <th>Số lượng</th>
         <td><input type="text" name="Available" required></td>
      </tr>
      <tr>
      <tr>
         <th>Loại</th>
         <td><input type="text" name="Category" required></td>
      </tr>
      <tr>
         <th>Thông tin</th>
         <td><textarea name="Description" cols="80" rows="10"></textarea></td>
      </tr>
   </table>
   <input type="submit" name="add" value="Thêm" class="btn btn-primary">
   <input type="reset" value="Hủy" class="btn btn-default">
</form>
<br />
<?php
if (isset($con)) {
   mysqli_close($con);
}
?>