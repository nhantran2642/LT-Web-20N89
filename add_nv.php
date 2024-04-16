<?php
@include('connect_db.php');

$sql_max_id = "SELECT MAX(CAST(SUBSTRING(IDNV, 3) AS UNSIGNED)) AS max_id FROM nhanvien";
$result_max_id = mysqli_query($conn, $sql_max_id);
$row_max_id = mysqli_fetch_assoc($result_max_id);
$max_id = $row_max_id['max_id'];

$new_id = $max_id + 1;
$new_id_formatted = sprintf("NV%02d", $new_id);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['submit'])) {
        $IDNV_add = $new_id_formatted;
        $hoten_add = $_POST['textbox-hoten'];
        $IDPB_add = $_POST['textbox-idpb'];
        $diachi_add = $_POST['textbox-diachi'];

        $sql_insert = "INSERT INTO nhanvien(IDNV, Hoten, IDPB, Diachi) VALUES ('$IDNV_add', '$hoten_add', '$IDPB_add', '$diachi_add')";
        $result = mysqli_query($conn, $sql_insert);
        if ($result) {
            header('Location: xemthongtin_nv.php');
            exit();
        } else {
            echo "Error: " . mysqli_error($conn);
        }
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
    <title>Thêm mới nhân viên</title>
</head>

<body>
    <div class="container">
        <form action="" method="post">
            <h1>Thêm mới một nhân viên</h1>
            <input type="text" id="tbx-idnv" name="textbox-idnv" readonly placeholder="IDNV" value="<?php echo $new_id_formatted; ?>" /><br />
            <input type="text" id="tbx-idht" name="textbox-hoten" required placeholder="Họ và tên" /><br />
            <input type="text" id="tbx-idpb" name="textbox-idpb" required placeholder="IDPB" /><br />
            <input type="text" id="tbx-iddc" name="textbox-diachi" required placeholder="Địa chỉ" /><br />
            <input type="submit" name="submit" value="Submit" class="btn" />
            <input type="reset" name="reset" value="Reset" class="btn" onclick="clearInfo()" />
            <input type="button" name="back" value="Back" class="btn" onclick="goBack()" />
        </form>
    </div>
</body>
<script>
    function goBack() {
        window.location.href = 'admin_page.php'
    }

    function clearInfo() {
        document.getElementById('textbox-hoten').value = '';
        document.getElementById('textbox-idpb').value = '';
        document.getElementById('textbox-diachi').value = '';

    }
</script>

</html>