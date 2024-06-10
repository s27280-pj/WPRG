<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Formularz ogólnych danych</title>
</head>
<body>
<h1>Formularz ogólnych danych</h1>
<form action="podstrona2.php" method="POST">
    <label for="nr_karty">Numer karty:</label>
    <input type="text" id="nr_karty" name="nr_karty" required><br><br>

    <label for="zamawiajacy">Dane zamawiającego:</label>
    <input type="text" id="zamawiajacy" name="zamawiajacy" required><br><br>

    <label for="ilosc_osob">Ilość osób:</label>
    <input type="number" id="ilosc_osob" name="ilosc_osob" min="1" required><br><br>

    <button type="submit">Dalej</button>
</form>
</body>
</html>
