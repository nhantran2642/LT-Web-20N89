<?php
@include('connect_db.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách phòng ban</title>
    <link rel="stylesheet" href="style2.css">
</head>

<body>
    <h2>Danh sách phòng ban</h2>
    <table>
        <tr>
            <th>IDPB</th>
            <th>Tên phòng ban</th>
            <th>Mô tả</th>
            <th>Cập nhập</th>
        </tr>
        <?php

        $sql = "SELECT * FROM phongban";
        $result =  mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr><td>" . $row["IDPB"]
                    . "</td><td>" . $row["Tenpb"]
                    . "</td><td>" . $row["Mota"]
                    . "</td>
                    <td>
                    <a href='form_capnhap_pb.php?IDPB=" . $row["IDPB"] . "'>xxx</a>
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