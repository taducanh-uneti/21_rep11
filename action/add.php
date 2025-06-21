<?php
include 'db_conn.php';

$ma_hang = $_POST['ma_hang'];
$ten_hang = $_POST['ten_hang'];
$hang_sx = $_POST['hang_sx'];
$gia = $_POST['gia'];

$sql = "INSERT INTO $tb_name (ma_hang, ten_hang, hang_sx, gia) VALUES ('$ma_hang', '$ten_hang', '$hang_sx', '$gia')";

try {
    if ($conn->query($sql) === TRUE) {
        echo "Them san pham thanh cong";
    }
} catch (mysqli_sql_exception $err) {
    if ($err->getCode() == 1062) {
        echo "Loi: Ma hang da ton tai, vui long chon ma hang khac";
    } else {
        echo "Loi: " . $err->getMessage();
    }
}

echo "<br><br><a href='../design.php'>Quay ve trang chu</a>";
echo "<br><br><a href='../display.php'>Quay ve danh sach</a>";

$conn->close();
?>
