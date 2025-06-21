<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hien thi san pham</title>
    <link rel="stylesheet" href="style/display.css">
</head>
<body>
    <a href="design.php">Trang chu</a>

    <h2>Danh sach thiet bi van phong - May huy tai lieu</h2>

    <?php
    include 'action/db_conn.php';

    $sql = "SELECT * FROM $tb_name WHERE ten_hang LIKE 'May huy tai lieu%'";
    $result = $conn->query($sql);
    echo
        "<table class='center-table' border='1'>
            <tr>
                <th>Ma hang</th>
                <th>Ten hang</th>
                <th>Hang san xuat</th>
                <th>Gia</th>
                <th>Thao tac</th>
            </tr>";
            
    if ($result->num_rows > 0) {        
        while ($row = $result->fetch_assoc()) {
            echo
            "<tr>
                <td class='ma_hang'>" . $row['ma_hang'] . "</td>
                <td>" . $row['ten_hang'] . "</td>
                <td>" . $row['hang_sx'] . "</td>
                <td>" . $row['gia'] . "</td>
                <td class='thao_tac'>
                    <a href='action/delete.php?ma_hang=" . $row['ma_hang'] . "'>Xoa</a>
                </td>
            </tr>";
        }
    } else {
        echo "<tr><td colspan='5'>Khong co du lieu</td></tr>";
    }

    echo "</table>";

    $conn->close();
    ?>
    
</body>
</html>