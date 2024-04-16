<?php
require('connect_db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["search-type"])) {
        $searchType = $_POST["search-type"];
        $searchInfo = $_POST["search-box"];
        switch ($searchType) {
            case "idnv":
                $sql = "SELECT * FROM nhanvien WHERE IDNV LIKE '%$searchInfo%'";
                break;
            case "hoten":
                $sql = "SELECT * FROM nhanvien WHERE Hoten LIKE '%$searchInfo%'";
                break;
            case "diachi":
                $sql = "SELECT * FROM nhanvien WHERE Diachi LIKE '%$searchInfo%'";
                break;
            default:
                $sql = "SELECT * FROM nhanvien";
                break;
        }
        $result =  mysqli_query($conn, $sql);
    } else {
        $error[] = 'Không xác định kiểu tìm kiếm';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tìm kiếm</title>
    <link rel="stylesheet" href="style2.css">
</head>

<body>
    <h2>Tìm kiếm thông tin nhân viên</h2>
    <form name=f1 action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <input type="radio" name="search-type" id="r-idnv" value="idnv">
        <label for="r-idnv">IDNV</label>
        <input type="radio" name="search-type" id="r-hoten" value="hoten">
        <label for="r-hoten">Họ tên</label>
        <input type="radio" name="search-type" id="r-diachi" value="diachi">
        <label for="r-diachi">Địa chỉ</label>
        <br><br>
        <input type="text" name="search-box" id="t-search">
        <input type="submit" value="Search">
    </form>
    <?php
    if (isset($error)) {
        foreach ($error as $error) {
            echo '<br><span class="error-msg">' . $error . '</span><br>';
        };
    };
    ?>
    <br>
    <table>
        <tr>
            <th>IDNV</th>
            <th>Họ và tên</th>
            <th>IDPB</th>
            <th>Địa chỉ</th>
        </tr>
        <?php
        if (isset($result)) {
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr><td>" . $row["IDNV"] . "</td><td>" . $row["Hoten"] . "</td><td>" . $row["IDPB"] . "</td><td>" . $row["Diachi"] . "</td></tr>";
                }
            } else {
                echo "<tr><td colspan='4'>0 kết quả</td></tr>";
            }
            mysqli_free_result($result);
        }
        mysqli_close($conn);
        ?>
    </table>
    <br>

    <?php
    $referer_file = basename($_SERVER['HTTP_REFERER']);
    if ($referer_file === 'index.php') {
        $back_link = 'index.php';
    } else {
        $back_link = 'admin_page.php';
    }
    ?>
    <a href="<?php echo $back_link; ?>" class="btn">Back</a>
</body>


</html>