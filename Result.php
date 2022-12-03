<?php
session_start();
// include "dbconnect.php";
// error_reporting(E_ERROR | E_PARSE);
// if (!isset($_SESSION['user']))
//     header("location: index.php?Message=Đăng nhập để tiếp tục");
// if (isset($_GET['Message'])) {
//     print '<script type="text/javascript">
//                alert("' . $_GET['Message'] . '");
//            </script>';
// }

// if (isset($_GET['response'])) {
//     print '<script type="text/javascript">
//                alert("' . $_GET['response'] . '");
//            </script>';
// }



// if (isset($_POST['submit'])) {
//     if ($_POST['submit'] == "login") {
//         $username = $_POST['login_username'];
//         $password = $_POST['login_password'];
//         $query = "SELECT * from users where UserName ='$username' AND Password='$password'";
//         $result = mysqli_query($con, $query) or die($con->error);
//         if (mysqli_num_rows($result) > 0) {
//             $row = mysqli_fetch_assoc($result);
//             $_SESSION['user'] = $row['UserName'];
//             print '
//                 <script type="text/javascript">alert("Đăng nhập thành công!!!");</script>
//                   ';
//         } else {
//             print '
//               <script type="text/javascript">alert("Sai tài khoản hoặc mật khẩu!");</script>
//                   ';
//         }
//     } else if ($_POST['submit'] == "register") {
//         $username = $_POST['register_username'];
//         $password = $_POST['register_password'];
//         $query = "select * from users where UserName = '$username'";
//         $result = mysqli_query($con, $query) or die($con->error);
//         if (mysqli_num_rows($result) > 0) {
//             print '
//                <script type="text/javascript">alert("tài khoản đã tồn tại");</script>
//                     ';
//         } else {
//             $query = "INSERT INTO users VALUES ('$username','$password')";
//             $result = mysqli_query($con, $query);
//             print '
//                 <script type="text/javascript">
//                  alert("Đăng ký thành công!");
//                 </script>
//                ';
//         }
//     }
// }

// if (isset($_POST['submit1'])) {
//     if ($_POST['submit1'] == "login1") {
//         $username = $_POST['login_username'];
//         $password = $_POST['login_password'];
//         $query = "SELECT * from admin where UserName ='$username' AND Password='$password'";
//         $result = mysqli_query($con, $query) or die($con->error);
//         if (mysqli_num_rows($result) > 0) {
//             $row = mysqli_fetch_assoc($result);
//             $_SESSION['admin'] = $row['UserName'];
//             print '
//                 <script type="text/javascript">alert("Đăng nhập thành công!!!");</script>
//                   ';
//         } else {
//             print '
//               <script type="text/javascript">alert("Sai tài khoản hoặc mật khẩu!");</script>
//                   ';
//         }
//     }
// }
?>


<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/test2.css" rel="stylesheet">
<!-- <link href="css/test2.css" rel="stylesheet">
<link href="css/bootstrap.min.css" rel="stylesheet"> -->
<style>
    /* .modal-header {
        background: #8ccc24d5;
        color: #fff;
        font-weight: 800;
    }

    .modal-body {
        font-weight: 800;
    }

    .modal-body ul {
        list-style: none;
    }

    .modal .btn {
        background: #8ccc24d5;
        color: #fff;
    }

    .modal a {
        color: #8ccc24d5;
    }

    .modal-backdrop {
        position: inherit !important;
    }

    #login_button,
    #register_button {
        border: none;
        background: none;
        color: #8ccc24d5 !important;
    } */

    #books .row {
        margin-top: 30px;
        font-weight: 800;
    }

    @media only screen and (max-width: 760px) {
        #books .row {
            margin-top: 10px;
        }
    }

    /* #login_button,
    #register_button {
        border: none;
        background: none;
        color: #8ccc24d5 !important;
    } */

    .book-block {
        margin-top: 20px;
        margin-bottom: 10px;
        padding: 10px 10px 10px 10px;
        border: 1px solid #DEEAEE;
        border-radius: 10px;
        height: 100%;
    }
</style>

</head>

