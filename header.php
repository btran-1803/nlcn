<!DOCTYPE html>
<html lang="en">

<head>

   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="description" content="Books">
   <meta name="author" content="Shivangi Gupta">
   <title>Online Fruits</title>
   <!-- Bootstrap -->
   <link href="css/bootstrap.min.css" rel="stylesheet">
   <link href="css/test2.css" rel="stylesheet">
   <style>
      .modal-header {
         background: rgb(255, 180, 249);
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
            <a class="navbar-brand" href="index.php" style="padding: 1px;"><img class="img-responsive" alt="Brand" src="img/zhenyangg.png" style="width: 55px; margin-left: 50px; margin-top:1px"></a>
         </div>

         <!-- Collect the nav links, forms, and other content for toggling -->
         <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
               <?php
               if (isset($_SESSION['admin'])) {
                  echo ' <li> <a href="./Manager.php" class="btn btn-lg"> Chào ' . $_SESSION['admin'] . '.</a></li>
                         <li> <a href="admin-out.php" class="btn btn-lg"><span class="glyphicon glyphicon-log-out"></a> </li>';
               }
               ?>

            </ul>
         </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
   </nav>
   <div id="top">

</body>

</html>