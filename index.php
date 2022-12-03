<?php
session_start();
include "dbconnect.php";
error_reporting(E_ERROR | E_PARSE);
if (isset($_GET['Message'])) {
    print '<script type="text/javascript">
               alert("' . $_GET['Message'] . '");
           </script>';
}

if (isset($_GET['response'])) {
    print '<script type="text/javascript">
               alert("' . $_GET['response'] . '");
           </script>';
}


if (isset($_POST['submit'])) {
    if ($_POST['submit'] == "login") {
        $username = $_POST['login_username'];
        $password = $_POST['login_password'];

        $query = "SELECT * from users where UserName ='$username'";
        $result = mysqli_query($con, $query) or die($con->error);
        $row = mysqli_fetch_assoc($result);
        $hash = $row['Password'];
        if (password_verify($password, $hash)) {

            $_SESSION['user'] = $row['UserName'];
            print '
                <script type="text/javascript">alert("Đăng nhập thành công!!!");</script>
                  ';
        } else {
            print '
              <script type="text/javascript">alert("Sai tài khoản hoặc mật khẩu!");</script>
                  ';
        }
    } else if ($_POST['submit'] == "register") {
        $username = $_POST['register_username'];
        $password = $_POST['register_password'];
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $query = "select * from users where UserName = '$username'";
        $result = mysqli_query($con, $query) or die($con->error);
        if (mysqli_num_rows($result) > 0) {
            print '
               <script type="text/javascript">alert("tài khoản đã tồn tại");</script>
                    ';
        } else {
            $query = "INSERT INTO users VALUES ('$username','$hash')";
            $result = mysqli_query($con, $query);
            print '
                <script type="text/javascript">
                 alert("Đăng ký thành công!");
                </script>
               ';
        }
    }
}

