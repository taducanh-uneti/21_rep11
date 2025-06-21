<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/design.css">
    <title>Them - Sua san pham</title>
</head>
<body>
    <a href="display.php">Danh sach - May huy tai lieu</a>

    <div class="main-flex">
        <div class="form-box">
            <h2>Them san pham</h2>
            <form method="POST">
                <label for="ma_hang">Ma hang:</label>
                <input type="number" id="ma_hang" name="ma_hang" min="1" required>
                <label for="ten_hang">Ten hang:</label>
                <input type="text" id="ten_hang" name="ten_hang" >
                <label for="hang_sx">Hang san xuat:</label>
                <input type="text" id="hang_sx" name="hang_sx">
                <label for="gia">Gia:</label>
                <input type="number" id="gia" name="gia" min="0" step="0.01"><br>
                <button type="submit" formaction="action/add.php">Them san pham</button>
                <button type="submit" formaction="action/update.php">Sua san pham</button>
                <button type="reset">Nhap lai</button>
            </form>
        </div>

        <div class="table-box">
            <h2>Danh sach tat ca san pham</h2>
            <?php
            include 'action/db_conn.php';
            $sql = "SELECT * FROM $tb_name";
            $result = $conn->query($sql);
            echo "<table class='center-table' border='1'>
                <tr>
                    <th>Ma hang</th>
                    <th>Ten hang</th>
                    <th>Hang san xuat</th>
                    <th>Gia</th>
                    <th>Thao tac</th>
                </tr>";
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
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
        </div>
    </div>
</body>
</html>