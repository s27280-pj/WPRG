<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mojaBaza";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM samochody ORDER BY cena ASC LIMIT 5";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Strona główna</title>
</head>
<body>
<table>
    <tr>
        <td><a href="index.php">Strona główna</a></td>
        <td><a href="wszystkie_samochody.php">Wszystkie samochody</a></td>
        <td><a href="dodaj_samochod.php">Dodaj samochód</a></td>
    </tr>
</table>
<h1>Pięć najtańszych samochodów</h1>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Marka</th>
        <th>Model</th>
        <th>Cena</th>
    </tr>
    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['marka'] . "</td>";
            echo "<td>" . $row['model'] . "</td>";
            echo "<td>" . $row['cena'] . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='4'>Brak danych</td></tr>";
    }
    ?>
</table>
</body>
</html>

<?php
$conn->close();
?>
