<?php
@include('connect_db.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách nhân viên</title>
    <link rel="stylesheet" href="style2.css">
</head>

<body>
    <h2>Danh sách nhân viên</h2>
    <table>
        <tr>
            <th>IDNV</th>
            <th>Họ và tên</th>
            <th>IDPB</th>
            <th>Địa chỉ</th>
            <th>Cập nhập</th>
        </tr>
        <?php
        $sql = "SELECT * FROM nhanvien";
        $result =  mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                <td>" . $row["IDNV"] . "</td>
                <td>" . $row["Hoten"] . "</td>
                <td>" . $row["IDPB"] . "</td>
                <td>" . $row["Diachi"] . "</td>
                <td>
                    <a href='form_capnhap_nv.php?IDNV=" . $row["IDNV"] . "'>xxx</a>
                    </td>
                </tr>";
            }
        } else {
            echo "0 kết quả";
        }
        mysqli_close($conn);
        ?>
    </table><br>
    <a href="admin_page.php" class="btn">Back</a>
</body>

</html>