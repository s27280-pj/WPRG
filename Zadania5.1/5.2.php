<?php
$visit_count = 1;
$max_visits = 5;

if (isset($_COOKIE['visit_count'])) {
    $visit_count = $_COOKIE['visit_count'] + 1;
}

setcookie('visit_count', $visit_count, time() + (86400 * 30)); // cookie ważne przez 30 dni

if ($visit_count >= $max_visits) {
    echo "Osiągnąłeś maksymalną liczbę odwiedzin: $max_visits.";
} else {
    echo "To jest Twoja wizyta numer: $visit_count.";
}
?>
