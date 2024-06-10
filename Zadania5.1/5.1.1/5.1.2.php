<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['nr_karty'] = $_POST['nr_karty'];
    $_SESSION['zamawiajacy'] = $_POST['zamawiajacy'];
    $_SESSION['ilosc_osob'] = $_POST['ilosc_osob'];
}

$ilosc_osob = $_SESSION['ilosc_osob'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Formularz danych osób</title>
</head>
<body>
<h1>Formularz danych osób</h1>
<form action="podstrona3.php" method="POST">
    <?php for ($i = 1; $i <= $ilosc_osob; $i++): ?>
        <h2>Osoba <?php echo $i; ?></h2>
        <label for="osoba<?php echo $i; ?>_imie">Imię:</label>
        <input type="text" id="osoba<?php echo $i; ?>_imie" name="osoby[<?php echo $i; ?>][imie]" required><br><br>

        <label for="osoba<?php echo $i; ?>_nazwisko">Nazwisko:</label>
        <input type="text" id="osoba<?php echo $i; ?>_nazwisko" name="osoby[<?php echo $i; ?>][nazwisko]" required><br><br>
    <?php endfor; ?>
    <button type="submit" name="action" value="save">Zapisz</button>
</form>
</body>
</html>
