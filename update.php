<?php
include 'db_conn.php';

$ma_hang = $_POST['ma_hang'];
$input = [];

if (!empty($_POST['ten_hang'])) {
    $ten_hang = $_POST['ten_hang'];
    $input[] = "ten_hang = '$ten_hang'";
}
if (!empty($_POST['hang_sx'])) {
    $hang_sx = $_POST['hang_sx'];
    $input[] = "hang_sx = '$hang_sx'";
}
if (!empty($_POST['gia'])) {
    $gia = $_POST['gia'];
    $input[] = "gia = '$gia'";
}

if (empty($input)) {
    echo "Khong co thong tin de cap nhat";
} else {
    $sql = "UPDATE $tb_name SET " . implode(', ', $input) .  " WHERE ma_hang = '$ma_hang'";
    if ($conn->query($sql) === TRUE) {
        if ($conn->affected_rows > 0) {
            echo "Cap nhat san pham thanh cong";
        } else {
            echo "Khong tim thay ma hang de cap nhat, vui long kiem tra lai ma hang";
        }
    } else {
        echo "Loi: " . $conn->error;
    }
}

echo "<br><br><a href='../design.php'>Quay ve trang chu</a>";
echo "<br><br><a href='../display.php'>Quay ve danh sach</a>";

$conn->close();
?>