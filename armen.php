<?php

function isOverlapping($reservation, $toCheckDebut, $toCheckFin)
{
    $reservationDebutDate = new DateTime($reservation['debut']);
    $reservationFinDate = new DateTime($reservation['fin']);
    $toCheckDebutDate = new DateTime($toCheckDebut);
    $toCheckFinDate = new DateTime($toCheckFin);

    if ($reservationDebutDate > $toCheckDebutDate && $reservationDebutDate < $toCheckFinDate) {
        return true;
    }

    if ($reservationFinDate > $toCheckDebutDate && $reservationFinDate < $toCheckFinDate) {
        return true;
    }

    if ($reservationDebutDate < $toCheckDebutDate && $reservationFinDate > $toCheckFinDate) {
        return true;
    }

    return false;
}

$isInvalidReservationTime = false;
$reservations = [
    [
        'debut' => '2022-12-19 08:00:00',
        'fin' => '2022-12-19 10:00:00',
    ],
    [
        'debut' => '2022-12-19 11:00:00',
        'fin' => '2022-12-19 13:00:00',
    ],
    [
        'debut' => '2022-12-19 15:00:00',
        'fin' => '2022-12-19 16:00:00',
    ]
];

$postDebut = '2022-12-19 16:00:00';
$postFin = '2022-12-19 17:00:00';

foreach($reservations as $reservation) {
    if (isOverlapping($reservation, $postDebut, $postFin)) {
        $isInvalidReservationTime = true;
        break;
    }
}

if ($isInvalidReservationTime) {
    //Show error message
    echo 'error msg';
} else {
    //Save to DB
    echo 'ok';
}