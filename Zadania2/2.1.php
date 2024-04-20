<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Kalkulator</title>
</head>
<body>
<h1>Kalkulator</h1>
<form method="post">
    <label for="liczba1">Liczba 1:</label>
    <input type="number" id="liczba1" name="liczba1" required>
    <br>
    <label for="liczba2">Liczba 2:</label>
    <input type="number" id="liczba2" name="liczba2" required>
    <br>
    <br>
    <label for="dzialanie">Działanie:</label>
    <select id="dzialanie" name="dzialanie">
        <option value="+">Dodawanie</option>
        <option value="-">Odejmowanie</option>
        <option value="*">Mnożenie</option>
        <option value="/">Dzielenie</option>
    </select>
    <br>
    <br>
    <input type="submit" value="Oblicz">
</form>

<?php
if(isset($_POST['liczba1']) && isset($_POST['liczba2']) && isset($_POST['dzialanie'])) {
    $liczba1 = $_POST['liczba1'];
    $liczba2 = $_POST['liczba2'];
    $dzialanie = $_POST['dzialanie'];

    switch ($dzialanie) {
        case '+':
            $wynik = $liczba1 + $liczba2;
            break;
        case '-':
            $wynik = $liczba1 - $liczba2;
            break;
        case '*':
            $wynik = $liczba1 * $liczba2;
            break;
        case '/':
            $wynik = $liczba1 / $liczba2;
            break;
    }
    if (isset($wynik)) {
        echo "Wynik: " . $wynik;
    }
}
?>
</body>
</html>
