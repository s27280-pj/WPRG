<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['osoby'])) {
    $_SESSION['osoby'] = $_POST['osoby'];
}

$nr_karty = $_SESSION['nr_karty'];
$zamawiajacy = $_SESSION['zamawiajacy'];
$ilosc_osob = $_SESSION['ilosc_osob'];
$osoby = $_SESSION['osoby'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Podsumowanie</title>
</head>
<body>
<h1>Podsumowanie</h1>
<p>Numer karty: <?php echo htmlspecialchars($nr_karty); ?></p>
<p>Dane zamawiającego: <?php echo htmlspecialchars($zamawiajacy); ?></p>
<p>Ilość osób: <?php echo htmlspecialchars($ilosc_osob); ?></p>

<?php for ($i = 1; $i <= $ilosc_osob; $i++): ?>
    <h2>Osoba <?php echo $i; ?></h2>
    <p>Imię: <?php echo htmlspecialchars($osoby[$i]['imie']); ?></p>
    <p>Nazwisko: <?php echo htmlspecialchars($osoby[$i]['nazwisko']); ?></p>
<?php endfor; ?>
</body>
</html>
