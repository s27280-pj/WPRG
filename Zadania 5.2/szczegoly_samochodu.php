<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mojaBaza";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_GET['id'];

$sql = "SELECT * FROM samochody WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo "Nie znaleziono samochodu o podanym ID";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Szczegóły samochodu</title>
</head>
<body>
<table>
    <tr>
        <td><a href="index.php">Strona główna</a></td>
        <td><a href="wszystkie_samochody.php">Wszystkie samochody</a></td>
        <td><a href="dodaj_samochod.php">Dodaj samochód</a></td>
    </tr>
</table>
<h1>Szczegóły samochodu</h1>
<p>ID: <?php echo $row['id']; ?></p>
<p>Marka: <?php echo $row['marka']; ?></p>
<p>Model: <?php echo $row['model']; ?></p>
<p>Cena: <?php echo $row['cena']; ?></p>
<p>Rok: <?php echo $row['rok']; ?></p>
<p>Opis: <?php echo $row['opis']; ?></p>
<br>
<a href="index.php">Powrót do strony głównej</a>
</body>
</html>

<?php
$conn->close();
?>
