<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <title>3x3 Matritsa Ustunlari Yig'indisi</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #667eea, #764ba2);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background: white;
            padding: 30px;
            border-radius: 15px;
            width: 420px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.2);
        }
        h2, h3 { text-align: center; margin-bottom: 15px; }
        table { border-collapse: collapse; margin: auto; }
        td { padding: 8px; }
        input {
            width: 60px;
            height: 40px;
            text-align: center;
            font-size: 16px;
            border-radius: 8px;
            border: 1px solid #ccc;
        }
        input:focus { border-color: #667eea; outline: none; }
        button {
            width: 100%; padding: 10px; margin-top: 15px;
            border: none; border-radius: 8px; background: #667eea;
            color: white; font-size: 16px; cursor: pointer;
        }
        button:hover { background: #5a67d8; }
        .result { margin-top: 20px; padding: 10px; background: #f4f4f4; border-radius: 10px; }
        .matrix-output td { border: 1px solid #ddd; padding: 10px; text-align: center; }
        .column-sum { font-weight: 600; color: #667eea; }
    </style>
</head>
<body>
<div class="container">
    <h2>3x3 Matritsa</h2>
    <form method="post">
        <table>
        <?php for($i=0; $i<3; $i++): ?>
            <tr>
            <?php for($j=0; $j<3; $j++): ?>
                <?php $value = isset($_POST['matrix'][$i][$j]) ? $_POST['matrix'][$i][$j] : ''; ?>
                <td><input type="number" name="matrix[<?php echo $i; ?>][<?php echo $j; ?>]" value="<?php echo $value; ?>" required></td>
            <?php endfor; ?>
            </tr>
        <?php endfor; ?>
        </table>
        <button type="submit" name="hisobla">Hisoblash</button>
    </form>

<?php
if(isset($_POST['hisobla'])):
    $matrix = $_POST['matrix'];
?>
    <div class="result">
        <h3>Kiritilgan Matritsa</h3>
        <table class="matrix-output">
            <?php for($i=0; $i<3; $i++): ?>
                <tr>
                <?php for($j=0; $j<3; $j++): ?>
                    <td><?php echo $matrix[$i][$j]; ?></td>
                <?php endfor; ?>
                </tr>
            <?php endfor; ?>
        </table>

        <h3>Ustunlar Yig'indisi</h3>
        <?php for($j=0; $j<3; $j++):
            $sum = 0;
            for($i=0; $i<3; $i++) { $sum += $matrix[$i][$j]; }
        ?>
            <p class="column-sum">Ustun <?php echo $j+1; ?>: <?php echo $sum; ?></p>
        <?php endfor; ?>
    </div>
<?php endif; ?>

</div>
</body>
</html>
