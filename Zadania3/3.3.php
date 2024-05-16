<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Obsługa katalogów</title>
</head>
<body>
<h1>Obsługa katalogów</h1>
<form method="post">
    <label for="sciezka">Ścieżka:</label>
    <input type="text" id="sciezka" name="sciezka" required>
    <br>
    <label for="nazwa_katalogu">Nazwa katalogu:</label>
    <input type="text" id="nazwa_katalogu" name="nazwa_katalogu" required>
    <br>
    <label for="operacja">Operacja:</label>
    <select id="operacja" name="operacja">
        <option value="read">Odczytaj</option>
        <option value="delete">Usuń</option>
        <option value="create">Stwórz</option>
    </select>
    <br>
    <input type="submit" value="Wykonaj">
</form>

<?php
function obsluga_katalogow($sciezka, $nazwa_katalogu, $operacja = 'read') {
    if (substr($sciezka, -1) !== '/') {
        $sciezka .= '/';
    }

    switch ($operacja) {
        case 'read':
            if (is_dir($sciezka . $nazwa_katalogu)) {
                $elementy = scandir($sciezka . $nazwa_katalogu);
                echo "Elementy w katalogu $sciezka$nazwa_katalogu:<br>";
                foreach ($elementy as $element) {
                    if ($element != '.' && $element != '..') {
                        echo "$element<br>";
                    }
                }
            } else {
                echo "Katalog $nazwa_katalogu w ścieżce $sciezka nie istnieje.";
            }
            break;

        case 'delete':
            if (is_dir($sciezka . $nazwa_katalogu)) {
                if (count(scandir($sciezka . $nazwa_katalogu)) == 2) {
                    rmdir($sciezka . $nazwa_katalogu);
                    echo "Katalog $nazwa_katalogu w ścieżce $sciezka został usunięty.";
                } else {
                    echo "Katalog $nazwa_katalogu w ścieżce $sciezka nie jest pusty.";
                }
            } else {
                echo "Katalog $nazwa_katalogu w ścieżce $sciezka nie istnieje.";
            }
            break;

        case 'create':
            if (!is_dir($sciezka . $nazwa_katalogu)) {
                mkdir($sciezka . $nazwa_katalogu);
                echo "Katalog $nazwa_katalogu został utworzony w ścieżce $sciezka.";
            } else {
                echo "Katalog $nazwa_katalogu w ścieżce $sciezka już istnieje.";
            }
            break;

        default:
            echo "Nieznana operacja.";
            break;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sciezka = $_POST['sciezka'];
    $nazwa_katalogu = $_POST['nazwa_katalogu'];
    $operacja = $_POST['operacja'];
    obsluga_katalogow($sciezka, $nazwa_katalogu, $operacja);
}
?>
</body>
</html>
