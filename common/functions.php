<?php

function jump($url) {
    header("location:$url");
}

function diffBetweenTwoDays($day1, $day2)
{
    $second1 = strtotime($day1);
    $second2 = strtotime($day2);

    return ceil((abs($second1 - $second2)) / 86400);
}