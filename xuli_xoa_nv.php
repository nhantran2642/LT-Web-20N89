<?php
if (isset($_REQUEST['IDNV'])) {
    @include('connect_db.php');
    $IDNV = $_REQUEST['IDNV'];
    $sql = "DELETE FROM nhanvien WHERE IDNV='$IDNV'";
    if (mysqli_query($conn, $sql)) {
        header('Location: xoa_nv.php');
        exit;
    } else {
        echo "Không có kết quả";
    }
} else {
    echo "Không có IDNV được truyền";
}
