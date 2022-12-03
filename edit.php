<?php
session_start();
require_once "admin-log.php";
$title = "Edit book";
require_once "./header.php";
require_once "./func/db_func.php";
$con = db_connect();

if (isset($_GET['PID'])) {
   $PID = $_GET['PID'];
   // } else {
   //    echo "Empty query!";
   //    exit;
}

if (!isset($PID)) {
   echo "Empty isbn! check again!";
   exit;
}

// get book data
$query = "SELECT * FROM products WHERE PID = '$PID'";
$result = mysqli_query($con, $query);
if (!$result) {
   echo "Can't retrieve data " . mysqli_error($con);
   exit;
}
$row = mysqli_fetch_assoc($result);
?>
<form method="post" action="edit-proc.php" enctype="multipart/form-data">
   <table class="table">
      <tr>
         <th>Mã sách</th>
         <td><input type="text" name="PID" value="<?php echo $row['PID']; ?>" readOnly="true"></td>
      </tr>
      <tr>
         <th>Tên sách</th>
         <td><input type="text" name="Title" value="<?php echo $row['Title']; ?>" required></td>
      </tr>
      <tr>
         <th>Tác giả</th>
         <td><input type="text" name="Author" value="<?php echo $row['Author']; ?>" required></td>
      </tr>
      <tr>
         <th>Hình</th>
         <td><input type="file" name="Image" required></td>
      </tr>
      <tr>
         <th>Giá sale</th>
         <td><input type="text" name="MRP" value="<?php echo $row['MRP']; ?>" required></td>
      </tr>
      <tr>
         <th>Giá</th>
         <td><input type="text" name="Price" value="<?php echo $row['Price']; ?>" required></td>
      </tr>
      <tr>
         <th>Sale</th>
         <td><input type="text" name="Discount" value="<?php echo $row['Discount']; ?>" required></td>
      </tr>
      <tr>
         <th>Số lượng</th>
         <td><input type="text" name="Available" value="<?php echo $row['Available']; ?>" required></td>
      </tr>
      <tr>
         <th>NXB</th>
         <td><input type="text" name="Publisher" value="<?php echo $row['Publisher']; ?>" required></td>
      </tr>
      <tr>
         <th>Tái bản</th>
         <td><input type="text" name="Edition" value="<?php echo $row['Edition']; ?>" required></td>
      </tr>
      <tr>
         <th>Thể loại</th>
         <td><input type="text" name="Category" value="<?php echo $row['Category']; ?>" required></td>
      </tr>
      <tr>
         <th>Thông tin</th>
         <td><textarea name="Description" cols="80" rows="10"><?php echo $row['Description']; ?></textarea>
      </tr>
      <tr>
         <th>Ngôn ngữ</th>
         <td><input type="text" name="Language" value="<?php echo $row['Language']; ?>" required></td>
      </tr>
      <tr>
         <th>Số trang</th>
         <td><input type="text" name="page" value="<?php echo $row['page']; ?>" required></td>
      </tr>
      <tr>
         <th>Cân nặng</th>
         <td><input type="text" name="weight" value="<?php echo $row['weight']; ?>" required></td>
      </tr>
   </table>
   <input type="submit" name="save_change" value="Sửa" class="btn btn-primary">
   <input type="reset" value="Hủy" class="btn btn-default">
</form>
<br />
<a href="./Manager.php" class="btn btn-success">Lưu thay đổi</a>
<?php
if (isset($con)) {
   mysqli_close($con);
}

?>