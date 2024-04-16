<?php
@include('connect_db.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['IDPB'], $_POST['tenpb'], $_POST['mota'])) {
        $IDPB = $_POST['IDPB'];
        $tenpb = $_POST['tenpb'];
        $mota = $_POST['mota'];

        $sql_update = "UPDATE phongban SET Tenpb='$tenpb', Mota='$mota' WHERE IDPB='$IDPB'";
        if (mysqli_query($conn, $sql_update)) {
            echo "success";
            exit();
        } else {
            echo "error";
            exit();
        }
    }
}
