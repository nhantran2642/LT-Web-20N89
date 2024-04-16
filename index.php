<?php

@include 'connect_db.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Unknown User Page</title>
   <link rel="stylesheet" href="style.css">

</head>

<body>
   <a href="login.php" class="btn-login">Đăng nhập</a>
   <div class="container">
      <div class="content">
         <h1>Hi, <span>Unknown User</span></h1>
         <br>
         <a href="xemthongtin_nv.php" class="btn">Xem Danh sách Nhân viên</a>
         <a href="xemthongtin_pb.php" class="btn">Xem Danh sách Phòng ban</a>
         <a href="timkiem.php" class="btn">Tìm Kiếm Nhân viên</a>
      </div>

   </div>

</body>

</html>