<?php
@include('connect_db.php');
if (isset($_REQUEST['IDPB'])) {
    $IDPB = $_REQUEST['IDPB'];
    $sql = "SELECT * FROM phongban WHERE IDPB='$IDPB'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $tenpb = $row['Tenpb'];
        $mota = $row['Mota'];
    } else {
        echo "Không có kết quả";
    }
} else {
    echo "Không có IDPB được truyền";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://fonts.googleapis.com/css?family=Dancing+Script|Itim|Lobster|Montserrat:500|Noto+Serif|Paficico|Nunito|Patrick+Hand|Roboto+Mono:100,100i,300,300i,400,400i,500,500i,700,700i|Roboto+Slab|Saira|Protest+Revolution" rel="stylesheet" />
    <link rel="stylesheet" href="style1.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <div class="container">
        <form>
            <h1>Cập nhập thông tin phòng ban <?php echo isset($IDPB) ? $IDPB : ''; ?></h1>
            <input type="text" id="tbx-idpb" name="textbox-idpb" placeholder="IDPB" readonly value="<?php echo isset($IDPB) ? $IDPB : ''; ?>" /><br />
            <input type="text" id="tbx-tenpb" name="textbox-tenpb" placeholder="Tên Phòng ban" value="<?php echo isset($tenpb) ? $tenpb : ''; ?>" /><br />
            <textarea name="text-area" id="tarea-mota" cols="20" rows="3" placeholder="Mô tả"><?php echo isset($mota) ? $mota : ''; ?></textarea><br />
            <input type="submit" name="submit" value="Submit" class="btn" onclick="updateData()" />
            <input type="reset" name="reset" value="Reset" class="btn" />
            <input type="button" name="back" value="Back" class="btn" onclick="goBack()" />
        </form>
    </div>
</body>
<script>
    function goBack() {
        window.location.href = 'capnhap_pb.php'
    }

    function updateData() {
        var idpb = $('#tbx-idpb').val();
        var tenpb = $('#tbx-tenpb').val();
        var mota = $('#tarea-mota').val();

        $.ajax({
            type: 'POST',
            url: 'xuli_capnhap_pb.php',
            data: {
                IDPB: idpb,
                tenpb: tenpb,
                mota: mota
            },
            success: function(response) {
                if (response === 'success') {
                    window.location.href = 'capnhap_pb.php';
                    alert("Cập nhật thành công!");
                } else {
                    alert("Cập nhật thất bại!");
                }
            },
            error: function() {
                alert("Có lỗi xảy ra!");
            }
        });
    }
</script>

</html>