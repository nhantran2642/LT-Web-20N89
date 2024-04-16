<?php

@include 'connect_db.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Admin Page</title>
   <link rel="stylesheet" href="style.css">

</head>

<body>
   <a href="index.php" class="btn-login">Đăng xuất</a>
   <div class="container">
      <div class="content">
         <h1>Welcome, <span>Admin</span></h1>
         <br>
         <a href="xemthongtin_nv.php" class="btn">Xem Danh sách Nhân viên</a>
         <a href="xemthongtin_pb.php" class="btn">Xem Danh sách Phòng ban</a>
         <a href="timkiem.php" class="btn">Tìm Kiếm Nhân viên</a>
         <a href="capnhap_pb.php" class="btn">Cập Nhập Thông tin Phòng ban</a>
         <a href="capnhap_nv.php" class="btn">Cập Nhập Thông Tin Nhân Viên</a>
         <a href="add_nv.php" class="btn">Thêm mới nhân viên</a>
         <a href="xoa_nv.php" class="btn">Xóa một nhân viên</a>
         <a href="xoa_nhieu_nv.php" class="btn">Xóa nhiều nhân viên</a>
      </div>
   </div>

</body>

</html>