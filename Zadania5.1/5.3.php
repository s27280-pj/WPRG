<?php
$visit_count = 1;
$max_visits = 5;
$time_interval = 60 * 10;

if (isset($_COOKIE['visit_count']) && isset($_COOKIE['last_visit'])) {
    $last_visit = $_COOKIE['last_visit'];
    if (time() - $last_visit > $time_interval) {
        $visit_count = $_COOKIE['visit_count'] + 1;
    } else {
        $visit_count = $_COOKIE['visit_count'];
    }
}

setcookie('visit_count', $visit_count, time() + (86400 * 30));
setcookie('last_visit', time(), time() + (86400 * 30)); // aktualizacja czasu ostatniej wizyty

if ($visit_count >= $max_visits) {
    echo "Osiągnąłeś maksymalną liczbę odwiedzin: $max_visits.";
} else {
    echo "To jest Twoja wizyta numer: $visit_count.";
}
?>
