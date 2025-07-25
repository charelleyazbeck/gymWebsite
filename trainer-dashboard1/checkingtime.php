<?php

$timeRanges = [
    1 => ['start' => '10:00', 'end' => '12:00'], 
    2 => ['start' => '12:00', 'end' => '14:00'], 
    3 => ['start' => '14:00', 'end' => '16:00'],
    4 => ['start' => '16:00', 'end' => '18:00'],
    5 => ['start' => '18:00', 'end' => '20:00'],
    6 => ['start' => '20:00', 'end' => '22:00'],
];

function isTimeInRange($time, $start, $end) {
    $time = strtotime($time);
    $start = strtotime($start);
    $end = strtotime($end);
    return ($time >= $start && $time <= $end);
}

function validateTime($row, $enteredTime, $timeRanges) {
    if (!isset($timeRanges[$row])) {
        return false; // Invalid row
    }

    $range = $timeRanges[$row];
    return isTimeInRange($enteredTime, $range['start'], $range['end']);
}

?>