<?php
include 'db_conn.php';

if (isset($_GET['ma_hang'])) {
    $ma_hang = $_GET['ma_hang'];
    $sql = "DELETE FROM $tb_name WHERE ma_hang = '$ma_hang'";

    if ($conn->query($sql) === TRUE) {
        echo "Xoa san pham thanh cong";
    } else {
        echo "Loi: " . $conn->error;
    }
} else {
    echo "Khong tim thay ma hang de xoa";
}

echo "<br><br><a href='../design.php'>Quay ve trang chu</a>";
echo "<br><br><a href='../display.php'>Quay ve danh sach</a>";

$conn->close();
?>