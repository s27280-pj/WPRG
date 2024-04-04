<?php
function fibonacci($n) {
    $fib = array();
    $fib[0] = 0;
    $fib[1] = 1;

    for ($i = 2; $i <= $n; $i++) {
        $fib[$i] = $fib[$i - 1] + $fib[$i - 2];
    }

    return $fib;
}

function printOddFibonacci($fib) {
    foreach ($fib as $index => $value) {
        if ($value % 2 !== 0) {
            echo "[$index] $value\n";
        }
    }
}

$N = 10;
$fibonacciArray = fibonacci($N);

echo "Nieparzyste elementy ciągu Fibonacciego do $N:\n";
printOddFibonacci($fibonacciArray);
?>