<body>
    <nav class="navbar navbar-default navbar-fixed-top navbar-inverse">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php" style="padding: 1px;"><img class="img-responsive" alt="Brand" src="img/zhenyangg.png" style="width: 70px; margin-left: 50px; margin-top:1px"></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <?php
                    //         if (!isset($_SESSION['user']) && !isset($_SESSION['admin'])) {
                    //             echo '
                    // <li>
                    //     <button type="button" id="login_button" class="btn btn-lg" data-toggle="modal" data-target="#login"><span class="glyphicon glyphicon-log-in"></span></button>
                    //       <div id="login" class="modal fade" role="dialog">
                    //         <div class="modal-dialog">
                    //             <div class="modal-content">
                    //                 <div class="modal-header">
                    //                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                    //                     <h4 class="modal-title text-center">Đăng nhập</h4>
                    //                 </div>
                    //                 <div class="modal-body">
                    //                               <form class="form" role="form" method="post" action="Result.php" accept-charset="UTF-8">
                    //                                   <div class="form-group">
                    //                                       <label class="sr-only" for="username">Username</label>
                    //                                       <input type="text" name="login_username" class="form-control" placeholder="Username" required>
                    //                                   </div>
                    //                                   <div class="form-group">
                    //                                       <label class="sr-only" for="password">Password</label>
                    //                                       <input type="password" name="login_password" class="form-control"  placeholder="Password" required>
                    //                                   </div>
                    //                                   <div class="form-group">
                    //                                       <button type="submit" name="submit" value="login" class="btn btn-block">
                    //                                           Đăng nhập
                    //                                       </button>
                    //                                       <button type="submit" name="submit1" value="login1" class="btn btn-block">
                    //                                           Đăng nhập admin
                    //                                       </button>
                    //                                   </div>
                    //                               </form>
                    //                 </div>
                    //                 <div class="modal-footer">
                    //                     <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                    //                 </div>
                    //             </div>
                    //         </div>
                    //       </div>
                    // </li>
                    // <li>
                    //   <button type="button" id="register_button" class="btn btn-lg" data-toggle="modal" data-target="#register"><span class="glyphicon glyphicon-user"></span></button>
                    //     <div id="register" class="modal fade" role="dialog">
                    //       <div class="modal-dialog">
                    //           <div class="modal-content">
                    //               <div class="modal-header">
                    //                   <button type="button" class="close" data-dismiss="modal">&times;</button>
                    //                   <h4 class="modal-title text-center">Đăng ký tài khoản</h4>
                    //               </div>
                    //               <div class="modal-body">
                    //                             <form class="form" role="form" method="post" action="Result.php" accept-charset="UTF-8">
                    //                                 <div class="form-group">
                    //                                     <label class="sr-only" for="username">Username</label>
                    //                                     <input type="text" name="register_username" class="form-control" placeholder="Username" required>
                    //                                 </div>
                    //                                 <div class="form-group">
                    //                                     <label class="sr-only" for="password">Password</label>
                    //                                     <input type="password" name="register_password" class="form-control"  placeholder="Password" required>
                    //                                 </div>
                    //                                 <div class="form-group">
                    //                                     <button type="submit" name="submit" value="register" class="btn btn-block">
                    //                                         Đăng ký
                    //                                     </button>
                    //                                 </div>
                    //                             </form>
                    //               </div>
                    //               <div class="modal-footer">
                    //                   <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                    //               </div>
                    //           </div>
                    //       </div>
                    //     </div>
                    // </li>';
                    //         } else if (isset($_SESSION['user'])) {
                    //             echo '  <li> <a href="#" class="btn btn-lg"> Chào ' . $_SESSION['user'] . '.</a></li>
                    //                         <li> <a href="cart.php" class="btn btn-lg"><span class="glyphicon glyphicon-shopping-cart"></a> </li>
                    //                         <li> <a href="destroy.php" class="btn btn-lg"><span class="glyphicon glyphicon-log-out"></a> </li>';
                    //         } else {
                    //             echo '  <li> <a href="Manager.php" class="btn btn-lg"> Chào ' . $_SESSION['admin'] . '.</a></li>
                    //                     <li> <a href="admin-out.php" class="btn btn-lg"><span class="glyphicon glyphicon-log-out"></a> </li>';
                    //         }
                    if (isset($_SESSION['user'])) {
                        echo '
                    <li><a href="cart.php" class="btn btn-lg"><span class="glyphicon glyphicon-shopping-cart"></span></a></li>
                    <li><a href="destroy.php" class="btn btn-lg"> <span class="glyphicon glyphicon-log-out"></span></a></li>
                         ';
                    }
                    ?>

                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
    <div id="top">
        <div id="searchbox" class="container-fluid" style="width:112%;margin-left:-6%;margin-right:-6%;">
            <div>
                <form role="search" method="POST" action="Result.php">
                    <input type="text" class="form-control" name="keyword" style="width:80%;margin:20px 10% 20px 10%;" placeholder="Tìm kiếm sản phẩm yêu thích">
                </form>
            </div>
        </div>
        <?php
        include "dbconnect.php";
        $keyword = $_POST['keyword'];

        $query = "select * from products  where PID like '%{$keyword}%' OR Title like '%{$keyword}%' OR Author like '%{$keyword}%' OR Publisher like '%{$keyword}%' OR Category like '%{$keyword}%'";
        $result = mysqli_query($con, $query) or die(mysqli_error($con));;

        $i = 0;
        echo '<div class="container-fluid" id="books">
        <div class="row">
          <div class="col-xs-12 text-center" id="heading">
                 <h4 style="color:#72aa36;text-transform:uppercase;"> tìm thấy  ' . mysqli_num_rows($result) . ' sản phẩm </h4>
           </div>
        </div>';
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $path = "img/books/" . $row['PID'] . ".jpg";
                $description = "description.php?ID=" . $row["PID"];
                if ($i % 3 == 0)  $offset = 0;
                else  $offset = 1;
                if ($i % 3 == 0)
                    echo '<div class="row">';
                echo '
               <a href="' . $description . '">
                <div class="col-sm-5 col-sm-offset-1 col-md-3 col-md-offset-' . $offset . ' col-lg-3 text-center w3-card-8 w3-dark-grey">
                    <div class="book-block">
                        <img class="book block-center img-responsive" src="' . $path . '">
                        <hr>
                         ' . $row["Title"] . '<br>
                        ' . $row["Price"] . '  &nbsp
                        <span style="text-decoration:line-through;color:#828282;"> ' . $row["MRP"] . ' </span>
                        <span class="label label-warning">' . $row["Discount"] . '%</span>
                    </div>
                </div>
                
               </a> ';
                $i++;
                if ($i % 3 == 0)
                    echo '</div>';
            }
        }
        echo '</div>';
        ?>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>

</body>

</html>