<?php
// 1. Databasega ulanish
$host = "localhost";
$user = "root";
$password = "";
$dbname = "uylar_tumanlar";

$conn = mysqli_connect($host, $user, $password, $dbname);

if (!$conn) {
    die("Ulanishda xatolik: " . mysqli_connect_error());
}

// 2. Ma'lumotlarni olish
$sql = "SELECT uylar.id, uylar.xonalar, uylar.maydon, uylar.narx, 
        tumanlar.nomi AS tuman_nomi, tumanlar.shahar
        FROM uylar
        JOIN tumanlar ON uylar.tuman_id = tumanlar.id";

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uylar va Tumanlar</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(120deg, #ffe259, #ffa751);
            font-family: 'Arial', sans-serif;
        }
        h2 {
            color: #0d6efd; /* Yorqin ko‘k rang */
            text-shadow: 2px 2px #ffffff; /* oq shadow fon bilan ajratish uchun */
            font-size: 3rem;
            text-align: center;
            margin-bottom: 40px;
        }
        .table thead th {
            background-color: #ff6f61;
            color: #fff;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .table-striped>tbody>tr:nth-of-type(odd) {
            background-color: #fff7e6;
        }
        .table-striped>tbody>tr:nth-of-type(even) {
            background-color: #ffd9b3;
        }
        .table-hover tbody tr:hover {
            background-color: #ffcc80;
            color: #000;
            font-weight: bold;
        }
        .container {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.3);
        }
    </style>
</head>
<body>

<div class="container my-5">
    <h2>Uylar va Tumanlar</h2>
    
    <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered shadow-sm">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Xonalar</th>
                    <th>Maydon (m²)</th>
                    <th>Narx (USD)</th>
                    <th>Tuman</th>
                    <th>Shahar</th>
                </tr>
            </thead>
            <tbody>
                <?php if(mysqli_num_rows($result) > 0): ?>
                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['xonalar']; ?></td>
                            <td><?php echo $row['maydon']; ?></td>
                            <td><?php echo number_format($row['narx'], 2); ?></td>
                            <td><?php echo $row['tuman_nomi']; ?></td>
                            <td><?php echo $row['shahar']; ?></td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center">Ma'lumot topilmadi</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Bootstrap JS (optional) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
mysqli_close($conn);
?>