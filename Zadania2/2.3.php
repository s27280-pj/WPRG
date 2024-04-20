<?php
function isPrime($number)
{
    if ($number < 2) {
        return false;
    }
    for ($i = 2; $i <= sqrt($number); $i++) {
        global $iterations;
        $iterations++;
        if ($number % $i === 0) {
            return false;
        }
    }
    return true;
}

$iterations = 0;


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $number = $_POST['number'];

    if (filter_var($number, FILTER_VALIDATE_INT) && $number > 0) {
        if (isPrime($number)) {
            echo "<p>Liczba $number jest liczbą pierwszą.</p>";
        } else {
            echo "<p>Liczba $number nie jest liczbą pierwszą.</p>";
        }
        echo "<p>Liczba iteracji potrzebnych do obliczeń: $iterations</p>";
    } else {
        echo "<p>Podana wartość nie jest liczbą całkowitą dodatnią.</p>";
    }
}
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="number">Podaj liczbę:</label>
    <input type="text" name="number" id="number" required>
    <input type="submit" value="Sprawdź">
</form>
