<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Sprawdź datę urodzenia</title>
</head>
<body>
<h1>Sprawdź datę urodzenia</h1>
<form method="get">
    <label for="data_urodzenia">Data urodzenia:</label>
    <input type="date" id="data_urodzenia" name="data_urodzenia" required>
    <br>
    <input type="submit" value="Sprawdź">
</form>

<?php
if(isset($_GET['data_urodzenia'])) {
    $data_urodzenia = $_GET['data_urodzenia'];

    function dzien_tygodnia($data) {
        $dzien_tygodnia = date('l', strtotime($data));
        return $dzien_tygodnia;
    }

    function lata_urodzenia($data) {
        $dzisiaj = new DateTime();
        $urodzenie = new DateTime($data);
        $roznica = $dzisiaj->diff($urodzenie);
        return $roznica->y;
    }

    function dni_do_urodzin($data) {
        $urodziny = new DateTime($data);
        $aktualna_data = new DateTime();
        $urodziny->setDate($aktualna_data->format('Y'), $urodziny->format('m'), $urodziny->format('d'));
        if ($urodziny < $aktualna_data) {
            $urodziny->modify('+1 year');
        }
        $roznica = $aktualna_data->diff($urodziny);
        return $roznica->days;
    }

    $dzien_tygodnia = dzien_tygodnia($data_urodzenia);
    $lata_urodzenia = lata_urodzenia($data_urodzenia);
    $dni_do_urodzin = dni_do_urodzin($data_urodzenia);

    echo "Urodziłeś/aś się w dniu: $dzien_tygodnia <br>";
    echo "Masz $lata_urodzenia lat. <br>";
    echo "Do Twoich następnych urodzin pozostało $dni_do_urodzin dni.";
}
?>
</body>
</html>
