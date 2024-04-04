<?php

$n = 100;
$table = array_fill(2, $n, '');

for ($h = 2; ($h * $h) <= $n; ++$h) {
    for ($i = (2 * $h); $i <= $n; $i += $h) {
        unset($table[$i]);
    }
}

foreach ($table as $key => $value) {
    if ($key <= $n) {
        echo $key . ' ';
    }
}
?>
