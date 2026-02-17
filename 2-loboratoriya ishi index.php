<!DOCTYPE html>
<html lang="uz">
<head>
 <meta charset="UTF-8">
 <title>Forma va Jadval</title>
 <style>
 body {
 font-family: Arial, sans-serif;
 }
 form {
 width: 400px;
 margin-bottom: 20px;
 }
 input, textarea, button {
 width: 100%;
 margin-bottom: 10px;
 padding: 8px;
 }
 table {
 width: 100%;
 border-collapse: collapse;
 }
 table, th, td {
 border: 1px solid #333;
 }
 th, td {
 padding: 8px;
 text-align: left;
 }
 </style>
</head>
<body>

<h2>Forma</h2>

<form id="myForm">
 <input type="text" id="foydalanuvchi" placeholder="Foydalanuvchi" required>
 <input type="email" id="email" placeholder="Email" required>
 <input type="tel" id="telefon" placeholder="Telefon" required>
 <textarea id="manzil" placeholder="Manzil" required></textarea>
  <textarea id="izoh" placeholder="Izoh"></textarea>
 <button type="submit">Yuborish</button>
</form>
<h2>Forma ma'lumotlari</h2>
<table>
 <thead>
 <tr>
 <th>Foydalanuvchi</th>
 <th>Email</th>
 <th>Telefon</th>
 <th>Manzil</th>
 <th>Izoh</th>
 </tr>
 </thead>
 <tbody id="tableBody">
 </tbody>
</table>
<script>
 document.getElementById("myForm").addEventListener("submit", function(e) {
 e.preventDefault();
 let foydalanuvchi = document.getElementById("foydalanuvchi").value;
 let email = document.getElementById("email").value;
 let telefon = document.getElementById("telefon").value;
 let manzil = document.getElementById("manzil").value;
 let izoh = document.getElementById("izoh").value;
 let tableBody = document.getElementById("tableBody");
 let row = tableBody.insertRow();
 row.insertCell(0).innerText = foydalanuvchi;
 row.insertCell(1).innerText = email;
 row.insertCell(2).innerText = telefon;
 row.insertCell(3).innerText = manzil;
 row.insertCell(4).innerText = izoh;

 document.getElementById("myForm").reset();
 });
</script>

</body>
</html>