<?php
// 1. Databasega ulanish
$host = "localhost";
$user = "root";
$password = "";
$dbname = "inventory_storage_db";

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Ulanishda xatolik: " . $conn->connect_error);
}

// 2. Ma'lumotlarni olish
$sql = "SELECT * FROM stock_entries ORDER BY entry_id ASC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elektron Ombor - Stock Entries</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(120deg, #c3f0ca, #96e6b3);
            font-family: Arial, sans-serif;
        }
        h2 {
            text-align: center;
            margin: 30px 0;
            color: #2c3e50;
            text-shadow: 1px 1px #fff;
        }
        .container {
            background-color: rgba(255,255,255,0.95);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.3);
        }
        .table thead th { 
            background-color: #2c3e50; 
            color: #fff; 
            text-transform: uppercase; 
        }
        .table-striped>tbody>tr:nth-of-type(odd) { background-color: #e0f7fa; }
        .table-striped>tbody>tr:nth-of-type(even) { background-color: #b2ebf2; }
        .table-hover tbody tr:hover { background-color: #4dd0e1; font-weight:bold; }
    </style>
</head>
<body>

<div class="container">
    <h2>Elektron Ombor - Stock Entries</h2>

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover shadow-sm">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Mahsulot nomi</th>
                    <th>O‘lchov birligi</th>
                    <th>Miqdori</th>
                    <th>Ta’minot sanasi</th>
                    <th>Amal qilish muddati</th>
                    <th>Yetkazib beruvchi kompaniya</th>
                    <th>Ombor bo‘limi</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0): ?>
                    <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['entry_id']; ?></td>
                            <td><?php echo $row['product_label']; ?></td>
                            <td><?php echo $row['unit_measure']; ?></td>
                            <td><?php echo $row['quantity_amount']; ?></td>
                            <td><?php echo $row['supply_date']; ?></td>
                            <td><?php echo $row['expiration_date']; ?></td>
                            <td><?php echo $row['vendor_company']; ?></td>
                            <td><?php echo $row['storage_section']; ?></td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr><td colspan="8" class="text-center">Ma’lumot topilmadi</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
$conn->close();
?>