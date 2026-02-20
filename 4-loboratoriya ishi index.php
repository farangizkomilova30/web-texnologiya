<?php
$conn = new mysqli("localhost", "root", "", "db_jurnal");

$sql = "SELECT talabalar.ism, fanlar.nomi, baholar.baho
        FROM baholar
        JOIN talabalar ON baholar.talaba_id = talabalar.id
        JOIN fanlar ON baholar.fan_id = fanlar.id";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Elektron Jurnal</title>
    <style>
        body { font-family: Arial; padding: 30px; }
        table { border-collapse: collapse; width: 60%; }
        th, td { border: 1px solid black; padding: 10px; text-align: center; }
        th { background: #4CAF50; color: white; }
    </style>
</head>
<body>

<h2>Elektron jurnal</h2>

<table>
    <tr>
        <th>Talaba</th>
        <th>Fan</th>
        <th>Baho</th>
    </tr>

    <?php while($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row['ism']; ?></td>
            <td><?php echo $row['nomi']; ?></td>
            <td><?php echo $row['baho']; ?></td>
        </tr>
    <?php } ?>

</table>

</body>
</html>