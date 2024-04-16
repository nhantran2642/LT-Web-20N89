<?php
@include('connect_db.php');
if (isset($_REQUEST['IDNV'])) {
    $IDNV = $_REQUEST['IDNV'];
    $sql = "SELECT * FROM nhanvien WHERE IDNV='$IDNV'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $hoten = $row['Hoten'];
        $IDPB = $row['IDPB'];
        $diachi = $row['Diachi'];
    } else {
        echo "Không có kết quả";
    }
} else {
    echo "Không có IDNV được truyền";
}



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['submit'])) {
        $hoten_upd = $_POST['textbox-hoten'];
        $IDPB_upd = $_POST['textbox-idpb'];
        $diachi_upd = $_POST['textbox-diachi'];

        $sql_update = "UPDATE phongban SET Hoten='$hoten_upd', IDBP='$IDPB_upd', Diachi='$diachi_upd' WHERE IDNV='IDNV'";
        $result = mysqli_query($conn, $sql_update);
        if (mysqli_num_rows($result) > 0) {
            header('Location: capnhap_nv.php');
            exit();
        };
    } elseif (isset($_POST['reset'])) {
        $hoten = $row['Hoten'];
        $IDPB = $row['IDPB'];
        $diachi = $row['Diachi'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://fonts.googleapis.com/css?family=Dancing+Script|Itim|Lobster|Montserrat:500|Noto+Serif|Paficico|Nunito|Patrick+Hand|Roboto+Mono:100,100i,300,300i,400,400i,500,500i,700,700i|Roboto+Slab|Saira|Protest+Revolution" rel="stylesheet" />
    <link rel="stylesheet" href="style1.css">
</head>

<body>
    <div class="container">
        <form action="" method="post">
            <h1>Cập nhập thông tin nhân viên <?php echo isset($IDNV) ? $IDNV : ''; ?> </h1>
            <input type="text" id="tbx-idnv" name="textbox-idnv" placeholder="IDNV" readonly value="<?php echo isset($IDNV) ? $IDNV : ''; ?>" /><br />
            <input type="text" id="tbx-idht" name="textbox-hoten" placeholder="Họ tên nhân viên" value="<?php echo isset($hoten) ? $hoten : ''; ?>" /><br />
            <input type="text" id="tbx-idpb" name="textbox-idpb" placeholder="IDPB" value="<?php echo isset($IDPB) ? $IDPB : ''; ?>" /><br />
            <input type="text" id="tbx-iddc" name="textbox-diachi" placeholder="Địa chỉ" value="<?php echo isset($diachi) ? $diachi : ''; ?>" /><br />
            <input type="submit" name="submit" value="Submit" class="btn" />
            <input type="reset" name="reset" value="Reset" class="btn" />
            <input type="button" name="back" value="Back" class="btn" onclick="goBack()" />
        </form>
    </div>
</body>
<script>
    function goBack() {
        window.location.href = 'capnhap_nv.php'
    }
</script>

</html>