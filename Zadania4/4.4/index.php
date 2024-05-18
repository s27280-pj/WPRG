<?php
$allowedIpsFile = 'allowed_ips.txt';

if (!file_exists($allowedIpsFile)) {
    die("Plik z dozwolonymi IP nie istnieje.");
}

$allowedIps = file($allowedIpsFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
if ($allowedIps === false) {
    die("Błąd podczas odczytu pliku.");
}

$userIp = $_SERVER['REMOTE_ADDR'];

if (in_array($userIp, $allowedIps)) {
    include 'special_page.php';
} else {
    include 'regular_page.php';
}
?>
