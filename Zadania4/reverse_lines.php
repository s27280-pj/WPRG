<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['file'])) {
    $file = $_FILES['file']['tmp_name'];

    if (file_exists($file)) {
        $lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        if ($lines === false) {
            die("Błąd podczas odczytu pliku.");
        }

        $reversedLines = array_reverse($lines);
        $reversedContent = implode(PHP_EOL, $reversedLines);

        $outputFile = 'reversed_' . basename($_FILES['file']['name']);
        if (file_put_contents($outputFile, $reversedContent) === false) {
            die("Błąd podczas zapisywania odwróconego pliku.");
        }

        echo "Plik został pomyślnie przetworzony. <a href=\"$outputFile\">Pobierz odwrócony plik</a>";
    } else {
        echo "Wybrany plik nie istnieje.";
    }
} else {
    echo "Nie wybrano pliku.";
}
?>
