<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mojaBaza";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $marka = $_POST['marka'];
    $model = $_POST['model'];
    $cena = $_POST['cena'];
    $rok = $_POST['rok'];
    $opis = $_POST['opis'];

    $sql = "INSERT INTO samochody (marka, model, cena, rok, opis) VALUES ('$marka', '$model', '$cena', '$rok', '$opis')";

    if ($conn->query($sql) === TRUE) {
        echo "Nowy samochód został dodany pomyślnie";
    } else {
        echo "Błąd: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dodaj samochód</title>
</head>
<body>
<table>
    <tr>
        <td><a href="index.php">Strona główna</a></td>
        <td><a href="wszystkie_samochody.php">Wszystkie samochody</a></td>
        <td><a href="dodaj_samochod.php">Dodaj samochód</a></td>
    </tr>
</table>
<h1>Dodaj samochód</h1>
<form action="dodaj_samochod.php" method="POST">
    <label for="marka">Marka:</label>
    <input type="text" id="marka" name="marka" required><br><br>
    <label for="model">Model:</label>
    <input type="text" id="model" name="model" required><br><br>
    <label for="cena">Cena:</label>
    <input type="number" id="cena" name="cena" step="0.01" required><br><br>
    <label for="rok">Rok:</label>
    <input type="number" id="rok" name="rok" required><br><br>
    <label for="opis">Opis:</label>
    <textarea id="opis" name="opis"></textarea><br><br>
    <button type="submit">Dodaj</button>
</form>
</body>
</html>

<?php
$conn->close();
?>
