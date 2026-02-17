<?php
// Natija chiqarish uchun bo'sh o'zgaruvchi
$natija = "";

// Agar form yuborilgan bo'lsa
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // POST ma'lumotlarini olish va xavfsizlashtirish
    $ism = htmlspecialchars(trim($_POST['ariza_ism'] ?? ''));
    $fam = htmlspecialchars(trim($_POST['ariza_fam'] ?? ''));
    $lavozim = htmlspecialchars(trim($_POST['ariza_lavozim'] ?? ''));
    $tajriba = $_POST['ariza_tajriba'] ?? '';
    $telefon = htmlspecialchars(trim($_POST['ariza_telefon'] ?? ''));

    // Bo'sh maydonlarni tekshirish
    if(empty($ism) || empty($fam) || empty($lavozim) || $tajriba === '' || empty($telefon)){
        $natija = "<span style='color:red;'>Iltimos, barcha maydonlarni to‘ldiring!</span>";
    } 
    // Tajriba yilini tekshirish
    elseif(!is_numeric($tajriba) || $tajriba < 0){
        $natija = "<span style='color:red;'>Tajriba yillar bilan to‘g‘ri kiritilishi kerak!</span>";
    } 
    // Xulosa chiqarish
    else {
        if($tajriba >= 3){
            $natija = "<h3>Hurmatli $ism $fam!</h3>";
            $natija .= "Sizning arizangiz qabul qilindi. Siz $lavozim lavozimiga mos nomzodsiz.";
        } else {
            $natija = "<h3>Hurmatli $ism $fam!</h3>";
            $natija .= "Afsuski, $lavozim lavozimi uchun tajribangiz yetarli emas.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <title>Ishga ariza</title>
</head>
<body>

<h2>Ishga ariza formasi</h2>

<form method="post" action="">
    <label>Ism:</label><br>
    <input type="text" name="ariza_ism" required value="<?php echo $_POST['ariza_ism'] ?? ''; ?>"><br><br>

    <label>Familiya:</label><br>
    <input type="text" name="ariza_fam" required value="<?php echo $_POST['ariza_fam'] ?? ''; ?>"><br><br>

    <label>Lavozim:</label><br>
    <input type="text" name="ariza_lavozim" required value="<?php echo $_POST['ariza_lavozim'] ?? ''; ?>"><br><br>

    <label>Tajriba (yil):</label><br>
    <input type="number" name="ariza_tajriba" min="0" required value="<?php echo $_POST['ariza_tajriba'] ?? ''; ?>"><br><br>

    <label>Telefon:</label><br>
    <input type="text" name="ariza_telefon" required value="<?php echo $_POST['ariza_telefon'] ?? ''; ?>"><br><br>

    <button type="submit">Yuborish</button>
</form>

<br>
<div id="natija" style="font-weight:bold;">
    <?php echo $natija; ?>
</div>

</body>
</html>