if (isset($_POST['submit1'])) {
    if ($_POST['submit1'] == "login1") {
        $username = $_POST['login_username'];
        $password = $_POST['login_password'];
        $query = "SELECT * from admin where UserName ='$username' AND Password='$password'";
        $result = mysqli_query($con, $query) or die($con->error);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['admin'] = $row['UserName'];
            print '
                <script type="text/javascript">alert("Đăng nhập thành công!!!");</script>
                  ';
        } else {
            print '
              <script type="text/javascript">alert("Sai tài khoản hoặc mật khẩu!");</script>
                  ';
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Books">
    <title>Online Fruits</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/test2.css" rel="stylesheet">
    <style>
        .footer{
	background: #000;
	color: #8a8a8a;
	font-size: 14px;
	padding: 60px 0 20px;
}

.footer p{
	color: #8a8a8a;
}

.footer h3{
	color: #fff;
	margin-bottom: 20px;
}

.footer-col-1, .footer-col-2, .footer-col-3, .footer-col-4{
	min-width: 250px;
	margin-bottom: 20px;
}

.footer-col-1{
	flex-basis: 30%;
}

.footer-col-2{
	flex: 1;
	text-align: center;
}

.footer-col-2 img{
	width: 180px;
	margin-bottom: 20px;
}

.footer-col-3, .footer-col-4{
	flex-basis: 12%;
	text-align: center;
}

ul{
	list-style-type: none;
}

.app-logo{
	margin-top: 20px;
}

.app-logo img{
	width: 140px;
}

.footer hr{
	border: none;
	background: #b5b5b5;
	height: 1px;
	margin: 20px 0;
}

.coppyright{
	text-align: center;
}

.menu-icon{
	width: 28px;
	margin-left: 20px;
	display: none;
}

.container{
	max-width: 1200px;
	margin: auto;
	/*padding-left: 25px;
	padding-right: 25px;*/
}

.row{
	display: flex;
	flex-wrap: wrap;
    /*align-items: center;
	justify-content: space-around;*/
}
        .modal-header {
            background: #rgb(255, 180, 249);
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
            background: rgb(255, 180, 249);
            color: #fff;
        }

        .modal a {
            color: rgb(255, 180, 249);
        }

        .modal-backdrop {
            position: inherit !important;
        }

        #login_button,
        #register_button {
            border: none;
            background: none;
            color: rgb(255, 180, 249) !important;
        }

        #query_button {
            position: fixed;
            right: 0px;
            bottom: 0px;
            padding: 10px 80px;
            background-color: rgb(255, 180, 249);
            color: #fff;
            border-color: rgb(255, 180, 249);
            border-radius: 2px;
        }

        @media(max-width:767px) {
            #query_button {
                padding: 5px 20px;
            }
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
                <a class="navbar-brand" href="#" style="padding: 1px;"><img class="img-responsive" alt="Brand" src="img/zhenyangg.png" style="width: 70px; margin-left: 50px; margin-top:1px"></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <?php
                    if (!isset($_SESSION['user']) && !isset($_SESSION['admin'])) {
                        echo '
            <li>
                <button type="button" id="login_button" class="btn btn-lg" data-toggle="modal" data-target="#login"><span class="glyphicon glyphicon-log-in"></span></button>
                  <div id="login" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title text-center">Đăng nhập</h4>
                            </div>
                            <div class="modal-body">
                                          <form class="form" role="form" method="post" action="index.php" accept-charset="UTF-8">
                                              <div class="form-group">
                                                  <label class="sr-only" for="username">Username</label>
                                                  <input type="text" name="login_username" class="form-control" placeholder="Username" required>
                                              </div>
                                              <div class="form-group">
                                                  <label class="sr-only" for="password">Password</label>
                                                  <input type="password" name="login_password" class="form-control"  placeholder="Password" required>
                                              </div>
                                              <div class="form-group">
                                                  <button type="submit" name="submit" value="login" class="btn btn-block">
                                                      Đăng nhập
                                                  </button>
                                                  <button type="submit" name="submit1" value="login1" class="btn btn-block">
                                                      Đăng nhập admin
                                                  </button>
                                              </div>
                                          </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                            </div>
                        </div>
                    </div>
                  </div>
            </li>
            <li>
              <button type="button" id="register_button" class="btn btn-lg" data-toggle="modal" data-target="#register"><span class="glyphicon glyphicon-user"></span></button>
                <div id="register" class="modal fade" role="dialog">
                  <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title text-center">Đăng ký tài khoản</h4>
                          </div>
                          <div class="modal-body">
                                        <form class="form" role="form" method="post" action="index.php" accept-charset="UTF-8">
                                            <div class="form-group">
                                                <label class="sr-only" for="username">Username</label>
                                                <input type="text" name="register_username" class="form-control" placeholder="Username" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="sr-only" for="password">Password</label>
                                                <input type="password" name="register_password" class="form-control"  placeholder="Password" required>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" name="submit" value="register" class="btn btn-block">
                                                    Đăng ký
                                                </button>
                                            </div>
                                        </form>
                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                          </div>
                      </div>
                  </div>
                </div>
            </li>';
                    } else if (isset($_SESSION['user'])) {
                        echo '  <li> <a href="#" class="btn btn-lg"> Chào ' . $_SESSION['user'] . '.</a></li>
                                <li> <a href="cart.php" class="btn btn-lg"><span class="glyphicon glyphicon-shopping-cart"></a> </li>
                                <li> <a href="destroy.php" class="btn btn-lg"><span class="glyphicon glyphicon-log-out"></a> </li>';
                    } else {
                        echo '  <li> <a href="Manager.php" class="btn btn-lg"> Chào ' . $_SESSION['admin'] . '.</a></li>
                                <li> <a href="admin-out.php" class="btn btn-lg"><span class="glyphicon glyphicon-log-out"></a> </li>';
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
                    <input type="text" class="form-control" name="keyword" style="width:80%;margin:20px 10% 20px 10%;" placeholder="Tìm kiếm sản phẩm yêu thích.">
                </form>
            </div>
        </div>

        <div class="container-fluid" id="header">
            <div class="row">
                <div class="col-md-3 col-lg-3" id="category">
                    <div style="background:#8ccc24d5;color:#fff;font-size:large;font-weight:800;border:none;padding:15px;"> Loại trái cây</div>
                    <ul>
                        <li class="cat-op"> <a href="Product.php?value=cam"> Cam </a> </li>
                        <li lass="cat-op"> <a href="Product.php?value=Táo"> Táo </a> </li>
                        <li lass="cat-op"> <a href="Product.php?value=Chuối"> Chuối </a> </li>
                        <li lass="cat-op"> <a href="Product.php?value=Nho"> Nho </a> </li>
                        <li lass="cat-op"> <a href="Product.php?value=Dưa%20Hấu"> Dưa Hấu </a> </li>
                        <li lass="cat-op"> <a href="Product.php?value=Bưởi"> Bưởi </a> </li>
                        <li lass="cat-op"> <a href="Product.php?value=Dừa"> Dừa </a> </li>
                        <li lass="cat-op"> <a href="Product.php?value=Khác"> Khác </a> </li>

                    </ul>
                </div>
                <div class="col-md-6 col-lg-6">
                    <div id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel" data-slide-to="1"></li>
                            <li data-target="#myCarousel" data-slide-to="2"></li>
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            <div class="item active">
                                <a href="description.php?ID=NN13"><img height="386px" width="672px" class="img-responsive" src="img/carousel/1.jpg"></a>
                            </div>

                            <div class="item">
                                <a href="description.php?ID=LS4"><img height="386px" width="672px" class="img-responsive " src="img/carousel/2.jpg"></a>
                            </div>

                            <div class="item">
                                <a href="description.php?ID=NN14"><img height="386px" width="672px" class="img-responsive" src="img/carousel/3.jpg"></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-lg-3" id="publisher-lis">
                    <figure> <a href="Product1.php?value1=Cam"> <img height="120px" width="280px" src="img/publishers/4.jpg"></a></figure>
                    <figure><a href="Product1.php?value1=Táo"> <img height="120px" width="280px" src="img/publishers/5.jpg"></a></figure>
                    <figure><a href="Product1.php?value1=Dưa%20Hấu"> <img height="120px" width="280px" src="img/publishers/6.jpg"></a></figure>
                </div>
            </div>
        </div>
    </div>

    <!--<div class="container-fluid text-center" id="new">
        <div class="row">
            <div class="col-sm-6 col-md-3 col-lg-3">
                <a href="description.php?ID=NEW-1&category=new">
                    <div class="book-block">
                        <div class="tag">Hot</div>
                        <div class="tag-side"><img src="img/tag.png"></div>
                        <img class="rounded mx-auto d-block" src="img/0.jpg">
                        <hr>
                        Cam Sành <br>
                        80000đ &nbsp
                        <span style="text-decoration:line-through;color:#828282;"> 80000 </span>
                        <span class="label label-warning">0%</span>
                    </div>
                </a>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3">
                <a href="description.php?ID=NEW-2&category=new">
                    <div class="book-block">
                        <div class="tag">Hot</div>
                        <div class="tag-side"><img src="img/tag.png"></div>
                        <img class="rounded mx-auto d-block" src="img/new/6.jpg">
                        <hr>
                        Táo Xanh <br>
                        59000đ &nbsp
                        <span style="text-decoration:line-through;color:#828282;"> 59000 </span>
                        <span class="label label-warning">0%</span>
                    </div>
                </a>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3">
                <a href="description.php?ID=NEW-3&category=new">
                    <div class="book-block">
                        <div class="tag">Mới</div>
                        <div class="tag-side"><img src="img/tag.png"></div>
                        <img class="rounded mx-auto d-block" src="img/new/3.jpg">
                        <hr>
                        Chuyện người tùy nữ (tái bản 2022) <br>
                        100000đ &nbsp
                        <span style="text-decoration:line-through;color:#828282;"> 100000 </span>
                        <span class="label label-warning">0%</span>
                    </div>
                </a>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3">
                <a href="description.php?ID=NEW-5&category=new">
                    <div class="book-block">
                        <div class="tag">Mới</div>
                        <div class="tag-side"><img src="img/tag.png"></div>
                        <img class="rounded mx-auto d-block" src="img/new/5.jpg">
                        <hr>
                        Bài thơ của một người yêu nước mình (tái bản 2022)<br>
                        104000đ &nbsp
                        <span style="text-decoration:line-through;color:#828282;"> 104000 </span>
                        <span class="label label-warning">0%</span>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <div class="container-fluid" id="author">
        <h3 style="color:#8ccc24d5;"> TÁC GIẢ </h3>
        <div class="row">
            <div class="col-sm-5 col-md-3 col-lg-3">
                <a href="Author.php?value=Erich%20Maria%20Remarque"><img class="img-responsive center-block" src="img/author/0.jpg"></a>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3">
                <a href="Author.php?value=Nguyễn%20Ngọc%20Tư"><img class="img-responsive center-block" src="img/author/1.jpg"></a>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3">
                <a href="Author.php?value=Đoàn%20Minh%20Phượng"><img class="img-responsive center-block" src="img/author/2.jpg"></a>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3">
                <a href="Author.php?value=Tanizaki%20Junichiro"><img class="img-responsive center-block" src="img/author/3.jpg"></a>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-5 col-md-3 col-lg-3">
                <a href="Author.php?value=Vladimir%20Nabokov"><img class="img-responsive center-block" src="img/author/4.jpg"></a>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3">
                <a href="Author.php?value=Alexandre%20Dumas%20cha"><img class="img-responsive center-block" src="img/author/5.jpg"><a>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3">
                <a href="Author.php?value=Nguyễn%20Nhật%20Ánh"><img class="img-responsive center-block" src="img/author/6.jpg"></a>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3">
                <a href="Author.php?value=Nguyễn%20Bình%20Phương"><img class="img-responsive center-block" src="img/author/8.jpg"></a>
            </div>
        </div>
    </div>-->

    <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="footer-col-1">
                        <h3>Download now!</h3>
                        <p>Download App for Android and IOS.</p>
                        <div class="app-logo">
                            <img src="img/2.png">
                        </div>
                    </div>
                    <div class="footer-col-2">
                        <img src="img/zhenyang.png">
                        
                    </div>
                    <div class="footer-col-3">
                        <h3>Links!</h3>
                        <ul>
                            <li>Coupons</li>
                            <li>Blog</li>
                            <li>Return Policy</li>
                        </ul>
                    </div>
                    <div class="footer-col-4">
                        <h3>Follow us!</h3>
                        <ul>
                            <li>Facebook</li>
                            <li>Instagram</li>
                            <li>Twitter</li>
                        </ul>
                    </div>
                </div>
                <hr>
                <p class="coppyright">&#169; 2022 ZhenYang Shop - Best choice for you!</p>
                <br>
                <p class="coppyright"> Địa chỉ : 123/B đường X, quận Cái Răng, TPCT</p>
            </div>
        </div>

    <!-- <div class="container"> -->
    <!-- Trigger the modal with a button -->
    <!-- <button type="button" id="query_button" class="btn btn-lg" data-toggle="modal" data-target="#query">Câu hỏi</button> -->
    <!-- Modal -->
    <!-- <div class="modal fade" id="query" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Giải đáp thắc mắt</h4>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="query.php" class="form" role="form">
                            <div class="form-group">
                                <label class="sr-only" for="name">Tên</label>
                                <input type="text" class="form-control" placeholder="Họ và tên. vd: Nguyễn Văn A" name="sender" required>
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="email">Email</label>
                                <input type="email" class="form-control" placeholder="Email. vd: abc@gmail.com" name="senderEmail" required>
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="query">Hãy đặt câu hỏi cho chúng tôi</label>
                                <textarea class="form-control" rows="5" cols="30" name="message" placeholder="Vui lòng đặt câu hỏi của bạn tại đây" required></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="submit" value="query" class="btn btn-block">
                                    Gửi câu hỏi
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                    </div>
                </div>
            </div>
        </div> -->
    <!-- </div> -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>

</html>