<?php
@include('connect_db.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['selected']) && !empty($_POST['selected'])) {
        foreach ($_POST['selected'] as $id) {
            $id = mysqli_real_escape_string($conn, $id); // Tránh SQL injection
            $sql = "DELETE FROM nhanvien WHERE IDNV = '$id'";
            mysqli_query($conn, $sql);
        }
        header("Location: xoa_nhieu_nv.php");
        exit;
    } else {
        header("Location: xoa_nhieu_nv.php");
        exit;
    }
} else {
    header("Location: xoa_nhieu_nv.php");
    exit;
}

mysqli_close($conn);
