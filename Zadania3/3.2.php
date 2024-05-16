<?php

function silnia_rekurencyjna($n) {
    if ($n <= 1) {
        return 1;
    } else {
        return $n * silnia_rekurencyjna($n - 1);
    }
}

function silnia_nierekurencyjna($n) {
    $silnia = 1;
    for ($i = 1; $i <= $n; $i++) {
        $silnia *= $i;
    }
    return $silnia;
}

function fibonacci_rekurencyjny($n) {
    if ($n <= 1) {
        return $n;
    } else {
        return fibonacci_rekurencyjny($n - 1) + fibonacci_rekurencyjny($n - 2);
    }
}

function fibonacci_nierekurencyjny($n) {
    $a = 0;
    $b = 1;
    for ($i = 0; $i < $n; $i++) {
        $temp = $a;
        $a = $b;
        $b = $temp + $b;
    }
    return $a;
}

function pomiar_czasu($funkcja, $argument) {
    $start = microtime(true);
    $wynik = $funkcja($argument);
    $koniec = microtime(true);
    return array('czas' => ($koniec - $start), 'wynik' => $wynik);
}

if (isset($_GET['liczba'])) {
    $liczba = intval($_GET['liczba']);

    // Pomiar czasu dla silni
    $pomiar_silnia_rekurencyjna = pomiar_czasu('silnia_rekurencyjna', $liczba);
    $pomiar_silnia_nierekurencyjna = pomiar_czasu('silnia_nierekurencyjna', $liczba);

    // Pomiar czasu dla ciągu Fibonacciego
    $pomiar_fibonacci_rekurencyjny = pomiar_czasu('fibonacci_rekurencyjny', $liczba);
    $pomiar_fibonacci_nierekurencyjny = pomiar_czasu('fibonacci_nierekurencyjny', $liczba);

    echo "<h2>Porównanie czasu wykonania dla argumentu: $liczba</h2>";

    echo "<h3>Silnia:</h3>";
    echo "Rekurencyjnie: " . $pomiar_silnia_rekurencyjna['czas'] . " sekund. Wynik: " . $pomiar_silnia_rekurencyjna['wynik'] . "<br>";
    echo "Nierekurencyjnie: " . $pomiar_silnia_nierekurencyjna['czas'] . " sekund. Wynik: " . $pomiar_silnia_nierekurencyjna['wynik'] . "<br>";

    echo "<h3>Ciąg Fibonacciego:</h3>";
    echo "Rekurencyjnie: " . $pomiar_fibonacci_rekurencyjny['czas'] . " sekund. Wynik: " . $pomiar_fibonacci_rekurencyjny['wynik'] . "<br>";
    echo "Nierekurencyjnie: " . $pomiar_fibonacci_nierekurencyjny['czas'] . " sekund. Wynik: " . $pomiar_fibonacci_nierekurencyjny['wynik'] . "<br>";

    // Sprawdzenie, która funkcja działa szybciej dla silni
    if ($pomiar_silnia_rekurencyjna['czas'] < $pomiar_silnia_nierekurencyjna['czas']) {
        echo "<p>Rekurencyjna funkcja silni działa szybciej.</p>";
    } elseif ($pomiar_silnia_rekurencyjna['czas'] > $pomiar_silnia_nierekurencyjna['czas']) {
        echo "<p>Nierekurencyjna funkcja silni działa szybciej.</p>";
    } else {
        echo "<p>Obie funkcje silni działają w takim samym czasie.</p>";
    }

    // Sprawdzenie, która funkcja działa szybciej dla ciągu Fibonacciego
    if ($pomiar_fibonacci_rekurencyjny['czas'] < $pomiar_fibonacci_nierekurencyjny['czas']) {
        echo "<p>Rekurencyjna funkcja Fibonacciego działa szybciej.</p>";
    } elseif ($pomiar_fibonacci_rekurencyjny['czas'] > $pomiar_fibonacci_nierekurencyjny['czas']) {
        echo "<p>Nierekurencyjna funkcja Fibonacciego działa szybciej.</p>";
    } else {
        echo "<p>Obie funkcje Fibonacciego działają w takim samym czasie.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Pomiar czasu działania funkcji</title>
</head>
<body>
<h1>Pomiar czasu działania funkcji</h1>
<form method="get">
    <label for="liczba">Podaj liczbę:</label>
    <input type="number" id="liczba" name="liczba" required>
    <br>
    <input type="submit" value="Wykonaj">
</form>
</body>
</html>
