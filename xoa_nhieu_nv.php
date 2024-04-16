<?php
@include('connect_db.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xóa nhân viên</title>
    <link rel="stylesheet" href="style2.css">
</head>

<body>
    <h2>Xóa nhiều nhân viên</h2>
    <form method="POST" action="xuli_xoa_nhieu_nv.php" id="deleteForm">
        <table>
            <tr>
                <th>IDNV</th>
                <th>Họ và tên</th>
                <th>IDPB</th>
                <th>Địa chỉ</th>
                <th>Xóa</th>
            </tr>
            <?php
            $sql = "SELECT * FROM nhanvien";
            $result =  mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "
                    <tr>
                        <td>" . $row["IDNV"] . "</td>
                        <td>" . $row["Hoten"] . "</td>
                        <td>" . $row["IDPB"] . "</td>
                        <td>" . $row["Diachi"] . "</td>
                        <td><input type='checkbox' name='selected[]' value='" . $row["IDNV"] . "'></td>
                    </tr>
                    ";
                }
                echo "
                <tr>
                    <td colspan='5'><button type='button' class='btn' onclick='confirmDelete()'>Xóa tất cả</button></td>
                </tr>
                ";
            } else {
                echo "0 kết quả";
            }
            mysqli_close($conn);
            ?>
        </table><br>
        <!-- <br><br> -->
        <a href="admin_page.php" class="btn">Back</a>
    </form>

    <script>
        function confirmDelete() {
            if (confirm('Chắc chắn xóa các nhân viên đã chọn?')) {
                document.getElementById("deleteForm").submit();
            } else {}
        }
    </script>
</body>

</html>